<?php 
	/*session_start();*/
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Usuarios.php";
	
	/*$idusuario=$_SESSION['iduser'];*/
	
	$obj= new usuario();
	$pass=sha1($_POST['password']);
	$datos=array(	
					$_POST['profesor'],
					$_POST['usuario'],
					$pass,
					$_POST['estado']
				);

	echo $obj->agregausuario($datos);


 ?>