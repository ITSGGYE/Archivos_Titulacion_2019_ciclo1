<?php

	include('db/dbconn.php');
	if (isset($_POST['Regístrate']))
{
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
	$check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `customer` WHERE `email` = '$email'"));
		if($check == 1)
			{
				echo "<script>alert('EMAIL ALREADY EXIST')</script>";
			}

			else
				{
					$result =  mysqli_query ($conn, "INSERT INTO `customer` (primer_nombre, segundo_nombre, apellido, direccion, pais, codigo_postal, movil, telefono, email, contrasena,status)
					VALUES ('$primer_nombre','$segundo_nombre','$apellido','$dirección','$país','$código_postal','$móvil','$teléfono','$email','$contraseña',1)") or die(mysqli_error($conn));

					$email = mysqli_query($conn, "SELECT `email` from `customer` where `email` = '$email'") or die(mysqli_error($conn));
				}
}
?>
