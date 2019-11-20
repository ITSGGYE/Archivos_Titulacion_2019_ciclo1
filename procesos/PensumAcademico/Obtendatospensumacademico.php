<?php 
	/*session_start();*/
	require_once "../../clases/conexion.php";
	require_once "../../clases/Pensumacademico.php";
	
	/*$idusuario=$_SESSION['iduser'];*/
	$obj= new pensumacademico();
	echo json_encode($obj->obtenDatos($_POST['idpensum']));
?>