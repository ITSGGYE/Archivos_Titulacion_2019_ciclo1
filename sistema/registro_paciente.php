<?php
	session_start();


	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';
		if(empty($_POST['cedula']) ||empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['direccion'])   || empty($_POST['fecha_nacimiento']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

           $cedula    			 = $_POST['cedula'];
			$nombre    		 	 = $_POST['nombre'];
			$telefono  		 	 = $_POST['telefono'];
			$direccion  		 = $_POST['direccion'];
			$fecha_nacimiento    = $_POST['fecha_nacimiento'];
			$type = 3;

			$result = 0;
			if(is_numeric($cedula))
			{
				$query = mysqli_query($conection,"SELECT * FROM personas WHERE cedula = '$cedula' ");
				$result = mysqli_fetch_array($query);
			}
			if($result > 0){

             $alert= '<p class=" msg_error"> El numero de cedula ya existe.</p>';
			}else{
				mysqli_query($conection,"set autocommit = 0");
				mysqli_query($conection,"START TRANSACTION");
				$query_insert = mysqli_query($conection,"INSERT INTO personas(cedula ,nombres,telefono,direccion,fecha_nacimiento,type_persona,estatus)
					VALUES('$cedula','$nombre','$telefono','$direccion','$fecha_nacimiento',$type,1)");


				if($query_insert){
					mysqli_query($conection,"commit") or die(mysqli_error($conection));
					mysqli_query($conection,"set autocommit = 1") or die(mysqli_error($conection));
					$alert='<p class="msg_save">paciente guardado correctamente.</p>';
				}else{
						mysqli_query($conection,"rollback") or die(mysqli_error($conection));
						mysqli_query($conection,"set autocommit = 1") or die(mysqli_error($conection));
					$alert='<p class="msg_error">Error al guardar paciente.</p>';
				}
			}

			}
			mysqli_close($conection);
		}





 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Registro paciente</title>
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
			<h1>Registro paciente</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="" method="post">
				<label for="cedula">Cedula</label>
				<input type="text" name="cedula" id="cedula" placeholder="numero de cedula" minlength="10" maxlength="10" onkeypress=" return solonumeros(event)" onpaste="return false">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Nombre completo" onkeypress="return sololetras(event)">
				<label for="telefono">Telefono</label>
				<input type="text" name="telefono" id="telefono" placeholder="Telefono" minlength="7"  maxlength="10" onkeypress=" return solonumeros(event)" onpaste="return false">
				<label for="direccion">Direccion</label>
				<input type="text" name="direccion" id="direccion" placeholder="Direccion completa">
				<label for="fecha_nacimiento">Fecha  de nacimiento</label>
				<input type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Fecha de Nacimiento">



				<input type="submit" value="Guardar paciente" class="btn_save">

			</form>


		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>
