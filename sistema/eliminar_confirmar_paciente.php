<?php
	session_start();
	
	include "../conexion.php";
        
        if(isset($_POST['eliminar'])){
	$delete_id = $_POST['id_paciente'];
	//echo "<script>alert(".$delete_id.");</script>";
	$query = "UPDATE personas SET estatus = 0 WHERE id = $delete_id";
	$stmt = mysqli_query($conection,$query);
	if ($stmt) {
		mysqli_close($conection);
		header('location: lista_paciente.php');
	}else {
		mysqli_close($conection);
		echo "<script>alert('¡Error!');
		window.location='lista_paciente.php';</script>";
	}
}elseif(isset($_GET['id'])) {
	$idpaciente = $_REQUEST['id'];
	//echo "<script>alert(".$idcita.");</script>";
	$query = mysqli_query($conection,"SELECT * FROM personas WHERE id = $idpaciente");
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

	if(!empty($_POST))
	{
		if(empty($_POST['idpaciente']))
		{
			header("location: lista_paciente.php");
			mysqli_close($conection);
		}

		$idpaciente = $_POST['idpaciente'];

		//$query_delete = mysqli_query($conection,"DELETE FROM usuario WHERE idusuario =$idusuario ");
		$query_delete = mysqli_query($conection,"UPDATE personas SET estatus = 0 WHERE id = $idpaciente ");
		mysqli_close($conection);
		if($query_delete){
			header("location: lista_paciente.php");
		}else{
			echo "Error al eliminar";
		}

	}



 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Eliminar Paciente </title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="data_delete">
			<h2>¿Está seguro de eliminar el siguiente registro?</h2>
			<p>Nombre del paciente: <span><?php echo $nombre; ?></span></p>
			<p>cedula: <span><?php echo $cedula; ?></span></p>


                        <form method="post" action="eliminar_confirmar_paciente.php">
				<input type="hidden" name="id_paciente" value="<?php echo $_GET['id']; ?>">
				<a href="lista_paciente.php" class="btn_cancel">Cancelar</a>
                                <input type="submit" value="eliminar" class="btn_ok" name="eliminar">
			</form>
		</div>


	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>
