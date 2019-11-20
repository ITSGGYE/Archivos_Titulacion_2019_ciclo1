
								<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Aniolectivo.php";
	$obj= new aniolectivo();

	$datos=array(
				$_POST['idanio'],	
				$_POST['anio2'],
				$_POST['estado2']
				
											
				
				);

	echo $obj->actualizaaniolectivo($datos);
	

 ?>