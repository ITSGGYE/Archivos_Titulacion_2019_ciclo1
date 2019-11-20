
<?php include('header.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
			<?php include('head1.php'); ?>
<!DOCTYPE html>
<?php
	session_start();
	if(ISSET($_SESSION['admin_id'])){
		header('location:home.php');
	}
?>
<html lang = "eng">
	<head>
		<title>Sistema de Biblioteca | Colegio Físcal Industrial Febres Cordero</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css1/bootstrap-index.css" />
	</head>
	<body style = "background:url('images/fondob.jpg') repeat;">
		<nav class = "navbar navbar-default navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<img class="img-nav" src = "images/febresc.png" width = "50px" height = "50px" />
					<h4 class = "navbar-text navbar-right">Sistema de Biblioteca | Colegio Fiscal Industrial Febres Cordero</h4>
				</div>
			</div>
		</nav>
		<br />
				<br />
				<div class = "container-fluid" style = "margin-top:70px;">
			<div class = "col-lg-3 well">

				<br />
				<center><h4>Inicie sesión </h4></center>

				<hr style = "border:1px solid #081a44; width:100%;" />
				<form class="form-login" enctype = "multipart/form-data">
					<div id = "username_warning" class = "form-group">
						<label   class = "control-label">Usuario:</label>
						<input type = "text" class = "form-control" id = "username"/>
					</div>
					<div id = "password_warning" class = "form-group">
						<label class = "control-label">Contraseña:</label>
						<input type = "password" class = "form-control" id = "password"/>
					</div>
					<br />
					<div
						<button type = "button" id = "login" class = "btn btn-primary btn-block"><span class = "glyphicon glyphicon-save"></span> Iniciar Sesión</button>
					</div>
				</form>
				<div id = "result"></div>
				<br />
				<br />
				<br />

			</div>


			

				<div class = "col-lg-1"></div>
			<div class = "col-lg-8 well">

				<img src = "images/bibliotecaFC.png" height = "350px" width = "100%" />
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
  
</html>
