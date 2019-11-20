	<header id="header"><!--header-->
		<div class="header_top"><!--header de arriba-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +59388499671</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> escuelacar@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-->
		
		<div class="header-middle"><!--header central-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
					</div>
					</div>
						
						

					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							<li class="cerrar-sesion"><a href="login/logout.php">Cerrar sesión</a></li>
						
						 <li><a href="#"><i class="fa fa-lock"></i><?php echo $_SESSION['carnet']?></a></li>
						<li><a href="#"><i class="fa fa-star"></i> Lo mejor en Libro</a></li>
							
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-->
		<style>
							h2{
								color: 	#1E90FF;	
							}
                        </style>
							<center><h2 >
						UNIDAD EDUCATIVA CARLOS PEREZ PERAZO</h2></center>
	
		<div id="div_menu" class="header-bottom"><!--header de abajo-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">BIBLIOTECA VIRTUAL</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div id="div_menu" class="mainmenu pull-left">
							<ul id="barra_navegacion" class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">INICIO</a></li>
								<li class="dropdown"><a href="menu.php">CURSOS<i class="fa fa-angle-down"></i></a>
									  <ul role="menu" class="sub-menu">
                                        <li><a href="primer.php?variable=1"> 1.-AÑO</a></li>
                                        <li><a href="primer.php?variable=2"> 2.-AÑO</a></li>
                                        <li><a href="primer.php?variable=3"> 3.-AÑO</a></li>
                                        <li><a href="primer.php?variable=4"> 4.-AÑO</a></li>
                                        <li><a href="primer.php?variable=5"> 5.-AÑO</a></li>
                                        <li><a href="primer.php?variable=6"> 6.-AÑO</a></li>
                                        <li><a href="primer.php?variable=7"> 7.-AÑO</a></li>
                                    </ul>
                                </li> 
								<li><a href="contacto.php">CONTACTO</a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div><!--/header-->
	</header><!--/ fin del header-->