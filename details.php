<?php
	include("function/session.php");
	include("db/dbconn.php");
	include("function/cash.php");

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
				$id = (int) $_SESSION['id_customer'];

					$query = mysqli_query ($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error($conn));
					$fetch = mysqli_fetch_array ($query);
			?>

			<ul>
				<li><a href="function/logout.php"><i class="icon-off icon-white"></i>cerrar sesión</a></li>
				<li>Bienvenido (a):&nbsp;&nbsp;&nbsp;<a href="#Perfil" href  data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $fetch['primer_nombre']; ?>&nbsp;<?php echo $fetch['apellido'];?></a></li>
			</ul>
	</div>

	<div id="Perfil" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:700px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h3 id="myModalLabel">Mi cuenta</h3>
				</div>
					<div class="modal-body">
						<?php
							$id = (int) $_SESSION['id_customer'];

								$query = mysqli_query ($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error($conn));
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
				<li><a href="home.php"><i class="icon-home"></i>Inicio</a></li>
				<li><a href="Bebidas1.php"><i class="icon-th-list"></i>Productos</a>
				<li><a href="aboutus1.php"><i class="icon-bookmark"></i>Acerca de Nosotros</a></li>
				<li><a href="contactus1.php"><i class="icon-inbox"></i>Contacto</a></li>
				<li><a href="faqs1.php"><i class="icon-question-sign"></i>Preguntas frecuentes</a></li>
			</ul>
	</div>
		<?php
			if(isset($_GET['id'])){
			$id = $_GET['id'];
			$query = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$id' ");
			$row = mysqli_fetch_array($query);
		?>
				<div>
					<center>
						<img class="img-polaroid" style="width:400px; height:350px;" src="photo/<?php echo $row['product_image']; ?>">
						<h2 class="text-uppercase bg-primary"><?php echo $row['product_name']?></h2>
						<h3 class="text-uppercase">Precio $ <?php echo $row['product_price']?></h3>
						<?php echo "<a href='cart.php?id=".$id."&action=add'><input type='submit' class='btn btn-inverse' name='Añadir' value='Añadir al carrito'></a> &nbsp;  <a href='product1.php'><button class='btn btn-inverse'>Atras</button></a> " ?>
					</center>
				</div>
		<?php }?>

		<div id="purchase" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Modo de pago</h3>
			</div>
				<div class="modal-body">
					<form method="post">
					<center>
						<input type="hidden" name="product_price" value="<?php echo $row['product_price']?>">
						<input type="hidden" name="product_name" value="<?php echo $row['product_name']?>">
						<input type="hidden" value="<?php echo $fetch['primer_nombre'];?>&nbsp;<?php echo $fetch['apellido'];?>" name="customer">
						<textarea name="destino" placeholder="Destino" style="height:100px; width:250px;" required></textarea>
						<select name="size" required style="width:150px;">
							<option value="">---------Peso neto----------</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
						<br />
						<h4>Total: $ <?php echo $row['product_price']; ?> </h4>
						<br />
						<input type="checkbox" required> Estoy de acuerdo <a href="#terms" data-toggle="modal"> Terminos y Condicones</a> La Bodeguita.ec
					</center>
				</div>
			<div class="modal-footer">
				<center>
					<input type="image" src="images/button.jpg" border="0" name="paypal" alt="Make payments with PayPal - it's fast, free and secure!"  />
					<input type="submit" name="efectivo" value="Efectivo" class="btn btn-lg">
				</center>
					<button class="btn btn-danger btn-mini" data-dismiss="modal" aria-hidden="true">Cancelar</button>
					</form>
			</div>
		</div>

		<div id="terms" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">La Bodeguita.ec Terminos y Condicones</h3>
			</div>
				<div class="modal-body">
					<ul>
						<li>Le garantizamos que su pedido será procesado apenas usted realice la compra para luego ser enviado a su domicilio.</li>
						<li>El tiempo garantizado puede tardar dependiendo del trafico que pueda existir.</li>
						<li>Todos los precios indicados son en dolares estadounidenses. La información sobre los precios y disponibilidad está sujeta a cambios.</li>
						<li>El modo de pago es el siguiente: los clientes deben cancelar el pedido cuando lleguen a su destino.</li>
					</ul>
				</div>
			<div class="modal-footer">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
			</div>
		</div>

</div>
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
						<a href="https://www.facebook.com/BodeguitaOficial/"><li><img src="./facebook.png" width="20px" alt="">&nbsp;&nbsp;&nbsp;Facebook</li></a><br>
						<a href="https://www.instagram.com/bodeguitaoficial/"><li><img src="./instagram.png" width="20px" alt="">&nbsp;&nbsp;&nbsp;Instagram</li></a>					</ul>
			</div>
	</div>
</body>
</html>
