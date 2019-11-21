<?php
	session_start();

	require_once '../conexion/conexion.php';
	$db_conex= new conectar_bd();
	$conectando=$db_conex->conexion_bd();

	$nomb_proveed=$conectando->real_escape_string($_POST["nombre_proveedor"]);
	$empr_proveed=$conectando->real_escape_string($_POST["empresa_proveedor"]);
	$telef_proveed=$conectando->real_escape_string($_POST["telefono_proveedor"]);
	$est_proveed=$conectando->real_escape_string($_POST["estado_proveedor"]);

	$insertar_proveedor = "INSERT INTO proveedores VALUES(NULL,'$nomb_proveed','$empr_proveed','$telef_proveed','$est_proveed')";
	$respuesta_proveedor = $conectando -> query($insertar_proveedor);

	if ($respuesta_proveedor) {
		echo '<script type="text/javascript"> alert("Proveedor agregado con éxito"); window.location="../proveedores.php";</script>';
	} else{
		echo '<script type="text/javascript"> alert("Esta acción no fue realizada"); window.location="../proveedores.php";</script>';
	}

?>