<?php
session_start();

require '../Conexion/config.php'; //importamos nuestro archivo de configuracion que contiene el nombre, usuario y contraseña de la base de datos
require '../Conexion/functions.php';

// comprobar session
if (!isset($_SESSION['usuario'])) {// si no esta seteada la variable usuario o sea si esta vacia lo redireccionara a..
  header('Location: '.RUTA.'Models/ModeloIniciarSesion.php');
}
$conexion = conexion($bd_config);
$secretario = iniciarSession('usuariosig', $conexion);

if ($secretario['rol_id'] == '2') {
  
  require '../Secretario/MenuPrincipal.php';
}else{
    header('Location: '.RUTA.'index.php');
}

?>
   
