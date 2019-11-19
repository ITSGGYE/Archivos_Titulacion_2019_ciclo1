<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/AlumnoCurso.php";
	$obj= new alumnocurso();

	$datos=array(
				$_POST['alumnocurso'],
				$_POST['alumno2'],
				$_POST['curso2'],
							
				$_POST['anio2'],
				$_POST['estado2']
				);

	echo $obj->actualizaAlumnoCurso($datos);
	

 ?>