<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<head>
	<title>Validando...</title>
	<meta charset="utf-8">
</head>
</head>
<body>
		<?php
			include '../admin/conexion.php';
			if(isset($_POST['login'])){
				$usuario = $_POST['username'];
			
				//$log = mysql_query("SELECT * FROM usuario WHERE usuario='$usuario' AND clave='".sha1($_POST['pw'])."'");
				$log = mysqli_query($conexion,"SELECT * FROM usuario_estudiante WHERE carnet='$usuario' ");
				if (mysqli_num_rows($log)>0) {
					$row = mysqli_fetch_array($log);
					$_SESSION["carnet"] = $row['carnet']; 
					
				  	echo 'Iniciando sesión para '.$_SESSION['carnet'].' <p>';
				  	header ("Location: ../index.php");
				//	echo '<script> window.location="../admin/"; </script>';
				}
				else{
					echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
					echo '<script> window.location="estudiante.php"; </script>';
				}
			}
		?>	
</body>
</html>