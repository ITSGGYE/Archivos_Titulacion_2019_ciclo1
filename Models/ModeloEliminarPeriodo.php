<?php


require '../Conexion/config.php';
require '../Conexion/functions.php';

$idPeriodo = $_GET["idPeriodo"];

$Errores = "";
$exito = "Periodo Eliminado con exito";
$Error = "Error al eliminar campo..!";
if(empty($idPeriodo)){
    $Errores = " No se puede eliminar campo...! ";
}

if($Errores == ""){
    $conexion = conexion($bd_config);
$statement = $conexion->prepare("Delete from periodos where idPeriodo='$idPeriodo' ");
if($statement->execute()){
   echo $exito; 
}else{
    echo $Error;
}

}else{
    echo $Errores;
}



?>
