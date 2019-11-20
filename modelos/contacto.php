<?php

class Contacto extends Entidad {
    private $id;
    private $fecha;
    private $nombres;
    private $correo;
    private $telefono;
    private $mensaje;
    
    public function __construct($adapter) {
        parent::__construct("contactos", $adapter);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($f) {
        $this->fecha = $f;
    }
    
    public function getNombres() {
        return $this->nombres;
    }

    public function setNombres($nombres) {
        $this->nombres = $nombres;
    }    

    public function getcorreo() {
        return $this->correo;
    }

    public function setcorreo($correo) {
        $this->correo = $correo;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($t) {
        $this->telefono = $t;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    public function setMensaje($m) {
        $this->mensaje = $m;
    }

    public function guardar(){
        $query = "INSERT INTO contactos (fecha,estado,nombres,correo,telefono,mensaje)
                 VALUES(now(),'P',
                       '".$this->nombres."',
                       '".$this->correo."',
                       '".$this->telefono."',
                       '".$this->mensaje."');";
        $save = $this->db()->query($query);
        return $save;
    }
}

?>