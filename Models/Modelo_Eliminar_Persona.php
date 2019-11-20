<?php

require '../Conexion/config.php';
require '../Conexion/functions.php';



$per_cedula = $_POST["per_cedula"];

  $Errores ="";
  $Exito = "Datos Eliminados Correctemente";
  $Error = "Error al Eliminar Datos intentelo nuevamente";
  
   if(empty($per_cedula)){
      $Errores = "No se puede Eliminar este registro";
      
  }

  if($Errores == ""){
      $conexion = conexion($bd_config);
             $sql ="Delete From personas WHERE per_cedula='$per_cedula' ";
             
             $statement = $conexion->prepare($sql);
           
             if($statement->execute()){
                 echo $Exito;
                 
             }else{
                 echo $error;
             }
      
  }else{
      $Errores;
  }
?>
   
