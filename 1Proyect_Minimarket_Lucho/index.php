<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Iniciar Sesión</title>
	<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="estilos/sesion_estilo.css">
</head>
<body>
	<div id="cont_principal">
		<div class="container-form"><!--todo lo que va a contenedor y es lo blanco-->
			<form  action="procesos/validar_sesion.php"   method="post" class="form">
				<div class="welcome-form">
					<h2>Iniciar Sesión</h2>
				</div>
				
				<div class="user line-input"><!--un input y una linea debajo-->
					<label class="lnr lnr-user"> </label><!--esta parte es el icono de user-->
					<input type="text"  placeholder="Usuario" name="usuario_nomb"  required ><!---->
				</div><!---->

				<div class="password line-input"><!--un input y una linea debajo-->
					<label class="lnr lnr-lock"></label><!--esta parte es el icono del contraseña-->
					<input type="password"  placeholder="Contraseña" name="contra_usu"  required>
				</div><!---->

				<button type="submit" name="Ingresar">Ingresar<label class="lnr lnr-chevron-right"></label></button><!--label implica la flechita-->
			</form>
		</div>
	</div>
</body>
</html>