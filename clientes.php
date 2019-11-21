<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/tablas1.css">

		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
			<body background="img/fondo2.png">
		</head>
	
<style type="text/css" media="screen">
#sidebar,#menu{display:none;}
#page{width:99%;}
#content{width:99%;}

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
</body>
</html>
<?php
	include("conexion.php");


	$presentar = " 
	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<center> <a href='main.php' ><img src='img/inicio.png' alt='Inicio'></center></a><br>
	          
			<h1 style='color: #0080FF;'' align='center'><strong>Clientes Registrados </strong></h1><br>
			<div id='main-container'><center><table border='1' align = 'center' bgcolor='#ffffff' style='opacity: 0.9'>
				<tr id='cabecera' align='center'><thead>
					<th style='color: #0000FF;'>Cédula</th>
					<th style='color: #0000FF;'>Nombre</th>
					<th style='color: #0000FF;'>Apellido</th>
					<th style='color: #0000FF;'>Ingresar Pedido</th>
					<th style='color: #0000FF;'>Modificar Cliente</th>
				</thead></tr><center>
			";
 	$resultado = mysqli_query($conexion,"select * from clientes;");
	$data=mysqli_fetch_array($resultado);
	do{
		$presentar = $presentar.
					"
					<tr align='center'>
						<td>".$data['cedula']."</td>
						<td>".$data['nombres']."</td>
						<td>".$data['apellidos']."</td>
						<td> <center> <a href='crear_pedido.php?codigo=".$data['id_cliente']."'> <img src='img/orden.png'> </a> </center> </td>
						<td> <center> <a href='modificar_cliente.php?codigo=".$data['id_cliente']."'> <img src='img/adicionarcliente.png' width='50px'> </a> </center> </td>
					</tr>
					";
	}
	while ($data=mysqli_fetch_array($resultado) ) ;
	$presentar=$presentar."
			</div></table>
			<br>
			<br><br>
	";

	echo $presentar;
?>
<html><center><a href='main.php'><img src="img/regresar.jpg"></a></center><html>                     