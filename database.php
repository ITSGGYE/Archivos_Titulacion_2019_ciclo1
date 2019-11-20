<?php
error_reporting(1);
$conexion = @new mysqli("localhost","root","","educacion_virtual");
if(!$conexion){
    $conexion = null;
    echo "error de conexión";
    exit;
}else{
    $conexion->query("SET NAMES 'utf8'");
    $conexion->query("SET CHARSET 'utf8");
}

