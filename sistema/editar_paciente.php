<?php

	session_start();
	

	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['cedula'])|| empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['direccion']) || empty($_POST['fecha_nacimiento']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

			$idpaciente        = $_POST['id'];
			$cedula       	   = $_POST['cedula'];
			$nombre 		   = $_POST['nombre'];
			$telefono          = $_POST['telefono'];
			$direccion         = $_POST['direccion'];
			$fecha_nacimiento  = $_POST['fecha_nacimiento'];

            $result = 0;

            if (is_numeric($cedula) and $cedula !=0)
            {

            $query = mysqli_query($conection,"SELECT * FROM personas
	                               WHERE (cedula = '$cedula'  AND id != $idpaciente) ");


               //$result = count($result);
            }

			if($result > 0){
				$alert='<p class="msg_error"> la cedula ya existe.</p>';
			}else{
				if($cedula == '')
				{
					$cedula = 0 ;
				}

				$sql_update = mysqli_query($conection,"UPDATE personas
															SET nombres ='$nombre',telefono='$telefono',direccion='$direccion', fecha_nacimiento='$fecha_nacimiento'
															WHERE id = $idpaciente") or die(mysqli_error($conection));


				if($sql_update){
					$alert='<p class="msg_save">Paciente actualizado correctamente.</p>';
				}else{
					$alert='<p class="msg_error">Error al actualizar el paciente.</p>';
				}

			}


		}

	}

	//Mostrar Datos
	if(empty($_REQUEST['id']))
	{
		header('Location: lista_paciente.php');
		mysqli_close($conection);
	}
	$idpaciente = $_REQUEST['id'];

	$sql= mysqli_query($conection,"SELECT * FROM personas
									WHERE id = $idpaciente ");
	mysqli_close($conection);
	$result_sql = mysqli_num_rows($sql);

	if($result_sql == 0){
		header('Location: lista_paciente.php');
	}else{
		while ($data = mysqli_fetch_array($sql)) {
			# code...
			$idpaciente        = $data['id'];
			$cedula            = $data['cedula'];
			$nombre            = $data['nombres'];
			$telefono          = $data['telefono'];
			$direccion         = $data['direccion'];
			$fecha_nacimiento  = $data['fecha_nacimiento'];

		}
	}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Actualizar Cliente</title>
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
			<h1>Actualizar cliente</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<input type="hidden" name="id"  value="<?php echo $idpaciente; ?>">

				<label for="cedula"> cedula </label>
				<input  readonly type="textr" name="cedula" id="cedula" placeholder="numero de cedula" minlength="10" maxlength="10" onkeypress=" return solonumeros(event)" onpaste="return false" value="<?php echo $cedula; ?>">

				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo"  onkeypress="return sololetras(event)" value="<?php echo $nombre; ?>">

				<label for="telefono">Telefono</label>
				<input type="text" name="telefono" id="telefono" placeholder="Telefono"  minlength="7" maxlength="10" onkeypress=" return solonumeros(event)" onpaste="return false" value="<?php echo $telefono; ?>">

				<label for="direccion">Direccion</label>
				<input type="text" name="direccion" id="direccion" placeholder="Direccion completa" value="<?php echo $direccion; ?>">

				<label for="fecha_nacimiento">Fecha de Nacimiento</label>
				<input type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="fecha de nacimiento" value="<?php echo $fecha_nacimiento; ?>">



				<input type="submit" value="actualizar  paciente" class="btn_save">

			</form>




		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>
