<?php

class Entidad {
    private $tabla;
    private $db;
    private $conector;

    public function __construct($tab, $p) {
        $this->tabla=(string) $tab;
		$this->conectar = null;
		$this->db = $p;
    }
    
    public function getConector(){
        return $this->conector;
    }
    
    public function db(){
        return $this->db;
    }
    
    public function traerTodos(){
        $sql = $this->db->prepare("SELECT * FROM $this->tabla ORDER BY id");
        $sql->execute();
        return $sql->fetchAll();
    }
    
    public function traerPorId($id){
        $sql = $this->db->prepare("SELECT * FROM $this->tabla WHERE id = $id");
        $sql->execute();
        return $sql->fetchAll();
    }
    
    public function traerPorCadena($columna, $cadena){
        $sql = $this->db->prepare("SELECT * FROM $this->tabla WHERE $columna = '$cadena'");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function traerPorValor($columna, $valor){
        $sql = $this->db->prepare("SELECT * FROM $this->tabla WHERE $columna = $valor");
        $sql->execute();
        return $sql->fetchAll();
    }
    
    public function eliminarPorId($id){
        $sql = $this->db->prepare("DELETE FROM $this->tabla WHERE id = $id");
        return $sql->execute();
    }

    public function traerPaginado($idx, $conteo) {
        $sql = $this->db->prepare("SELECT * FROM $this->tabla LIMIT $idx, $conteo");
        $sql->execute();
        return $sql->fetchAll();
    }

    public function traerPaginas($conteo) {
        $pags = 1;
        $sql = $this->db->prepare("SELECT count(id) as conteo FROM $this->tabla");
        $sql->execute();
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