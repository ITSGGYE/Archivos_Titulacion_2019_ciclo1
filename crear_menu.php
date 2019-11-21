<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="css/tablas1.css">
	<body background="img/fondo2.png">
</head>
<body>
</body>
</html>
<?php
	$x_codigo=0;
	if($_REQUEST)
	$x_codigo = $_REQUEST['codigo'];
	include('conexion.php');

	$sql = "select * from clientes where id_cliente = '".$x_codigo."'";
	$registro = mysqli_query($conexion,$sql);
	$dato = mysqli_fetch_array($registro);	

	$presentar = "
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <center><a href='main.php' ><img src='img/inicio.png' alt='Inicio'></a>

		           
		<h1 style='color: #58ACFA;'' align='center'><strong>Crear Menú de Comida</strong></h1><br>
		
		<form  method='POST' action='grabar_menu.php'>
		<center><table style='margin: 0 auto;' style='text-align: center;'>

			<tr>			
			<td><b>Tipo de Platillo: <SELECT id='f_plato' name='f_plato'>
			<option value= 'Sopa'>Sopa</option>			
			<option value= 'Carta'>Plato a la Carta</option>
			<option value= 'Bebidas'>Bebida</option>
			<option value= 'Postre'>Postre</option> 
			</SELECT>
			<br><br>
			Descripción: <input type='text' id='f_nombreplato' name='f_nombreplato' required>
			</td>

			</table><center>
			</tr>
			<br><br> 
		<input type='reset' id='limpiar' name='limpiar' value='limpiar'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type='submit' id='grabar' name='grabar' value='Grabar'>
		<br><br></center>

		
			
			</br>
		</form>
 
			
	";

	echo $presentar;

?>
<html><center><a href='main.php'><img src="img/regresar.jpg"></a></center><html>                     