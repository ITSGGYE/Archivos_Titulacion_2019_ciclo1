<?php
require_once 'session_active.php';
if (isset($_SESSION['user'])) {
if ($_SESSION['rol']==2) {
		header('location: ./princ_vet.php ');
}elseif ($_SESSION['rol']==3) {
	header('location: ./princ_user.php ');
}
}

?>



<?php include "conexion.php"; ?>

<!DOCTYPE html>

<html lang="es">

<head>

    <head>

    	<?php include("header.php");?>

		







    </head>

    <body>



<p>

	<center>

	<p><div class="text3">

	<p>¡BIENVENIDOS A SUPER DOC!<p>

	<img src="images/ad.png" class="ad" width="397px"  height="370px" />

	</center>

	</div>





      

    </body>

