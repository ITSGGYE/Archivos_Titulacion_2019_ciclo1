<?php
	ob_start();
	include("./session.php");
	include("../db/dbconn.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>La Bodeguita</title>
	<link rel = "stylesheet" type = "text/css" href="../css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script src="../js/bootstrap.js"></script>
	<script src="../js/jquery-1.7.2.min.js"></script>
	<script src="../js/carousel.js"></script>
	<script src="../js/button.js"></script>
	<script src="../js/dropdown.js"></script>
	<script src="../js/tab.js"></script>
	<script src="../js/tooltip.js"></script>
	<script src="../js/popover.js"></script>
	<script src="../js/collapse.js"></script>
	<script src="../js/modal.js"></script>
	<script src="../js/scrollspy.js"></script>
	<script src="../js/alert.js"></script>
	<script src="../js/transition.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../jscript/jquery-1.9.1.js" type="text/javascript"></script>

		<link href="../facefiles/facebox.css" media="screen" rel="stylesheet" type="text/css" />
		<script src="../facefiles/jquery-1.9.js" type="text/javascript"></script>
		<script src="../facefiles/jquery-1.2.2.pack.js" type="text/javascript"></script>
		<script src="../facefiles/facebox.js" type="text/javascript"></script>
		<script type="text/javascript">
		jQuery(document).ready(function($) {
		$('a[rel*=facebox]').facebox()
		})
		</script>

</head>
<body>
	<div id="header" style="position:fixed;">
		<img src="../img/logo.jpg">
		<label>Sistema de Ventas Online La Bodeguita</label>

			<?php
				$id = (int) $_SESSION['id'];

					$query = mysqli_query ($conn, "SELECT * FROM admin WHERE adminid = '$id' ") or die (mysqli_error());
					$fetch = mysqli_fetch_array ($query);
			?>

			<ul>
				<li><a href="../function/admin_logout.php"><i class="icon-off icon-white"></i>cerrar sesión</a></li>
				<li>Bienvenido (a):&nbsp;&nbsp;&nbsp;<i class="icon-user icon-white"></i><?php echo $fetch['username']; ?></a></li>
			</ul>
	</div>

	<br>

		<a href="#add" role="button" class="btn btn-info" data-toggle="modal" style="position:absolute;margin-left:222px; margin-top:140px; z-index:-1000;"><i class="icon-plus-sign icon-white"></i>Agregar producto</a>
		<div id="add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:400px;">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
				<h3 id="myModalLabel">Agregar producto...</h3>
			</div>
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data">
					<center>
						<table>
							<tr>
								<td><input type="file" name="product_image" required></td>
							</tr>
							<?php include("random_id.php");
							echo '<tr>
								<td><input type="hidden" name="product_code" value="'.$code.'" required></td>
							<tr/>';
							?>
							<tr>
								<td><input type="text" name="product_name" placeholder="Nombre del Producto" style="width:250px;" required></td>
							<tr/>
							<tr>
								<td><input type="text" name="product_price" placeholder="Precio" style="width:250px;" required></td>
							</tr>
							<tr>
								<td><input type="text" name="brand" placeholder="Nombre de la marca" style="width:250px;" required></td>
							</tr>
							<tr>
								<td><input type="number" name="qty" placeholder="Productos disponibles" style="width:250px;" required></td>
							</tr>
							<tr>
								<td><input type="hidden" name="category" value="Snacks"></td>
							</tr>
						</table>
					</center>
				</div>
			<div class="modal-footer">
				<input class="btn btn-primary" type="submit" name="add" value="Añadir">
				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrrar</button>
					</form>
			</div>
		</div>

		<?php
			if (isset($_POST['add']))
				{
					$product_code = $_POST['product_code'];
					$product_name = $_POST['product_name'];
					$product_price = $_POST['product_price'];
					$brand = $_POST['brand'];
					$category = $_POST['category'];
					$qty = $_POST['qty'];
					$code = rand(0,98987787866533499);

								$name = $code.$_FILES["product_image"] ["name"];
								$type = $_FILES["product_image"] ["type"];
								$size = $_FILES["product_image"] ["size"];
								$temp = $_FILES["product_image"] ["tmp_name"];
								$error = $_FILES["product_image"] ["error"];

								if ($error > 0){
									die("¡Error al subir el archivo! Code $error.");}
								else
								{
									if($size > 30000000000) //conditions for the file
									{
										die("¡El formato no está permitido o el tamaño del archivo es demasiado grande!");
									}
									else
									{
										move_uploaded_file($temp,"/var/www/html/photo/".$name);

				$q1 = mysqli_query($conn, "INSERT INTO product ( product_id,product_name, product_price, product_image, brand, category)
				VALUES ('$product_code','$product_name','$product_price','$name', '$brand', '$category')");

				$q2 = mysqli_query($conn,"INSERT INTO stock ( product_id, qty) VALUES ('$product_code','$qty')");

				header ("location:admin_football.php");
			}}
		}

				?>

	<div id="leftnav">
		<ul>
			<li><a href="admin_home.php">Productos</a>
				<ul>
					<li><a href="admin_ofertas.php "style="font-size:15px; margin-left:15px;">Ofertas</a></li>
					<li><a href="admin_bebidas.php "style="font-size:15px; margin-left:15px;">Bebidas</a></li>
                    <li><a href="admin_snack.php" style="font-size:15px; margin-left:15px;">Snacks</a></li>
                    <li><a href="admin_cigarrillos.php"style="font-size:15px; margin-left:15px;">Cigarrillos y Caramelos</a></li>
				</ul>
			</li>
			<li><a href="transaction.php">Transacciones</a></li>
			<li><a href="customer.php">Clientes</a></li>
			<li><a href="message.php">Mensajes</a></li>
			<li><a href="transaction1.php">Pedidos</a></li>
		</ul>
	</div>

	<div id="rightcontent" style="position:absolute; top:10%;">
			<div class="alert alert-info"><center><h2>Snacks</h2></center></div>
			<br />
                        
			<br />

			<div class="alert alert-info">
			<table class="table table-hover" style="background-color:">
				<thead>
				<tr style="font-size:20px;">
					<th>Imagen del producto</th>
					<th>Nombre del producto</th>
					<th>Precio del producto</th>
					<th>Productos disponibles</th>
					<th>Acción</th>
				</tr>
				</thead>
				<tbody>
				<?php

					$query = mysqli_query($conn, "SELECT * FROM `product` WHERE category='Snacks' ORDER BY product_id DESC") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query))
						{
						$id = $fetch['product_id'];
				?>
				<tr class="del<?php echo $id?>">
					<td><img class="img-polaroid" src = "../photo/<?php echo $fetch['product_image']?>" height = "70px" width = "80px"></td>
					<td><?php echo $fetch['product_name']?></td>
					<td><?php echo $fetch['product_price']?></td>

					<?php
					$query1 = mysqli_query($conn, "SELECT * FROM `stock` WHERE product_id='$id'") or die(mysqli_error());
					$fetch1 = mysqli_fetch_array($query1);

						$qty = $fetch1['qty'];
					?>

					<td><?php echo $fetch1['qty']?></td>
					<td style="width:220px;">
					<?php
					echo "<a href='stockin.php?id=".$id."' class='btn btn-success' rel='facebox'><i class='icon-plus-sign icon-white'></i> En Stock</a> ";
					echo "<a href='stockout.php?id=".$id."' class='btn btn-danger' rel='facebox'><i class='icon-minus-sign icon-white'></i> Stock agotado</a>";
					?>
					</td>
				</tr>
				<?php
					}
				?>
				</tbody>
			</table>
			</div>

  <?php
  /* stock in */
  if(isset($_POST['stockin'])){

  $pid = $_POST['pid'];

 $result = mysqli_query($conn, "SELECT * FROM `stock` WHERE product_id='$pid'") or die(mysqli_error());
 $row = mysqli_fetch_array($result);

  $old_stck = $row['qty'];
  $new_stck = $_POST['new_stck'];
  $total = $old_stck + $new_stck;

  $que = mysqli_query($conn,"UPDATE `stock` SET `qty` = '$total' WHERE `product_id`='$pid'") or die(mysqli_error());

  header("Location:admin_snack.php");
 }

  /* stock out */
 if(isset($_POST['stockout'])){

  $pid = $_POST['pid'];

 $result = mysqli_query($conn, "SELECT * FROM `stock` WHERE product_id='$pid'") or die(mysqli_error());
 $row = mysqli_fetch_array($result);

  $old_stck = $row['qty'];
  $new_stck = $_POST['new_stck'];
  $total = $old_stck - $new_stck;

  $que = mysqli_query($conn, "UPDATE `stock` SET `qty` = '$total' WHERE `product_id`='$pid'") or die(mysqli_error());

  header("Location:admin_snack.php");
 }
  ?>
                        
</body>
</html>
<script type="text/javascript">
	$(document).ready( function() {

		$('.remove').click( function() {

		var id = $(this).attr("id");


		if(confirm("¿Estás seguro de que deseas eliminar este producto?")){

			$.ajax({
			type: "POST",
			url: "../function/remove.php",
			data: ({id: id}),
			cache: false,
			success: function(html){
			$(".del"+id).fadeOut('slow', function(){ $(this).remove();});
			}
			});
			}else{
			return false;}
		});
	});

</script>
