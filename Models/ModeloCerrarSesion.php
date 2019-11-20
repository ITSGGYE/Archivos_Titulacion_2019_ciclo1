<?php
session_start();

require '../Conexion/config.php'; //importamos nuestro archivo de configuracion que contiene el nombre, usuario y contraseña de la base de datos
require '../Conexion/functions.php';

session_destroy(); // destruimos la session

header('Location: ' . RUTA . 'Models/ModeloIniciarSesion.php');

?>
   

