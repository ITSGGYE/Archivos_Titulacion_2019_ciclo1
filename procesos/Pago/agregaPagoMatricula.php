<?php 
	/*session_start();*/
	require_once "../../clases/conexion.php";
	require_once "../../clases/Pago.php";
	
	/*$idusuario=$_SESSION['iduser'];*/
	$obj= new Pago();

	$datos=array(
				$_POST['cliente'],
				$_POST['direccion'],
				$_POST['telefono'],
				$_POST['cedula'],
				$_POST['alumno'],
				$_POST['pago'],
				$_POST['detalle']
				);
	

	echo $obj->agregarPago($datos);
	
 ?>