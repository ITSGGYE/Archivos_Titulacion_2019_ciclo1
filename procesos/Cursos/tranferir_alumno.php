<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Curso.php";



	$datos=array(
		$_POST['curso'],
		$_POST['anio'],
		$_POST['anion'],
		$_POST['curson']
		
			);

	$obj= new Cursos();

	echo $obj->actualizaAlumnoCurso2($datos);

 ?>