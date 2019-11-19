<?php
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$paypal_id='yhannaki@gmail.com'; // Business email ID
?>
<?php
	include("function/session.php");
	include("db/dbconn.php");
?>
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
				<li>Bienvenido (a):&nbsp;&nbsp;&nbsp;<a href="#Perfil"  data-toggle="modal"><i class="icon-user icon-white"></i><?php echo $fetch['primer_nombre']; ?>&nbsp;<?php echo $fetch['apellido'];?></a></li>
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
									<td class="Perfil">Número de teléfono móvil:</td><td class="Perfil"><?php echo $fetch['movil'];?></td>
								</tr>
								<tr>
									<td class="Perfil">Número de teléfono:</td><td class="Perfil"><?php echo $fetch['telefono'];?></td>
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
				<li><a href="home.php">  <i class="icon-home"></i>Inicio</a></li>
				<li><a href="Bebidas1.php">  <i class="icon-th-list"></i>Productos</a></li>
				<li><a href="aboutus1.php">  <i class="icon-bookmark"></i>Acerca de Nosotros</a></li>
				<li><a href="contactus1.php"><i class="icon-inbox"></i>Contacto</a></li>
				<li><a href="faqs1.php"><i class="icon-question-sign"></i>Preguntas frecuentes</a></li>
			</ul>
	</div>

	<form method="post" class="well"  style="background-color:#fff; overflow:hidden;">
	<table class="table" style="width:50%;">
	<label style="font-size:25px;">Resumen de pedido(s)</label>
		<tr>
			<th><h5>Cantidad</h5></td>
			<th><h5>Nombre del producto</h5></td>
			<th><h5>Precio</h5></td>
		</tr>

		<?php
		$t_id = $_GET['tid'];
		$query = mysqli_query($conn, "SELECT * FROM transaction WHERE transaction_id = '$t_id'") or die (mysqli_error());
		$fetch = mysqli_fetch_array($query);

		$amnt = $fetch['amount'];
		$t_id = $fetch['transaction_id'];

		$query2 = mysqli_query($conn, "SELECT * FROM transaction_detail LEFT JOIN product ON product.product_id = transaction_detail.product_id WHERE transaction_detail.transaction_id = '$t_id'") or die (mysqli_error());
		while($row = mysqli_fetch_array($query2)){

		echo $pname = $row['product_name'];
		echo $pprice = $row['product_price'];
		echo $oqty = $row['order_qty'];

		echo "<tr>";
		echo "<td>".$oqty."</td>";
		echo "<td>".$pname."</td>";
		echo "<td>".$pprice."</td>";
		echo "</tr>";
		}
		?>

	</table>
	<legend></legend>
	<h4>TOTAL: $ <?php echo $amnt; ?></h4>
	</form>
<!--	<div class='pull-right'>
<div class="">
    <form action="<?php echo $paypal_url ?>" method="post" >
    <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="Alphaware Shoes">
    <input type="hidden" name="item_number" value="<?php echo $t_id; ?>">
    <input type="hidden" name="credits" value="510">
    <input type="hidden" name="userid" value="1">
    <input type="hidden" name="amount" value="<?php echo $amnt; ?>">
    <input type="hidden" name="cpp_header_image" value="http://www.phpgang.com/wp-content/uploads/gang.jpg">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="PHP">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="cancel_return" value="function/cancel.php">
    <input type="hidden" name="return" value="function/success.php">
    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="enviar" alt="PayPal la forma más segura y fácil de pagar en línea!">
    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>
</div>
</div>-->
<!--<form class="" action="confirmar.php" method="post">
	<label for="">DIRECCION DE ENVIO</label>
	<input type="text" name="" value="">

</form>-->
<td><a class='btn btn-danger btn-sm pull-right' href='cart.php?id=".$id."&action=empty'><i class='fa fa-trash-o'></i> Continuar</a></td>
		<div id="purchase" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Modo de pago</h3>
			</div>
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
						<a href="https://www.facebook.com/BodeguitaOficial/"><li><img src="./facebook.png" width="20px" alt="">&nbsp;&nbsp;&nbsp;Facebook</li></a><br>
						<a href="https://www.instagram.com/bodeguitaoficial/"><li><img src="./instagram.png" width="20px" alt="">&nbsp;&nbsp;&nbsp;Instagram</li></a>
					</ul>
			</div>
	</div>
</body>
</html>
