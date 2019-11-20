<?php


require '../Conexion/config.php';
require '../Conexion/functions.php';

$idseqParcial = $_GET["idseqParcial"];

$Errores = "";
$exito = "Periodo Eliminado con exito";
$Error = "Error al eliminar campo..!";
if(empty($idseqParcial)){
    $Errores = " No se puede eliminar campo...! ";
}

if($Errores == ""){
    $conexion = conexion($bd_config);
$statement = $conexion->prepare("Delete from parcial where idseqParcial='$idseqParcial' ");
if($statement->execute()){
   echo $exito; 
}else{
    echo $Error;
}

}else{
    echo $Errores;
}



?>
