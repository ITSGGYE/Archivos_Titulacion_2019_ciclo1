
 <?php 
	/*session_start();*/
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Aniolectivo.php";
	
	/*$idusuario=$_SESSION['iduser'];*/
	$obj= new aniolectivo();
					
								

	$datos=array(
				
				$_POST['anio'],
				$_POST['estado']
				);
	

	echo $obj->agregaraniolectivo($datos);
	
 ?>