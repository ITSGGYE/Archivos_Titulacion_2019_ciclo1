<?php 
	require_once "../../clases/conexion.php";
	require_once "../../clases/Usuarios.php";
	
	/*$idusuario=$_SESSION['iduser'];*/
	
	$obj= new usuario();
	$pass=sha1($_POST['password1']);
	$pass2=sha1($_POST['password2']);
	$id=$_POST['idprofesor'];

	if($pass!=$pass2){
		echo " error " ;
	} else {
		$datos=array( $id,$pass);

	echo $obj->actualizaclave($datos);

	}
	
	
 ?>