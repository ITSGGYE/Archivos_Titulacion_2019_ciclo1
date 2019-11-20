<!DOCTYPE html>
<?php
session_start();
	require_once 'valid.php';
?>
<html lang = "eng">
	<head>
		<title>Sistema de Biblioteca | Colegio Físcal Industrial Febres Cordero</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel="stylesheet" href="css/estilos.css">
	</head>
	<body style = "background-color:#d3d3d3;">
		<nav class = "navbar navbar-default navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<img src = "images/febresc.png" width = "50px" height = "50px" />
					<h4 class = "navbar-text navbar-right">Sistema de Biblioteca  | Colegio Físcal Industrial Febres Cordero</h4>
				</div>
			</div>
		</nav>
		<div class = "container-fluid">
			<div class = "col-lg-2 well" style = "margin-top:60px;">
				<div class = "container-fluid">
					<center><img src = "images/admin.png" width = "50px" height = "50px"/></center>
                                        <br>
                                        
					<label class = "text-muted"><?php require'account.php'; echo $name;?></label>
				</div>
				<hr style = "border:1px dotted #d3d3d3;"/>
				<ul id = "menu" class = "nav menu">
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "home.php"><i class = "glyphicon glyphicon-home"></i> Inicio</a></li>
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-tasks"></i> Cuentas</a>
						<ul style = "list-style-type:none;">
							<li><a href = "admin.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-user"></i> Administrador</a></li>
						</ul>


<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "student.php"><i class = "glyphicon glyphicon-user"></i> Registro</a></li>

					</li>
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "book.php"><i class = "glyphicon glyphicon-book"></i> Libros</a></li>
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-th"></i> Transacción</a>
						<ul style = "list-style-type:none;">
							<li><a href = "borrowing.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-random"></i> Pres/Reser..</a></li>
							<li><a href = "view_reservas.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-random"></i> Ver reserva</a></li>
							<li><a href = "returning.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-random"></i> Devolución</a></li>
						</ul>

<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-tasks"></i> Reportes</a>
						<ul style = "list-style-type:none;">

							<li><a href = "reporte_general.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-book"></i> General</a></li>
						</ul>




<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "auditoria.php"><i class = "glyphicon glyphicon-th"></i> Auditoria</a></li>



					</li>
					<li><a  style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-cog"></i> Configuración</a>
						<ul style = "list-style-type:none;">
							<li><a style = "font-size:15px;" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Cerrar Sesión</a></li>
						</ul>
<br>


					</li>
				</ul>
			</div>
			<div class = "col-lg-1"></div>
			<div class = "col-lg-9 well" style = "margin-top:60px;">
				<img src = "images/biblioteca2.jpg" height = "400px" width = "100%" />
			</div>
		</div>
		<nav class = "navbar navbar-default navbar-fixed-bottom">
			<div class = "container-fluid">
				<label class = "navbar-text pull-right">Sistema de Biblioteca | Creado por BELLA YAGUAL Y STEPHANY TORRES &copy; Todos los Derechos Reservados 2019</label>
			</div>
		</nav>
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
	<script src = "js/sidebar.js"></script>
</html>
