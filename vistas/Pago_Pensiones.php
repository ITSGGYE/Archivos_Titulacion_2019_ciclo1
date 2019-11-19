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
<?php require_once "menu.php"; 
 	require_once "../clases/conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();?>
	<div class="container-fluid ">


 <div class="row">
 <div class="col-lg-12">
				<div class="card text-left ">
					<div class="card-header box ">
						<br>
						<h1>Registro de Cobro de Pensiones</h1>
						
					</div>
					<div class="card-body text-right">
										
						
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
					<h5 class="modal-title" id="exampleModalLabel">Pago de Matricula </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="container-fluid">
					<form id="frmnuevo">
					
					<div class="row">
					<div class="col-md-8">
						<label>Cliente:</label>
						<input type="text" class="form-control input-sm" id="cliente" name="cliente">
					</div>
					
					<div class="col-md-4">
						<label>Teléfono</label>
						<input type="text" class="form-control input-sm" name="telefono" id="telefono">
					</div>
					
					</div>
					<div class="row">
					<div class="col-md-4">
						<label>RUC/Cédula</label>
						<input type="text" class="form-control input-sm" name="cedula" id="cedula">
					</div>
					<div class="col-md-6">
						<label>Dirección</label>
							<input type="text" class="form-control input-sm" name="direccion" id="direccion">
					</div>
					
					</div>
					<div class="row">
					<div class="col-md-4">
						<label>Pensión/Adicional</label>
						<select id="tipo" name="tipo" class="form-control form-control-sm">
							<option value="A"> ...</option>
							
							<option value="1">Pensión </option>
							<option value="2">Adicional </option>
						</select>
					</div>
					<div class="col-md-6">
						<label>Mes de Pago</label>
							<select id="mes" name="mes" class="form-control form-control-sm">
							<option value="A"> ...</option>
							
							<option value="1">Enero </option>
							<option value="2">Febrero </option>
							<option value="3">Marzo </option>
							<option value="4">Abril</option>
							<option value="5">Mayo </option>
							<option value="6">Junio </option>
							<option value="7">Julio </option>
							<option value="8">Agosto </option>
							<option value="9">Septiembre </option>
							<option value="10">Octubre </option>
							<option value="11">Noviembre </option>
							<option value="12">Diciembre </option>
							


					

						</select>
					</div>
					
					</div>
					<div class="row">
						<div class="col-md-8">
							<label >Estudiante</label>
     						<select class="form-control form-control-sm" id="alumno" name="alumno">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT id_alumno, nombre_alumno from alumno ";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[0]."-".$ver2[1]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
					<div class="col-md-4">
						<label>Pago</label>
							<input type="text" class="form-control input-sm" name="pago" id="pago">
					</div>
				</div>
					
					<br>

					
							<div class="row">
							<div class="col-md-8 form-group green-border-focus">
							<label>Detalle</label>
							<textarea class="form-control" id="detalle" name="detalle" rows="3"></textarea>
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
					<h5 class="modal-title" id="exampleModalLabel">Cobro Pensión </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="container-fluid">
					<form id="frmnuevo2">
						<div class="row">
						<div class="col-md-8">
							<label >Estudiante</label>
     						<select class="form-control form-control-sm" id="alumno2" name="alumno2">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT id_alumno, nombre_alumno from alumno ";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[0]."-".$ver2[1]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
					
						<div class="col-md-4">
						<label >Elija el cobro a realizar</label>
     						<select class="form-control form-control-sm" id="cobro2" name="cobro2">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT id_cobro, cobro, valor  from cobro_valores";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1]."-".$ver2[2]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
				</div>
				
									<div class="row">
					<div class="col-md-4">
						<label>Pension/Adicional</label>
						<select id="tipo2" name="tipo2" class="form-control form-control-sm">
							<option value="A"> ...</option>
							
							<option value="1">Pensión </option>
							<option value="2">Adicional </option>
						</select>
					</div>
					<div class="col-md-6">
						<label>Mes de Pago</label>
							<select id="mes2" name="mes2" class="form-control form-control-sm">
							<option value="A"> ...</option>
							
							<option value="1">Enero </option>
							<option value="2">Febrero </option>
							<option value="3">Marzo </option>
							<option value="4">Abril</option>
							<option value="5">Mayo </option>
							<option value="6">Junio </option>
							<option value="7">Julio </option>
							<option value="8">Agosto </option>
							<option value="9">Septiembre </option>
							<option value="10">Octubre </option>
							<option value="11">Noviembre </option>
							<option value="12">Diciembre </option>
							


					

						</select>
					</div>
					
					</div>
					
					
					<br>

					
							<div class="row">
							<div class="col-md-8 form-group green-border-focus">
							<label>Detalle</label>
							<textarea class="form-control" id="detalle2" name="detalle2" rows="3"></textarea>
							<input type="hidden" class="form-control input-sm" name="id" id="id">

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
	$('#tablaDatatable').load('Pago/tablaPagoPension.php');
	});
</script>
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
				url:"../procesos/Pago/agregaPagoPensiones.php",
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
						
						$('#tablaDatatable').load('Pago/tablaPagoPension.php');
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
					url:"../procesos/Pago/actualizaPagoPensiones.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
					
						if(r==1){

						$('#modalEditar').modal('hide');
						$('#tablaDatatable').load('Pago/tablaPagoPension.php');
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
	function agregaFrmActualizar(id){
		$.ajax({
			type:"POST",
			data:"id=" + id,
			url:"../procesos/Pago/obtenPagoPensiones.php",
			success:function(r){
			
				datos=jQuery.parseJSON(r);
				$('#id').val(datos['idpension']);
				$('#alumno2').val(datos['alumno']);
				$('#detalle2').val(datos['detalle']);
				$('#cobro2').val(datos['cobro']);
				$('#mes2').val(datos['mes']);
				$('#tipo2').val(datos['tipo']);
				
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

	function eliminarDatos(id){
		alertify.confirm('Eliminar datos ', '¿Seguro de eliminar este registro :(?', function(){ 

			$.ajax({
				type:"POST",
				data:"id=" + id,
				url:"../procesos/Pago/eliminarCobroPension.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('Pago/tablaPagoPension.php');
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

