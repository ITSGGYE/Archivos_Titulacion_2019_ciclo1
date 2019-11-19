<?php 
	
	$host = 'localhost';
	$user = 'fibercon_mille_s';
	$password = 'millennialsys258';
	$db = 'fibercon_millennialsys';

	$conection = @mysqli_connect($host,$user,$password,$db);

	if(!$conection){
		echo "Error en la conexion";
	}

?>