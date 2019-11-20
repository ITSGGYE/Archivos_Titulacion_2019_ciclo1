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
						<h1>Listado de Paralelos</h1>
						<h2>Ingreso, Actualizar, Eliminar </h2>
					</div>
					<div class="card-body text-right">
						
						<span class="btn btn-danger " data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar Paralelo <span class="fa fa-plus-circle"></span>
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
		<div class="modal-dialog  modal-md" role="document" >
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar Paralelo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="container-fluid">
					<form id="frmnuevo" onclick="return valida(this)">
					<div class="row">
					<div class="col-md-8">
						<label >Nombre del Paralelo</label>
						<input type="text" class="form-control form-control-sm" id="nombre" name="nombre">
					</div>
					<div class="col-md-12">
					<label>Estado</label>
						<select class="form-control form-control-sm" id="estado" name="estado"  >
							<option value="X"> ...</option>
							<option value="1">Habilitado </option>
							<option value="0">Deshabilitado </option>
						</select>
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
					<h5 class="modal-title" id="exampleModalLabel">Actualizar datos del Paralelo</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body ">
					<form id="frmnuevo2">
					<div class="row">
					<div class="col-md-12">
						<label >Nombre del Paralelo</label>
						<input type="text" class="form-control form-control-sm" id="nombre2" name="nombre2" onKeyPress="return sololetras2(event)" onpaste="return false">
					</div>
					<div class="col-md-12">
					<label>Estado</label>
						<select class="form-control form-control-sm" id="estado2" name="estado2"  >
							<option value="X"> ...</option>
							<option value="1">Habilitado </option>
							<option value="0">Deshabilitado </option>
						</select>

					</div>
					<input type="hidden"  id="id_paralelo" name="id_paralelo">
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
				url:"../procesos/Paralelo/agregaParalelo.php",
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
						$('#tablaDatatable').load('Paralelo/tablaParalelo.php');
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
					url:"../procesos/Paralelo/actualizaParalelo.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
						if(r==1){
						$('#modalEditar').modal('hide');
						$('#tablaDatatable').load('Paralelo/tablaParalelo.php');
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
		$('#tablaDatatable').load('Paralelo/tablaParalelo.php');
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(id_paralelo){
		$.ajax({
			type:"POST",
			data:"id_paralelo=" + id_paralelo,
			url:"../procesos/Paralelo/obtenDatosParalelo.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				
				$('#nombre2').val(datos['nombre']);
				$('#estado2').val(datos['estado']);
				$('#id_paralelo').val(datos['id_paralelo']);
				
			}
		});
	}

 

	function eliminarDatos(id_paralelo){
		alertify.confirm('Eliminar un Curso', '¿Seguro de eliminar el paralelo :(?', function(){ 

			$.ajax({
				type:"POST",
				data:"id_paralelo=" + id_paralelo,
				url:"../procesos/Paralelo/eliminarParalelo.php",
				success:function(r){
					
					if(r==1){
						$('#tablaDatatable').load('Paralelo/tablaParalelo.php');
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

<script type="text/javascript">
function valida(f) {
  var ok = true;
 
  if(f.elements["nombre"].value == "")
  {
    
    ok = false;
    alertify.error("Debe ingresar el nombre del paralelo");
   
  }

 
  if(ok == false)
  
  return ok;
}
</script>