<?php 
	
	require_once "../../clases/conexion.php";
	require_once "../../clases/AlumnoCurso.php";

	$obj= new alumnocurso();
	
	echo json_encode($obj->obtenDatosAlumnoCurso($_POST['alumnocurso']));

 ?>