<?php
 
	
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'fibercon_millennialsys';

	$conection = @mysqli_connect($host,$user,$password,$db);

	if(!$conection){
		echo "Error en la conexi¨®n";
	}

 
?>
