<?php
session_start();
require_once ("../conexion/conexion.php");
$codigo=$_REQUEST["id"];
$db_conex= new conectar_bd();
$conectando=$db_conex->conexion_bd();

$eliminar_proveedor="DELETE FROM proveedores WHERE prv_codigo='$codigo'";
$respuesta_proveedor= $conectando->query($eliminar_proveedor);

if ($respuesta_proveedor) {
	echo '<script type="text/javascript"> alert("Proveedor eliminado con éxito"); window.location="../datos_prov.php";</script>';
} else{
	echo '<script type="text/javascript"> alert("Esta acción no fue realizada"); window.location="../datos_prov.php";</script>';
}
?>
?>