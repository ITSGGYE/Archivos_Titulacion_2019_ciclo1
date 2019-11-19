<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Usuarios.php";
	
	/*$idusuario=$_SESSION['iduser'];*/
	
	$obj= new usuario();
	
	$datos=array(
		$_POST['idusuario'],
		$_POST['profesor2'],
		$_POST['usuario2'],
		$_POST['estado2']
					);


echo $obj->actualizausuariopass($datos);


	
	

	

 ?>