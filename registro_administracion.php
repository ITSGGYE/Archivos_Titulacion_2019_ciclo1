<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once 'session_active.php';
require_once("conn.php");
require_once("header.php");

?>

<!-- Content Center -->
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/style.css?nocache=" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/style-table.css?nocache=" type="text/css" media="screen" />

 </head>
<body>

<section id="pricePlans">
		<ul id="plans">
			<li class="plan">
				<ul class="planContainer">
					<li class="price"><p>USUARIO</p></li>
					<li>
						<ul class="options">
							<li><img src="images/registrar.png"></li>
						</ul>
					</li>
					<li class="button"><a href="reg_vet_user.php">Registrar</a></li>
				</ul>
			</li>

			<li class="plan">
				<ul class="planContainer">
					<li class="price"><p class="bestPlanPrice">PROFESIONAL</p></li>
					<li>
						<ul class="options">
							<li><img src="images/registrar-prof.jpg"></li>
						</ul>
					</li>
					<li class="button"><a class="bestPlanButton" href="reg_vet.php">REG PROFESIONAL</a></li>
				</ul>
			</li>

			<li class="plan">
				<ul class="planContainer">
					<li class="price"><p>CONTRASEÑAS</p></li>
					<li>
						<ul class="options">
							<li><img src="images/contraseñas.png"></li>
						</ul>
					</li>
					<li class="button"><a href="act_cliente_adm.php">CAMBIAR</a></li>
				</ul>
			</li>

			<li class="plan">
				<ul class="planContainer">
					<li class="price"><p class="bestPlanPrice">SESIÓN</p></li>
					<li>
						<ul class="options">
							<li><img src="images/salir1.png"></li>
						</ul>
					</li>
					<li class="button"><a class="bestPlanButton" href="desconectar.php">CERRAR</a></li>
				</ul>
			</li>
		</ul> <!-- End ul#plans -->
	</section>




<!--/ HEADER ABAJO /-->

<!--/ FIN HEADER ABAJO /-->


</body>
</html>