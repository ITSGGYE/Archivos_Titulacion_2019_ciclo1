<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Pago.php";
	$id=$_POST['id'];

	$obj= new Pago();
	echo $obj->eliminaPagoPension($id);

 ?>