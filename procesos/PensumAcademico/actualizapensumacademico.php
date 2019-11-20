<?php 
	/*session_start();*/
	require_once "../../clases/conexion.php";
	require_once "../../clases/Pensumacademico.php";
	
	/*$idusuario=$_SESSION['iduser'];*/
	$obj= new pensumacademico();

	$datos=array(
	
					$_POST['idpensum'],
					$_POST['anio2'],
					$_POST['profesor2'],
					$_POST['curso2'],
					$_POST['estado2']
					);

	echo $obj->actualizadatos($datos);
?>