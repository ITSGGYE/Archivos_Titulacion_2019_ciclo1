<?php

require '../Conexion/config.php';
require '../Conexion/functions.php';


$idseq_Contenedor = $_GET["idseq_Contenedor"];
$exito = "Integrante eliminado con exito";

$conexion = conexion($bd_config);
$statement = $conexion->prepare("Delete from listado_grupo where idseq_Contenedor='$idseq_Contenedor' ");
$statement->execute();


echo $exito
// put your code here
?>
   