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
                        <a>Modificando: <?php echo $pro["nombre"] ?> </a>
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
						<form class="row contact_form" action="<?php echo $helper->url('productos','actualizar'); ?>" method="post" enctype="multipart/form-data">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $pro['nombre']; ?>" placeholder="Nombre" required autocomplete="off">
								<input hidden id="id" name="id" value='<?php echo $pro["id"] ?>'>
							</div>
							<div class="form-group col-md-6">
								<input type="text" class="form-control" id="precio" name="precio" value="<?php echo $pro['precio']; ?>" placeholder="Precio" required autocomplete="off">
							</div>
							<div class="form-group col-md-6">
								<select class="form-select" id="categoria" name="categoria">
									<option <?php if ($pro['categoria'] == 1) echo 'selected' ?> value="1">Maquillaje</option>
									<option <?php if ($pro['categoria'] == 2) echo 'selected' ?> value="2">Peluqueria</option>
								</select>
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="decripcion" name="descripcion" value="<?php echo $pro['descripcion']; ?>" placeholder="Descripcion" autocomplete="off">
							</div> 
							<div class="form-group col-md-6"> 
								<label labelfor="imagen">Horas que dura la sesion</label> 
								<input type="text" class="form-control" id="duracion" name="duracion" value="<?php echo $pro['duracion']; ?>" required autocomplete="off">
							</div> 
							<div class="form-group col-md-6"> 
								<label labelfor="imagen">Seleccionar archivo de imagen</label> 
								<input type="file" class="form-control-file" id="imagen" onchange="putImage()" name="imagen"> 
							</div> 
							<div class="col-md-12 text-right"> 
	                            <button type="submit" value="submit" class="btn submit_btn">Guardar</button> 
	                        </div> 
						</form> 
					</div>
					<div class="col-lg-4">
						<div class="order_box">
							<h2>Imagen del producto</h2>
							<div class="f_p_item">
                                <div class="f_p_img">
                                    <img id="proimg" class="img-fluid" src="<?php echo RUTAIMGPRODUCTOS ?>/<?php echo $pro['imagen']; ?>" alt="---">
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