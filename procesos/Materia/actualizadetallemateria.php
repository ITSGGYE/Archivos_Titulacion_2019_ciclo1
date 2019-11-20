<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Materia.php";

	

	$datos=array(
		$_POST['id'],
		$_POST['materia2'],
		$_POST['detalle2'],
		$_POST['estado2'],
					);

	$obj= new Materia();

	echo $obj->actualizadetallemateria($datos);

 ?>