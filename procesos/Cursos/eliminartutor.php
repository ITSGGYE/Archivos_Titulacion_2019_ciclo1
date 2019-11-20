<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Curso.php";
	$id=$_POST['id'];

	$obj= new Cursos();
	echo $obj->eliminatutor($id);

 ?>