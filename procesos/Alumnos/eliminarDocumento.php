<?php 
	
	require_once "../../clases/conexion.php";
	require_once "../../clases/Alumno.php";

	$obj= new alumno();

	echo $obj->eliminarDocumento($_POST['id']);

 ?>