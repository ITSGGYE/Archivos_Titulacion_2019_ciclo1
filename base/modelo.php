<?php

class Modelo extends Entidad {
    private $tabla;
    private $fluent;
     
    public function __construct($tab, $p) {
        $this->tabla=(string) $tab;
        parent::__construct($tab);
         
        $this->fluent=$this->getConector()->startFluent();
    }
     
    public function fluent(){
        return $this->fluent;
    }
     
    public function ejecutarSql($query){
        $sql = $this->db()->prepare($query);
        $sql->execute();

        $res = $sql->fetchAll();
        
        if(count($rows) <= 0) {                
            $res = false;
        }
         
        return $res;
    }
     
    //Aqui podemos montarnos métodos para los modelos de consulta
     
}

?>