<?php 
	
	require_once "../../clases/conexion.php";
	require_once "../../clases/Alumno.php";

	$obj= new alumno();
	$alumno=$_POST['id'];
	echo json_encode($obj->obtenDatosAlumno($alumno));

 ?>