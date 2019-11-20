<?php
session_start(); //creamos una variable global de tipo sesions

require '../Conexion/config.php';
require '../Conexion/functions.php';

    $idusuario = $_POST['idusuario'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $rol_id = $_POST['rol_id'];
    
    

    $errores = '';
    $Error = "Error al Modificar Datos intento nuevamente";
    $Exito = "Usuario Modificado con exito";

    //validar los campos de texto
    if (empty($usuario) || empty($password) || empty($rol_id)) {
        $errores .= 'Por favor rellene todos los campos';
    }
    
    
    if($errores == ''){
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare("UPDATE usuariosig SET usuario='$usuario', password='$password', rol_id='$rol_id' where idusuario='$idusuario'  ");
        
        if($statement->execute()){
            echo $Exito;
        }else{
            echo $Error;
        }
       
        
    }else{
        
     echo $errores;
    }

?>
  
