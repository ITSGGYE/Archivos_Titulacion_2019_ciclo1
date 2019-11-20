<?php
session_start();
if (isset($_SESSION['user'])) {
if ($_SESSION['rol']==1) {
		header('location: ./principal.php ');
}elseif ($_SESSION['rol']==3) {
	header('location: ./princ_user.php ');
}
}

?>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once("conn.php");
require_once("header_vet.php");
?>
<?php

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
					<li class="price"><p>HISTORIAL</p></li>
					<li>
						<ul class="options">
							<li><img src="images/registrar3.png"></li>
						</ul>
					</li>
					<li class="button"><a href="reg_historial_vet.php">Registrar</a></li>
				</ul>
			</li>

			<li class="plan">
				<ul class="planContainer">
					<li class="price"><p class="bestPlanPrice">EDICIÓN</p></li>
					<li>
						<ul class="options">
							<li><img src="images/editar2.png"></li>
						</ul>
					</li>
					<li class="button"><a class="bestPlanButton" href="act_historial_vet.php">EDITAR</a></li>
				</ul>
			</li>

			<li class="plan">
				<ul class="planContainer">
					<li class="price"><p>HISTORIAS</p></li>
					<li>
						<ul class="options">
							<li><img src="images/buscar2.png"></li>
						</ul>
					</li>
					<li class="button"><a href="busc_historial_vet.php">BUSCAR</a></li>
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