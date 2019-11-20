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
<?php require_once "../clases/conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
		
		?>


	<div class="container-fluid ">


 <div class="row">
 <div class="col-lg-12">
				<div class="card text-left ">
					<div class="card-header box ">
						<h1>Listado de Alumno por Cursos</h1>
						<h2>Ingreso, Actualizar, Eliminar </h2>
					</div>
					<div class="card-body text-right">
						<a href="../procesos/Reportes/Reporte_Alumnos.php" class="btn btn-danger btn-sm">
							PDF3 <span class="glyphicon glyphicon-list-alt"></span>
						</a>
						<a href="Ver_Ficha_Matricula.php" class="btn btn-warning ">
							Agregar Alumno <span class="fa fa-plus-circle"></span>
						</a>
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
					<h5 class="modal-title" id="exampleModalLabel">Agrega Alumnos por curso</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="container-fluid">
					<form id="frmnuevo">
					<div class="row">
					<div class="col-md-12">
					
						<label>Nombre del Estudiante</label>
						<select class="form-control form-control-sm" id="alumno" name="alumno">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT cedula_alumno, apellido_alumno,nombre_alumno from datos_alumno ";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1].' '.$ver2[2]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
					<div class="col-md-12">
					<label>Curso</label>
						<select class="form-control form-control-sm" id="curso" name="curso">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT cp.id_cursoparalelo, c.nombre_curso, p.nombre_paralelo ,cp.estado, c.id_curso, p.id_paralelo  FROM curso c , paralelo p, curso_paralelo cp where  cp.fk_curso=c.id_curso and cp.fk_paralelo=p.id_paralelo";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): 
							?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1].'-'.$ver2[2]; ?></option>
								
								
							<?php endwhile; ?>
						</select>
					</div>
					
					</div>
					<div class="row">
					
					<div class="col-md-6">
						<label>Año Lectivo</label>
							<select class="form-control form-control-sm" id="anio" name="anio">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT a.id_aniolectivo, a.anio_lectivo  from aniolectivo a where 
							 a.estado_aniolectivo=1";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
					</div>
					<div class="row">
					<div class="col-md-6">
					<label>Estado</label>
						<select class="form-control form-control-sm" id="estado" name="estado"  >
							<option value="A"> ...</option>
							<option value="1">Habilitado </option>
							<option value="2">Desabilitado </option>
							<option value="3">Retirado </option>
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
					<h5 class="modal-title" id="exampleModalLabel">Actualizar Alumnos por Curso</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body ">
					<form id="frmnuevo2">
						<div class="row">
					<div class="col-md-12">
						<label >Nombres y Apellidos</label>
						<select class="form-control form-control-sm" id="alumno2" name="alumno2" readonly>
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT cedula_alumno, apellido_alumno,nombre_alumno from datos_alumno ";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1].' '.$ver2[2]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
					<div class="col-md-12">
					<label>Curso</label>
						<select class="form-control form-control-sm" id="curso2" name="curso2">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT cp.id_cursoparalelo, c.nombre_curso, p.nombre_paralelo ,cp.estado, c.id_curso, p.id_paralelo  FROM curso c , paralelo p, curso_paralelo cp where  cp.fk_curso=c.id_curso and cp.fk_paralelo=p.id_paralelo";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): 
							?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1].'-'.$ver2[2]; ?></option>
								
								
							<?php endwhile; ?>
						</select>
						<input type="hidden" name="alumnocurso" id="alumnocurso">	
					</div>
					
					</div>
					<div class="row">
					
					<div class="col-md-6">
						<label>Año Lectivo</label>
							<select class="form-control form-control-sm" id="anio2" name="anio2">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT a.id_aniolectivo, a.anio_lectivo  from aniolectivo a 
							 where  a.estado_aniolectivo=1";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1]; ?></option>
							<?php endwhile; ?>
						</select>

					</div>
					
					<div class="col-md-6">
				  
				  <label >Estado</label>
     				<select class="form-control form-control-sm" id="estado2" name="estado2">
							<option value="A"> ...</option>
							<option value="1">Habilitado </option>
							<option value="2">Desabilitado </option>
							<option value="3">Retirado </option>
					</select>

						
				
					
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


				/*vacios=validarFormVacio('frmnuevo2');

				if(vacios > 0){

					alertify.alert("Información","Debes llenar todos los campos!!");
					return false;
				}*/
			var formData = new FormData(document.getElementById("frmnuevo"));

			$.ajax({
				url:"../procesos/AlumnoCurso/agregaralumnocurso.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
						if(r){
						
						
						$('#agregarnuevosdatosmodal').modal('hide');
					
						$('#tablaDatatable').load('AlumnoCurso/tablaAlumnoCurso.php');
						alertify.success("agregado con exito :D");
					}else{
						alertify.error("Fallo al agregar :(");
					}
				}
			});
		});

	
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('AlumnoCurso/tablaAlumnoCurso.php');
		
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		
		
	});
</script>

<script type="text/javascript">
	function agregaFrmActualizar(alumnocurso){
		$.ajax({
			type:"POST",
			data:"alumnocurso=" + alumnocurso,
			url:"../procesos/AlumnoCurso/Obtendatosalumnocurso.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				
				$('#alumnocurso').val(datos['alumnocurso']);
				$('#alumno2').val(datos['alumno']);
				$('#curso2').val(datos['curso']);
				
				$('#anio2').val(datos['anio']);
				$('#estado2').val(datos['estado']);
				
				
			}
		});
	}

 
	function eliminarDatos(alumnocurso){
		alertify.confirm('Eliminar el Alumno del curso', '¿Seguro de eliminar al estudiante :(?', function(){ 

			$.ajax({
				type:"POST",
				data:"alumnocurso=" + alumnocurso,
				url:"../procesos/AlumnoCurso/eliminaralumnocurso.php",
				success:function(r){
					
					if(r==1){
						
						$('#tablaDatatable').load('AlumnoCurso/tablaAlumnoCurso.php');
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
		$(document).ready(function(){
			$('#btnActualizar').click(function(){

				datos=$('#frmnuevo2').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/AlumnoCurso/actualizaralumnocurso.php",
					success:function(r){
						if(r==1){
							$('#modalEditar').modal('hide');
							$('#tablaDatatable').load("AlumnoCurso/tablaAlumnoCurso.php");
							
							alertify.success("Actualizado con exito :)");
						}else{
							alertify.error("no se pudo actualizar :(");
						}
					}
				});
			});
		});
	</script>
	
</script>