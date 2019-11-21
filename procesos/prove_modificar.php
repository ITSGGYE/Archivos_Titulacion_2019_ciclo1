<?php
session_start(); 
require_once ("../conexion/conexion.php");
$codigo=$_REQUEST["id"];
$db_conex= new conectar_bd();
$conectando=$db_conex->conexion_bd();

$nomb_proveed=$conectando->real_escape_string($_POST["nombre_proveedor"]);
$empr_proveed=$conectando->real_escape_string($_POST["empresa_proveedor"]);
$telef_proveed=$conectando->real_escape_string($_POST["telefono_proveedor"]);
$est_proveed=$conectando->real_escape_string($_POST["estado_proveedor"]);

$actualizar_proveedor="UPDATE proveedores SET prv_nombre='$nomb_proveed',prv_empresa='$empr_proveed', prv_telefono='$telef_proveed', prv_estado='$est_proveed' WHERE prv_codigo='$codigo'";
$respuesta_proveedor= $conectando->query($actualizar_proveedor);

if ($respuesta_proveedor) {
	echo '<script type="text/javascript"> alert("Proveedor actualizado con éxito"); window.location="../proveedores.php";</script>';
} else{
	echo '<script type="text/javascript"> alert("Esta acción no fue realizada"); window.location="../proveedores.php";</script>';
}
?>