<?php


require '../Conexion/config.php';
require '../Conexion/functions.php';

$idseq_calif = $_GET["idseq_calif"];

$Errores = "";
$exito = "Periodo Eliminado con exito";
$Error = "Error al eliminar campo..!";
if(empty($idseq_calif)){
    $Errores = " No se puede eliminar campo...! ";
}

if($Errores == ""){
    $conexion = conexion($bd_config);
$statement = $conexion->prepare("Delete from modelocalificacion where idseq_calif='$idseq_calif' ");
if($statement->execute()){
   echo $exito; 
}else{
    echo $Error;
}

}else{
    echo $Errores;
}



?>
