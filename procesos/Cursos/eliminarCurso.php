<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Curso.php";
	$id=$_POST['id_curso'];

	$obj= new Cursos();
	echo $obj->eliminaCurso($id);

 ?>