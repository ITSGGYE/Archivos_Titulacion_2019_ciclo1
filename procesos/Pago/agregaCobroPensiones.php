<?php 
	/*session_start();*/
	require_once "../../clases/conexion.php";
	require_once "../../clases/Pago.php";
	
	/*$idusuario=$_SESSION['iduser'];*/
	$obj= new Pago();

	$datos=array(
				$_POST['alumno2'],
				$_POST['tipo'],
				$_POST['mes'],
				$_POST['cobro'],
				$_POST['detalle'],
				$_POST['anio']
				);
	

	echo $obj->agregarCobroPensiones($datos);
	
 ?>