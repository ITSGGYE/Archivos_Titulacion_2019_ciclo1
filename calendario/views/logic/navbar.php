
	<nav class="navbar navbar-transparent navbar-absolute">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
								<li class="d-flex flex-row">
									<a href="administracion.php" class="simple-text" title="Inicio">
										<i class="material-icons">dashboard</i>
										<strong>INICIO</strong>
									</a>
								</li>

								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="material-icons">notifications</i>
										
										<victor class="HOLA">
											<?php
											include 'views/logic/mostrarNotificaciones.php';
											?>
										</victor>

										<ul class="dropdown-menu HOLAA">
											
											<?php
											include 'views/logic/mostrarContenidoNotificaciones.php';
											?>
									
										</ul>
								
								</li>

							
								<li>
									<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
									<i class="material-icons">person</i>
										<strong>

										<font color='black'>Bienvenido <?php echo ucfirst($_SESSION['firstname']); ?></font>
										</strong>
									</a>

									<ul class="dropdown-menu">
										<li><a href="config.php">Configuración</a></li>
										<li><a href="login.php?logout"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</nav>

	        <div class="content">
	            <div class="container-fluid">

	<script src="js/jquery.js"></script>
<script type="text/javascript"> 

$(document).ready(function(){

function MostrarNoti(){

	$.ajax({
						    type: "POST",
						    url: 'views/logic/mostrarNotificaciones.php',
						    data: 'vieww=u',
						    success: function()
						      {      
						      
						  			  $(".HOLA").load("views/logic/mostrarNotificaciones.php");
						  			  $(".HOLAA").load("views/logic/mostrarContenidoNotificaciones.php");

						     //nos manda a la fecha por defecto declarada en la linea anterior   						
						               
						       }
			    		 });
}

 $.ajax({
						    type: "POST",
						    url: 'views/logic/mostrarNotificaciones.php',
						    data: 'vieww=kkk',
						    success: function()
						      {      
						      
						  			  $(".HOLA").load('views/logic/mostrarNotificaciones.php');
						  			   $(".HOLAA").load("views/logic/mostrarContenidoNotificaciones.php");
						     //nos manda a la fecha por defecto declarada en la linea anterior

    							setInterval(MostrarNoti, 15000);
						               
						       }
			    		 });

});
</script>
	<script src="js/jquery.js"></script>