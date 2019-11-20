<?php

class Controlador{

    public function __construct() {
		require_once $_SERVER["DOCUMENT_ROOT"] . '/base/conector.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . '/base/entidad.php';
        require_once $_SERVER["DOCUMENT_ROOT"] . '/base/modelo.php';
        
        //Incluir todos los modelos
        foreach(glob($_SERVER["DOCUMENT_ROOT"] . '/modelos/*.php') as $file){
            require_once $file;
        }
    }
    
    //Plugins y funcionalidades
    
    public function mostrarVista($vista,$datos){
        foreach ($datos as $id_assoc => $valor) {
            ${$id_assoc}=$valor; 
        }
        
        require_once 'vista.php';
        $helper = new Vista();
    
        require_once $_SERVER["DOCUMENT_ROOT"] . '/vistas/' . $vista . '.php';
    }
    
    public function redirect($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
        header("Location:index.php?controller=".$controlador."&action=".$accion);
    }
    
    //Métodos para los controladores
}
?>