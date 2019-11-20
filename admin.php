<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start();

require 'Conexion/config.php';
require 'Conexion/functions.php';

// comprobar session
if (!isset($_SESSION['usuario'])) {// si no esta seteada la variable usuario o sea si esta vacia lo redireccionara a..
  header('Location: '.RUTA.'login.php');
}
$conexion = conexion($bd_config);
$admin = iniciarSession('usuarios', $conexion);

if ($admin['tipo_usuario'] == 'administrador') {
  // traer el nombre del usuario
    
    
  require 'DOCENTE/MenuPrincipal.php';
  
} else {
  header('Location: '.RUTA.'index.php');
}



?>