<?php


require '../Conexion/config.php';
require '../Conexion/functions.php';

$idRango = $_GET["idRango"];

$Errores = "";
$exito = "Rango Eliminado con exito";
$Error = "Error al eliminar campo..!";
if(empty($idRango)){
    $Errores = " No se puede eliminar campo...! ";
}

if($Errores == ""){
    $conexion = conexion($bd_config);
$statement = $conexion->prepare("Delete from rangos where idRango='$idRango' ");
if($statement->execute()){
   echo $exito; 
}else{
    echo $Error;
}

}else{
    echo $Errores;
}



?>

