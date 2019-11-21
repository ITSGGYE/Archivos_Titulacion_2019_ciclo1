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

	$sql = "select * from clientes where id_cliente='".$x_codigo."'";
	$registro = mysqli_query($conexion,$sql);
	$dato = mysqli_fetch_array($registro);	
	$sql1 = "select * from menu where tipo = 'Sopa'";
	$registro1 = mysqli_query($conexion,$sql1);
	$dato1 = mysqli_fetch_array($registro1);	
	$sql2 = "select * from menu where tipo = 'Carta'";
	$registro2 = mysqli_query($conexion,$sql2);
	$dato2 = mysqli_fetch_array($registro2);	
	$sql3 = "select * from menu where tipo = 'Bebidas'";
	$registro3 = mysqli_query($conexion,$sql3);
	$dato3 = mysqli_fetch_array($registro3);	
	$sql4 = "select * from menu where tipo = 'Postre'";
	$registro4 = mysqli_query($conexion,$sql4);
	$dato4 = mysqli_fetch_array($registro4);	

?>
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <center><a href='index.php' ><img src='img/inicio.png' alt='Inicio'></a>

		           
		<h1 style='color: #58ACFA;' align='center'><strong>Crear Pedido</strong></h1><br>
		
		<form  method='POST' action='grabar_pedido.php'>
		<center><table style='margin: 0 auto;' style='text-align: center;'>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Nombre:</th> 
			<td><input readonly='readonly' type='text' id='f_nombrecliente' name='f_nombrecliente' value= "<?php echo $dato['nombres']; ?>" ></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Apellido:</th> 
			<td><input readonly='readonly' type='text' id='f_apellidocliente' name='f_apellidocliente' value= "<?php echo $dato['apellidos']; ?>" ></td>
			</tr>
			
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>Cédula/Ruc:</th>
			<td><input readonly='readonly' type='number' id='f_cedulacliente' name='f_cedulacliente' value= "<?php echo $dato['cedula']; ?>" ></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>
			Sopas:</th> 
			<td><SELECT id='f_sopa' name='f_sopa' required='required'>
			<?php
			do{
			echo "<option value='".$dato1['descripcion']."'>".$dato1['descripcion']."</option>";
			} while ($dato1=mysqli_fetch_array($registro1));
			?>
			</SELECT></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>
			Plato a la Carta:</th> 
			<td><SELECT id='f_plato' name='f_plato' required='required'>
			<?php
			do{
			echo "<option value='".$dato2['descripcion']."'>".$dato2['descripcion']."</option>";
			} while ($dato2=mysqli_fetch_array($registro2));
			?>
			</SELECT></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>
			Bebidas:</th> 
			<td><SELECT id='f_jugo' name='f_jugo' required='required'>
			<?php
			do{
			echo "<option value='".$dato3['descripcion']."'>".$dato3['descripcion']."</option>";
			} while ($dato3=mysqli_fetch_array($registro3));
			?>
			</SELECT></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>
			Postres:</th> 
			<td><SELECT id='f_postre' name='f_postre' required='required'>
			<?php
			do{
			echo "<option value='".$dato4['descripcion']."'>".$dato4['descripcion']."</option>";
			} while ($dato4=mysqli_fetch_array($registro4));
			?>
			</SELECT></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>
			Estado de la Orden:</th> 
			<td><SELECT id='f_status' name='f_status' value=".$dato['status']." >
			<option value= 'P'>Pendiente</option>
			<option value= 'D'>Despachado</option>
			<option value= 'E'>Eliminado</option>
			</SELECT></td>
			</tr>
			<tr>
			<th style='color: #424242;' style='text-align: center;' colspan='2' align='auto' valign='middle'>
			Despacho:</th> 
			<td><SELECT id='f_mesa' name='f_mesa' value=".$dato['mesa'].">
			<option value= 'Bodega'>Bodega</option>
			<option value= 'Ventas'>Ventas</option>
			<option value= 'Administracion'>Administracion</option>
			<option value= 'Corte'>Corte</option>
			<option value= 'Confeccion'>Confeccion</option>
			</SELECT></td>
			</tr>
			</table><center>
			<br><br> 
		<input type='reset' id='limpiar' name='limpiar' value='limpiar'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type='submit' id='grabar' name='grabar' value='Grabar'>
		<br><br></center>

		
			
			</br>
		</form>
  
 
<html><center><a href='clientes.php'><img src="img/regresar.jpg"></a></center><html>                     