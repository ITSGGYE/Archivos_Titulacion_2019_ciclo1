<?php 
	
	require_once "../../clases/conexion.php";
	require_once "../../clases/Profesor.php";

	$obj= new profesor();

	echo json_encode($obj->obtenDatosProfesor($_POST['id_profesor']));

 ?>