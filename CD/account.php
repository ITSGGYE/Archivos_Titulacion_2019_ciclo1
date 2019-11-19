<?php
	include("function/session.php");
	include("db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>La Bodeguita</title>
	<link rel = "stylesheet" type = "text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/carousel.js"></script>
	<script src="js/button.js"></script>
	<script src="js/dropdown.js"></script>
	<script src="js/tab.js"></script>
	<script src="js/tooltip.js"></script>
	<script src="js/popover.js"></script>
	<script src="js/collapse.js"></script>
	<script src="js/modal.js"></script>
	<script src="js/scrollspy.js"></script>
	<script src="js/alert.js"></script>
	<script src="js/transition.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div id="header">
		<img src="img/logo.jpg">
		<label>Sistema de Ventas Online La Bodeguita</label>

			<?php
				$id = (int) $_SESSION['id_customer'];

					$query = mysqli_query ($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error($conn));
					$fetch = mysqli_fetch_array ($query);
			?>

			<ul>
				<li><a href="function/logout.php"><i class="icon-off icon-white"></i>cerrar sesión</a></li>
				<li><a href="#Perfil" href  data-toggle="modal">Bienvenido (a):&nbsp;&nbsp;&nbsp;<i class="icon-user icon-white"></i><?php echo $fetch['primer_nombre']; ?>&nbsp;<?php echo $fetch['apellido'];?></a></li>
			</ul>
	</div>
<div id="container">


							<?php

								$id = (int) $_SESSION['id'];

								$query = mysqli_query ($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
								$fetch = mysqli_fetch_array ($query);
								{
								$primer_nombre=$fetch['primer_nombre'];
								$segundo_nombre=$fetch['segundo_nombre'];
								$apellido=$fetch['apellido'];
								$dirección=$fetch['direccion'];
								$país=$fetch['pais'];
								$código_postal=$fetch['codigo_postal'];
								$móvil=$fetch['movil'];
								$teléfono=$fetch['telefono'];
								$email=$fetch['email'];
								$contraseña=$fetch['contrasena'];
								$customerid=$fetch['customerid'];
								}
						?>
				<div id="cuenta">
					<form method="POST" action="function/edit_customer.php">
						<center>
						<h3>Editar mi cuenta</h3>
							<table>
								<tr>
									<td>Primer nombre:</td><td><input type="text" name="primer_nombre" placeholder="Primer nombre" required value="<?php echo $primer_nombre; ?>"></td>
								</tr>
								<tr>
									<td>Segundo nombre:</td><td><input type="text" name="segundo_nombre" placeholder="Segundo nombre" required value="<?php echo $segundo_nombre ;?>"></td>
								</tr>
								<tr>
									<td>Apellido:</td><td><input type="text" name="apellido" placeholder="Apellido" required value="<?php  echo $apellido;?>"></td>
								</tr>
								<tr>
									<td>Dirección:</td><td><input type="text" name="direccion" placeholder="Dirección" style="width:430px;"required value="<?php echo $dirección;?>"></td>
								</tr>
								<tr>
									<td>Provincia:</td><td><input type="text" name="pais" placeholder="Provincia" required value="<?php echo $país;?>"></td>
								</tr>
								<tr>
									<td>Código postal:</td><td><input type="text" name="codigo_postal" placeholder="Código postal" required value="<?php echo $código_postal;?>" maxlength="6"></td>
								</tr>
								<tr>
									<td>Número de Teléfono móvil:</td><td><input type="text" name="movil" placeholder="Número de Teléfono móvil" value="<?php echo $móvil;?>" maxlength="13"></td>
								</tr>
								<tr>
									<td>Número de Teléfono:</td><td><input type="text" name="telefono" placeholder="Número de Teléfono" value="<?php echo $teléfono;?>" maxlength="7"></td>
								</tr>
								<tr>
									<td>Email:</td><td><input type="email" name="email" placeholder="Email" required value="<?php echo $email;?>"></td>
								</tr>
								<tr>
									<td>Contraseña</td><td><input type="password" name="contrasena" placeholder="contraseña" required value="<?php echo $contrasena;?>"></td>
								</tr>
								<tr>
									<td></td><td><input type="submit" name="editar" value="Guardar cambios" class="btn btn-primary">&nbsp;<a href="home.php"><input type="button" name="cancelar" value="Cancelar" class="btn btn-danger"></a></td>
								</tr>
							</table>
						</center>
					</form>
				</div>
	<br>

</div>
</body>
</html>
