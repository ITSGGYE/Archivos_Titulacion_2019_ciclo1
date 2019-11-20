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
                        <a>Modificando Cita </a>
                        <a href="<?php echo $helper->url('agenda', $origen); ?>">Volver</a> 
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
						<h3>Datos de la Cita</h3>
						<form class="row contact_form" action="<?php echo $helper->url('agenda','actualizar'); ?>" method="post">
							<div class="row col-md-12">
								<div class="col-md-12 form-group">
									<input hidden id="id" name="id" value="<?php echo $cita['id']?>">
									<input type="text" class="form-control typeahead" id="clienteBusca" data-id="0" name="clienteBusca" value="<?php echo $cli['nombres']?>" placeholder="Seleccionar Cliente" required>
									<input hidden id="cliente" data-url="<?php echo $helper->url('agenda','clientesBuscar'); ?>" name="cliente" value="<?php echo $cita['cliente']?>">
								</div>
							</div>
							<div class="row col-md-12">	
								<div class="col-md-6 form-group">
									<input type="text" class="form-control typeahead" id="productoBusca" data-id="0" name="productoBusca" value="<?php echo $pro['nombre']?>" placeholder="Seleccionar producto" required>
									<input hidden id="producto" data-url="<?php echo $helper->url('agenda','productosBuscar'); ?>" name="producto" value="<?php echo $cita['producto']?>">
								</div>
								<div class="col-md-6 form-group">
									<input type="text" class="form-control" id="precio" name="precio" placeholder="Precio" value="<?php echo $cita['precio']?>" required autocomplete="off">
								</div> 
							</div>	
							<div class="row col-md-12">
								<div class="col-md-6 form-group">
									<input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo date('Y-m-d', strtotime($cita['fecha'])) ?>" placeholder="Fecha" required>
								</div>	
								<div class="form-group col-md-3">
									<select class="form-select" id="selHora" name="hora" value="<?php echo $hora ?>" required>
					                    <option <?php if ($hora == "09") echo "selected" ?>  value="9">09 AM</option>
					                    <option <?php if ($hora == "10") echo "selected" ?> value="10">10 AM</option> 
					                    <option <?php if ($hora == "11") echo "selected" ?> value="11">11 AM</option> 
					                    <option <?php if ($hora == "12") echo "selected" ?> value="12">12 AM</option> 
					                    <option <?php if ($hora == "13") echo "selected" ?> value="13">01 PM</option> 
					                    <option <?php if ($hora == "14") echo "selected" ?> value="14">02 PM</option> 
					                    <option <?php if ($hora == "15") echo "selected" ?> value="15">03 PM</option> 
					                    <option <?php if ($hora == "16") echo "selected" ?> value="16">04 PM</option> 
					                    <option <?php if ($hora == "17") echo "selected" ?> value="17">05 PM</option> 
					                    <option <?php if ($hora == "18") echo "selected" ?> value="18">06 PM</option> 
					                    <option <?php if ($hora == "19") echo "selected" ?> value="19">07 PM</option> 
					                </select> 
						        </div> 
						        <div class="form-group col-md-3"> 
									<select class="form-select" id="selMinutos" name="minutos" required> 
										<option <?php if ($minutos == "00") echo "selected" ?> value="00">00 min</option> 
					                    <option <?php if ($minutos == "15") echo "selected" ?> value="15">15 min</option> 
					                    <option <?php if ($minutos == "30") echo "selected" ?> value="30">30 min</option> 
					                    <option <?php if ($minutos == "45") echo "selected" ?> value="45">45 min</option> 
									</select> 
								</div> 
                            </div>
                            <div class="row col-md-12">
								<div class="col-md-6 form-group">
									<input type="text" class="form-control typeahead" id="estilistaBusca" data-id="0" name="estilistaBusca" value="<?php echo $eli['nombres']?>" placeholder="Seleccionar Estilista" required>
									<input hidden id="estilista" data-url="<?php echo $helper->url('agenda','estilistasBuscar'); ?>" name="estilista" value="<?php echo $cita['estilista']?>">
								</div>
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
	<script type="text/javascript">
		var url_clis = $("#cliente").attr("data-url");
        var url_elis = $("#estilista").attr("data-url");
		var url_pros = $("#producto").attr("data-url");

		var bclis = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace, 
            limit: 8,
            prefetch: {
                url: 'index.php?controller=agenda&action=clientesBuscar',
                filter: function (clis) {
                    return $.map(clis, function (vm) {
                        return {
                            id: vm.id,
                            value: vm.value,
                        };
                    });
                }
            }            
        });

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
                            precio: vc.precio
                        };
                    });
                }
            }
        });

        var bestis = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
            queryTokenizer: Bloodhound.tokenizers.whitespace, 
            limit: 8,
            prefetch: {
                url: 'index.php?controller=agenda&action=estilistasBuscar',
                filter: function (elis) {
                    return $.map(elis, function (vm) {
                        return {
                            id: vm.id,
                            value: vm.value,
                        };
                    });
                }
            }            
        });

        bclis.clearPrefetchCache();
        bclis.initialize();
        
        $('#clienteBusca').typeahead(
            {
                hint: false,
                highlight: true,
                minLength: 1,
                limit: 10
            },
            {
                display: 'value',
                menu: $('#contenedor-principal'),
                source: bclis.ttAdapter(),
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
            $("#cliente").val(datum.id);
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
        });

        bestis.clearPrefetchCache();
        bestis.initialize();
        
        $('#estilistaBusca').typeahead(
            {
                hint: false,
                highlight: true,
                minLength: 1,
                limit: 10
            },
            {
                display: 'value',
                menu: $('#contenedor-principal'),
                source: bestis.ttAdapter(),
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
            $("#estilista").val(datum.id);
        });
	</script>
</body>	

</html>