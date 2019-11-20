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
			include('vistas/incluir/p_menu.php'); 
		?>
	</header>
	
	<!--================Banner secundario=================-->
    <section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Contactenos</h2>
					<div class="page_link">
						<a href="<?php echo $helper->url('tienda','inicio'); ?>">Inicio </a>
						<a >Contacto</a>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!--================Formulario de contacto=================-->
    <section class="contact_area">
        <div class="container">
            <div id="map-container-google-1" class="mapBox z-depth-1-half map-container">
                <!--iframe style="border: 1px solid darkgrey;" width="100%" height="100%" allowfullscreen src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d498.34930270664!2d-79.892678!3d-2.230859!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xce01b42425e68961!2sEvelin+Naula+Estudio+Estetica!5e0!3m2!1ses!2sus!4v1550510807069"></iframe-->
                <iframe style="border: 1px solid darkgrey;" width="100%" height="100%" allowfullscreen src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.0837693628096!2d-79.89211781487258!3d-2.1214308996106306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMsKwMDcnMTcuMiJTIDc5wrA1MycyNC4xIlc!5e0!3m2!1ses!2sec!4v1569037751555!5m2!1ses!2sec"></iframe>    
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Guayaquil, Ecuador</h6>
                            <p><?php echo DIRECCION ?></p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6>
                                <a href="<?php echo TELEFONOLINK ?>"><?php echo TELEFONONUMERO ?></a>
                            </h6>
                            <p>Lun - Sab <?php echo HORARIOLUNVIE ?></p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-bubble"></i>
                            <h6>
                                <a href="<?php echo WHATSAPPLINK ?>">Whatsapp: <?php echo WHATSAPPNUMERO ?></a>
                            </h6>
                            <p>Envienos sus consultas responderemos a la brevedad posible</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="row contact_form" action="<?php echo $helper->url('tienda','guardarContacto'); ?>" method="post" id="contactForm" novalidate="novalidate">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo electronico">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="mensaje" id="mensaje" rows="3" placeholder="Escriba su consulta o mensaje"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn submit_btn">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

	<!--================ Pie de pagina =================-->
	<footer class="subscription-area section_gap"> 
		<?php 
			include('vistas/incluir/p_pie.php');			
		?>
	</footer>

	<?php 
		include('vistas/incluir/jscripts.php');
	?>	
</body>	

</html>