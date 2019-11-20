<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Paralelo.php";
	$id=$_POST['id_paralelo'];

	$obj= new Paralelo();
	echo $obj->eliminaParalelo($id);

 ?>