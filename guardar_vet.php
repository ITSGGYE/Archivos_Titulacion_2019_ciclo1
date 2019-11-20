<?php
session_start();
if (isset($_SESSION['user'])) {
if ($_SESSION['rol']==1) {
		header('location: ./principal.php ');
}elseif ($_SESSION['rol']==3) {
	header('location: ./princ_user.php ');
}
}

?>
<?php

include("conexion.php");

	$nombre_prof= $_POST['nombre_prof'];
	$dni= $_POST['dni'];
	$tipo_prof= $_POST['tipo_prof'];

$query="INSERT INTO profesional (nombre_prof,dni,tipo_prof)
		VALUES('$nombre_prof','$dni','$tipo_prof')";
$resultado= $conexion->query($query);

if($resultado){
	print '<script language="JavaScript">'; 
	print 'alert("REGISTRO CORRECTO");'; 
	print '</script>'; 
	require('reg_vet.php');
}
else{
	echo "insercion NO exitosa";
}

?>