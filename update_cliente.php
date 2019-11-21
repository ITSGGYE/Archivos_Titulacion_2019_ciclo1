<?php
	$x_codigo = $_POST['f_codigo'];
	$x_nombre = $_POST['f_nombre'];
	$x_apellido = $_POST['f_apellido'];
	$x_cedula = $_POST['f_cedula']; 
	$x_telefono = $_POST['f_telefono']; 
	$x_correo = $_POST['f_correo']; 
	$x_direccion = $_POST['f_direccion']; 
	$x_estado = $_POST['f_estado']; 
	include('conexion.php');
	$sql = "UPDATE `clientes` SET `nombres` = '$x_nombre', `apellidos` = '$x_apellido', `cedula` = '$x_cedula', `telefono` = '$x_telefono', `correo` = '$x_correo', `direccion` = '$x_direccion', `estado` = '$x_estado' WHERE `clientes`.`id_cliente` = '$x_codigo'";
	
	mysqli_query($conexion,$sql);
	echo  "<script>alert('Registro Actualizado y Grabado ok')</script>";
	echo '<script>location.href = "clientes.php"</script>';
?>