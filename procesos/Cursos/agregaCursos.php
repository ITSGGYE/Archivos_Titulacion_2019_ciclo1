<?php 
	/*session_start();*/
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Curso.php";
	
	/*$idusuario=$_SESSION['iduser'];*/
	$obj= new Cursos();

	$datos=array(
				$_POST['nombre'],
				$_POST['estado']
				);
	

	echo $obj->agregarCurso($datos);
	
 ?>