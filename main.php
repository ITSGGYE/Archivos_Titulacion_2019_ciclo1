<?php  session_start();
$tipo=$_SESSION["tipo"];
 ?>
<!DOCTYPE html>
<html> 
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
			<body background="img/fondo2.png">		
		</head>

	</style>         

<body>
<br>
<br>

<center>
<h2><FONT FACE="arial" SIZE=6 style="color:#33C4FF">Bienvenido al <br><img src="img/fondo1.png" width="30%"></FONT></h2></center>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a></td></right>
<br>
	<center><nav class="main-nav">
		
			<table align="center" style="border:groove; color:#33C4FF">
			<?php if($tipo==1) { ?>
			<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><center><a href="crear_menu.php"> <img src='img/asignarcurso.png' width="100px" height="100px"><br><h2> Crear Menú</h2></a></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

			<td><center><a href="crear_usuario.html"> <img src='img/clientesregistrados.png' width="100px" height="100px"><br><h2> Nuevo Usuario</h2></a></td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><center><a href="usuarios.php"> <img src='img/clientesregistrados.png' width="100px" height="100px"><br><h2> Usuarios Registrados</h2></a></td>	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr> <?php } ?>
			
			<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><center><a href="ordenes.php"> <img src='img/ordenes.png' width="100px" height="100px"><br><h2> Pedidos</h2></a>   </td> 
 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><center><a href="crear_cliente.html"> <img src='img/adicionarcliente.png' width="100px" height="100px"><br><h2> Nuevo Cliente</h2></a></td> 
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			
			<td><center><a href="clientes.php"> <img src='img/adicionarcliente.png' width="100px" height="100px"><br><h2> Clientes Registrados</h2></a></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			</tr>

			</table>
<br><br>

</body>
</html>
<html><center><a href='index.php'><img width="60px" src="img/cerrarsesion.jpg"></a></center><html>                     