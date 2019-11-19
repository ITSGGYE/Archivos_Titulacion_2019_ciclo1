<?php
session_start();
	include("function/login.php");
	include("function/customer_signup.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>La Bodeguita</title>
	<link rel="icon" href="img/logo.jpg" />
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
			<ul>
				<li><a href="#Regístrate"   data-toggle="modal">Regístrate</a></li>
				<li><a href="#Iniciar_sesión"   data-toggle="modal">Iniciar sesión</a></li>
			</ul>
	</div>

	<div id="Iniciar_sesión" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Iniciar sesión...</h3>
			</div>
				<div class="modal-body">
					<form method="post">
					<center>
						<input type="email" name="email" placeholder="Email" style="width:250px;">
						<input type="password" name="contrasena" placeholder="Contraseña" style="width:250px;">
					</center>
				</div>
			<div class="modal-footer">
				<input class="btn btn-primary" type="submit" name="Iniciar_sesión" value="Iniciar sesión">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
					</form>
			</div>
		</div>

	<div id="Regístrate" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Registrate aquí...</h3>
				</div>
					<div class="modal-body">
						<center>
					<form method="post">
						<input type="text" name="primer_nombre" placeholder="Primer nombre" required>
						<input type="text" name="segundo_nombre" placeholder="Segundo nombre" required>
						<input type="text" name="apellido" placeholder="Apellido" required>
						<input type="text" name="direccion" placeholder="Dirección" style="width:430px;"required>
						<input type="text" name="pais" placeholder="Provincia" required>
						<input type="text" name="codigo_postal" placeholder="Código postal" required maxlength="6">
						<input type="text" name="movil" placeholder="Número de Teléfono móvil" maxlength="13">
						<input type="text" name="telefono" placeholder="Número de Teléfono" maxlength="7">
						<input type="email" name="email" placeholder="Email" required>
						<input type="password" name="contrasena" placeholder="Contraseña" required>
						</center>
					</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-primary" name="Regístrate" value="Regístrate">
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
				</div>
					</form>
			</div>

	<br>
<div id="container">
	<div class="nav">
			 <ul>
				<li><a href="index.php">  <i class="icon-home"></i>Inicio</a></li>
				<li><a href="Bebidas.php"> 	<i class="icon-th-list"></i>Productos</a></li>
				<li><a href="aboutus.php">  <i class="icon-bookmark"></i>Acerca de Nosotros</a></li>
				<li><a href="contactus.php"><i class="icon-inbox"></i>Contacto</a></li>
				<li><a href="faqs.php"><i class="icon-question-sign"></i>Preguntas frecuentes</a></li>
			</ul>
	</div>

		<img src="img/about1.jpg" style="width:1150px; height:400px; border:1px solid #000; ">
	<br />
	<br />

	<legend>Sobre nosotros</legend>
		<div id="content">
			<legend><h3>La Bodeguita</h3></legend>
					<h4 style="text-indent:50px;">Sauces 6 Mz. 259F9 V. 1.</h4>
			<br />
<h4>Depósito de Venta al Por Mayor y Por Menor de Bebidas (Alcohólicas y No alcohólicas), Víveres y Comestibles en general.</h4>
			<br />
			<h4>Número de teléfono: +593991657586 --- +593980065877</h4>
			<a href="mailto:bodeguita.ec@gmail.com">Correo electronico: bodeguita.ec@gmail.com</a>

		</div>
	<br />
</div>
	<br />
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px;"> Copyright &copy; </label>
			<p style="font-size:25px;">La Bodeguita <?php echo $YEAR = date('Y');?></p>
		</div>

			<div id="foot">
				<h4>Enlaces con redes sociales</h4>
					<ul>
						<a href="https://www.facebook.com/BodeguitaOficial/"><li><img src="./facebook.png" width="20px" alt="">&nbsp;&nbsp;&nbsp;Facebook</li></a><br>
						<a href="https://www.instagram.com/bodeguitaoficial/"><li><img src="./instagram.png" width="20px" alt="">&nbsp;&nbsp;&nbsp;Instagram</li></a>
					</ul>
			</div>
	</div>
</body>
</html>
