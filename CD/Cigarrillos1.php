<?php
	include("function/session.php");
	include("db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>La Bodeguita</title>
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

					$query = mysqli_query ($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
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
							$id = (int) $_SESSION['id'];

								$query = mysqli_query ($conn, "SELECT * FROM customer WHERE customerid = '$id' ") or die (mysqli_error());
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

		<div class="nav1">
			<ul>
				<li><a href="Bebidas1.php">Bebidas</a></li>
				<li>|</li>
				<li><a href="Snacks1.php">Snacks</a></li>
				<li>|</li>
				<li><a href="Cigarrillos1.php" class="active" style="color:#111;">Cigarrillos y Caramelos</a></li>
			</ul>
				<a href="cart.php"><button class="btn btn-inverse" style="right:1%; position:fixed; top:10%;"><i class="icon-shopping-cart icon-white"></i> Ver carrito</button></a>
		</div>

	<div id="content">
		<br />
		<br />
		<div id="product">

			<?php

				$query = mysqli_query($conn, "SELECT *FROM product WHERE category='Cigarrillos y Caramelos' ORDER BY product_id DESC") or die (mysqli_error());

					while($fetch = mysqli_fetch_array($query))
						{

						$pid = $fetch['product_id'];

						$query1 = mysqli_query($conn, "SELECT * FROM stock WHERE product_id = '$pid'") or die (mysqli_error());
						$rows = mysqli_fetch_array($query1);

						$qty = $rows['qty'];
						if($qty <= 5){

						}else{
							echo "<div class='float'>";
							echo "<center>";
							echo "<a href='details.php?id=".$fetch['product_id']."'><img class='img-polaroid' src='photo/".$fetch['product_image']."' height = '300px' width = '300px'></a>";
							echo "".$fetch['product_name']."";
							echo "<br />";
							echo "$".$fetch['product_price']."";
							echo "<br />";
							echo "</center>";
							echo "</div>";
						}

						}
			?>
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
					</ul>
			</div>
	</div>
</body>
</html>
