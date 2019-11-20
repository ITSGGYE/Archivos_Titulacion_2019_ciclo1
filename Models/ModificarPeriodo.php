<?php
session_start();
    require '../Conexion/config.php';
    require '../Conexion/functions.php';

    $id = $_POST['idPeriodo'];
    $nombrePeriodo = $_POST['nombrePeriodo'];
    $duracionPeriodo = $_POST['duracionPeriodo'];
    $añoPeriodo = $_POST['añoPeriodo'];
    $descripcionPeriodo = $_POST['descripcionPeriodo'];
    $usuario = $_POST['usuario'];
    $fecharegistro = $_POST['fecharegistro'];
    
    
    
    $errores= "";
    $exito = "Datos Modificados con exito";
    $Error = "Error al Modificar datos intentelo nuevamente";
    if (empty($id)||empty($nombrePeriodo) || empty($duracionPeriodo) || empty($añoPeriodo) ||
            empty($descripcionPeriodo) || empty($usuario) || empty($fecharegistro)) {
   
    $errores="Por favor rellenar todos los campos";
    
    }
    if($errores ==""){
    
      $conexion = conexion($bd_config);
      $statement = $conexion->prepare("UPDATE periodos set nombrePeriodo='$nombrePeriodo', duracionPeriodo='$duracionPeriodo', YearPeriodo='$añoPeriodo',descripcionPeriodo='$descripcionPeriodo',usuario='$usuario',fecharegistro='$fecharegistro' where idPeriodo='$id' "); 
   
      if($statement->execute()){
          echo $exito;
      }else{
          echo $Error;
      }
    
           
    }
    else
    {
    echo $errores;
    }
    
?>
    
