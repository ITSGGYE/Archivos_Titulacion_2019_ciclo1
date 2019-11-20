<?php

 require '../Conexion/config.php';
 require '../Conexion/functions.php';

 $idRango = $_POST['idRango'];
 $nombreRango = $_POST['nombreRango'];
 $duracionRango = $_POST['duracionRango'];
 $fechaInicioRango = $_POST['fechaInicioRango'];
 $fechaFinRango = $_POST['fechaFinRango'];
 $usuarioRango = $_POST['usuarioRango'];
 $fecharegistroRango = $_POST['fecharegistroRango'];
 $idPeriodo = $_POST['idPeriodo'];
 

 if(is_numeric($duracionRango) == false){
     
     echo "la duracion en Rango debe ir de manera numerica";
     exit();
 }else{
  
    $exito = "Datos Modificados con exito";
    $Error = "Error al Modificar datos intentelo nuevamente";
   
    
      $conexion = conexion($bd_config);
      $statement = $conexion->prepare("UPDATE rangos set idPeriodo='$idPeriodo',nombreRango='$nombreRango', duracionRango='$duracionRango', fechaInicioRango='$fechaInicioRango',fechaFinRango='$fechaFinRango',usuarioRango='$usuarioRango',fecharegistroRango='$fecharegistroRango' where idRango='$idRango' "); 
   
      if($statement->execute()){
          echo $exito;
      }else{
          echo $Error;
      }
  
    
 }
?>
    
