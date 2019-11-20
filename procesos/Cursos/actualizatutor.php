<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Curso.php";

	

	$datos=array(
		$_POST['id'],
		$_POST['profesor2'],
		$_POST['curso2'],
		$_POST['estado2']
			);

	$obj= new Cursos();

	echo $obj->actualizatutor($datos);

 ?>