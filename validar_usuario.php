<?php  session_start();
	$x_usuario = $_POST['f_usuario'];
	$x_password = $_POST['f_password'];

	// Esta linea me permiten conectarme con la BD
	include("conexion.php");

	$sql = "select * from usuarios where usuario like '%".$x_usuario."%' and password = '".$x_password."' ";
	$resultado = mysqli_query($conexion,$sql);
	$dato = mysqli_fetch_array($resultado); 
	if(mysqli_num_rows($resultado) >0 )
	{
		echo "<script>alert('Bienvenido al Sistema')</script>";
		$_SESSION["tipo"]=$dato['nivel']; 
		echo '<script>location.href = "main.php"</script>';

	}
	else
	{
		echo "<script>alert('Usuario no encontrado')</script>";
		echo '<script>location.href = "login.html"</script>';

	}

?>