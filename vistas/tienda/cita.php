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
					<h2>Agendar cita</h2>
					<div class="page_link">
						<a href="<?php echo $helper->url('tienda','inicio'); ?>">Inicio </a>
						<a >Agendamiento</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="checkout_area section_gap_min" style="margin-top: -48px">
		<div class="container">
			<div class="billing_details">
				<div class="row">					
					<div class="col-lg-8">
						<form id="formaCita" class="row contact_form" action="<?php echo $helper->url('tienda','guardarCita'); ?>" method="post" novalidate="novalidate">
							<h3>Datos personales</h3>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres y Apellidos" required>
							</div>
							<div class="col-md-6 form-group p_star">
								<input type="text" class="form-control" id="cedula" name="cedula" placeholder="No. de cedula" maxlength="10" onkeypress="if (isNaN( String.fromCharCode(event.keyCode))) return false;" required>
							</div>
							<div class="col-md-6 form-group p_star">
								<input type="text" class="form-control" id="correo" name="correo" placeholder="Correo electronico">
							</div>							
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion">
							</div>
							<div class="col-md-12 form-group p_star">
								<input type="text" class="form-control" id="telefonos" name="telefonos" placeholder="Telefonos">
							</div>
							<div class="col-md-12 creat_account">
								<h3>Datos de la cita</h3>
							</div>
							<div class="row col-md-12">
								<div class="col-md-6 form-group">
									<input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha" required value="<?php echo date("Y-m-d");?>">
								</div>							
								<div class="form-group col-md-3">
									<select class="form-select" id="selHora" name="hora" value="10" required>
					                    <option  value="9">09 AM</option>
					                    <option selected="true" value="10">10 AM</option>
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
								    <?php $conteo = 1; ?>
								    <select class="form-select" id="estilista" name="estilista" value=<?php echo $elis[0]['id']; ?> required>
										<?php foreach($elis as $eli) { ?>
					                    <option value=<?php echo $eli['id'] ?> <?php if ($conteo == 1) echo 'class="selected"'; ?>><?php echo $eli['nombres'] ?></option>
					                    <?php $conteo = $conteo + 1; } ?>
									</select>
	                            </div>
	                        </div>
					        <input hidden id="producto" name="producto" value="<?php echo $pro["id"]; ?>">
					        <input hidden id="precio" name="precio" value="<?php echo $pro["precio"]; ?>">
					    </form>    
					</div>					
					<div class="col-lg-4">
						<div class="order_box">
							<h2>Servicio solicitado</h2>
							<div class="f_p_item">
                                <div class="f_p_img">
                                    <img class="img-fluid" src="<?php echo RUTAIMGPRODUCTOS ?>/<?php echo $pro['imagen']; ?>" alt="">
                                </div>
                                <a>
                                    <h4></h4>
                                    <h4><?php echo $pro["nombre"]; ?></h4>
                                </a>
                                <h5>Agendando por $<?php echo $pro["precio"]; ?></h5>
                            </div>
                            <button onclick="validarCita();" class="btn btn-primary" style="width: 100%">Agendar</button>
						</div>
					</div>
				</div>
				<row>
					<h1>Clientes que han agendado este servicio</h1>
					<div class="progress-table-wrap">
		                <div class="progress-table"> 
		                    <div class="table-head"> 
		                        <div class="visit">Fecha / Hora</div>
		                        <div class="visit">Cliente</div>
		                        <div class="visit">Estilista</div>
		                    </div>		             
		                    <?php foreach($citas as $cita) {?>
		                        <div class="table-row">
		                            <div class="visit"><?php echo $cita['fecha'] ?></div>
		                            <div class="visit"><?php echo $cita['clienteNom'] ?></div>
		                            <div class="visit"><?php echo $cita['estilistaNom'] ?></div>
		                        </div> 
		                    <?php } ?>
		                </div>
		            </div>
				</row>
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
	<script type="text/javascript">        
        function validarCedula(cedula) {
        	var digito_region = cedula.substring(0,2);
	        //Pregunto si la region existe ecuador se divide en 24 regiones
	        if( digito_region >= 1 && digito_region <=24 ){
	          // Extraigo el ultimo digito
	          var ultimo_digito   = cedula.substring(9,10);
	          //Agrupo todos los pares y los sumo
	          var pares = parseInt(cedula.substring(1,2)) + parseInt(cedula.substring(3,4)) + parseInt(cedula.substring(5,6)) + parseInt(cedula.substring(7,8));
	          //Agrupo los impares, los multiplico por un factor de 2, si la resultante es > que 9 le restamos el 9 a la resultante
	          var numero1 = cedula.substring(0,1);
	          var numero1 = (numero1 * 2);
	          if( numero1 > 9 ){ var numero1 = (numero1 - 9); }

	          var numero3 = cedula.substring(2,3);
	          var numero3 = (numero3 * 2);
	          if( numero3 > 9 ){ var numero3 = (numero3 - 9); }

	          var numero5 = cedula.substring(4,5);
	          var numero5 = (numero5 * 2);
	          if( numero5 > 9 ){ var numero5 = (numero5 - 9); }

	          var numero7 = cedula.substring(6,7);
	          var numero7 = (numero7 * 2);
	          if( numero7 > 9 ){ var numero7 = (numero7 - 9); }

	          var numero9 = cedula.substring(8,9);
	          var numero9 = (numero9 * 2);
	          if( numero9 > 9 ){ var numero9 = (numero9 - 9); }

	          var impares = numero1 + numero3 + numero5 + numero7 + numero9;
	          //Suma total
	          var suma_total = (pares + impares);
	          //extraemos el primero digito
	          var primer_digito_suma = String(suma_total).substring(0,1);
	          //Obtenemos la decena inmediata
	          var decena = (parseInt(primer_digito_suma) + 1)  * 10;
	          //Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
	          var digito_validador = decena - suma_total;
	          //Si el digito validador es = a 10 toma el valor de 0
	          if(digito_validador == 10)
	            var digito_validador = 0;
	          //Validamos que el digito validador sea igual al de la cedula
	          if(digito_validador == ultimo_digito){
	            return true;
	          }else{
	            return false;
	          }
	        }else{
	        	return false;
	        }
      	}
        
        function validarCita() {
		    var ced = $('#cedula').val();
		    var nom = $('#nombres').val();
		    if(ced.length > 0 && nom.length > 0) {
		    	if(/\D/.test(ced)) {
					alert("La cedula solo puede contener numeros");
				} else {
					if (validarCedula(ced)) {
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
						    		/*if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                                        alert("Su cita se ha reservado exitosmente");
                                    }*/
                                    alert("Su cita ha sido agendada exitosamente");
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
					} else {
						alert('la cedula digitada es invalida');
					}
	            }	            
			} else {
            	alert('Digitel su nombre y numero de cedula');
		    } 
		};	

        var url_elis = $("#estilista").attr("data-url");
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