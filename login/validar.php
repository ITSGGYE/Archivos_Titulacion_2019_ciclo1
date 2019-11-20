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
				$pw =$_POST['password'];
				$pwa = $pw;//sha1($pw);
				//$log = mysql_query("SELECT * FROM usuario WHERE usuario='$usuario' AND clave='".sha1($_POST['pw'])."'");
				$log = mysqli_query($conexion,"SELECT * FROM administrador_biblioteca WHERE user='$usuario' AND pass='$pwa'");
				if (mysqli_num_rows($log)>0) {
					$row = mysqli_fetch_array($log);
					$_SESSION["user"] = $row['user']; 
				  	echo 'Iniciando sesión para '.$_SESSION['user'].' <p>';
				  	header ("Location: ../admin/index.php");
				//	echo '<script> window.location="../admin/"; </script>';
				}
				else{
					echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
					echo '<script> window.location="login.php"; </script>';
				}
			}
		?>	
</body>
</html>