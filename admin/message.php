<?php
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
				<li>Bienvenido (a):&nbsp;&nbsp;&nbsp;<a><i class="icon-user icon-white"></i><?php echo $fetch['username']; ?></a></li>
			</ul>
	</div>

	<br>

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
			<div class="alert alert-info"><center><h2>Mensajes</h2></center></div>
			<br />
				
			<br />

		<div class="alert alert-info">
			<table class="table table-hover">
				<thead>
				<tr style="font-size:20px;">
					<th>Email</th>
					<th>Mensajes</th>
				</tr>
				</thead>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM `contact`") or die(mysqli_error($conn));
					while($fetch = mysqli_fetch_array($query))
						{
				?>
				<tr>
					<td><?php echo $fetch['email'];?></td>
					<td><?php echo $fetch['message']?></td>
                                        <td><a href="delete_message.php?id=<?php echo $fetch['contact_id'];?>">Eliminar</a></td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>

	</div>

</body>
</html>
