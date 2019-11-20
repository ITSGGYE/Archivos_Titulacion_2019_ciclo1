<?php 
	/*session_start();*/
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Materia.php";
	
	/*$idusuario=$_SESSION['iduser'];*/
	
	$obj= new Materia();
	$datos=array(
	
					$_POST['materia'],
					$_POST['detalle'],
					$_POST['estado']
		
				);

	echo $obj->agregadetallemateriapreparatoria($datos);


 ?>