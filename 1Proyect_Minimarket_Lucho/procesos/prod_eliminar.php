<?php
session_start();
require_once ("../conexion/conexion.php");
$codigo=$_REQUEST["id"];
$db_conex= new conectar_bd();
$conectando=$db_conex->conexion_bd();

$eliminar_producto="DELETE FROM productos WHERE prd_codigo='$codigo'";
$respuesta_producto= $conectando->query($eliminar_producto);

if ($respuesta_producto) {
	echo '<script type="text/javascript"> alert("Producto eliminado con éxito"); window.location="../datos_prod.php";</script>';
} else{
	echo '<script type="text/javascript"> alert("Esta acción no fue realizada"); window.location="../datos_prod.php";</script>';
}
?>