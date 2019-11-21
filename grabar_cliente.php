<?php
	$idcliente = $_POST['f_cedulacliente'];
	$nombrecliente = $_POST['f_nombrecliente'];
	$apellidocliente = $_POST['f_apellidocliente'];
	$cedula = $_POST['f_cedulacliente'];
	$telefono = $_POST['f_telefonocliente'];
	$correo = $_POST['f_email'];
	$direccion = $_POST['f_direccioncliente'];
	date_default_timezone_set('America/Guayaquil');
	$fecha =  date("Y-m-d H:i:s");


	include("conexion.php");
	
	$sql = "insert into clientes values ('".$idcliente."','".$nombrecliente."','".$apellidocliente."','".$cedula."','".$telefono."','".$correo."','".$direccion."','".$fecha."',".'1'.")";

	mysqli_query($conexion,$sql);
	echo  "<script>alert('Registro Grabado ok')</script>";
  	echo '<script>location.href = "main.php"</script>';
?>