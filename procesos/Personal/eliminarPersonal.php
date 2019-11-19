<?php 
require_once "../../clases/conexion.php";
require_once "../../clases/Profesor.php";
$idprofesor=$_POST['id_profesor'];



	$obj=new profesor();
	

	echo $obj->eliminaProfesor($idprofesor);

 ?>