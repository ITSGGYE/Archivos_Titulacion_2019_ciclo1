<?php
	$x_idpedido = $_REQUEST['f_idpedido'];
	$x_nombre = $_REQUEST['f_nombre'];
	$x_apellido = $_REQUEST['f_apellido'];
	$x_cedula = $_REQUEST['f_cedula'];
	$x_sopa = $_REQUEST['f_sopa'];
	$x_plato = $_REQUEST['f_plato'];
	$x_jugo = $_REQUEST['f_jugo'];
	$x_postre = $_REQUEST['f_postre'];
	$x_status = $_REQUEST['f_status'];
	$x_mesa = $_REQUEST['f_mesa'];
	$x_fecha = $_REQUEST['f_fecha'];
	include('conexion.php');
	$sql = "UPDATE `pedidos` SET `status` = '$x_status' WHERE `pedidos`.`id_pedido` = '$x_idpedido'";
	
	mysqli_query($conexion,($sql));
	echo  "<script>alert('Registro Actualizado y Grabado ok')</script>";
	echo '<script>location.href = "ordenes.php"</script>';
?>