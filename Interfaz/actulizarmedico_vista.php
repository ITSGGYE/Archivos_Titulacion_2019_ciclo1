<!DOCTYPE html>
<html lang="en">
<head>



	<meta charset="UTF-8">
	<title>Medicos - CentroLogros</title>
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="icon" type="image/x-icon" href="img/logo.jpeg">
</head>

<body>
<?php include 'arriba/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'arriba/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>MEDICOS</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>EDITAR MEDICO</h2>
						<input type="hidden" name="id" value="<?php echo $medico['idMedico'];?>" />
						<input type="numeric" name="identificacion" placeholder="Cédula" pattern="[0-9]{10}" value="<?php echo $medico['medidentificacion'];?>" requerid  >
						<input type="text" name="nombres" value="<?php echo $medico['mednombres'];?>">
						<input type="text" name="apellidos"placeholder="Apellidos:" value="<?php echo $medico['medapellidos'];?>">
						<input type="email" name="correo" placeholder="Correo:" value="<?php echo $medico['medcorreo'];?>" requerid>
						<input type="numeric" name="telefono" placeholder="Telefono:" pattern="[0-9]{10}" value="<?php echo $medico['medtelefono'];?>">
						<input type="submit" name="enviar" value="Actualizar">
						
					</form>
						<?php  if(!empty($errores)): ?>
							<ul>
							  <?php echo $errores; ?>
							</ul>
						<?php  endif; ?>
                    <a class="btn-regresar" href="medicos.php">Regresar</a>
				</article>
	</section>
</body>
</html>