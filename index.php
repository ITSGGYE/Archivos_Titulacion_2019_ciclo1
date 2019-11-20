<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php session_start();

require 'Conexion/config.php';
require 'Conexion/functions.php';

//comprobar sesion
if (isset($_SESSION['usuario'])) {//si hay un valor dentro de variable usuario
    //validar los datos por privilegio
$conexion = conexion($bd_config);
$usuario = iniciarSession('usuarios', $conexion);//

if($usuario['tipo_usuario']=='administrador'){//si el tipo de usuario es igual a administrador
    header('Location: '.RUTA.'admin.php');
    
}elseif($usuario['tipo_usuario']=='profesor'){// si el tipo de usuario es igual a usuario
     header('Location: '.RUTA.'profesor.php');
} elseif($usuario['tipo_usuario']=='representante')
{
    header('Location: '.RUTA.'representante.php');
}else{
    header('Location: '.RUTA.'login.php');
}
    
}else{// si 
    header('Location: '.RUTA.'login.php');
}

?>
    