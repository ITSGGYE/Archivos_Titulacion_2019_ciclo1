<?php

$alert = '';
session_start();
if(!empty($_SESSION['active']))
{
	header('location: millennials_sys/');
}else{

	if(!empty($_POST))
	{
		if(empty($_POST['usuario']) || empty($_POST['clave']))
		{
			$alert = 'Ingrese su usuario y su clave';
		}else{

			require_once "config/conexion.php";

			$user = mysqli_real_escape_string($conection,$_POST['usuario']);
			$pass = md5(mysqli_real_escape_string($conection,$_POST['clave']));

			$query = mysqli_query($conection,"SELECT * FROM usuarios WHERE User_Nam= '$user' AND User_Pass = '$pass'");
			mysqli_close($conection);
			$result = mysqli_num_rows($query);

			if($result > 0)
			{
				$data = mysqli_fetch_array($query);
				$_SESSION['active'] = true;
				$_SESSION['idUser'] = $data['User_Id'];
				$_SESSION['nombre'] = $data['User_Nombre'];
				$_SESSION['apellido']  = $data['User_Apellido'];
				$_SESSION['user']   = $data['User_Nam'];
				$_SESSION['rol']    = $data['Rol_Id'];
		$_SESSION['Sucur_Id']    = $data['Sucur_Id'];
?><script> 
<!--
window.location.replace('millennials_sys/'); 
//-->
</script>
			 <?php  
	 
			}else{
				$alert = 'El usuario o la clave son incorrectos';
				session_destroy();
			}


		}

	}
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
 	<link rel=icon href='css_login/img/logo-mi.ico' sizes="32x32" type="image/ico">
	<title>Millennials Sistema</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="css_login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css_login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="css_login/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="css_login/img/logo-mi.png" alt="IMG">
				</div>


				<form method="post" accept-charset="utf-8" action="" name="loginform" autocomplete="off" role="form" class="login100-form validate-form">
					<span class="login100-form-title">
            <p id="profile-name" class="ti">INICIAR SESIÓN</p>


					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" placeholder="Usuario" name="usuario" type="text" autofocus="1" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100"  placeholder="*********" name="clave" type="password" value="" autocomplete="off" required>
						<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="Ingresar">

						</input>
					</div>

<div class="text-center p-t-12">
						<span class="txt1">
						Copyright © 2019.
						</span>
						<a class="txt2" href="https://millennials.ec/">
						Millennials - Centro Estético
						</a><br>
						<a class="txt2" href="#">
						Creado Por - Luis García 
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="css_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="css_login/vendor/bootstrap/js/popper.js"></script>
	<script src="css_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="css_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="css_login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="css_login/js/main.js"></script>
</body>
</html>
