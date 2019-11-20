<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Materia.php";

	

	$datos=array(
		$_POST['id_materia'],
		$_POST['nombre2'],
		$_POST['estado2'],
					);

	$obj= new Materia();

	echo $obj->actualizaMateriaInicial2($datos);

 ?>