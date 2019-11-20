<?php 
	/*session_start();*/
	require_once "../../clases/conexion.php";
	require_once "../../clases/Pensumacademico.php";
	
	/*$idusuario=$_SESSION['iduser'];*/
	$obj= new pensumacademico();

	$datos=array(
	
					$_POST['idpensum'],
					$_POST['pensum2'],
					$_POST['profesor2'],
					$_POST['materia2'],
					$_POST['estado2']
		
				);

	echo $obj->actualizadatosdetalle($datos);
?>