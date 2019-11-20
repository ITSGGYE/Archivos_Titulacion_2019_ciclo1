<?php
	session_start();
	if($_SESSION['rol'] != 1 and $_SESSION['rol'] != 2 )
	{
		header("location: ./");
	}
	include "../conexion.php";

if(isset($_POST['id_cita'])){
	$delete_id = $_POST['id_cita'];
	//echo "<script>alert(".$delete_id.");</script>";
	$query = "UPDATE citas SET estatus = 0 WHERE id = $delete_id";
	$stmt = mysqli_query($conection,$query);
	if ($stmt) {
		mysqli_close($conection);
		header('location: lista_cita.php');
	}else {
		mysqli_close($conection);
		echo "<script>alert('¡Error!');
		window.location='lista_cita.php';</script>";
	}
}elseif(isset($_GET['id'])) {
	$idcita = $_REQUEST['id'];
	//echo "<script>alert(".$idcita.");</script>";
	$query = mysqli_query($conection,"SELECT * FROM citas, personas WHERE citas.id = $idcita AND citas.cedula_paciente = personas.cedula");
	mysqli_close($conection);
	$result = mysqli_num_rows($query);

	if($result > 0){
		while ($data = mysqli_fetch_array($query)) {
			# code...
			$cedula    = $data['cedula'];
			$nombre = $data['nombres'];
		}
}
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Eliminar Cita </title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="data_delete">
			<h2>¿Está seguro de eliminar el siguiente registro?</h2>
			<p>Nombre del cita: <span><?php echo $nombre; ?></span></p>
			<p>cedula: <span><?php echo $cedula; ?></span></p>

			<form method="post" action="eliminar_confirmar_cita.php">
				<input type="hidden" name="id_cita" value="<?php echo $_GET['id']; ?>">
				<a href="lista_cita.php" class="btn_cancel">Cancelar</a>
				<input type="submit" value="eliminar" class="btn_ok">
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>
