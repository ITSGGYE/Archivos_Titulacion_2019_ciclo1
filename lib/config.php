<?php
 
	
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db = 'colgye';

	$conection = @mysqli_connect($host,$user,$password,$db);

	if(!$conection){
		echo "Error en la conexi¨®n";
	}

 
?>
