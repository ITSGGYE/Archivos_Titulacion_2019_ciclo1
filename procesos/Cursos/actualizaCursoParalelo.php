<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Curso.php";

	

	$datos=array(
		$_POST['id_curso'],
		$_POST['curso2'],
		$_POST['paralelo2'],		
		$_POST['estado2']
			);

	$obj= new Cursos();

	echo $obj->actualizaCursoParalelo($datos);

 ?>