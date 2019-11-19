<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Curso.php";

	

	$datos=array(
		$_POST['id_curso'],
		$_POST['nombre2'],
		$_POST['estado2']
			);

	$obj= new Cursos();

	echo $obj->actualizaCurso($datos);

 ?>