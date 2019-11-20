<?php include("vistas/incluir/autenticacion.php"); ?> 

<!doctype html>

<html lang="es">

<head>
	<?php 
		include('vistas/incluir/cabecera.php'); 
	?>
</head>

<body>
	<!--================ Encabezado - Menu =============-->
	<header class="header_area">
		<?php 
			include('vistas/incluir/menu.php'); 
		?>
	</header>

	<!--================Banner secundario=================-->
    <section class="banner_micro">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="banner_content">
                    <div class="page_link"> 
                        <a>Registrando nuevo usuarios </a>
                        <a href="<?php echo $helper->url('usuarios', 'lista'); ?>">Volver</a> 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="checkout_area section_gap_min">
		<div class="container">
			<div class="billing_details">
				<div class="row">
					<div class="col-md-12">
						<h3>Datos del Usuario</h3>
						<form class="row contact_form" action="<?php echo $helper->url('usuarios','crear'); ?>" method="post" novalidate="novalidate">
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo de usuario" required>
							</div>
							<div class="col-md-6 form-group p_star">
								<input type="password" class="form-control" id="clave" name="clave" placeholder="Contraseña" required>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres y Apellidos" required>
							</div>
							<div class="col-md-6 form-group p_star">
								<input type="text" class="form-control" id="cedula" maxlength="10" onkeypress="if (isNaN( String.fromCharCode(event.keyCode))) return false;" name="cedula" placeholder="No. de cedula">
							</div>
							<div class="col-md-6 form-group p_star">
								<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo electronico" require>
							</div>							
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="telefonos" name="telefonos" placeholder="Telefonos">
							</div>
							<div class="col-md-12 text-right">
	                            <button type="submit" value="submit" class="btn submit_btn">Guardar</button>
	                        </div>
						</form>
					</div>
				</div>	
			</div>
    	</div>
    </section>
	
	<?php 
		include('vistas/incluir/jscripts.php');
	?>	
</body>	

</html>