<?php
class Promocion extends Entidad {
    private $id;
    private $producto; 
    private $fecha; 
    private $porcentaje; 
    private $vence; 
    private $estado;
    
    public function __construct($adapter) {
        parent::__construct("promociones", $adapter);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getProducto() {
        return $this->producto;
    } 
    public function setProducto($pro) {
        $this->producto = $pro;
    } 

    public function getFecha() {
        return $this->fecha;
    } 
    public function setFecha($fec) {
        $this->fecha = $fec;
    } 

    public function getPorcentaje() {
        return $this->porcentaje;
    } 
    public function setPorcentaje($por) {
        $this->porcentaje = $por;
    } 
    
    public function getVence() {
        return $this->vence;
    } 
    public function setVence($ven) {
        $this->vence = $ven;
    }     

    public function getEstado() {
        return $this->estado;
    }
    public function setEstado($est) {
        $this->estado = $est;
    }

    public function guardar(){
        $query="INSERT INTO promociones (producto,".
            "fecha,". 
            "porcentaje,". 
            "estado) " .
            "VALUES(" .
            $this->producto.", now(),".
            $this->porcentaje.",0);";
        $save=$this->db()->query($query);
        return $save;
    }

    public function actualizar() {        
        $cols = " producto = " . $this->producto . "," . 
            "porcentaje = " . $this->porcentaje; 
        
        $act = "UPDATE promociones set " . $cols . " WHERE id = ". $this->id;
        $res = $this->db()->query($act);
        return $res;
    }

    public function todos() {
        $query = "select m.id, m.producto, m.porcentaje, p.nombre, p.precio, p.imagen from promociones m " .
        "left outer join productos p on m.producto = p.id " .
        "where m.estado = 0";
        $sql = $this->db()->prepare($query);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function traerConProductoPorId($id) {
        $query = "select m.id, m.producto, m.porcentaje, p.nombre, p.precio, p.imagen from promociones m " .
        "left outer join productos p on m.producto = p.id " .
        "where m.id = " . $id;
        $sql = $this->db()->prepare($query);
        $sql->execute();
        return $sql->fetchAll();
    }
}

?>