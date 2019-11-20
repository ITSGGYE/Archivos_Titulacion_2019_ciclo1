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
                        <a>Citas agendadas </a>
                        <button onclick="<?php echo "window.location.href = '" . $helper->url('agenda', 'nuevo') . "&origen=calendario';" ?>" class="genric-btn success small">Registar nueva cita</button> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </section> 
	
	<section class="checkout_area section_gap_min">
		<div class="container">

    <!--section style="margin-left: 10px; margin-right: 10px; margin-top: -40px"> 
        <div class="section-top-border"--> 
        	<div id="calendario" class="col-centered"> 
    		</div> 
        </div> 
    </section> 

	<?php 
		include('vistas/incluir/jscripts.php'); 
	?>
	
	<style type="text/css">
		span.fc-title {
			color: #fff;		
			cursor: pointer;
		}

		span.fc-time {
			color: #fff;
			cursor: pointer;
		}
	</style>

	<script type="text/javascript"> 
		$(document).ready(function() { 
			var date = new Date(); 
	        var yyyy = date.getFullYear().toString(); 
	        var mm = (date.getMonth() + 1).toString().length == 1 ? "0" + (date.getMonth()+1).toString() : (date.getMonth() + 1).toString(); 
	        var dd  = (date.getDate()).toString().length == 1 ? "0" + (date.getDate()).toString() : (date.getDate()).toString(); 
			
			$('#calendario').fullCalendar( {
				header: {
					 language: 'es',
					 left: 'prev,next today',
					 center: 'title',
					 right: 'month,basicWeek,basicDay',

				},
				defaultDate: yyyy + "-" + mm + "-" + dd,
				editable: true,
				eventLimit: true, // vinculo 'mas' cuando hay varias citas
				selectable: true,
				selectHelper: true,
				theme: true,
				plugins: [ 'bootstrap' ],
  				themeSystem: 'bootstrap',

				select: function(start, end) {					
					$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
					$('#ModalAdd').modal('show');
				},

				eventRender: function(cita, element) {
					element.bind('dblclick', function() { 
						$('#ModalEdit #id').val(cita.id); 
						$('#ModalEdit #title').val(cita.title); 
						$('#ModalEdit #color').val(cita.color); 
						$('#ModalEdit').modal('show'); 
					}); 
				},
				eventDrop: function(cita, delta, revertFunc) { // cambio de posicion (fecha)
					editar(cita); 
				},
				eventResize: function(cita,dayDelta,minuteDelta,revertFunc) { // cambio de duracion
					editar(cita); 
				},
				events: [
					<?php foreach ($citas as $cita) {  
					    $inicio = explode(' ', $cita['fecha']);
						$fin = explode(' ', $cita['fin']);
			            
			            if($inicio[1] == '00:00:00') {
			            	$inicio = $inicio[0];
			            } else {
			             	$inicio = $cita['fecha'];
			            }
			            
			            $fin = $inicio;
			            if($fin[1]) {
			                if ($fin[1] == '00:00:00')
			            	    $fin = $fin[0];
			            }
					?>
					{
					    id: "<?php echo $cita['id']; ?>",
			            title: "<?php echo $cita['clienteNom'] . ' con ' . $cita['estilistaNom']; ?>",
			            start: "<?php echo $cita['fecha']; ?>",
			            end: "<?php echo $fin; ?>",
			            color: "<?php echo $cita['producto']; ?>",
					},
					<?php } ?>
				]
			});
			
			function editar(cita) {
				start = cita.start.format('YYYY-MM-DD HH:mm:ss');
				if(cita.end) {
					end = cita.end.format('YYYY-MM-DD HH:mm:ss');
				} else {
					end = start;
				}
				
				id =  cita.id;
				
				Event = [];
				Event[0] = id;
				Event[1] = start;
				Event[2] = end;
				
				$.ajax({
				 url: 'editEventDate.php',
				 type: "POST",
				 data: {Event:Event},
				 success: function(rep) {
						if(rep == 'OK') {
							alert('Evento se ha guardado correctamente');
						} else {
							alert('No se pudo guardar. Inténtalo de nuevo.'); 
						}
					}
				});
			}

		});
	</script> 
</body>	

</html> 
