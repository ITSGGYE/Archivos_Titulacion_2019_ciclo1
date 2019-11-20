<?php 
	
	require_once "../../clases/conexion.php";
	require_once "../../clases/Aniolectivo.php";

	$obj= new aniolectivo();

	echo json_encode($obj->obtenDatosaniolectivo($_POST['idanio']));

 ?>