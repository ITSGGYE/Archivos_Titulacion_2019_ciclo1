<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Materia.php";
	$id=$_POST['id'];

	$obj= new Materia();
	echo $obj->eliminadetallemateria($id);

 ?>