<?php

class Usuario extends Entidad {
    private $id;
    private $codigo;
    private $clave;
    private $tipo;
    private $persona;

    public function __construct($adapter) {
        parent::__construct("usuarios", $adapter);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }    

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function getClave() {
        return $this->clave;
    }

    public function setClave($c) {
        $this->clave = $c;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($t) {
        $this->tipo = $t;
    }

    public function getPersona() {
        return $this->persona;
    }

    public function setPersona($p) {
        $this->persona = $p;
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
    public function guardar() {
        $per = $this->traerCrearPersona($this->getNombres(), 
            $this->getCedula(), 
            $this->getTelefonos(), 
            $this->getDireccion(), 
            $this->getCorreo()); 
        $pid = (int)$per;
        
        $query = "INSERT INTO usuarios (id,tipo,persona,codigo,clave)
                VALUES(NULL,
                       0,
                       $pid,
                       '".$this->codigo."',
                       '".$this->clave."');";
        $res = $this->db()->query($query);
        return $res;
    }

    public function actualizar() {        
        // Actualizar la persona
        if ($this->getPersona() > 0) {
            $pid = $this->getPersona();
            $cols = "nombres = '" . $this->getNombres() . "', " .
                "direccion = '" . $this->getDireccion() . "'," .
                "telefonos = '" . $this->getTelefonos() . "'," .
                "cedula = '" . $this->getCedula() . "'," .
                "correo = '" . $this->getCorreo() . "'";
            $act = "UPDATE personas set $cols WHERE id = $pid";
            $this->db()->query($act);
        }
        // Actualizar el usuario
        $cols = "";
        if (!empty($this->clave)) {
            $cols = $cols . ", clave = '".$this->clave."' ";
        }
        $actc = "UPDATE usuarios set codigo = '".
            $this->codigo."'" . $cols . " WHERE id = ". $this->id; 
        $resc = $this->db()->query($actc); 
        return $resc; 
    }

    public function validar($correo, $clave) {
        $ret = -1; 
        $sql = $this->db()->prepare("SELECT u.id, p.nombres, u.clave FROM usuarios u " .
            " left join personas p on u.persona = p.id " .
            " WHERE correo = '" . $correo . "'");
        $sql->execute();
        $res = $sql->fetchAll();
        foreach ($res as $usr) {
            if (!$clave == null && !empty($clave) && password_verify($clave, $usr["clave"])) {
                @session_start(); 
                $_SESSION['usrNombre'] = $usr["nombres"];
                $_SESSION['usrId'] = $usr["id"];
                return $usr["id"];
            }
        }
        return $ret;
    }

    public function traerTodosConPersona(){
        $sql = $this->db()->prepare("Select u.id, u.persona, u.clave, u.codigo, ".
            "p.nombres, p.cedula, p.direccion, p.telefonos, p.correo " .
            "from usuarios u " .
            "left join personas p on u.persona = p.id ORDER BY p.nombres");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function traerConPersonaPorId($id){
        $sql = $this->db()->prepare("Select u.id, u.persona, u.clave, u.codigo, ". 
            "p.nombres, p.cedula, p.direccion, p.telefonos, p.correo " .
            "from usuarios u " .
            "left join personas p on u.persona = p.id WHERE u.id = $id");
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