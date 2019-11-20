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
                        <a>Registrando nuevo Cita </a>
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
						<form id="formaCita" class="row contact_form" action="<?php echo $helper->url('agenda','crear'); ?>" method="post">
							<div class="row col-md-12">
								<div class="col-md-12 form-group">
									<input type="text" class="form-control typeahead" id="clienteBusca" data-id="0" name="clienteBusca" placeholder="Seleccionar Cliente" required>
									<input hidden id="cliente" data-url="<?php echo $helper->url('agenda','clientesBuscar'); ?>" name="cliente" value="0">
								</div>
							</div>
							<div class="row col-md-12">	
								<div class="col-md-6 form-group">
									<input type="text" class="form-control typeahead" id="productoBusca" data-id="0" name="productoBusca" placeholder="Seleccionar Producto" required>
									<input hidden id="producto" data-url="<?php echo $helper->url('agenda','productosBuscar'); ?>" name="producto" value="0">
								</div>
								<div class="col-md-6 form-group">
									<input type="text" class="form-control" id="precio" name="precio" placeholder="Precio" value="0" required autocomplete="off">
								</div>
							</div>	
							<div class="row col-md-12">
								<div class="col-md-6 form-group">
									<input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha" required>
								</div>							
								<div class="form-group col-md-3">
									<select class="form-select" id="selHora" name="hora" value="10" required>
					                    <option  value="9">09 AM</option>
					                    <option value="10">10 AM</option>
					                    <option value="11">11 AM</option>
					                    <option value="12">12 AM</option>
					                    <option value="13">01 PM</option>
					                    <option value="14">02 PM</option>
					                    <option value="15">03 PM</option>
					                    <option value="16">04 PM</option>
					                    <option value="17">05 PM</option>
					                    <option value="18">06 PM</option>
					                    <option value="19">07 PM</option> 
					                </select> 
						        </div> 
						        <div class="form-group col-md-3">
									<select class="form-select" id="selMinutos" name="minutos" value="00" required>
										<option value="00">00 min</option>
					                    <option value="15">15 min</option>
					                    <option value="30">30 min</option>
					                    <option value="45">45 min</option>
									</select>
								</div>						        
                            </div>
                            <div class="row col-md-12">
								<div class="col-md-6 form-group">
                                <input type="text" class="form-control typeahead" id="estilistaBusca" data-id="0" name="estilistaBusca" placeholder="Seleccionar Estilista" required>
									<input hidden id="estilista" data-url="<?php echo $helper->url('agenda','estilistasBuscar'); ?>" name="estilista" value="0">
                                </div>	
                            </div>														
						</form>
                        <div class="col-md-12 text-right">
                            <button onclick="validarCita();" class="btn btn-primary">Guardar</button>
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
		function validarCita() {
            var esi = $('#estilista').val();
            if (esi > 0) {
                var loc = window.location;
                var baseUrl = loc.protocol + "//" + loc.hostname + (loc.port? ":"+loc.port : "") + "/";
                validarUrl = baseUrl + 'index.php?controller=agenda&action=validarCita&estilista='+$("#estilista").val()+'&fecha='+$("#fecha").val()+'&hora='+$("#selHora").val()+'&minutos='+$("#selMinutos").val();
                var request = $.ajax({
                    url : validarUrl,
                    type: "get",
                });

                request.done(function (response, textStatus, jqXHR) {
                    if(response == "0") {
                        $("#formaCita").submit();
                    } else {
                        alert("No se pudo reservar la cita intente con otro horario o estilista");
                    }
                });

                request.fail(function (jqXHR, textStatus, errorThrown){
                    alert("No se pudo reservar la cita intente con otro estilista u horario");
                });
            } else {
                alert('Debe seleccionar un estilista para agendar su cita');
            } 
        };

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