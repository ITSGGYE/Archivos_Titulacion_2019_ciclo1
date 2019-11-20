<?php
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}

	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['nombres']) || empty($_POST['cedula']) || empty($_POST['telefono']) || empty($_POST['direccion']) || empty($_POST['fecha']) || empty($_POST['usuario']) || empty($_POST['clave'])
		|| empty($_POST['rol']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
			$cedula  = $_POST['cedula'];
			$nombre = $_POST['nombres'];
			$telefono = $_POST['telefono'];
			$direccion = $_POST['direccion'];
			$fecha = $_POST['fecha'];
			$user   = $_POST['usuario'];
			$clave  = md5($_POST['clave']);
			$rol    = $_POST['rol'];
			$estatus = 1;

			$query = mysqli_query($conection,"SELECT * FROM usuarios WHERE user = '$user' ");
			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">El correo o el usuario ya existe.</p>';
			}else{
					mysqli_query($conection,"set autocommit = 0");
					$query_personas = mysqli_query($conection,"INSERT INTO personas(cedula,nombres,telefono,direccion,fecha_nacimiento,type_persona,estatus)
					VALUES ('$cedula','$nombre','$telefono','$direccion','$fecha',$rol,1)");
					if ($query_personas) {
						$query_insert = mysqli_query($conection,"INSERT INTO usuarios(cedula_usuario,user,password,rol,estatus)
				    VALUES ('$cedula','$user','$clave',$rol,$estatus)");
					}

				if($query_insert && $query_personas){
					mysqli_query($conection,"commit") or die(mysqli_error($conection));
					mysqli_query($conection,"set autocommit = 1") or die(mysqli_error($conection));
					$alert='<p class="msg_save">Usuario creado correctamente.</p>';
				}else{
						mysqli_query($conection,"rollback") or die(mysqli_error($conection));
						mysqli_query($conection,"set autocommit = 1") or die(mysqli_error($conection));
					$alert='<p class="msg_error">Error al crear el usuario.</p>';
				}

			}


		}

	}



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Registro Usuario</title>
	<script>
		function solonumeros(e){
			key=e.keyCode || e.wich;
			teclado=String.fromCharCode(key);
			numeros="0123456789";
			especiales="8-37-38-46";//array
			teclado_especial=false;

			for(var i in especiales){
				if(key==especiales[i]){
					teclado_especial=true;
				}
			}
			if(numeros.indexOf(teclado)==-1 && !teclado_especial){
				return false;
			}

		}




		function sololetras(e){
			key=e.keyCode || e.wich;
			teclado=String.fromCharCode(key). toLowerCase();
			letras=" abcdefghijklmnñopqrstuvwxyz";/*hacer un espacio nates de la VOCAL a para q permita separar letras */
			especiales="8-37-38-46-164";//array
			teclado_especial=false;

			for(var i in especiales){
				if(key==especiales[i]){
					teclado_especial=true; break;
				}
			}
			if(letras.indexOf(teclado)==-1 && !teclado_especial){
				return false;
			}

		}
	</script>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">

		<div class="form_register">
			<h1>Registro usuario</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<label for="cedula">Cedula </label>
				<input type="text" name="cedula" id="cedula" placeholder="Número de cedula" minlength="10" maxlength="10" onkeypress=" return solonumeros(event)" onpaste="return false">
				<label for="nombre">Nombres</label>
				<input type="text" name="nombres" id="nombres" placeholder="Nombres completo" onkeypress="return sololetras(event)">
				<label for="telefono">Teléfono</label>
				<input type="text" name="telefono" id="telefono" placeholder="Numero de Teléfono" minlength="7" maxlength="10" onkeypress=" return solonumeros(event)" onpaste="return false">
				<label for="direccion">Dirección</label>
				<input type="text" name="direccion" id="direccion" placeholder="Dirección Domiciliaria">
				<label for="fecha">Fecha de Nacimiento</label>
				<input type="date" name="fecha" id="fecha" placeholder="Fecha de Nacimiento">
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario">
				<label for="clave">Clave</label>
				<input type="password" name="clave" id="clave" placeholder="Clave de acceso">
				<label for="rol">Tipo Usuario</label>
				<?php

					$query_rol = mysqli_query($conection,"SELECT * FROM roles where type_rol != 3");
					mysqli_close($conection);
					$result_rol = mysqli_num_rows($query_rol);

				 ?>

				<select name="rol" id="rol">
				<option value="" disabled selected></option>
					<?php
						if($result_rol > 0)
						{
							while ($rol = mysqli_fetch_array($query_rol)) {
					?>
							<option value="<?php echo $rol["type_rol"]; ?>"><?php echo $rol["nombre_rol"] ?></option>
					<?php
								# code...
							}

						}
					 ?>
				</select>
				<input type="submit" value="Crear usuario" class="btn_save">

			</form>


		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>
