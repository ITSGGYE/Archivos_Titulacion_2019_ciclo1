<?php 
	/*session_start();*/
	require_once "../../clases/conexion.php";
	require_once "../../clases/Pensumacademico.php";
	
	/*$idusuario=$_SESSION['iduser'];*/
	$obj= new pensumacademico();
					
								

	$datos=array(
				$_POST['pensum'],
				$_POST['profesor'],
				$_POST['materia'],
				$_POST['estado']
				);
	

	echo $obj->agregardatosdetalle($datos);
	
 ?>