<?php

//Configuración global
require_once __DIR__.'/configuracion/globales.php';

//Base para los controladores
require_once __DIR__.'/base/controlador.php';    

//Funciones para el controlador frontal
require_once __DIR__.'/base/controlador.fun.php';

//Cargamos controladores y acciones
if (isset($_GET["controller"])) {
    $controllerObj=cargarControlador($_GET["controller"]);
    lanzarAccion($controllerObj);    
} else {
    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
    lanzarAccion($controllerObj);
}

?>
