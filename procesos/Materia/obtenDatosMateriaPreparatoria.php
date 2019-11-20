<?php 
	
	require_once "../../clases/conexion.php";
	require_once "../../clases/Materia.php";

	$obj= new Materia();

	echo json_encode($obj->obtenDatosMateriaPreparatoria($_POST['id_materia']));

 ?>