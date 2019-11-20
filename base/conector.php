<?php

class Conector {
    private $driver;
    private $host, $user, $pass, $database, $charset;
  
    public function __construct() {
        $db_cfg = require_once $_SERVER["DOCUMENT_ROOT"] . '/configuracion/conexion.php';
        $this->driver=$db_cfg["driver"];
        $this->host=$db_cfg["servidor"];
        $this->user=$db_cfg["usuario"];
        $this->pass=$db_cfg["clave"];
        $this->database=$db_cfg["base"];
        $this->charset=$db_cfg["charset"];
    }
    
    public function conexion(){
        
        if($this->driver=="mysql" || $this->driver==null){
            $dsn = "mysql:host=$this->host;dbname=$this->database;charset=$this->charset";
            $con = new PDO($dsn, $this->user, $this->pass);
        }
        
        return $con;
    }
    
    public function iniciarFluent(){
        require_once $_SERVER["DOCUMENT_ROOT"] . '/FluentPDO/FluentPDO.php';
        
        if($this->driver=="mysql" || $this->driver==null){
            $pdo = new PDO($this->driver.":dbname=".$this->database, $this->user, $this->pass);
            $fpdo = new FluentPDO($pdo);
        }
        
        return $fpdo;
    }
}

?>