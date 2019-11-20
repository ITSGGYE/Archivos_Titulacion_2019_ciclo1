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
		if(empty($_POST['nombre']) || empty($_POST['cedula']) || empty($_POST['usuario'])  || empty($_POST['rol']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$idUsuario = $_POST['idUsuario'];
			$nombre = $_POST['nombre'];
			$cedula = $_POST['cedula'];
			$user   = $_POST['usuario'];
			$clave  = md5($_POST['clave']);
			$rol    = $_POST['rol'];


			$query = mysqli_query($conection,"SELECT * FROM usuarios
													   WHERE (user = '$user' AND id != $idUsuario)");

			$result = mysqli_fetch_array($query);

			if($result > 0){
				$alert='<p class="msg_error">El correo o el usuario ya existe.</p>';
			}else{

				if(empty($_POST['clave']))
				{
					mysqli_query($conection,"set autocommit = 0");
					$sql_update = mysqli_query($conection,"UPDATE usuarios
															SET cedula_usuario = '$cedula',user='$user',rol='$rol'
															WHERE id= $idUsuario ");
				}else{
					mysqli_query($conection,"set autocommit = 0");
					$sql_update = mysqli_query($conection,"UPDATE usuarios
															SET cedula_usuario = '$cedula',user='$user',password='$clave', rol='$rol'
															WHERE id= $idUsuario ");

				}

				if($sql_update){
					mysqli_query($conection,"commit") or die(mysqli_error($conection));
					mysqli_query($conection,"set autocommit = 1") or die(mysqli_error($conection));
					$alert='<p class="msg_save">Usuario actualizado correctamente.</p>';
				}else{
					mysqli_query($conection,"rollback") or die(mysqli_error($conection));
					mysqli_query($conection,"set autocommit = 1") or die(mysqli_error($conection));
					$alert='<p class="msg_error">Error al actualizar el usuario.</p>';
				}

			}


		}

	}

	//Mostrar Datos
	if(empty($_REQUEST['id']))
	{
		header('Location: lista_usuarios.php');
		mysqli_close($conection);
	}
	$iduser = $_REQUEST['id'];

	$sql= mysqli_query($conection,"SELECT nombres,cedula,user,nombre_rol,usuarios.id,type_rol FROM personas,usuarios,roles
		WHERE usuarios.rol = roles.type_rol AND usuarios.id = $iduser AND personas.cedula = usuarios.cedula_usuario");

	mysqli_close($conection);
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: lista_usuarios.php');
	}else{
		$option = '';
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$iduser  = $data['id'];
			$nombre  = $data['nombres'];
			$cedula  = $data['cedula'];
			$usuario = $data['user'];
			$idrol = $data['type_rol'];
			$rol     = $data['nombre_rol'];

			if($idrol == 1){
				$option = '<option value="'.$idrol.'" select>'.$rol.'</option>';
			}else if($idrol == 2){
				$option = '<option value="'.$idrol.'" select>'.$rol.'</option>';
			}else if($idrol == 3){
				$option = '<option value="'.$idrol.'" select>'.$rol.'</option>';
			}


		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Actualizar Usuario</title>
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
			letras="abcdefghijklmnñopqrstuvwxyz";
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
			<h1>Actualizar usuario</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<!-- readonly-->
				<input type="hidden" name="idUsuario" value="<?php echo $iduser; ?>">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo" onkeypress="return sololetras(event)" value="<?php echo $nombre; ?>">
				<label for="cedula">Cedula</label>
				<input type="number" name="cedula" id="cedula" value="<?php echo $cedula; ?>" placeholder="numero de cedula" minlength="10" maxlength="10" onkeypress=" return solonumeros(event)" onpaste="return false" >
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo $usuario; ?>">
				<label for="clave">Clave</label>
				<input type="password" name="clave" id="clave" placeholder="Clave de acceso">
				<label for="rol">Tipo Usuario</label>

				<?php
					include "../conexion.php";
					$query_rol = mysqli_query($conection,"SELECT * FROM roles WHERE type_rol != 3");
					mysqli_close($conection);
					$result_rol = mysqli_num_rows($query_rol);

				 ?>

				<select name="rol" id="rol" class="notItemOne">
					<?php
						echo $option;
						if($result_rol > 0)
						{
							while ($rol = mysqli_fetch_array($query_rol)) {
					?>
							<option value="<?php echo $rol["idrol"]; ?>"><?php echo $rol["nombre_rol"] ?></option>
					<?php
								# code...
							}

						}
					 ?>
				</select>
				<input type="submit" value="Actualizar usuario" class="btn_save">

			</form>


		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>
