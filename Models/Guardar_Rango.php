<?php
session_start();
 require '../Conexion/config.php';
 require '../Conexion/functions.php';

 
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
  
    $exito = "Datos Guardados con exito";
    $Error = "Error al guardar datos intentelo nuevamente";
   
    
      $conexion = conexion($bd_config);
      $statement = $conexion->prepare('Insert into rangos (idRango, idperiodo, nombreRango, duracionRango, fechaInicioRango, fechaFinRango,usuarioRango,fechaRegistroRango) '
          . 'VALUES(null, :idperiodo, :nombreRango, :duracionRango, :fechaInicioRango, :fechaFinRango, :usuarioRango, :fechaRegistroRango)'); 
   
      if($statement->execute([
        ':idperiodo' => $idPeriodo,
        ':nombreRango' => $nombreRango,
        ':duracionRango' => $duracionRango,
        ':fechaInicioRango' => $fechaInicioRango,
        ':fechaFinRango' => $fechaFinRango,
        ':usuarioRango' => $usuarioRango,
        ':fechaRegistroRango' => $fecharegistroRango
       ])){
          echo $exito;
      }else{
          echo $Error;
      }
  
    
 }
?>
    
