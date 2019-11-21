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


	$x_idcliente = $_REQUEST['codigo'];
	include('conexion.php');

	$sql = "select * from clientes where id_cliente = '$x_idcliente'";
	$registro = mysqli_query($conexion,$sql);
	$dato = mysqli_fetch_array($registro);	
?>

		<center><a href='index.php' ><img src='img/inicio.png' alt='Inicio'></a><br>
		<h1 style='color: #58ACFA;' align='center'><strong>Modificar Cliente</strong></h1>
		<form  method='POST' action='update_cliente.php'>
		<center><table style='margin: 0 auto;text-align: center;'>
			<input type='hidden' id='f_codigo' name='f_codigo' value="<?php echo $dato['id_cliente'] ?>">
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'> Ingrese Nombre:</th> 
			<td><input type='text' id='f_nombre' name='f_nombre' value="<?php echo $dato['nombres'] ?>"></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'> Ingrese Apellido:</th> 
			<td><input type='text' id='f_apellido' name='f_apellido' value="<?php echo $dato['apellidos'] ?>"></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Cédula o RUC:</th> 
			<td><input type='number' id='f_cedula' name='f_cedula' value="<?php echo $dato['cedula'] ?>"></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Teléfono:</th> 
			<td><input type='number' id='f_telefono' name='f_telefono' value="<?php echo $dato['telefono'] ?>"></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Correo Electrónico:</th> 
			<td><input type='text' id='f_correo' name='f_correo' value="<?php echo $dato['correo'] ?>"></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Dirección:</th> 
			<td><input type='text' id='f_direccion' name='f_direccion' value="<?php echo $dato['direccion'] ?>"></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Estado del Cliente:</th> 
			<td><SELECT id='f_estado' name='f_estado' value=".$dato['estado'].">
			<option value= '0' <?php if($dato['estado']==0) echo 'selected'; ?>>Activo</option>
			<option value= '1' <?php if($dato['estado']==1) echo 'selected'; ?>>Inactivo</option>
			</SELECT></td>
			</tr>			
			<br><br><br><br>
			</table>
			
		</br>
		<input type='reset' id='limpiar' name='limpiar' value='limpiar'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type='submit' id='grabar' name='grabar' value='Grabar'>		
		</form>
		<br><br></center>

			
	


<html><center><a href='clientes.php'><img src="img/regresar.jpg"></a></center><html>                     