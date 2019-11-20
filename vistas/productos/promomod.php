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
                        <a>Modificando promocion de: <?php echo $pro["nombre"] ?> </a>
                        <a href="<?php echo $helper->url('promociones', 'lista'); ?>">Volver</a> 
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
						<form class="row contact_form" action="<?php echo $helper->url('promociones','actualizar'); ?>" method="post" enctype="multipart/form-data">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $pro['nombre']; ?>" placeholder="Nombre" required autocomplete="off">
                                <input hidden id="id" name="id" value='<?php echo $pro["id"] ?>'>
                                <input hidden id="producto" name="producto" value='<?php echo $pro["producto"] ?>'>
							</div>
							<div class="form-group col-md-6">
								<input type="number" class="form-control" id="precio" name="precio" value="<?php echo $pro['precio']; ?>" placeholder="Precio" readonly autocomplete="off">
							</div>
							<div class="form-group col-md-6">
								<input type="number" class="form-control" id="porcentaje" name="porcentaje" value="<?php echo $pro['porcentaje']; ?>" placeholder="Porcentaje" require autocomplete="off">
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
        var url_pros = $("#producto").attr("data-url");
        var bpros = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace, 
            limit: 8,        
            prefetch: {
                url: 'index.php?controller=agenda&action=productosBuscar',
                filter: function (pros) { 
                    return $.map(pros, function (vc) { 
                        return { 
                            id: vc.id, 
                            value: vc.value, 
                            precio: vc.precio,
                            imagen: vc.imagen
                        };
                    });
                }
            }
        });

        bpros.clearPrefetchCache();
        bpros.initialize();

        $('#productoBusca').typeahead(
            {
                hint: false,
                highlight: true,
                minLength: 1,
                limit: 10
            },
            {
                display: 'value',
                menu: $('#contenedor-principal'),
                source: bpros.ttAdapter(),
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item">No hay coincidencias</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function(data) {
                    return '<div style="font-weight:normal; " class="list-group-item">' + data.value + '</div></div>'
                    }
                }      
        }).bind("typeahead:selected", function(obj, datum, name) {
            $('#producto').val(datum.id);
            $('#precio').val(datum.precio);
            var target = document.getElementById("proimg");
            target.src = "<?php echo RUTAIMGPRODUCTOSDE.DOBESC; ?>" + datum.imagen;
        });
	</script>
</body>	

</html>