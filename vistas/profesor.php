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
	 	 	input[type="text"], input[type="date"], input[type="email"], input[type="file"]{
	 		font-size: 14px;
			}
		select {
     
     font-size: 14px;
     height: 30px;
     padding: 5px;
     
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
						<br>
						<h1>Listado de Empleados </h1>
						
					</div>
					<div class="card-body text-right">
						<span class="btn btn-primary " data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar nuevo <span class="fa fa-plus-circle"></span>
						</span>
						
						<hr>
					</div>
						<div id="tablaDatatable">  </div>
					
					<div class="card-footer text-muted">
						
					</div>
				
			</div>
		</div>
	</div>
</div>


	<!-- Modal -->
	<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
		<div class="modal-dialog  modal-md" role="document" >
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agrega Datos del Personal </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="container-fluid">
					<form id="frmnuevo">
					<div class="row">
					<div class="col-md-12">
						<label >Apellidos y Nombres</label>
						<input type="text" class="form-control form-control-sm" id="nombre" name="nombre" onKeyPress="return sololetras(event)" onpaste="return false">
					</div>
					<div class="col-md-12">
					<label>Dirección</label>
						<input type="text" class="form-control form-control-sm" id="direccion" name="direccion">
					</div>
					
					</div>
					<div class="row">
					<div class="col-md-4">
						<label>Teléfono</label>
						<input type="text" class="form-control form-control-sm" name="telefono" id="telefono"  onKeyPress="return solonumero(event)" onpaste="return false">
						
					</div>
					<div class="col-md-4">
						<label>Celular</label>
							<input type="text" class="form-control form-control-sm" name="celular" id="celular"  onKeyPress="return solonumero(event)" onpaste="return false" >
					</div>
					<div class="col-md-4">
							<label>Cargo</label>
							<select class="form-control form-control-sm" id="titulo" name="titulo"  >
							<option value="1">Rector/a </option>
							<option value="2">Docente </option>
							<option value="2">Auxiliar </option>
							<option value="2">Conserje </option>
						</select>
					</div>
							
					</div>
					
					<div class="row">
					<div class="col-md-3">
							<label >Género </label>
							<select class="form-control form-control-sm" id="genero" name="genero"  >
							<option value="A"> ...</option>
							<option value="M">M </option>
							<option value="F">F </option>
						</select>
					</div>
					
					
	
							<div class="col-md-4">
							<label>Cédula</label>
							<input type="text" class="form-control form-control-sm" name="cedula" id="cedula"  onKeyPress="return solonumero(event)" onpaste="return false" >
							</div>
							<div class="col-md-5">
							<label>Fecha Nac.</label>
							<input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
							</div>
							</div>
							<hr>
							<div class="row">
							<div class="col-md-12">
							
							<div class="custom-file">
  							<input type="file" class="custom-file-input"  id="imagen" name="imagen" lang="es">
 							 <label class="custom-file-label" for="imagen">Seleccionar Archivo</label>
							</div>
							</div>
							<div class="col-md-8">
							<label>Email</label>
							<input type="email" class="form-control form-control-sm" name="email" id="email">
							</div>
							</div>
						
					</form>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
				</div>
				
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar Datos del Personal</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body ">
					<form id="frmnuevo2">
					<div class="row">
					<div class="col-md-12">
						<label>Apellidos y Nombres</label>
						<input type="text" class="form-control input-sm" id="nombre2" name="nombre2" onKeyPress="return sololetras(event)" onpaste="return false">
					</div>
					<div class="col-md-12">
					<label>Dirección</label>
						<input type="text" class="form-control input-sm" id="direccion2" name="direccion2">
					</div>
					
					</div>
					<div class="row">
					<div class="col-md-4">
						<label>Teléfono</label>
						<input type="text" class="form-control input-sm" name="telefono2" id="telefono2"  onKeyPress="return solonumero(event)" onpaste="return false" >
						
					</div>
					<div class="col-md-4">
						<label>Celular</label>
							<input type="text" class="form-control input-sm" name="celular2" id="celular2"  onKeyPress="return solonumero(event)" onpaste="return false" >
					</div>
					<div class="col-md-4">
							<label>cargo</label>
							<select class="form-control form-control-sm" id="titulo2" name="titulo2"  >
							<option value="1">Rector/a </option>
							<option value="2">Docente </option>
							<option value="2">Auxiliar </option>
							<option value="2">Conserje </option>
						</select>
							</div>
							
					</div>
					
					<div class="row">
					<div class="col-md-2">
							<label>Género </label>
							<select  id="genero2" name="genero2"  >
							<option value="A"> </option>
							<option value="M">M </option>
							<option value="F">F </option>
						</select>
					</div>
					
					
	
							<div class="col-md-5">
							<label>Cédula</label>
							<input type="text" class="form-control input-sm" name="cedula2" id="cedula2"  onKeyPress="return solonumero(event)" onpaste="return false" >
							</div>
							<div class="col-md-5">
							<label>Fecha Nac.</label>
							<input type="date" class="form-control input-sm" name="fecha2" id="fecha2">
							</div>
							</div>
					
							<div class="row">
							<div class="col-md-8">
							<label>Foto</label>
							<input type="file" id="imagennueva" name="imagennueva">
							<input type="hidden" id="imagen2" name="imagen2">
							<input type="hidden" id="id_profesor" name="id_profesor">
							</div>
							<div class="col-md-6">
							<label>Email</label>
							<input type="email" class="form-control input-sm" name="email2" id="email2" >
							</div>
							</div>
						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>



	<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Datos del Personal</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="employee_detail">
							</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				
				</div>
				
			</div>
		</div>
	</div>

 <!--<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Detalle del Alumno</h4>
   </div>
   <div class="modal-body" id="employee_detail">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>-->

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
				url:"../procesos/Personal/agregarPersonal.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
					
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#agregarnuevosdatosmodal').modal('hide');
						
						$('#tablaDatatable').load('Personal/tablapersonal.php');
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
					url:"../procesos/Personal/actualizarPersonal.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
					
					if(r==1){
						$('#modalEditar').modal('hide');
						$('#tablaDatatable').load('Personal/tablapersonal.php');
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
		$('#tablaDatatable').load('Personal/tablapersonal.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(id_profesor){
		$.ajax({
			type:"POST",
			data:"id_profesor=" + id_profesor,
			url:"../procesos/Personal/obtenDatosPersonal.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				
				$('#nombre2').val(datos['nombre']);
				$('#genero2').val(datos['genero']);
				$('#cedula2').val(datos['cedula']);
				$('#telefono2').val(datos['telefono']);
				$('#celular2').val(datos['celular']);
				$('#direccion2').val(datos['direccion']);
				$('#fecha2').val(datos['fecha']);
				$('#imagen2').val(datos['imagen']);
				$('#titulo2').val(datos['titulo']);
				$('#email2').val(datos['email']);
				$('#id_profesor').val(datos['id_profesor']);
			}
		});
	}

  $(document).on('click', '.view_data', function(){
  //$('#dataModal').modal();
  var user_id= $(this).attr("id");
  $.ajax({
   url:"../procesos/Personal/verDatosPersonal.php",
   method:"POST",
   data:{user_id:user_id},
   success:function(data){
   	$('.modal-title').text("Infor. Del Personal");
    $('#employee_detail').html(data);
    $('#dataModal').modal('show');
   }
  });
 });

	function eliminarDatos(id_profesor){
		alertify.confirm('Eliminar un Docente', '?Seguro de eliminar :(?', function(){ 

			$.ajax({
				type:"POST",
				data:"id_profesor=" + id_profesor,
				url:"../procesos/Personal/eliminarPersonal.php",
				success:function(r){
					
					if(r==1){
						$('#tablaDatatable').load('Personal/tablapersonal.php');
						alertify.success("Eliminado con exito !");
					}else{
						alertify.error("No se pudo eliminar...");
					}
				}
			});

		}
		, function(){
			alertify.error('Cancelo !');

		});
	}

	
</script>