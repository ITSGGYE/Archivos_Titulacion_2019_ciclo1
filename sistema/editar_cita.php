<?php
	session_start();
	include "../conexion.php";
	if (isset($_POST['actualizar'])) {
		if(empty($_POST['cedula'])|| empty($_POST['nombre']) || empty($_POST['fecha']) || empty($_POST['hora']) || empty($_POST['nota']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
		$idcita            	= $_GET['id'];
		$cedula       	   	= $_POST['cedula'];
		$nombre 		   			= $_POST['nombre'];
		$fecha             	= $_POST['fecha'];
		$hora              	= $_POST['hora'];
		$nota             	= $_POST['nota'];
		$sql_update = mysqli_query($conection,"UPDATE citas
													SET fecha='$fecha',hora='$hora', nota='$nota'
													WHERE id = $idcita");
													if($sql_update){
														$alert='<p class="msg_save">Cita actualizado correctamente.</p>';
													}else{
														$alert='<p class="msg_error">Error al actualizar el cita.</p>';
													}
	}
}elseif (isset($_GET['id'])) {
	$idcita = $_GET['id'];
	$sql= mysqli_query($conection,"SELECT * FROM citas, personas
									WHERE citas.id = $idcita AND citas.cedula_paciente = personas.cedula ");
	mysqli_close($conection);
	$result_sql = mysqli_num_rows($sql);
	while ($data = mysqli_fetch_array($sql)) {
		$idcita            = $data['id'];
		$cedula            = $data['cedula_paciente'];
		$nombre            = $data['nombres'];
		$fecha             = $data['fecha'];
		$hora              = $data['hora'];
		$nota              = $data['nota'];

	}
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Actualizar Cita</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">

		<div class="form_register">
			<h1>Actualizar Cita</h1>
			<hr>
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>

			<form action="editar_cita.php?id=<?php echo $_GET['id']; ?>" method="post">
				<input type="hidden" name="id_cita"  value="<?php echo  $_GET['id']; ?>">

			<label for="cedula">cedula del paciente</label>
			<input type="number" name="cedula" id="cedula" placeholder="cedula del paciente" value="<?php echo $cedula; ?>">

			<label for = "nombre">Nombre del paciente </label>
			<input type="text" name="nombre" id="nombre" placeholder="nombre completo" value="<?php echo $nombre; ?>">

			<label for= "fecha">Fecha</label>
			<input type="date" name="fecha" id="fecha" value="<?php echo $fecha; ?>">

			<label for="hora">Hora</label>
			<input type="time" name="hora" id="hora" placeholder="hora de cita" value="<?php echo $hora; ?>">

			<label for="nota">OBSERVACIONES O JUSTIFICATIVO</label>
			<input type="text" name="nota" id="nota" placeholder="nota" value="<?php echo $nota; ?>">

        <input type="submit" name="actualizar" value="Guardar cita" class="btn_save">

			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>
