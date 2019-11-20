		<div class="top_menu row">
			<div class="container-fluid">
				<div class="float-left">
					<?php 
						if(isset($msj))  
							echo "<p>" . $msj . "</p>";
						else 
							echo "<p>Llamenos: " . TELEFONONUMERO . "</p>";
					?>				
				</div>
				<div class="float-right">
					<ul class="right_side">
						<li>
							<a href="<?php echo $helper->url('usuarios','acceder'); ?>">
								Acceder
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container-fluid">
					<a class="navbar-brand logo_h" href="<?php echo $helper->url('tienda1','inicio'); ?>">
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
							<div class="col-lg-7 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item">
										<a class="nav-link" href="<?php echo $helper->url('tienda','inicio'); ?>">Inicio</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?php echo $helper->url('tienda','peluqueria'); ?>">Peluqueria</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?php echo $helper->url('tienda','spa'); ?>">Maquillaje</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="<?php echo $helper->url('tienda','contacto'); ?>">Contacto</a>
									</li>
								</ul>
							</div>

							<div class="col-lg-5">
								<ul class="nav navbar-nav navbar-right right_nav pull-right">
									<hr>
									<li class="nav-item">
										<a href="<?php echo SOCIALFACEBOOK ?>" target="_blank" class="icons">
											<i class="fa fa-facebook" aria-hidden="true"></i>
										</a>
									</li>

									<hr>

									<li class="nav-item">
										<a href="<?php echo SOCIALINSTAGRAM ?>" target="_blank" class="icons">
											<i class="fa fa-instagram" aria-hidden="true"></i>
										</a>
									</li>									
									<hr>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>