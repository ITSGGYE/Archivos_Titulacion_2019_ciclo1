<?php 

	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'puntofrio');

	$conexion = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	if ($conexion === false) {
		die("Erroren la conexion" . mysqli_connect_error());
	}else{
		// echo 'conexion exitosa';
	}
 ?>