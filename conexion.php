<?php
	// Estas lineas me permiten conectarme con la BD
	$servidor = 'localhost';
	$base_datos = 'restaurante';
	$usuario = 'root';
	$password = '';	 
    
    $conexion = mysqli_connect($servidor,$usuario,$password,$base_datos) or die("Error " .mysqli_error($conexion));	
?>