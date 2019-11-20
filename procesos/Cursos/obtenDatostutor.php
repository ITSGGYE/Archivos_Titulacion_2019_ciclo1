<?php 
	
	require_once "../../clases/conexion.php";
	require_once "../../clases/Curso.php";

	$obj= new Cursos();

	echo json_encode($obj->obtenDatostutor($_POST['id']));

 ?>