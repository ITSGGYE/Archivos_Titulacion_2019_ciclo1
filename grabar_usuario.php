<?php
	$NULL = NULL;
	$nombre = $_POST['f_nombreusuario'];
	$clave = $_POST['f_clave']; 
	$nivel = $_POST['f_nivelusuario'];
	date_default_timezone_set('America/Guayaquil');
	$fecha =  date("Y-m-d H:i:s");


	include("conexion.php");
	
	$sql = "insert into usuarios values ('".$NULL."','".$nombre."','".$clave."','A',".$nivel.")";

	mysqli_query($conexion,$sql);
	echo  "<script>alert('Registro Grabado ok')</script>";
  	echo '<script>location.href = "main.php"</script>';
?>