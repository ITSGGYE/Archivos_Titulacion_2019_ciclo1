<?php

require '../Conexion/config.php';
require '../Conexion/functions.php';



$idusuario = $_POST["idusuario"];

  $Errores ="";
  $Exito = "Datos Eliminados Correctemente";
  $Error = "Error al Eliminar Datos intentelo nuevamente";
  
   if(empty($idusuario)){
      $Errores = "No se puede Eliminar este registro";
      
  }

  if($Errores == ""){
      $conexion = conexion($bd_config);
             $sql ="Delete From usuariosig WHERE idusuario='$idusuario' ";
             
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
   
