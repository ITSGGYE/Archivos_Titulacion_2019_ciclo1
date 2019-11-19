<?php 
	/*session_start();*/
	require_once "../../clases/conexion.php";
	require_once "../../clases/Pago.php";
	
	/*$idusuario=$_SESSION['iduser'];*/
	$obj= new Pago();

	$datos=array();
	$datos[0]=$_POST['id3'];
	$datos[1]=$_POST['cobro'];
	$datos[2]=$_POST['detalle'];
	$datos[3]=$_POST['anio'];
	
	

	echo $obj->agregarCobroMatricula($datos);
	
 ?>