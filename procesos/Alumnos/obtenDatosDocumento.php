<?php 
	
	require_once "../../clases/conexion.php";
	require_once "../../clases/Alumno.php";

	$obj= new Alumno();

	echo json_encode($obj->obtenDatosDocumento($_POST['id']));

 ?>