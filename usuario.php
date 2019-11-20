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
$user = iniciarSession('usuarios', $conexion);

if ($user['tipo_usuario'] == 'usuario') {
  // traer el nombre del usuario

  require 'FAMILIAR/Menuprincipal.php';
}else{
    header('Location: '.RUTA.'index.php');
}

?>
