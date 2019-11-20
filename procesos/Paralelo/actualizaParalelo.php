<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Paralelo.php";

	

	$datos=array(
		$_POST['id_paralelo'],
		$_POST['nombre2'],
		$_POST['estado2']
			);

	$obj= new Paralelo();

	echo $obj->actualizaParalelo($datos);

 ?>