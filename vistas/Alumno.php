<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

	<title></title>
	<?php require_once "dependencias.php"; 
	 ?>
	 <style type="text/css">
	 	label{
	 		font-size: 14px;
	 		font-weight: bold;
	 		text-align: center;
	 	 	}
	 	 	input[type="text"], input[type="date"] {
	 		font-size: 14px;

}
	 </style>
</head>
<body class="fondo">
<?php require_once "menu.php"; ?>
	<div class="container-fluid ">


 <div class="row">
 <div class="col-lg-12">
				<div class="card text-left ">
					<div class="card-header box ">
						<h1>Registro de Matriculación de Alumnos</h1>
						<h2>Ingreso, Actualizar, Eliminar </h2>
					</div>
					<div class="card-body text-right">
						<a href="Datos_Familiares.php" class="btn btn-warning ">
							Datos Familiares <span class="fa fa-plus-circle"></span>
						</a>
						<a href="Datos_Representante.php" class="btn btn-danger ">
							Datos Representante <span class="fa fa-plus-circle"></span>
						</a>
												
						<span class="btn btn-primary " data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar nuevo <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
					</div>
						<div id="tablaDatatable">  </div>
					
					<div class="card-footer text-muted">
						Escuela de Educación Básica "Mundo de Colores"
					</div>
				
			</div>
		</div>
	</div>
</div>

	<!-- Modal -->
	<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
		<div class="modal-dialog  modal-lg" role="document" >
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Información del Estudiante </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="container-fluid">
					<form id="frmnuevo">
					<div class="row">
						<label> DATOS DEL ESTUDIANTE </label> <br>
					</div>
					<div class="row">
					<div class="col-md-8">
						<label>Apellidos y Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
					</div>
					
					<div class="col-md-4">
						<label>Fecha de nacimiento</label>
						<input type="date" class="form-control input-sm" name="fecha" id="fecha">
					</div>
					
					</div>
					<div class="row">
					<div class="col-md-4">
						<label>Nacionalidad</label>
						<input type="text" class="form-control input-sm" name="nacionalidad" id="nacionalidad">
					</div>
					<div class="col-md-4">
						<label>Teléfono</label>
							<input type="text" class="form-control input-sm" name="telefono" id="telefono">
					</div>
					<div class="col-md-4">
							<label>Cédula </label>
							<input type="text" class="form-control input-sm" name="cedula" id="cedula">
					</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<label>Dirección</label>
							<input type="text" class="form-control input-sm" name="direccion" id="direccion">

					</div>
				</div>
					<br>
					<div class="row">
						<div class="col-md-8">
							<label>Foto del Alumno</label>
						<div class="custom-file">
							<label class="custom-file-label" for="imagen">Seleccionar Archivo</label>
  							<input type="file" class="custom-file-input"  id="imagen" name="imagen" lang="es">
 							 
							</div>
					</div>
					</div>
					<br>
					<div class="row">
					<div class="col-md-6">
						<label>Jardín de Procedencia</label>
						<input type="text" class="form-control input-sm" name="nescuela" id="nescuela">
					</div>
					<div class="col-md-6">
						<label> En caso de emegercia llamar a: </label>
							<select class="form-control form-control-sm" id="emergencia" name="emergencia"  >
							<option value="A"> ...</option>
							<option value="1">Padre </option>
							<option value="2">Madre </option>
							<option value="3">Representante </option>						
					</select>
					</div>
					</div>
					<hr>
					<label><b>ADICIONALES</b></label>
						<br>
							<div class="row">
							<div class="col-md-6">
							<label>Entrega de documentación</label>
							<select class="form-control form-control-sm" id="documento" name="documento"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>						
					</select>
							</div>
							<div class="col-md-6">
							<label>El alumno usa pañal</label>
							<select class="form-control form-control-sm" id="condicion" name="condicion"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>						
					</select>
							</div>
							</div>
							<div class="row">
							<div class="col-md-8 form-group green-border-focus">
							<label>Observación</label>
							<textarea class="form-control" id="observacion" name="observacion" rows="3"></textarea>
							</div>
							
							
							</div>
				
			</div>
		</form>
	</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
				</div>
			</div>
		</div>
	</div>



	<!-- Modal -->
	<!-- Modal -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
		<div class="modal-dialog  modal-lg" role="document" >
			<div class="modal-content modal-lg">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ingreso de Matricula </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="container-fluid">
					<form id="frmnuevo2">
						<div class="row">
						<label> DATOS DEL ESTUDIANTE </label> <br>
					</div>
					<div class="row">
					<div class="col-md-5">
						<label>Apellidos y Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre2" name="nombre2">
					</div>
					
					<div class="col-md-4">
						<label>Fecha de nacimiento</label>
						<input type="date" class="form-control input-sm" name="fecha2" id="fecha2">
					</div>
					
					</div>
					<div class="row">
					<div class="col-md-4">
						<label>Nacionalidad</label>
						<input type="text" class="form-control input-sm" name="nacionalidad2" id="nacionalidad2">
					</div>
					<div class="col-md-4">
						<label>Telefono</label>
							<input type="text" class="form-control input-sm" name="telefono2" id="telefono2">
					</div>
					<div class="col-md-4">
							<label>Cédula </label>
							<input type="text" class="form-control input-sm" name="cedula2" id="cedula2">
					</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<label>Dirección</label>
							<input type="text" class="form-control input-sm" name="direccion2" id="direccion2">

					</div>
				</div>
					<br>
					<div class="row">
						<div class="col-md-8">
						
  							<input type="file" id="imagennueva" name="imagennueva">
							<input type="hidden" id="imagen2" name="imagen2">
							<input type="hidden" id="idalumno" name="idalumno">
					</div>
					</div>
					<br>
					<div class="row">
						<label> PLANTEL DONDE PROCEDE </label>
					</div>
				
					<div class="row">
					<div class="col-md-6">
						<label>Nombre de la Escuela</label>
						<input type="text" class="form-control input-sm" name="nescuela2" id="nescuela2">
					</div>
					<div class="col-md-6">
						<label> En caso de emegercia llamar a: </label>
							<select class="form-control form-control-sm" id="emergencia2" name="emergencia2"  >
							<option value="A"> ...</option>
							<option value="1">Padre </option>
							<option value="2">Madre </option>
							<option value="3">Representante </option>						
					</select>
					</div>
					</div>
					<hr>
					<label><b>DATOS FAMILIARES DEL ESTUDIANTE</b></label>
						<br>
							<div class="row">
							<div class="col-md-6">
							<label>Entrega de documentación</label>
							<select class="form-control form-control-sm" id="documento2" name="documento2"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>						
					</select>
							</div>
							<div class="col-md-6">
							<label>El alumno usa pañal</label>
							<select class="form-control form-control-sm" id="condicion2" name="condicion2"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>						
					</select>
				</div>
			</div>
						<hr>
						<div class="row">
							<div class="col-md-8 form-group green-border-focus">
							<label>Observación</label>
							<textarea class="form-control" id="observacion2" name="observacion2" rows="3"></textarea>
							</div>
							
							
							</div>
							
						
							
							
						</div>
						</div>
						
					</form>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>



</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){
		

		$('#btnAgregarnuevo').click(function(){


				vacios=validarFormVacio('frmnuevo');

				if(vacios > 0){

					alertify.alert("Informaci?","Debes llenar todos los campos!!");
					return false;
				}
			var formData = new FormData(document.getElementById("frmnuevo"));

			$.ajax({
				url:"../procesos/Alumnos/agregarAlumno.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
					alert(r);
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#agregarnuevosdatosmodal').modal('hide');
						
						$('#tablaDatatable').load('Alumno/tablaAlumno.php');
						alertify.success("agregado con exito :D");
					}else{
						alertify.error("Fallo al agregar :(");
					}
				}
			});
		});
		$('#btnActualizar').click(function(){
			var formData = new FormData(document.getElementById("frmnuevo2"));

			$.ajax({
					url:"../procesos/Alumnos/actualizarAlumno.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
					alert(r);
						
					if(r==1){
						$('#modalEditar').modal('hide');
						$('#tablaDatatable').load('Alumno/tablaAlumno.php');
						alertify.success("Actualizado con exito :D");
					}else{
						alertify.error("Fallo al actualizar :(");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('Alumno/tablaAlumno.php');
	});
</script>


<script type="text/javascript">
	function agregaFrmActualizar(idalumno){
		$.ajax({
			type:"POST",
			data:"idalumno=" + idalumno,
			url:"../procesos/Alumnos/obtenDatosAlumno.php",
			success:function(r){
			
				datos=jQuery.parseJSON(r);
				$('#idalumno').val(datos['idalumno']);
				$('#nombre2').val(datos['nombre']);
				$('#fecha2').val(datos['fecha']);
				$('#nacionalidad2').val(datos['nacionalidad']);
				$('#cedula2').val(datos['cedula']);
				$('#nescuela2').val(datos['nescuela']);
				$('#imagen2').val(datos['imagen']);
				$('#emergencia2').val(datos['emergencia']);
				$('#telefono2').val(datos['telefono']);
				$('#direccion2').val(datos['direccion']);
				$('#documento2').val(datos['documento']);
				$('#condicion2').val(datos['condicion']);
				$('#observacion2').val(datos['observacion']);
				}
		});
	}

  $(document).on('click', '.view_data', function(){
  //$('#dataModal').modal();
  var user_id= $(this).attr("id");
  $.ajax({
   url:"../procesos//Alumnos/verDatosAlumno.php",
   method:"POST",
   data:{user_id:user_id},
   success:function(data){
   	$('.modal-title').text("Infor. Alumno");
    $('#employee_detail').html(data);
    $('#dataModal').modal('show');
   }
  });
 });

	function eliminarDatos(idalumno){
		alertify.confirm('Eliminar estudiante', '¿Seguro de eliminar este alumno :(?', function(){ 

			$.ajax({
				type:"POST",
				data:"idalumno=" + idalumno,
				url:"../procesos//Alumnos/eliminarAlumno.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('Alumno/tablaAlumno.php');
						alertify.success("Eliminado con exito !");
					}else{
						alertify.error("No se pudo eliminar...");
					}
				}
			});

		}
		
	}

	
</script>