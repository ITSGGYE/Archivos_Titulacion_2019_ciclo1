<body>
<div class="contenedor-modal">
		<a href="#" class="fa fa-close btn-cerrar-modal" id="btn-cerrar-modal"></a>
	</div>

	<div class="contenedor-modal-responsive">
		<a href="#" class="fa fa-close btn-cerrar-modal-responsive" id="btn-cerrar-modal-responsive"></a>
	</div>

	<header class="header">
		<div class="contenedor-header">
			<div class="primer-conjunto">
				<div class="logo-title">
					<a href="../Usuario/index.php"><img src="../../Usuario/imagen/Evelin_Naula_logo.png" alt="Formando La Web"/></a>
				</div>
				</div>
			<div class="segundo-conjunto menu-normal">
				<div class="contenedor-menu">
					<ul class="menu">
						<li><a href="#" class="btn-productos" id="btn-productos"><i class="fa fa-user-circle"></i><strong>Bienvenido<b><?php echo $_SESSION['user_name']['firstname']?></b></strong><i class="fa fa-chevron-down"></i></a></li>
						<li><a href="../../Usuario/contact.php"><i class="fa fa-envelope"></i> Contacto</a></li>
						<li><a href="../../Usuario/producto.php"><i class="fa fa-tags"></i> Productos</a></li>
						<li><a href="../../Usuario/Quienes_Somos.php"><i class="fa fa-map-marker">Ubicaci&oacute;n</i></a></li>
						<li><a href="../../Usuario/Quienes_Somos.php"><i class="fa fa-info-circle">Te Ofrece</i></a></li>
						<li><a href="../../Usuario/Quienes_Somos.php"><i class="fa fa-building">Empresa</i></a></li>
						<li><a href="../../Usuario/index.php"><i class="fa fa-home"></i> Inicio</a></li>
					</ul>
				</div>
			</div>
			<div class="contenedor-submenus">
				<div class="contenedor-submenu-productos" id="contenedor-submenu-productos">
					<a href="../../../Editar.php"><i class="fa fa-user-circle">Editar Perfil</i></a>
					<a href="../../salir.php"><i class="fa fa-power-off">Salir</i></a>
				</div>
			</div>
			<div class="contenedor-sidebar-responsive">
				<div class="contenedor-btn-menu">
					<a href="#" class="btn-menu" id="btn-menu"><i class="fa fa-bars"></i></a>
				</div>
				<div class="contenedor-menu-responsive">
					<ul class="menu-responsive">
						<li><a href="../Usuario/index.php"><i class="fa fa-home"></i> Inicio</a></li>
						<li><a href="../Usuario/Quienes_Somos.php" class="btn-quienes-somos-responsive" id="btn-quienes-somos-responsive"><i class="fa fa-address-book"></i> Quienes Somos <i class="fa fa-chevron-down"></i></a></li>
						<li><a href="../Usuario/producto.php"><i class="fa fa-tags"></i> Productos</a></li>
						<li><a href="../Usuario/contact.php"><i class="fa fa-envelope"></i> Contacto</a></li>
						<li><a href="#" class="btn-productos-responsive" id="btn-productos-responsive"><i class="fa fa-user-circle"></i>Bienvenido<?php echo $_SESSION['user_name']['firstname']?><i class="fa fa-chevron-down"></i></a></li>
					</ul>
				</div>
				<div class="contenedor-submenus-responsive">
					<div class="contenedor-submenu-quienes-somos-responsive" id="contenedor-submenu-quienes-somos-responsive">
						<a href="#" class="btn-cerrar-submenu-quienes-somos-responsive" id="btn-cerrar-submenu-quienes-somos-responsive"><i class="fa fa-close"></i></a>
						<a href="../../Usuario/Quienes_Somos.php"><i class="fa fa-building">Empresa</i></a>
						<a href="../../Usuario/Quienes_Somos.php"><i class="fa fa-info-circle">Te Ofrece</i></a>
						<a href="../../Usuario/Quienes_Somos.php"><i class="fa fa-map-marker">Ubicaci&oacute;n</i></a>
					</div>
					<div class="contenedor-submenu-productos-responsive" id="contenedor-submenu-productos-responsive">
						<a href="#" class="btn-cerrar-submenu-productos-responsive" id="btn-cerrar-submenu-productos-responsive"><i class="fa fa-close"></i></a>
						<a href="../../Editar.php"><i class="fa fa-user-circle">Editar Perfil</i></a>
						<a href="../../salir.php"><i class="fa fa-power-off">Salir</i></a>
					</div>
				</div>
			</div>
		</div>
	</header>	
	
        <!--Get Jquery-->
	<script src="js/js/jquery.js"></script>
	<script src="js/js/menu.js"></script>
         