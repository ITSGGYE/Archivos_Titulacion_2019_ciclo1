<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Pago.php";
	$id=$_POST['id'];

	$obj= new Pago();
	echo $obj->eliminaPagoMatricula($id);

 ?>