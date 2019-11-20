<?php

class Persona extends Entidad {
    private $id;
    private $nombres;
    private $cedula;
    private $direccion;
    private $telefonos;
    private $correo;
    
    public function __construct($adapter) {
        parent::__construct("personas", $adapter);
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

    public function guardar(){
        // Buscar la persona
        // si existe vincularlo, Sino existe crearlo 
        $query="INSERT INTO clientes (id,nombres,cedula,direccion,correo,telefonos)
                VALUES(NULL,
                       '".$this->nombres."',
                       '".$this->cedula."',
                       '".$this->direccion."',
                       '".$this->correo."',
                       '".$this->telefonos."');";
        $save=$this->db()->query($query);
        return $save;
    }

    public function actualizar() {        
        $cols = " nombres = '$this->nombres', 
            correo = '$this->correo', 
            direccion = '$this->direccion', 
            cedula = '$this->cedula',
            telefonos = '$this->telefonos'";
        $act = "UPDATE personas set $cols WHERE id = $this->id";
        $res = $this->db()->query($act);
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

        $sql = $this->db()->prepare("SELECT id FROM " . $this->tabla . " WHERE $w LIMIT 1"); 
        $sql->execute(); 
        $res = $sql->fetchAll(); 
        if (count($res) <= 0) { 
            $qins = $this->db()->prepare("INSERT INTO " . $this->tabla . 
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