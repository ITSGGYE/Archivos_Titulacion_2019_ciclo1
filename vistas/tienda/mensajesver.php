<!doctype html>

<?php include("vistas/incluir/autenticacion.php"); ?> 

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
                        <a>Mensaje de: <?php echo $men["nombres"] ?> </a>
                        <a href="<?php echo $helper->url('tienda', 'mensajes'); ?>">Volver</a> 
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
						<h3>Detalles del mensaje</h3>
						<form class="row contact_form" action="" method="" novalidate>
							<div class="col-md-6 form-group p_star">
								<input type="text" class="form-control" id="fecha" name="fecha" placeholder="No. de cedula" value='<?php echo $men["fecha"] ?>' readonly>
							</div>
							<div class="col-md-6 form-group">
								<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo electronico" value='<?php echo $men["correo"] ?>' readonly>
							</div>							
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres y Apellidos"  value='<?php echo $men["nombres"] ?>' readonly>
							</div>	
							<div class="col-md-12 form-group">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="telefonos" name="telefonos" placeholder="Telefonos" value='<?php echo $men["telefono"] ?>' readonly>
							</div>
							<div class="col-md-12 form-group">
                                <textarea class="form-control" name="mensaje" id="mensaje" rows="3" placeholder="Escriba su consulta o mensaje" readonly><?php echo $men["mensaje"] ?></textarea>
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