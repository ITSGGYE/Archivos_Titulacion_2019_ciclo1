<?php
	include("function/session.php");
	include("db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>La Bodeguita</title>
	<link rel="icon" href="img/logo.jpg" />
	<link rel = "stylesheet" type = "text/css" href="css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/carousel.js"></script>
	<script src="js/button.js"></script>
	<script src="js/dropdown.js"></script>
	<script src="js/tab.js"></script>
	<script src="js/tooltip.js"></script>
	<script src="js/popover.js"></script>
	<script src="js/collapse.js"></script>
	<script src="js/modal.js"></script>
	<script src="js/scrollspy.js"></script>
	<script src="js/alert.js"></script>
	<script src="js/transition.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div id="header">
		<img src="img/logo.jpg">
		<label>Sistema de Ventas Online La Bodeguita</label>

			<?php
				$id = (int) $_SESSION['id'];

					$query = mysqli_query ($conn,"SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error($conn));
					$fetch = mysqli_fetch_array ($query);

			?>

			<ul>
				<li><a href="#Regístrate"   data-toggle="modal">Regístrate</a></li>
				<li><a href="#Iniciar_sesión"   data-toggle="modal">Iniciar sesión</a></li>
			</ul>
	</div>

	<div id="Perfil" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Mi cuenta</h3>
				</div>
					<div class="modal-body">
						<?php
							$id = (int) $_SESSION['id'];

								$query = mysqli_query ($conn,"SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error($conn));
								$fetch = mysqli_fetch_array ($query);

						?>
						<center>
					<form method="post">
						<center>
							<table>
								<tr>
									<td class="Perfil">Nombre:</td><td class="Perfil"><?php echo $fetch['primer_nombre'];?>&nbsp;<?php echo $fetch['segundo_nombre'];?>&nbsp;<?php echo $fetch['apellido'];?></td>
								</tr>
								<tr>
									<td class="Perfil">Dirección:</td><td class="Perfil"><?php echo $fetch['direccion'];?></td>
								</tr>
								<tr>
									<td class="Perfil">País:</td><td class="Perfil"><?php echo $fetch['pais'];?></td>
								</tr>
								<tr>
									<td class="Perfil">Código postal:</td><td class="Perfil"><?php echo $fetch['codigo_postal'];?></td>
								</tr>
								<tr>
									<td class="Perfil">Número de Teléfono móvil:</td><td class="Perfil"><?php echo $fetch['movil'];?></td>
								</tr>
								<tr>
									<td class="Perfil">Número de Teléfono:</td><td class="Perfil"><?php echo $fetch['telefono'];?></td>
								</tr>
								<tr>
									<td class="Perfil">Email:</td><td class="Perfil"><?php echo $fetch['email'];?></td>
								</tr>
							</table>
						</center>
					</div>
				<div class="modal-footer">
					<a href="account.php?id=<?php echo $fetch['customerid']; ?>"><input type="button" class="btn btn-success" name="editar" value="Editar cuenta"></a>
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
				</div>
					</form>
			</div>

	<br>
<div id="container">
	<div class="nav">
			 <ul>
				<li><a href="home.php">   <i class="icon-home"></i>Inicio</a></li>
				<li><a href="Bebidas1.php">  <i class="icon-th-list"></i>Productos</a></li>
				<li><a href="aboutus1.php">   <i class="icon-bookmark"></i>Acerca de Nosotros</a></li>
				<li><a href="contactus1.php"><i class="icon-inbox"></i>Contacto</a></li>
				<li><a href="faqs1.php"><i class="icon-question-sign"></i>Preguntas frecuentes</a></li>
			</ul>
	</div>

	<form method="post" class="well" action="car2.php?action=view" style="background-color:#fff;">
	<table class="table">
	<label style="font-size:25px;">Mi carrito de compras</label>
		<tr>
			<th><h3>Imagen</h3></td>
			<th><h3>Nombre del producto</h3></th>
			<th><h3>Cantidad</h3></th>
			<th><h3>Precio</h3></th>
			<th><h3>Agregar</h3></th>
			<th><h3>Retirar</h3></th>
			<th><h3>Subtotal</h3></th>
		</tr>

<?php

	if (isset($_GET['id']))
	$id=$_GET['id'];
	else
	$id=1;
	if (isset($_GET['action']))
	$action=$_GET['action'];
	else
	$action="empty";

	switch($action)
	{

		case "view":
			if (isset($_SESSION['cart'][$id]))
			$_SESSION['cart'][$id];
		break;
		case "add":
			if (isset($_SESSION['cart'][$id]))
			$_SESSION['cart'][$id]++;
			else
			$_SESSION['cart'][$id]=1;
		break;
		case "remove":
			if (isset($_SESSION['cart'][$id]))
			{
				$_SESSION['cart'][$id]--;
				if ($_SESSION['cart'][$id]==0)
				unset($_SESSION['cart'][$id]);
			}
		break;
		case "empty":
			unset($_SESSION['cart']);
		break;
	}
if (isset($_SESSION['cart']))
	{

	$total=0;
	foreach($_SESSION['cart'] as $id => $x)
	{
	$result=mysqli_query($conn,"Select * from product where product_id=$id");
	$myrow=mysqli_fetch_array($result);
	$name=$myrow['product_name'];
	$name=substr($name,0,40);
	$price=$myrow['product_price'];
	$image=$myrow['product_image'];
	$line_cost=$price*$x;
	$total=$total+$line_cost;


		echo "<tr class='table'>";
		echo "<td><h4><img height='70px' width='70px' src='photo/".$image."'></h4></td>";
		echo "<td><h4><input type='hidden' required value='".$id."' name='pid[]'> ".$name."</h4></td>";
		echo "<td><h4><input type='hidden' required value='".$x."' name='qty[]'> ".$x."</h4></td>";
		echo "<td><h4>".$price."</h4></td>";
		echo "<td><h4><a href='cart.php?id=".$id."&action=add'><i class='icon-plus-sign'></i></a></td>";
		echo "<td><h4><a href='cart.php?id=".$id."&action=remove'><i class='icon-minus-sign'></i></a></td>";
		echo "<td><strong><h3>$ ".$line_cost."</h3></strong>";
		echo "</tr>";
		}

		echo"<tr>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td><h2>TOTAL:</h2></td>";
		echo "<td><strong><input type='hidden' value='".$total."' required name='total'><h2 class='text-danger'>$ ".$total."</h2></strong></td>";
		echo "<td></td>";
		echo "<td><a class='btn btn-danger btn-sm pull-right' href='cart.php?id=".$id."&action=empty'><i class='fa fa-trash-o'></i> Carrito vacio</a></td>";
		echo "</tr>";
	}
 	else
		echo "<font color='#111' class='alert alert-error' style='float:right'>El carrito esta vacío</font>";

?>
	</table>


	<div class='pull-right'>
	<a href='product.php' class='btn btn-inverse btn-lg'>Seguir comprando</a>
	<?php echo "<button name='pay_now' type='submit' class='btn btn-inverse btn-lg' >Finalizar compra</button>";
	include ("function/paypal.php");
	?>
	</form>
	</div>

		<div id="purchase" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
				<div class="modal-body">
					<form method="post">
					<center>
						<input type="image" src="images/button.jpg" border="0" name="enviar" alt="Make payments with PayPal - it's fast, free and secure!"  />
						<br/>
						<br/>
						<button class="btn btn-lg" >Efectivo</button>
					</center>
				</div>
			<div class="modal-footer">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
					</form>
			</div>
		</div>

		<br />
		<br />
</div>
<br />
	<div id="footer">
		<div class="foot">
			<label style="font-size:17px;"> Copyright &copy; </label>
			<p style="font-size:25px;">La Bodeguita <?php echo $YEAR = date('Y');?></p>
		</div>

			<div id="foot">
				<h4>Enlaces con redes sociales</h4>
					<ul>
						<a href="https://www.facebook.com/BodeguitaOficial/"><li>Facebook</li></a>
						<a href="https://www.instagram.com/bodeguitaoficial/"><li>Instagram</li></a>
					</ul>
			</div>

	</div>
</body>
</html>
