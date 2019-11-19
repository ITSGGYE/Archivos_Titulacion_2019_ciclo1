<?php

		include ("../db/dbconn.php");
		include ("session.php");
			if(ISSET($_POST['edit']));
			{
			echo $id_user = $_SESSION['id'];echo "<br>";

	$primer_nombre=$conn->real_escape_string($_POST['primer_nombre']);
	$segundo_nombre=$conn->real_escape_string($_POST['segundo_nombre']);
	$apellido=$conn->real_escape_string($_POST['apellido']);
	$dirección=$conn->real_escape_string($_POST['direccion']);
	$país=$conn->real_escape_string($_POST['pais']);
	$código_postal=$conn->real_escape_string($_POST['codigo_postal']);
	$móvil=$conn->real_escape_string($_POST['movil']);
	$teléfono=$conn->real_escape_string($_POST['telefono']);
	$email=$conn->real_escape_string($_POST['email']);
	$contraseña=md5($_POST['contrasena']);

				mysqli_query($conn, "UPDATE customer SET primer_nombre='$primer_nombre', segundo_nombre='$segundo_nombre', apellido='$apellido', direccion='$dirección',pais='$país', codigo_postal='$código_postal', movil='$móvil', telefono='$teléfono', email='$email', contrasena='$contraseña' WHERE customerid=$id_user ") or die(mysqli_error($conn));

					header("location:../home.php");
			}

	?>
