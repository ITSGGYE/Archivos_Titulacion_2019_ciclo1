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
</br>
</br>
</body>
</html>
<?php


	$x_idpedido = $_REQUEST['codigo'];
	include('conexion.php');

	$sql = "select * from pedidos where id_pedido = '$x_idpedido'";
	$registro = mysqli_query($conexion,$sql);
	$dato = mysqli_fetch_array($registro);	

	$presentar = "
		
		<h1 style='color: #58ACFA;'' align='center'><strong>Modificar Pedido</strong></h1>
		
		<form  method='POST' action='update_orden.php'>
		<center><table style='margin: 0 auto;' style='text-align: center;'>

			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'> ID :</th> 
			<td><input type='text' id='f_idpedido' name='f_idpedido' value= '".$dato['id_pedido']."''></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'> Nombre :</th> 
			<td><input type='text' id='f_nombre' name='f_nombre' value= '".$dato['nombres']."'' readonly></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Apellidos:</th> 
			<td><input type='text' id='f_apellido' name='f_apellido' value= '".$dato['apellidos']."'' readonly></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Cédula:</th> 
			<td><input type='number' id='f_cedula' name='f_cedula' value= '".$dato['cedula']."'' readonly></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Sopa:</th> 
			<td><input type='text' id='f_sopa' name='f_sopa' value= '".$dato['sopa']."'' readonly></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Plato a la Carta:</th> 
			<td><input type='text' id='f_plato' name='f_plato' value= '".$dato['plato']."'' readonly></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Jugo / Bebida:</th> 
			<td><input type='text' id='f_jugo' name='f_jugo' value= '".$dato['jugo']."'' readonly></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Postre</th> 
			<td><input type='text' id='f_postre' name='f_postre' value= '".$dato['postre']."'' readonly></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Estado de Orden:</th> 
			<td><SELECT id='f_status' name='f_status' size= 1>";
						
			if($dato['status']=="P") { $presentar=$presentar."<option value= 'P' selected='selected' >Pendiente</option>"; } 
			else $presentar=$presentar."<option value= 'P'>Pendiente</option>";
			if($dato['status']=="D") { $presentar=$presentar."<option value= 'D' selected='selected' >Despachado</option>"; } 
			else $presentar=$presentar."<option value= 'D'>Despachado</option>";
			if($dato['status']=="E") { $presentar=$presentar."<option value= 'E' selected='selected' >Eliminado</option>"; } 
			else $presentar=$presentar."<option value= 'E'>Eliminado</option>";

			$presentar=$presentar."</SELECT></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Despacho:</th> 
			<td><input type='text' id='f_mesa' name='f_mesa' value= '".$dato['mesa']."''></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Fecha:</th> 
			<td><input type='text' id='f_fecha' name='f_fecha' value= '".$dato['fecha']."''></td>
			</tr>
			</tr><br><br><br><br>
			</table>
			
		</form>
		</br>
<input type='submit' id='grabar' name='grabar' value='Grabar'>
		<br><br></center>";
 
	echo $presentar;

?>
<html><center><a href="ordenes.php"><img src="img/regresar.jpg"></a></center><html>
