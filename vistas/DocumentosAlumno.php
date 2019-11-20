<?php session_start();?>
<!DOCTYPE html>
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
<?php require_once "menu.php";
      require_once "../clases/conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
		 ?>
	<div class="container-fluid ">


 <div class="row">
 <div class="col-lg-12">
				<div class="card text-left ">
					<div class="card-header box ">
						<h1>Documentos  </h1>
						<h2>Ingreso, Actualizar, Eliminar </h2>
					</div>
					<div class="card-body text-right">
					<a href="Subir_Documento.php" class="btn btn-primary">
							Agregar nuevo <span class="fa fa-plus-circle"></span></a>
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
		<div class="modal-dialog  modal-lg" role="document" >
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
					<div class="col-md-8">
					
						<label>Nombre del Estudiante</label>
						<select class="form-control form-control-sm" id="alumno" name="alumno">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT id_datosalumno, apellido_alumno,nombre_alumno from datos_alumno ";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1].' '.$ver2[2]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
				</div>
				<hr>
					
				

				
			
				<hr>
				<div class="row">	
					<div class="col-md-4">
						<label>Documento</label>	
					</div>					
						<div class="custom-file">
  							<input type="file" class="custom-file-input"  id="imagen" name="imagen" lang="es">
 							 <label class="custom-file-label" for="imagen">Seleccionar Archivo</label>
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
					<div class="col-md-8">
					
						<label>Nombre del Estudiante</label>
						<select class="form-control form-control-sm" id="alumno2" name="alumno2">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT id_datosalumno, apellido_alumno,nombre_alumno from datos_alumno ";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1].' '.$ver2[2]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
				</div>
				<hr>
					<div class="row">
					<div class="col-md-4">
						<label >Promoción</label>
						<select class="form-control form-control-sm" id="promocion2" name="promocion2"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
					<div class="col-md-4">
						<label >Informe de notas</label>
						<select class="form-control form-control-sm" id="notas2" name="notas2"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
					<div class="col-md-4">
						<label >C.I. Padre</label>
						<select class="form-control form-control-sm" id="cpadre2" name="cpadre2"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
					</div>
					<div class="row">
					<div class="col-md-4">
						<label >Promocion</label>
						<select class="form-control form-control-sm" id="promocion22" name="promocion22"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
					<div class="col-md-4">
						<label >Partida de Nacimiento</label>
						<select class="form-control form-control-sm" id="partida2" name="partida2"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
				<div class="col-md-4">
						<label >C. I. madre</label>
						<select class="form-control form-control-sm" id="cmadre2" name="cmadre2"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
				</div>

					<div class="row">
					<div class="col-md-4">
						<label >Promocion</label>
						<select class="form-control form-control-sm" id="promocion32" name="promocion32"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
					<div class="col-md-4">
						<label >Fotos</label>
						<select class="form-control form-control-sm" id="fotos2" name="fotos2"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
				<div class="col-md-4">
						<label >C. I. Estudiante</label>
						<select class="form-control form-control-sm" id="calumno2" name="calumno2"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
				</div>
					<div class="row">
					<div class="col-md-4">
						<label >Planilla de Luz</label>
						<select class="form-control form-control-sm" id="planilla2" name="planilla2"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
					<div class="col-md-4">
						<label >Carnet de vacunas</label>
						<select class="form-control form-control-sm" id="carnet2" name="carnet2"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
				<div class="col-md-4">
						<label >C. no deuda</label>
						<select class="form-control form-control-sm" id="certificado12" name="certificado12"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label >Informe ecónomico </label>
						<select class="form-control form-control-sm" id="informe2" name="informe2"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
					<div class="col-md-4">
						<label >Croquis</label>
						<select class="form-control form-control-sm" id="croquis2" name="croquis2"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
				<div class="col-md-4">
						<label >C. Matricula</label>
						<select class="form-control form-control-sm" id="certificado22" name="certificado22"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
				</div>
				<hr>
				<div class="row">							
						<div class="col-md-8">
							<input type="file" id="imagennueva" name="imagennueva">
							<input type="hidden" id="imagen2" name="imagen2">
							
 							 <input type="hidden" name="id" id="id">
							</div>
					  </div>
						
					</form>
				</div>
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
				url:"../procesos/Alumnos/agregarDocumentos.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
					
					if(r==1){
						alert(r);
						$('#frmnuevo')[0].reset();
						$('#agregarnuevosdatosmodal').modal('hide');
						
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
		$('#tablaDatatable').load('Alumno/tablaDocumentos.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(id){
		$.ajax({
			type:"POST",
			data:"id="+id,
			url:"../procesos/Alumnos/obtenDatosDocumento.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#promocion2').val(datos['promocion']);
				$('#promocion22').val(datos['promocion2']);
				$('#promocion32').val(datos['promocion3']);
				$('#planilla2').val(datos['planilla']);
				$('#informe12').val(datos['informe']);
				$('#notas2').val(datos['notas']);
				$('#partida2').val(datos['partida']);
				/*$('#fotos2').val(datos['foto']);
				$('#carnet2').val(datos['carnet']);
				$('#croquis2').val(datos['croquis']);
				$('#cpadre2').val(datos['cpadre']);
				$('#cmadre2').val(datos['cmadre']);
				$('#calumno2').val(datos['calumno']);
				$('#certificado12').val(datos['certificado1']);
				$('#certificado22').val(datos['certificado2']);
				$('#alumno2').val(datos['alumno']);
				$('#imagen2').val(datos['imagen']);*/
				$('#id_documento').val(datos['id_documento']);
			}
		});
	}



	function eliminarDatos(id){
		alertify.confirm('Eliminar un Docente', '?Seguro de eliminar :(?', function(){ 

			$.ajax({
				type:"POST",
				data:"id=" + id,
				url:"../procesos/Alumnos/eliminarDocumento.php",
				success:function(r){
					
					if(r==1){
						$('#tablaDatatable').load('Alumno/tablaDocumentos.php');
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