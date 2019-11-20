<?php 
	
	require_once "../../clases/conexion.php";
	require_once "../../clases/Alumno.php";

	$obj= new alumno();

	$c= new conectar();
    $conexion=$c->conexion();
	$cedula=$_POST['cedula'];
	echo $obj->eliminar_datoscurso($cedula);
	echo $obj->eliminar_datosrepre($cedula);
	echo $obj->eliminar_otrosdatos($cedula);
	echo $obj->eliminar_datosalumno($cedula);



 ?>