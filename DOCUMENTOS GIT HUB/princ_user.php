<?php
session_start();
if (isset($_SESSION['user'])) {
if ($_SESSION['rol']==1) {
		header('location: ./principal.php ');
}elseif ($_SESSION['rol']==2) {
	header('location: ./princ_vet.php ');
}
}
?>



<?php include "conexion.php"; ?>

<!DOCTYPE html>

<html lang="en">

<head>

    <head>

    	<?php include("header_user.php");?>

		
    </head>

    <body>

<p>

	<center>

	<p><div class="text3">

	<p>¡BIENVENIDO QUERIDO USUARIO!<p>

	<img src="images/can.png" class="can"/>

	</center>

	</div>


    </body>

