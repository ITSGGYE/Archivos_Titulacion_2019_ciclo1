<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Usuarios.php";
	
	/*$idusuario=$_SESSION['iduser'];*/
	
	$obj= new usuario();
	$id=$_POST['idusuario'];

	
	echo $obj->eliminausuario($id);

 ?>
