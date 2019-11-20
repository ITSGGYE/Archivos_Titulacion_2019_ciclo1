<?php 
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Materia.php";
	$id=$_POST['id_materia'];

	$obj= new Materia();
	echo $obj->eliminaMateria($id);

 ?>