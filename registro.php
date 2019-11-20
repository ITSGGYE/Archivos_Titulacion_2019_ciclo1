<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start(); //creamos una variable global de tipo sesions

require 'Conexion/config.php';
require 'Conexion/functions.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {// si el metodo requerido del servidor es igual a post
    $usuario = limpiarDatos($_POST['usuario']);
    $password = limpiarDatos($_POST['password']);
    $rol = $_POST['rol'];

    $errores = '';

    //validar los campos de texto
    if (empty($usuario) || empty($password) || empty($rol)) {
        $errores .= '<li class="error">Por favor rellene todos los campos</li>';
    } else {
        // validacion de que el usuario no exista

        $conexion = conexion($bd_config); //traemos los valores de la conexion
        $statement = $conexion->prepare('select * from usuarios where usuario = :usuario LIMIT 1'); //creamos una variable statement que va a ser igual a nuestra variable de conexion y que va a preparar un sentencia de sql
          //seleccionar todo de la tabla usuario where  usuario sea igual a un placeholder o variable vacia que tiene que ser asignada con el limite de uno, o sea un solo registro
        $statement->execute([//ejecutamos nuestra sentencia sql,abrimos un array
            ':usuario' => $usuario
        ]);
        $resultado = $statement->fetch();//que la variable resultado nos va a traer toda nuestra sentecia sql, trayendo todos los valores de la tabla usuarios

        if ($resultado != false) {// si el usuario es verdadero, o sea ya se encuentra en la base
            $errores .= '<li class="error">Este usuario ya existe</li>';
        }
        
    }
    
    
    if($errores == ''){
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, password, tipo_usuario) VALUES(null, :usuario, :password, :tipo_usuario)');
        
        $statement->execute([
            ':usuario' => $usuario,
            ':password' => $password,
            ':tipo_usuario' => $rol
        ]);
        header('Location: '.RUTA.'login.php');
        
    }
}

require 'views/registro.view.php'; //importamos nuestra vista de login
?>
  
