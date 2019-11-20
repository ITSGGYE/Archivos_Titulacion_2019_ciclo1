<?php

require '../Conexion/config.php';
require '../Conexion/functions.php';



$cura_id = $_POST["cura_id"];

  $Errores ="";
  $Exito = "Datos Eliminados Correctemente";
  $Error = "Error al Eliminar Datos intentelo nuevamente";
  
   if(empty($cura_id)){
      $Errores = "No se puede eliminar este registro";
      
  }

  if($Errores == ""){
      $conexion = conexion($bd_config);
             $sql ="Delete From Historialcuras WHERE cura_id='$cura_id' ";
             
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
   
