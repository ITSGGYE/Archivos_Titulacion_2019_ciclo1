<?php

require '../Conexion/config.php';
require '../Conexion/functions.php';



$cura_id = $_POST["cura_id"];
$cedulaCura = $_POST["cedulaCura"];
$nombresCura = $_POST["nombresCura"];
$FechaNacimiento = $_POST["FechaNacimiento"];

if(strlen($cedulaCura)<10){
    echo 'Cedula incorrecta la cedula son 10 digitos';
    exit();
 }elseif(strlen($cedulaCura)>10){
    echo 'Cedula incorrecta son 10 numeros de la cedula';
    exit();
 }
  if(is_numeric($cedulaCura)){ 
       $Errores ="";
  $Exito = "Datos Editados Correctemente";
  $Error = "Error al Editar Datos intentelo nuevamente";

  if(empty($cura_id)||empty($cedulaCura)||empty($nombresCura)||empty($FechaNacimiento)){
      $Errores = "Todos los campos deben estar llenos son obligatorios..!";
      
  }

  
  if($Errores == ""){
      $conexion = conexion($bd_config);
             $sql ="UPDATE Historialcuras SET cura_cedula='$cedulaCura' , cura_nombres='$nombresCura', cura_fecha_nac='$FechaNacimiento' WHERE cura_id='$cura_id' ";
             
             
             $statement = $conexion->prepare($sql);
           
             if($statement->execute()){
                 echo $Exito;
                 
             }else{
                 echo $error;
             }
      
  }else{
      $Errores;
  }
 }else
 {
    echo 'solo se aceptan campos numericos, Ingrese bien la cedula ..!';
    exit();
 }

 
  
?>
    
