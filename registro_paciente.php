<?php
session_start();
if (isset($_SESSION['user'])) {
if ($_SESSION['rol']==2) {
        header('location: ./princ_vet.php ');
}elseif ($_SESSION['rol']==3) {
    header('location: ./princ_user.php ');
}
}
?>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
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
					<li class="price"><p>PACIENTES</p></li>
					<li>
						<ul class="options">
							<li><img src="images/registrar2.png"></li>
						</ul>
					</li>
					<li class="button"><a href="reg_paciente.php">Registrar</a></li>
				</ul>
			</li>

			<li class="plan">
				<ul class="planContainer">
					<li class="price"><p class="bestPlanPrice">DATOS</p></li>
					<li>
						<ul class="options">
							<li><img src="images/actualiza.png"></li>
						</ul>
					</li>
					<li class="button"><a class="bestPlanButton" href="act_paciente.php">ACTUALIZAR</a></li>
				</ul>
			</li>

			<li class="plan">
				<ul class="planContainer">
					<li class="price"><p>PACIENTE</p></li>
					<li>
						<ul class="options">
							<li><img src="images/ubica.png"></li>
						</ul>
					</li>
					<li class="button"><a href="busc_paciente.php">BÚSQUEDA</a></li>
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