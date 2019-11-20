<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Registro Citas </title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">

		<div class="form_register">
			<h1>Registro Citass</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<label for="cedula">Cedula</label>
				<input type="number" name="cedula" id="cedula" placeholder="numero de cedula">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo">
				<label for="telefono">Telefono</label>
				<input type="number" name="telefono" id="utelefono" placeholder="Telefono">
				<label for="direccion">Direccion</label>
				<input type="text" name="direccion" id="direccion" placeholder="Direccion completa">
				<label for="fecha_nacimiento">Fecha  de nacimiento</label>
				<input type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha de Nacimiento">



				<input type="submit" value="Guardar paciente" class="btn_save">

			</form>


		</div>


	</section>

</body>
</html>
