<?php


require '../Conexion/config.php';
require '../Conexion/functions.php';

$idEstudiante = $_GET["idEstudiante"];

$Errores = "";
$exito = "Periodo Eliminado con exito";
$Error = "Error al eliminar campo..!";
if(empty($idEstudiante)){
    $Errores = " No se puede eliminar campo...! ";
}

if($Errores == ""){
    $conexion = conexion($bd_config);
$statement = $conexion->prepare("Delete from estudiante where idEstudiante='$idEstudiante' ");
if($statement->execute()){
   echo $exito; 
}else{
    echo $Error;
}

}else{
    echo $Errores;
}



?>
