<?php 
	
	require_once "../../clases/conexion.php";
	require_once "../../clases/Pago.php";

	$obj= new Pago();

	echo json_encode($obj->obtenPagoMatricula($_POST['id']));

 ?>