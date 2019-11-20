<?php
session_start();
    require '../Conexion/config.php';
    require '../Conexion/functions.php';

    $nombrePeriodo = $_POST['nombrePeriodo'];
    $duracionPeriodo = $_POST['duracionPeriodo'];
    $añoPeriodo = $_POST['añoPeriodo'];
    $descripcionPeriodo = $_POST['descripcionPeriodo'];
    $usuario = $_POST['usuario'];
    $fecharegistro = $_POST['fecharegistro'];
    
    
    
    $errores= "";
    $exito = "Datos Guardados con exito";
    $Error = "Error al guardar datos intentelo nuevamente";
    if (empty($nombrePeriodo) || empty($duracionPeriodo) || empty($añoPeriodo) ||
            empty($descripcionPeriodo) || empty($usuario) || empty($fecharegistro)) {
   
    $errores="Por favor rellenar todos los campos";
    
    }
    if($errores ==""){
    
      $conexion = conexion($bd_config);
      $statement = $conexion->prepare('Insert into periodos (idPeriodo, nombrePeriodo, duracionPeriodo, YearPeriodo, descripcionPeriodo, usuario,fecharegistro) '
          . 'VALUES(null, :nombrePeriodo, :duracionPeriodo, :YearPeriodo, :descripcionPeriodo, :usuario, :fecharegistro)'); 
   
      if($statement->execute([
        ':nombrePeriodo' => $nombrePeriodo,
        ':duracionPeriodo' => $duracionPeriodo,
        ':YearPeriodo' => $añoPeriodo,
        ':descripcionPeriodo' => $descripcionPeriodo,
        ':usuario' => $usuario,
        ':fecharegistro' => $fecharegistro,
      
       ])){
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
    
