<?php
	$codigo = $_POST['f_codigo'];
	$usuario = $_POST['f_usuario']; 
	$clave = $_POST['f_clave']; 
	$estado = $_POST['f_estado']; 
	$nivel = $_POST['f_nivel']; 
	include('conexion.php');
	$sql = "UPDATE `usuarios` SET `password` = '$clave', `status` = '$estado', `nivel` = '$nivel'  WHERE `usuarios`.`u_codigo` = '$codigo'";
	
	mysqli_query($conexion,$sql);
	echo  "<script>alert('Registro Actualizado y Grabado ok')</script>";
	echo '<script>location.href = "usuarios.php"</script>';
?>