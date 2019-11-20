<?php 
	
	require_once "../../clases/conexion.php";
	require_once "../../clases/Paralelo.php";

	$obj= new Paralelo();

	echo json_encode($obj->obtenDatosParalelo($_POST['id_paralelo']));

 ?>