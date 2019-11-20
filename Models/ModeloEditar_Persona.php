<?php

require '../Conexion/config.php';
require '../Conexion/functions.php';

$per_cedula = $_POST['per_cedula'];
$per_nombre = $_POST['per_nombre'];
$per_direccion = $_POST['per_direccion'];
$per_fecha_nac = $_POST['per_fecha_nac'];
$per_lugarNacimiento = $_POST['per_lugarNacimiento'];
$per_correo = $_POST['per_correo'];
$per_telefono = $_POST['per_telefono'];
$per_nombresPadre = $_POST['per_nombresPadre'];
$per_nombresMadre = $_POST['per_nombresMadre'];
$per_observacion = $_POST['per_observacion'];
$per_usuario = $_POST['per_usuario'];
$per_fechaRegistro = $_POST['per_fechaRegistro'];


if ($per_fecha_nac>$per_fechaRegistro){
    echo 'Fecha incorrecta';
     exit();
}
if(strlen($per_cedula)<10){
    echo 'Cedula incorrecta la cedula son 10 digitos';
    exit();
 }elseif(strlen($per_cedula)>10){
    echo 'Cedula incorrecta son 10 numeros de la cedula';
    exit();
 }

   if(!is_numeric($per_cedula)){
    echo 'solo se aceptan campos numericos, Ingrese bien la cedula ..!';
    exit();
   }
     $errores = "";
        $Exito = "Datos Modificados con exito";
     $Error = "Error al Modificar datos intentelo nuevamente";
     
     if (empty($per_cedula) || empty($per_nombre) || empty($per_usuario)|| empty($per_fechaRegistro)) {
     $errores .="Por favor rellene todos los campos";
     }
     
     if($errores == ""){
    
     $conexion = conexion($bd_config);
     
     $statement = $conexion->prepare("UPDATE personas set per_nombre='$per_nombre',per_cedula='$per_cedula' , per_direccion='$per_direccion'"
             . ", per_fecha_nac='$per_fecha_nac', per_lugarNacimiento='$per_lugarNacimiento',"
             . " per_correo='$per_correo', per_telefono='$per_telefono', per_nombresMadre='$per_nombresMadre',"
             . " per_nombresPadre='$per_nombresPadre', per_observacion='$per_observacion', per_usuario='$per_usuario', per_fechaRegistro='$per_fechaRegistro' WHERE per_cedula='$per_cedula'  ");
    
       if($statement->execute()){
          echo $Exito;
       }
       else
       {
         echo $Error;
       }
  
    }
    else
    {
     echo $errores;
    }

?>
  
