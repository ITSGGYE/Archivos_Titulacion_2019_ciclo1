<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- IMPORTAMOS jQuery y Bootstrap. En realidad, bootstrap aquí no lo necesitamos para nada,
		pero nos permite un poco de presencia. Por hacer bonito, vamos. -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script language='javascript'>
			$(function(){
				$('#envio').on('click', function (e){
					e.preventDefault(); // Evitamos que salte el enlace.
					/* Creamos un nuevo objeto FormData. Este sustituye al 
					atributo enctype = "multipart/form-data" que, tradicionalmente, se 
					incluía en los formularios (y que aún se incluye, cuando son enviados 
					desde HTML. */
					var paqueteDeDatos = new FormData();
					/* Todos los campos deben ser añadidos al objeto FormData. Para ello 
					usamos el método append. Los argumentos son el nombre con el que se mandará el 
					dato al script que lo reciba, y el valor del dato.
					Presta especial atención a la forma en que agregamos el contenido 
					del campo de fichero, con el nombre 'archivo'. */
					paqueteDeDatos.append('imagen', $('#imagen')[0].files[0]);
					paqueteDeDatos.append('id', $('#id').prop('value'));
					paqueteDeDatos.append('nombre', $('#nombre').prop('value'));
					var destino = "php/guardar_tipo_producto.php"; // El script que va a recibir los campos de formulario.
					/* Se envia el paquete de datos por ajax. */
					$.ajax({
						url: destino,
						type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
						contentType: false,
						data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
						processData: false,
						cache: false, 
						success: function(r){
							document.write(r);
							if(r==1){
								var notification = alertify.notify('Grabacion Exitosa.Presione para continuar', 'success', 5, function(){  location.reload(); });
								
							}else{
								
								alertify.success("Ingreso Incorrecto");
							}
						
						}
					});
				});
			});
		</script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="header alert alert-info">FORMULARIO CON AJAX POR jQuery</div>
		</div>
		<!-- El HTML son solo unos campos de formulario. Ni siquiera necesitamos,
		para este ejemplo, incluir esos campos en el contexto de un formulario,
		por lo que no hemos puesto las etiquetas <form></form> -->
		<div class="container">
			<div class="row">
				<label for="campoNombre">Nombre:<br />
				<input type="text" class="form-control" id="id" />
				</label>
			</div>
			<div class="row">
				<label for="campoCorreo">Correo:<br />
				<input type="text" class="form-control" id="nombre" />
				</label>
			</div>
			<div class="row">
				<label for="campoFichero">Fichero:<br />
				<input type="file" class="form-control" id="imagen" />
				</label>
			</div>
			<br />
			<div class="row">
				<a href='#' id='envio' class='btn btn-primary btn-lg'>Enviar</a>
			</div>
		</div>
	</body>
</html>