<?php 
	/*session_start();*/
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Materia.php";
	
	/*$idusuario=$_SESSION['iduser'];*/
	
	$obj= new Materia();
	$datos=array(
	
					$_POST['nombre'],
					$_POST['estado']
		
				);

	echo $obj->agregaMateriaInicial2($datos);


 ?>