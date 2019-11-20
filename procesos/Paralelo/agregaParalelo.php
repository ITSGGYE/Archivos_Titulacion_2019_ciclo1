<?php 
	/*session_start();*/
	require_once "../../clases/conexion.php";
	require_once "../../clases/Paralelo.php";
	
	/*$idusuario=$_SESSION['iduser'];*/
	$obj= new Paralelo();

	$datos=array(
				$_POST['nombre'],
				$_POST['estado']
				);
	

	echo $obj->agregarParalelo($datos);
	
 ?>