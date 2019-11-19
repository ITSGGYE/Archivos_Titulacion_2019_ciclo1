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
	<script src="../javascripts/filter.js" type="text/javascript" charset="utf-8"></script>


		<script type="text/javascript" src="../chart/chart.js"></script>

<script src="../chart/highcharts.js"></script>
<script src="../chart/exporting.js"></script>


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
		<ul id="ul_li">
			<li><a href="admin_home.php">Productos</a>
				<ul>
					<li><a id='#nav' href="admin_ofertas.php "style="font-size:15px; margin-left:15px; color:#ffffff;">Ofertas</a></li>
					<li><a id='#nav' href="admin_bebidas.php "style="font-size:15px; margin-left:15px;">Bebidas</a></li>
                    <li><a id='#nav' href="admin_snack.php" style="font-size:15px; margin-left:15px;">Snacks</a></li>
                    <li><a id='#nav' href="admin_cigarrillos.php"style="font-size:15px; margin-left:15px;">Cigarrillos y Caramelos</a></li>

				</ul>
			</li>
			<li><a href="transaction.php">Transacciones</a></li>
			<li><a href="customer.php">Clientes</a></li>
			<li><a href="message.php">Mensajes</a></li>
			<li><a href="transaction1.php">Pedidos</a></li>
		</ul>
	</div>
	<div id="rightcontent" style="position:absolute; top:10%;">

            <div id="container" style="  max-width: 100%; margin: 0; background:none; float:left; display: flex; justify-content: center;">
                
<div
    id="img"><img src="../img/logo.jpg">
</div>
            </div>



	</div>
        <style>
            .container{
                max-height: 80%;
            }
            #img{
            max-width: 100%;
            margin-left: 5%;
            display: flex;
            justify-content: center;
            max-height: 80%;
            
            
}
#img img{
    max-width: 80%;
    max-height: 80%;
}
body{
    max-height: 100%;
}
            </style>


</body>
</html>
