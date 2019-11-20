<?php
session_start(); //creamos una variable local de tipo sesion

require '../Conexion/config.php'; //importamos nuestro archivo de configuracion que contiene el nombre, usuario y contraseña de la base de datos
require '../Conexion/functions.php';


// comprobar session
if (!isset($_SESSION['usuario'])) {// si no esta seteada la variable usuario o sea si esta vacia lo redireccionara a..
  header('Location: '.RUTA.'Models/ModeloIniciarSesion.php');
}
$conexion = conexion($bd_config);
$admin = iniciarSession('usuariosig', $conexion);

if ($admin['rol_id'] == '1') {
  // traer el nombre del usuario
    
  require '../Administrador/MenuPrincipal.php';
  
} else {
  header('Location: '.RUTA.'index.php');
}

?>