<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/AlumnoCurso.php";
	$obj= new alumnocurso();

	$datos=array(
				$_POST['alumno'],
				$_POST['curso'],							
				$_POST['anio'],
				$_POST['estado']
			
				);
	
	echo $obj->agregarAlumnoCurso($datos);
	
 ?>