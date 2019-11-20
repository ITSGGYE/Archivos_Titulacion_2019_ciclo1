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
                        <a>Registrando nuevo Producto </a>
                        <a href="<?php echo $helper->url('productos', 'lista'); ?>">Volver</a> 
                    </div>
                </div>
            </div>
        </div>
    </section>

	<!--================ Formulario =================-->
    <section class="checkout_area section_gap_min">
		<div class="container">
			<div class="billing_details">
				<div class="row">
					<div class="col-md-8">
						<h3>Datos del Producto</h3>
						<form class="row contact_form" action="<?php echo $helper->url('productos','crear'); ?>" method="post" enctype="multipart/form-data">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required autocomplete="off">
							</div>
							<div class="form-group col-md-6">
								<input type="text" class="form-control" id="precio" name="precio" placeholder="Precio" required autocomplete="off">
							</div>
							<div class="form-group col-md-6">
								<select class="form-select" id="categoria" name="categoria" value="1">
									<option value="1">Maquillaje</option>
									<option value="2">Peluqueria</option>
								</select>
							</div>
							<div class="form-group col-md-12">
								<input type="text" class="form-control" id="decripcion" name="descripcion" placeholder="Descripcion" autocomplete="off">
							</div>
							<div class="form-group col-md-6"> 
								<label labelfor="imagen">Horas que dura la sesion</label> 
								<input type="text" class="form-control" id="duracion" name="duracion" value="1" required autocomplete="off">
							</div>  
							<div class="form-group col-md-6"> 
								<label labelfor="imagen">Seleccionar archivo de imagen</label> 
								<input type="file" class="form-control-file" id="imagen" onchange="putImage()" name="imagen"> 
							</div> 
							<div class="text-right col-md-12"> 
	                            <button type="submit" value="submit" class="btn submit_btn">Guardar</button> 
	                        </div> 
						</form> 
					</div>
					<div class="col-lg-4">
						<div class="order_box">
							<h2>Imagen del producto</h2>
							<div class="f_p_item">
                                <div class="f_p_img">
                                    <img id="proimg" class="img-fluid" src="<?php echo RUTAIMGPRODUCTOS . '/p.jpg' ?>" alt="">
                                </div>                                
                            </div>
						</div>
					</div>
				</div>	
			</div>
    	</div>
    </section>

	<?php 
		include('vistas/incluir/jscripts.php');
	?>	
	<script type="text/javascript">
		var iniciando = false;
		function showImage(src, target) {
            var fr = new FileReader();
            fr.onload = function() {
                target.src = fr.result;
            }
            fr.readAsDataURL(src.files[0]);
        }        

        function putImage() {
            if (!iniciando)
            {
                var src = document.getElementById("imagen");
                var target = document.getElementById("proimg");
                showImage(src, target);    
            }
        }
	</script>
</body>	

</html>