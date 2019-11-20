		<div class="top_menu row m0">
			<div class="container-fluid">
				<div class="float-left">
					<?php 
						if(isset($_SESSION['usrNombre']))  
							echo "<p>" . $_SESSION['usrNombre'] . "</p>";
						else 
							echo "<p>Usuario accedido</p>";
					?>
				</div>
				<div class="float-right">
					<ul class="right_side">
						<li>
							<a href="<?php echo $helper->url('usuarios','salir'); ?>">
								Salir
							</a> 
						</li> 
					</ul> 
				</div> 
			</div> 
		</div> 
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container-fluid">
					<a class="navbar-brand logo_h" href="<?php echo $helper->url('tienda','inicio'); ?>">
						<img src="otros/img/logo.png" alt="D'Kristel">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row w-100">
							<div class="col-lg-10 pr-0">
								<ul class="nav navbar-nav center_nav">
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Agendamiento</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="<?php echo $helper->url('agenda','lista'); ?>">Listado</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="<?php echo $helper->url('agenda','calendario'); ?>">Calendario</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="<?php echo $helper->url('agenda','nuevo'); ?>&origen=lista">Nueva cita</a>
											</li>
										</ul>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?php echo $helper->url('clientes','lista'); ?>">Clientes</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?php echo $helper->url('productos','lista'); ?>">Productos</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?php echo $helper->url('promociones','lista'); ?>">Promociones</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?php echo $helper->url('estilistas','lista'); ?>">Estilistas</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?php echo $helper->url('tienda','mensajes'); ?>">Mensajes</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?php echo $helper->url('usuarios','lista'); ?>">Usuarios</a>
									</li>
								</ul> 
							</div> 
						</div>
					</div>
				</div>
			</nav>
		</div>