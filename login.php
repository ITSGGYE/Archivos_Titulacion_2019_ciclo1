<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
session_start(); //creamos una variable local de tipo sesion

require 'Conexion/config.php'; //importamos nuestro archivo de configuracion
require 'Conexion/functions.php';

$errores = '';//creamos una variable de errores y la inicializamos vacia

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $conexion = conexion($bd_config);
    $statement = $conexion->prepare('select * from usuarios where usuario= :usuario AND password = :password');//
    $statement->execute([
        ':usuario' => $usuario,
        ':password' => $password
    ]);
    $resultado = $statement->fetch();
    
    if ($resultado !== false) {//si nuestro resultado es verdadero que nos redirija a index.php donde vamos a realizar las validaciones
    $_SESSION['usuario'] = $usuario;//estamos metiendo una variable global de sesion, que va a ser igual a nuestra variable del campo de texto
    header('Location: '.RUTA.'index.php');
  } else {
    $errores .= '<li class="error">Tu usuario y/o contraseña son incorrectos</li>';
  }
  
}

require 'views/login.view.php'; //importamos nuestra vista de login
?>
  
