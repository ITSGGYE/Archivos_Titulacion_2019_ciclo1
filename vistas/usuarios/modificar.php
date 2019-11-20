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
                        <a>Modificando: <?php echo $usr["nombres"] ?> </a>
                        <a href="<?php echo $helper->url('usuarios', 'lista'); ?>">Volver</a> 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="checkout_area section_gap">
		<div class="container">
			<div class="billing_details">
				<div class="row">
					<div class="col-md-12">
						<h3>Datos del Usuario</h3>
						<form class="row contact_form" action="<?php echo $helper->url('usuarios','actualizar'); ?>" method="post" novalidate="novalidate">							
							<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $usr["codigo"] ?>" placeholder="Codigo de usuario" required autocomplete="off">
								<input hidden id="id" name="id" value='<?php echo $usr["id"] ?>'>
								<input hidden id="persona" name="persona" value='<?php echo $usr["persona"] ?>'>
							</div>
							<div class="col-md-6 form-group p_star">
								<input type="password" class="form-control" id="clave" name="clave" placeholder="Sin cambios">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres y Apellidos"  value='<?php echo $usr["nombres"] ?>' autocomplete="off" required>								
							</div>
							<div class="col-md-6 form-group p_star">
								<input type="text" class="form-control" id="cedula" name="cedula" maxlength="10" onkeypress="if (isNaN( String.fromCharCode(event.keyCode))) return false;" placeholder="No. de cedula" value='<?php echo $usr["cedula"] ?>' autocomplete="off">
							</div>
							<div class="col-md-6 form-group p_star">
								<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo electronico" value='<?php echo $usr["correo"] ?>' require autocomplete="off">
							</div>							
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value='<?php echo $usr["direccion"] ?>' autocomplete="off">
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="telefonos" name="telefonos" placeholder="Telefonos" value='<?php echo $usr["telefonos"] ?>' autocomplete="off">
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