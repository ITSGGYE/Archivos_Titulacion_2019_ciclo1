<?php
class Producto extends Entidad {
    private $id;
    private $nombre;
    private $precio;
    private $categoria;
    private $imagen;
    private $activo;
    private $descripcion;
    private $duracion;
    
    public function __construct($adapter) {
        parent::__construct("productos", $adapter);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($img) {
        $this->imagen = $img;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setActivo($p) {
        $this->activo = $p;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($p) {
        $this->descripcion = $p;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function setDuracion($p) {
        $this->duracion = $p;
    }

    public function guardar(){
        $query="INSERT INTO productos (id,nombre,precio,categoria,imagen,activo,duracion,descripcion)
                VALUES(NULL,
                       '".$this->nombre."',
                       ".$this->precio.",
                       '".$this->categoria."',
                       '".$this->imagen."',
                       ".$this->activo.",
                       ".$this->duracion.",
                       '".$this->descripcion."');";
        $save=$this->db()->query($query);
        return $save;
    }

    public function actualizar() {        
        $cols = " nombre = '$this->nombre', 
            precio = $this->precio, 
            categoria = $this->categoria, 
            duracion = $this->duracion, 
            descripcion = '$this->descripcion'"; 
        if (!empty($this->imagen)) { 
            $cols = $cols . ", imagen = '$this->imagen'"; 
        }
        
        $act = "UPDATE productos set $cols WHERE id = $this->id";
        $res = $this->db()->query($act);
        return $res;
    }

    public function traerDestacados()
    {
        $query = "select m.id, m.producto, m.porcentaje, p.nombre, p.precio as anterior, p.imagen, " .
            "p.precio - ((p.precio * m.porcentaje) / 100) as precio " .
            "from promociones m " .
            "left outer join productos p on m.producto = p.id " .
            "where m.estado = 0";
        $sql = $this->db()->prepare($query);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function traerPorCategoria($cat)
    {
        $query = "SELECT id, nombre, precio, imagen from productos " .
            "where categoria = :cat";
        $sql = $this->db()->prepare($query);
        $sql->execute(array('cat' => $cat));
        return $sql->fetchAll();
    }

    public function traerUltimoId() {
        $sql = $this->db()->prepare("Select max(id) as id from productos");
        $sql->execute(); 
        $res = $sql->fetchAll(); 
        if (count($res) <= 0) {
            $id = 1;
        } else {
            $fid = reset($res);
            if ($fid) { 
                $id = $fid["id"]; 
            }
        }
        return $id;
    }

    public function traerPorCategoriaPaginado($idx, $conteo, $cat) {
        $sql = $this->db()->prepare("SELECT * FROM productos WHERE categoria = :cat LIMIT $idx, $conteo");
        $sql->execute(array('cat' => $cat));
        return $sql->fetchAll();
    }

    public function traerPaginasCategoria($conteo, $cat) {
        $pags = 1;
        $sql = $this->db()->prepare("SELECT count(id) as conteo FROM productos WHERE categoria = :cat");
        $sql->execute(array('cat' => $cat));
        $res = $sql->fetchAll();
        $p = reset($res);
        if ($p != false) {
            $total = $p["conteo"];
            if ($total > 0 && $conteo > 0)
                $pags = ceil($total / $conteo);
        }
        return $pags;
    }

}

?>