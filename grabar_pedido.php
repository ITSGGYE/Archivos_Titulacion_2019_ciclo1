<?php
	$NULL = NULL;
	$nombre = $_REQUEST['f_nombrecliente'];
	$apellido = $_REQUEST['f_apellidocliente'];
	$cedula = $_REQUEST['f_cedulacliente'];
	$sopa = $_REQUEST['f_sopa'];
	$plato = $_REQUEST['f_plato'];
	$jugo = $_REQUEST['f_jugo'];
	$postre = $_REQUEST['f_postre'];
	$status = $_REQUEST['f_status'];
	$mesa = $_REQUEST['f_mesa'];
	date_default_timezone_set('America/Guayaquil');
	$fecha =  date("Y-m-d H:i:s");
	include('conexion.php');
	$sql = "insert into pedidos values ('".$NULL."','".$nombre."','".$apellido."','".$cedula."','".$sopa."','".$plato."','".$jugo."','".$postre."','".$status."','".$mesa."','".$fecha."')";
	mysqli_query($conexion,$sql);
	echo  "<script>alert('Registro Grabado ok')</script>";
	echo '<script>location.href = "main.php"</script>';
?>