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
						<a href="AlumnoCurso.php" class="btn btn-warning ">
							Asignar Curso <span class="fa fa-plus-circle"></span>
						</a>
						<a href="../procesos/Reportes/reporteingresoalumnos.php" class="btn btn-danger ">
							PDF 
						</a>
						
						<span class="btn btn-primary " data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar nuevo <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
					</div>
						<div id="tablaDatatable">  </div>
					
					<div class="card-footer text-muted">
						Escuela de Educación Básica "Julio Peña Bermeo"
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
					<h5 class="modal-title" id="exampleModalLabel">Ingreso de Matricula </h5>
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
					<div class="col-md-5">
						<label>Apellidos y Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre">
					</div>
					<div class="col-md-3">
						<label>Lugar de Nacimiento</label>
						<input type="text" class="form-control input-sm" id="lugar" name="lugar">
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
						<label>Repite Año</label>
							<input type="text" class="form-control input-sm" name="repite" id="repite">
					</div>
					<div class="col-md-4">
							<label>Cédula </label>
							<input type="text" class="form-control input-sm" name="cedula" id="cedula">
					</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-8">
						<div class="custom-file">
  							<input type="file" class="custom-file-input"  id="imagen" name="imagen" lang="es">
 							 <label class="custom-file-label" for="imagen">Seleccionar Archivo</label>
							</div>
					</div>
					</div>
					<br>
					<div class="row">
						<label> PLANTEL DONDE PROCEDE </label>
					</div>
				
					<div class="row">
					<div class="col-md-6">
						<label>Nombre de la Escuela</label>
						<input type="text" class="form-control input-sm" name="nescuela" id="nescuela">
					</div>
					<div class="col-md-6">
						<label>Dirección </label>
							<input type="text" class="form-control input-sm" name="lescuela" id="lescuela">
					</div>
					</div>
					<hr>
					<label><b>DATOS FAMILIARES DEL ESTUDIANTE</b></label>
						<br>
							<div class="row">
							<div class="col-md-6">
							<label>Nombre del Padre</label>
							<input type="text" class="form-control input-sm" name="npadre" id="npadre">
							</div>
							<div class="col-md-6">
							<label>Ocupacion</label>
							<input type="text" class="form-control input-sm" name="opadre" id="opadre">
							</div>
							</div>
							<div class="row">
							<div class="col-md-6">
							<label>Nombre de la Madre</label>
							<input type="text" class="form-control input-sm" name="nmadre" id="nmadre">
							</div>
							<div class="col-md-6">
							<label>Ocupacion</label>
							<input type="text" class="form-control input-sm" name="omadre" id="omadre">
							</div>
							</div>
						<hr>
							<label> DATOS DEL REPRESENTANTE</label>
						
							<div class="row">
							<div class="col-md-6">
							<label>Nombre del Representante</label>
							<input type="text" class="form-control input-sm" name="nrepre" id="nrepre">
						</div>
							<div class="col-md-6">
							<label>Dirección domicilio</label>
							<input type="text" class="form-control input-sm" name="drepre" id="drepre">
							</div>
							</div>
							<div class="row">
							<div class="col-md-4">
							<label>Cédula</label>
							<input type="text" class="form-control input-sm" name="crepre" id="crepre">
							</div>
							<div class="col-md-4">
							<label>Teléfono*</label>
							<input type="text" class="form-control input-sm" name="trepre" id="trepre">
							</div>
							<div class="col-md-4">
							<label>Relación Familiar</label>
							<input type="text" class="form-control input-sm" name="rfrepre" id="rfrepre">
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
					<div class="col-md-3">
						<label>Lugar de Nacimiento</label>
						<input type="text" class="form-control input-sm" id="lugar2" name="lugar2">
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
						<label>Repite Año</label>
							<input type="text" class="form-control input-sm" name="repite2" id="repite2">
					</div>
					<div class="col-md-4">
							<label>Cédula </label>
							<input type="text" class="form-control input-sm" name="cedula2" id="cedula2">
					</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-8">
						
  							<input type="file" id="imagennueva" name="imagennueva">
							<input type="hidden" id="imagen2" name="imagen2">
							<input type="hidden" id="id_alumno" name="id_alumno">
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
						<label>Dirección </label>
							<input type="text" class="form-control input-sm" name="lescuela2" id="lescuela2">
					</div>
					</div>
					<hr>
					<label><b>DATOS FAMILIARES DEL ESTUDIANTE</b></label>
						<br>
							<div class="row">
							<div class="col-md-6">
							<label>Nombre del Padre</label>
							<input type="text" class="form-control input-sm" name="npadre2" id="npadre2">
							</div>
							<div class="col-md-6">
							<label>Ocupacion</label>
							<input type="text" class="form-control input-sm" name="opadre2" id="opadre2">
							</div>
							</div>
							<div class="row">
							<div class="col-md-6">
							<label>Nombre de la Madre</label>
							<input type="text" class="form-control input-sm" name="nmadre2" id="nmadre2">
							</div>
							<div class="col-md-6">
							<label>Ocupacion</label>
							<input type="text" class="form-control input-sm" name="omadre2" id="omadre2">
							</div>
							</div>
						<hr>
							<label> DATOS DEL REPRESENTANTE</label>
						
							<div class="row">
							<div class="col-md-6">
							<label>Nombre del Representante</label>
							<input type="text" class="form-control input-sm" name="nrepre2" id="nrepre2">
						</div>
							<div class="col-md-6">
							<label>Dirección domicilio</label>
							<input type="text" class="form-control input-sm" name="drepre2" id="drepre2">
							</div>
							</div>
							<div class="row">
							<div class="col-md-4">
							<label>Cédula</label>
							<input type="text" class="form-control input-sm" name="crepre2" id="crepre2">
							</div>
							<div class="col-md-4">
							<label>Teléfono*</label>
							<input type="text" class="form-control input-sm" name="trepre2" id="trepre2">
							</div>
							<div class="col-md-4">
							<label>Relación Familiar</label>
							<input type="text" class="form-control input-sm" name="rfrepre2" id="rfrepre2">
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
					
					if(r==1){
						alert(r);
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
				$('#id_alumno').val(datos['id_alumno']);
				$('#nombre2').val(datos['nombre']);
				$('#lugar2').val(datos['lugar']);
				$('#fecha2').val(datos['fecha']);
				$('#nacionalidad2').val(datos['nacionalidad']);
				$('#repite2').val(datos['repite']);
				$('#cedula2').val(datos['cedula']);
				$('#nescuela2').val(datos['nescuela']);
				$('#lescuela2').val(datos['lescuela']);
				$('#imagen2').val(datos['imagen']);
				$('#npadre2').val(datos['npadre']);
				$('#opadre2').val(datos['opadre']);
				$('#nmadre2').val(datos['nmadre']);
				$('#omadre2').val(datos['omadre']);
				$('#nrepre2').val(datos['nrepre']);
				$('#crepre2').val(datos['crepre']);
				$('#drepre2').val(datos['drepre']);
				$('#trepre2').val(datos['trepre']);
				$('#rfrepre2').val(datos['rfrepre']);
				
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
		, function(){

		});
	}

	
</script>