<?php 
	
	require_once "../../clases/conexion.php";
	require_once "../../clases/AlumnoCurso.php";

	$obj= new alumnocurso();

	echo $obj->eliminarAlumnoCurso($_POST['alumnocurso']);

 ?>