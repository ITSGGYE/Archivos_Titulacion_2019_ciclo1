<?php
	$NULL = NULL;
	$tipo = $_REQUEST['f_plato'];
	$nombre = $_REQUEST['f_nombreplato'];  
	include('conexion.php');
	$sql = "insert into menu values ('".$tipo."','".$nombre."')";
	mysqli_query($conexion,$sql);
	echo  "<script>alert('Registro Grabado ok')</script>";
	echo '<script>location.href = "crear_menu.php"</script>';
?>