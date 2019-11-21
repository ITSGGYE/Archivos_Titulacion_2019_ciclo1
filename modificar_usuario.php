<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/tablas1.css">

		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
			<body background="img/fondo2.png">
		</head>
	<style type="text/css">
		* { padding: 0; margin: 0; }
		a { text-decoration: none; }
		li {list-style: none;}

		.main-nav { width: 250px; background: rgba(180,205,203,1.00); }
		.main-nav a { 
			text-transform: uppercase;
			letter-spacing: .2em;
			color: #fff;
			display: block; 
			padding: 10px 0 10px 20px;
			border-bottom: 1px dotted gray;
		}
		.main-nav a.hover { background: rgba(121,165,162,1.00); }
		.main-nav-ul ul {display: none;}
		.main-nav-ul li:hover ul { display: block; }

		.main-nav-ul ul a:before{
			content: '\203A';
			margin-right: 20px;
		}

		.main-nav .sub-arrow:after {
			content: '\203A';
			float: right;
			margin-right: 20px;
			transform: rotate(90deg);
			-webkit-transform : rotate(90deg);
			-moz-transform : rotate(90deg);
		}
		.main.nav li:hover .sub-arrow:after {
			content: '\2039';
		}
		h1{
			color: #fff;
		}

	</style>         

<body>
<br>
<br>
<br>
<br>
<br>
</br>
</br>
</body>
</html>
<?php


	$x_idusuario = $_REQUEST['codigo'];
	include('conexion.php');

	$sql = "select * from usuarios where u_codigo = '$x_idusuario'";
	$registro = mysqli_query($conexion,$sql);
	$dato = mysqli_fetch_array($registro);	
?>

		<center><a href='index.php' ><img src='img/inicio.png' alt='Inicio'></a><br>
		<h1 style='color: #58ACFA;' align='center'><strong>Modificar Cliente</strong></h1>
		<form  method='POST' action='update_usuario.php'>
		<center><table style='margin: 0 auto;text-align: center;'>
			<input type='hidden' id='f_codigo' name='f_codigo' value="<?php echo $dato['u_codigo'] ?>">
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'> Ingrese Nombre:</th> 
			<td><input type='text' id='f_usuario' name='f_usuario' value="<?php echo $dato['usuario'] ?>"></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'> Ingrese Clave:</th> 
			<td><input type='text' id='f_clave' name='f_clave' value="<?php echo $dato['password'] ?>"></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Estado del Cliente:</th> 
			<td><SELECT id='f_estado' name='f_estado' value="<?php echo $dato['status'];?>">
			<option value= 'A' <?php if($dato['status']=='A') echo 'selected'; ?> >Activo</option>
			<option value= 'B' <?php if($dato['status']=='B') echo 'selected'; ?> >Inactivo</option>
			</SELECT></td>
			</tr>	
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'> Ingrese Nivel:</th> 
			<td><input type='text' id='f_nivel' name='f_nivel' value="<?php echo $dato['nivel'] ?>"></td>
			</tr>		
			<br><br><br><br>
			</table>
			
		</br>
		<input type='reset' id='limpiar' name='limpiar' value='limpiar'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type='submit' id='grabar' name='grabar' value='Grabar'>		
		</form>
		<br><br></center>

			
	


<html><center><a href='javascript:window.history.go(-1);'><img src="img/regresar.jpg"></a></center><html>                     