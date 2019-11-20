<?php 
	
	require_once "../../clases/conexion.php";
	require_once "../../clases/Alumno.php";

	$obj= new alumno();

	echo $obj->eliminar($_POST['idalumno']);

 ?>