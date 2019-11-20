<?php
require '../Conexion/config.php';
require '../Conexion/functions.php';

$igle_codigo = $_POST['igle_codigo'];
$igle_nombre = $_POST['igle_nombre'];
$igle_direccion = $_POST['igle_direccion'];
$cura_id = $_POST['cura_id'];
$igle_usuario = $_POST['igle_usuario'];
$igle_fechaModificacion = $_POST['igle_fechaModificacion'];



     $errores = "";
     $Exito = "Datos Guardados con exito";
     $Error = "Error al Guardar datos intentelo nuevamente";
     
     
   if(empty($igle_codigo)||empty($igle_nombre)||empty($igle_direccion)|| empty($cura_id)||empty($igle_usuario)||
          empty($igle_fechaModificacion)){
      
      $Errores = "Por Favor Rellene los Campos";
      
      
   }  
   
   if($errores == ""){
       $conexion = conexion($bd_config);
            
            $statement = $conexion->prepare("UPDATE iglesia SET igle_nombre='$igle_nombre',igle_direccion='$igle_direccion',igle_cura='$cura_id',igle_usuario='$igle_usuario',igle_fechaModificacion='$igle_fechaModificacion' where igle_codigo='$igle_codigo' ");
          
      $statement->execute();
      
      echo $Exito;
       
   }else{
       echo $Errores;
   }
     
?>
   