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
                        <a>Modificando: <?php echo $cli["nombres"] ?> </a>
                        <a href="<?php echo $helper->url('clientes', 'lista'); ?>">Volver</a> 
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
						<h3>Datos del Cliente</h3>
						<form class="row contact_form" action="<?php echo $helper->url('clientes','actualizar'); ?>" method="post" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres y Apellidos"  value='<?php echo $cli["nombres"] ?>' autocomplete="off" required>
								<input hidden id="id" name="id" value='<?php echo $cli["id"] ?>'>
								<input hidden id="persona" name="persona" value='<?php echo $cli["persona"] ?>'>
							</div>
							<div class="col-md-6 form-group p_star">
								<input type="text" class="form-control" id="cedula" name="cedula" maxlength="10" onkeypress="if (isNaN( String.fromCharCode(event.keyCode))) return false;" placeholder="No. de cedula" value='<?php echo $cli["cedula"] ?>' autocomplete="off">
							</div>
							<div class="col-md-6 form-group p_star">
								<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo electronico" value='<?php echo $cli["correo"] ?>' autocomplete="off">
							</div>							
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value='<?php echo $cli["direccion"] ?>' autocomplete="off">
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="telefonos" name="telefonos" placeholder="Telefonos" value='<?php echo $cli["telefonos"] ?>' autocomplete="off">
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