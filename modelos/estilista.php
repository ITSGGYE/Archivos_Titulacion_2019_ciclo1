<?php

class Estilista extends Entidad {
    private $id;
    private $nombres;
    private $cedula;
    private $direccion;
    private $telefonos;
    private $correo;
    private $persona;
    
    public function __construct($adapter) {
        parent::__construct("estilistas", $adapter);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getNombres() {
        return $this->nombres;
    }

    public function setNombres($n) {
        $this->nombres = $n;
    }    

    public function getCedula() {
        return $this->cedula;
    }

    public function setCedula($l) {
        $this->cedula = $l;
    }    

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($d) {
        $this->direccion = $d;
    }

    public function getTelefonos() {
        return $this->telefonos;
    }

    public function setTelefonos($t) {
        $this->telefonos = $t;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function setCorreo($c) {
        $this->correo = $c;
    }

    public function getPersona() {
        return $this->persona;
    }

    public function setPersona($p) {
        $this->persona = $p;
    }

    public function guardar(){
        
        $per = $this->traerCrearPersona($this->getNombres(), 
            $this->getCedula(), 
            $this->getTelefonos(), 
            $this->getDireccion(), 
            $this->getCorreo()); 
        $pid = (int)$per; 
        $query="INSERT INTO estilistas (id,persona) VALUES (NULL,".$pid.");";
        $save=$this->db()->query($query);
        return $save;
    }

    public function actualizar() {        
        // Actualizar la persona
        if ($this->getPersona() > 0) {
            $pid = $this->getPersona();
            $cols = "nombres = '" . $this->getNombres() . "', " .
                "correo = '" . $this->getCorreo() . "'," .
                "direccion = '" . $this->getDireccion() . "'," .
                "telefonos = '" . $this->getTelefonos() . "'," .
                "cedula = '" . $this->getCedula() . "'," .
                "correo = '" . $this->getCorreo() . "'";
            $act = "UPDATE personas set $cols WHERE id = $pid";
            $res = $this->db()->query($act);
        }
        return $res;
    }

    public function traerCrear($nom, $ced, $tel, $dir, $cor) {        
        $id = 0;
        $w = "nombres = '$nom'";
        if (!empty($ced)) {
            $w = $w . " OR cedula = '$ced'";
        }
        if (!empty($tel)) {
            $w = $w . " OR telefonos = '$tel'";
        }
        // Buscar persona por cedula, nombres
        $sql = $this->db()->prepare("SELECT id FROM personas WHERE $w LIMIT 1"); 
        $sql->execute(); 
        $res = $sql->fetchAll(); 
        if (count($res) <= 0) { // Persona no encontrada: Crear persona y estilista
            // 1: Crer persona 
            $qins = $this->db()->prepare("INSERT INTO personas " . 
                            "(nombres,cedula,telefonos,direccion,correo) VALUES " . 
                            "('$nom','$ced','$tel','$dir','$cor');"); 
            $qins->execute(); 

            $qid = $this->db()->prepare("Select last_insert_id() as id;"); 
            $qid->execute(); 
            $res = $qid->fetch(); 
            $pid = $res["id"];
            // 2: Crear estilista
            $query="INSERT INTO estilistas (persona) VALUES (" . $pid . ");";
            $this->db()->query($query);
            $qid = $this->db()->prepare("Select last_insert_id() as id;"); 
            $qid->execute(); 
            $res = $qid->fetch(); 
            $id = $res["id"];
        } else { // Persona encontrada: Buscar si esta como estilista
            $idc = 0;
            $fila = reset($res);  
            if ($fila != false) 
                $idc = $fila["id"];
            $sql = $this->db()->prepare("SELECT id FROM estilistas WHERE persona = " . $idc . " LIMIT 1"); 
            $sql->execute(); 
            $resc = $sql->fetchAll(); 
            if (count($res) <= 0) {
                // Se encontro persona pero no estilista: 
                // Insetar estilista y retornar su id
                $query="INSERT INTO estilistas (persona) VALUES (" . $id . ");";
                $this->db()->query($query);
                $qid = $this->db()->prepare("Select last_insert_id() as id;"); 
                $qid->execute(); 
                $res = $qid->fetch(); 
                $id = $res["id"];
            }
            else {
                // Se encontro persona en base de estilista: retornar id encontrado
                $filac = reset($resc);  
                if ($filac != false) 
                    $id = $filac["id"];
            }
        }
        return $id;
    }
    
    public function traerPaginadoElis($idx, $conteo) {
        $sql = $this->db()->prepare("SELECT c.id, c.persona, p.nombres, p.cedula, p.direccion, p.telefonos, p.correo, p.estado FROM estilistas c " .
            "left join personas p on c.persona = p.id LIMIT $idx, $conteo");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function traerConPersonas() {
        $sql = $this->db()->prepare("SELECT c.id, c.persona, p.nombres, p.cedula ".
            "FROM estilistas c " .
            "left join personas p on c.persona = p.id");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function traerConPersonaPorId($id){
        $sql = $this->db()->prepare("SELECT c.id, c.persona, p.nombres, p.cedula, p.direccion, p.telefonos, p.correo, p.estado FROM estilistas c " .
            "left join personas p on c.persona = p.id WHERE c.id = $id");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function traerCrearPersona($nom, $ced, $tel, $dir, $cor) {        
        $id = 0;
        $w = "nombres = '$nom'";
        if (!empty($ced)) {
            $w = $w . " OR cedula = '$ced'";
        }
        if (!empty($tel)) {
            $w = $w . " OR telefonos = '$tel'";
        }

        $sql = $this->db()->prepare("SELECT id FROM personas WHERE $w LIMIT 1"); 
        $sql->execute(); 
        $res = $sql->fetchAll(); 
        if (count($res) <= 0) { 
            $qins = $this->db()->prepare("INSERT INTO personas " .
                            "(nombres,cedula,telefonos,direccion,correo) VALUES " . 
                            "('$nom','$ced','$tel','$dir','$cor');"); 
            $qins->execute(); 

            $qid = $this->db()->prepare("Select last_insert_id() as id;"); 
            $qid->execute(); 
            $res = $qid->fetch(); 
            $id = $res["id"]; 
        } else {
            $fila = reset($res); 
            if ($fila != false)
                $id = $fila["id"]; 
        }
        return $id;
    }
}

?>