<?php

class Agenda extends Entidad {
    private $id;
    private $registro;
    private $cliente;
    private $producto;
    private $precio;
    private $fecha;
    private $hora;
    private $estilista;
    
    public function __construct($adapter) { 
        parent::__construct("agenda", $adapter); 
    } 
    
    public function getId() { 
        return $this->id; 
    } 

    public function setId($id) { 
        $this->id = $id; 
    } 
    
    public function getRegistro() { 
        return $this->registro; 
    } 

    public function setRegistro($r) { 
        $this->registro = $r; 
    } 

    public function getCliente() { 
        return $this->cliente; 
    } 

    public function setCliente($l) { 
        $this->cliente = $l; 
    } 

    public function getProducto() {
        return $this->producto;
    }

    public function setProducto($p) {
        $this->producto = $p;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($p) {
        $this->precio = $p;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($f) {
        $this->fecha = $f;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setHora($h) {
        $this->hora = $h;
    }

    public function getEstilista() {
        return $this->estilista;
    }

    public function setEstilista($h) {
        $this->estilista = $h;
    }

    public function guardar() {
        $sd = substr($this->fecha, 0, 10);
        $dt = trim($sd) . " " . $this->hora; 
        $qins = "Insert into agenda (fecha, cliente, registro, producto, precio, estilista)
            values ('$dt', $this->cliente, now(), $this->producto, $this->precio, $this->estilista);";
        $save = $this->db()->query($qins); 
        return $save; 
    }

    public function actualizar() {
        $sd = substr($this->fecha, 0, 10);
        $dt = trim($sd) . " " . $this->hora; 
        $cols = " fecha = '$dt', 
            cliente = $this->cliente, 
            producto = $this->producto, 
            precio = $this->precio,
            estilista = $this->estilista";
        $act = "UPDATE agenda set $cols WHERE id = $this->id";
        $res = $this->db()->query($act);
        return $res;
    } 

    public function citasAgendadas() {
        $q = $this->db()->prepare("Select n.nombres as clienteNom, p.nombre as productoNom, en.nombres as estilistaNom, p.imagen, p.duracion, date_add(a.fecha, interval p.duracion HOUR) as fin, a.* from agenda a
            left outer join clientes c on a.cliente = c.id
            left outer join personas n on c.persona = n.id
            left outer join estilistas e on a.estilista = e.id
            left outer join personas en on e.persona = en.id
            left outer join productos p on a.producto = p.id");
        $q->execute(); 
        $res = $q->fetchAll(); 
        return $res;
    }

    public function citasAgendadasProducto($pro) {
        $q = $this->db()->prepare("Select n.nombres as clienteNom, en.nombres as estilistaNom, p.imagen, p.duracion, date_add(a.fecha, interval p.duracion HOUR) as fin, a.* 
            from agenda a
            left outer join clientes c on a.cliente = c.id
            left outer join personas n on c.persona = n.id
            left outer join estilistas e on a.estilista = e.id
            left outer join personas en on e.persona = en.id
            where .producto = " . $pro . " and a.fecha >= curdate()");
        $q->execute(); 
        $res = $q->fetchAll(); 
        return $res;
    }

    public function citasPaginado($idx, $conteo) {
        //$sql = $this->db()->prepare("SELECT * FROM productos WHERE categoria = :cat LIMIT $idx, $conteo");
        $q = $this->db()->prepare("Select n.nombres as clienteNom, p.nombre as productoNom, en.nombres as estilistaNom, p.imagen, p.duracion, date_add(a.fecha, interval p.duracion HOUR) as fin, a.* from agenda a 
            left outer join clientes c on a.cliente = c.id 
            left outer join personas n on c.persona = n.id 
            left outer join estilistas e on a.estilista = e.id
            left outer join personas en on e.persona = en.id
            left outer join productos p on a.producto = p.id 
            LIMIT $idx, $conteo");
        $q->execute(); 
        $res = $q->fetchAll(); 
        return $res;
    }

    public function validarCita($eli, $fec) {
        $sql = $this->db()->prepare("Select c.id from agenda c " .
            "left outer join productos p on c.producto = p.id " .
            "where estilista = $eli and cast('$fec' as datetime) " .
            "between fecha and date_add(fecha, interval p.duracion hour)   LIMIT 1"); 
        $sql->execute(); 
        $res = $sql->fetchAll(); 
        if (count($res) <= 0) { 
            // No se encuentra
            return 0;
        } else {
            $fila = reset($res); 
            if ($fila)
                return $fila[0]; 
        }
    }
}

?>