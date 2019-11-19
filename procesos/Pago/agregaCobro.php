<?php 
	/*session_start();*/
	require_once "../../clases/conexion.php";
	require_once "../../clases/Pago.php";
	
	/*$idusuario=$_SESSION['iduser'];*/
	$obj= new Pago();

	$datos=array(
				$_POST['cobro'],
				$_POST['detalle'],
				$_POST['valor']
				);
	

	echo $obj->agregarCobro($datos);
	
 ?>