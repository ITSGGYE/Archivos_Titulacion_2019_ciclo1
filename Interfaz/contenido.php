<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Funciones - CentroLogros</title>
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
						<h2> <i class=""> Bienvenido <strong style="text-transform: capitalize;"><?php echo $_SESSION['usuario']; ?></strong> al sistema de registro de pacientes y gestión de citas.</i></h2>
					</div>
					<br><br>
	
					<p><img src="img/logo.jpeg">
					</p>
					<br/><br/>
				</article>
	</section>
</body>
</html>