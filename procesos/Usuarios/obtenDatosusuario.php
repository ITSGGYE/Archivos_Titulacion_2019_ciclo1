<?php 
	
require_once "../../clases/conexion.php";
require_once "../../clases/Usuarios.php";
	$obj= new usuario();

	echo json_encode($obj->obtenDatosusuario($_POST['idusuario']));

 ?>