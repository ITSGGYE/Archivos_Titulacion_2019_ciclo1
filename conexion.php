<?php

	$host = '35.178.43.117';
	$user = 'AdelaVargas';
	$password = '@EBENEDENT1adela';
	$db = 'ebenedent';

	$conection = @mysqli_connect($host,$user,$password,$db);
	mysqli_query($conection,"SET NAMES 'utf8'");
	if(!$conection){
		echo "Error en la conexión";
	}

?>
