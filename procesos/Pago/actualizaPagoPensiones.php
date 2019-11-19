<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Pago.php";

	

	$datos=array(
		$_POST['id'],
		$_POST['alumno2'],
		$_POST['tipo2'],
		$_POST['mes2'],
		$_POST['cobro2'],
		$_POST['detalle2']
			);

	$obj= new Pago();

	echo $obj->actualizaPagoPension($datos);

 ?>