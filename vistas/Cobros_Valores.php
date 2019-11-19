<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "dependencias.php"; 
		 require_once "../clases/conexion.php"; 
		 $c= new conectar();
		$conexion=$c->conexion();
	
	 ?>
	
</head>
<body class="fondo">
<?php require_once "menu.php"; ?>
	<div class="container-fluid ">


 <div class="row">
 <div class="col-lg-12">
				<div class="card text-left ">
					<div class="card-header box ">
						<h1>Módulo Cobros de Valores</h1>
						<h2>Ingreso, Actualizar, Eliminar </h2>
					</div>
					<div class="card-body text-right">
						
						<span class="btn btn-danger " data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar  <span class="fa fa-plus-circle"></span>
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
		<div class="modal-dialog  modal-md" role="document" >
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar Cobro</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="container-fluid">
					<form id="frmnuevo">
					<div class="row">
					<div class="col-md-8">
						<label >Cobro</label>
						<input type="text" class="form-control form-control-sm" id="cobro" name="cobro"  onpaste="return false">
					</div>
				</div>
					<div class="row">
							<div class="col-md-12 form-group ">
							<label>Detalle</label>
							<textarea class="form-control" id="detalle" name="detalle" rows="3"></textarea>
							</div>
														
							</div>
					<div class="row">
					<div class="col-md-8">
						<label >Valor</label>
						<input type="text" class="form-control form-control-sm" id="valor" name="valor"  onpaste="return false">
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
					<h5 class="modal-title" id="exampleModalLabel">Actualizar datos del Año Lectivo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body ">
					<form id="frmnuevo2">
				<div class="row">
					<div class="col-md-8">
						<label >Cobro</label>
						<input type="text" class="form-control form-control-sm" id="cobro2" name="cobro2"  onpaste="return false">
					</div>
				</div>
					<div class="row">
							<div class="col-md-12 form-group ">
							<label>Detalle</label>
							<textarea class="form-control" id="detalle2" name="detalle2" rows="3"></textarea>
							</div>
														
							</div>
					<div class="row">
					<div class="col-md-8">
						<label >Valor</label>
						<input type="text" class="form-control form-control-sm" id="valor2" name="valor2"  onpaste="return false">
						<input type="hidden" class="form-control form-control-sm" id="id" name="id"  onpaste="return false">
						



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



	

</body>
</html>



<script type="text/javascript">
	$(document).ready(function(){
		

		$('#btnAgregarnuevo').click(function(){


				vacios=validarFormVacio('frmnuevo');

				if(vacios > 0){

					alertify.alert("Información","Debes llenar todos los campos!!");
					return false;
				}
			var formData = new FormData(document.getElementById("frmnuevo"));

			$.ajax({
				url:"../procesos/Pago/agregaCobro.php",
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
						$('#tablaDatatable').load('Pago/tablaCobro.php');
						alertify.success("agregado con exito :D");
					}else{
						alertify.error("Fallo al agregar :(");
					}
				}
			});
		});

		$('#btnAgregarnuevo2').click(function(){


				vacios=validarFormVacio('frmnuevo');

				if(vacios > 0){

					alertify.alert("Información","Debes llenar todos los campos!!");
					return false;
				}
			var formData = new FormData(document.getElementById("frmnuevo"));

			$.ajax({
				url:"../procesos/Cursos/agregatutor.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
					
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#agregarnuevosdatosmodal2').modal('hide');
						$('#tablaDatatable').load('Cursos/tablaCursos.php');
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
					url:"../procesos/Pago/actualizaCobro.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
						if(r==1){
						$('#modalEditar').modal('hide');
						$('#tablaDatatable').load('Pago/tablaCobro.php');
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
		$('#tablaDatatable').load('Pago/tablaCobro.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(id){
		$.ajax({
			type:"POST",
			data:"id=" + id,
			url:"../procesos/Pago/ObtenDatosCobro.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				
				$('#cobro2').val(datos['cobro']);
				$('#detalle2').val(datos['detalle']);
				$('#valor2').val(datos['valor']);
				$('#id').val(datos['idcobro']);
				
			}
		});
	}

 

	function eliminarDatos(id){
		alertify.confirm('Eliminar el cobro', '¿Seguro de eliminar el registro :(?', function(){ 

			$.ajax({
				type:"POST",
				data:"id=" + id,
				url:"../procesos/Pago/eliminarcobro.php",
				success:function(r){
					
					if(r==1){
						$('#tablaDatatable').load('Pago/tablaCobro.php');
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