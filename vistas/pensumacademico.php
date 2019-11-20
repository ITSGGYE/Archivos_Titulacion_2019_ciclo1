<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Matriculación</title>
	
</head>
<body>
<body class="fondo">
<?php require_once "dependencias.php"; ?>


<?php require_once "menu.php"; ?>
		<?php require_once "../clases/conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
		
		
		?>


	
	<div class="container-fluid " style="background-color: white;">
		
		<div class="row">
		<div class="col-sm-12 box ">
						<h1>Asignar Tutor</h1>
						<h2>Ingreso, Actualizar, Eliminar </h2>
					</div>
		</div>
<div class="row">
			<div class="col-md-3">
				<form id="frmingreso">
					<div class="row">
   
    <div class="form-group col-md-10" style="margin-top: 15px; margin-left: 15px;">
      <label >Año Lectivo</label>
     <select class="form-control form-control-sm" id="anio" name="anio" >
							<?php
							$sql2="SELECT id_aniolectivo, anio_lectivo   from aniolectivo a where estado_aniolectivo=1";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>" ><?php echo $ver2[1]; ?></option>
							<?php endwhile; ?>
						</select>
    </div>
    </div>
    <div class="row">
     <div class="form-group col-md-10" style="margin-top: 15px; margin-left: 15px;">
      <label >Curso</label>

    <select class="form-control form-control-sm" id="curso" name="curso">
							<option value="A">Selecciona ...</option>
							<?php
							$sql="SELECT cp.id_cursoparalelo, c.nombre_curso, p.nombre_paralelo  FROM curso c , paralelo p, curso_paralelo cp where  cp.fk_curso=c.id_curso and cp.fk_paralelo=p.id_paralelo and cp.estado=1";
	
		$result=mysqli_query($conexion,$sql);
							 while($ver=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver[0] ?>"><?php echo $ver[1].'-'.$ver[2]; ?></option>
							<?php endwhile; ?>
						</select>
    </div>

  </div>
  <div class="row">
  	<div class="form-group col-md-10" style="margin-top: 15px; margin-left: 15px;">
      <label >Docente</label>
     <select class="form-control form-control-sm" id="profesor" name="profesor">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT id_profesor, nombre_profesor from profesor ";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[0]."-".$ver2[1]; ?></option>
							<?php endwhile; ?>
						</select>
    </div>
  </div>
   

  <div class="row">
 <div class="col-md-6" style="margin-top: 15px; margin-left: 15px;">
					<label>Estado</label>
						<select class="form-control form-control-sm" id="estado" name="estado"  >
							<option value="A"> ...</option>
							<option value="1">Activo </option>
							<option value="2">Inactivo </option>
							<option value="3">Espera </option>
						</select>
					</div>
</div>
		<br>
		<div class="row">
			<div class="col-md-3">
					<span class="btn btn-primary" id="btnAgregasistema" style="margin-bottom: 10px;">Agregar</span>
		</div>
	</div>
				</form>
			</div>
			
			
			
				<div id="tabladatatable" class="col-md-9" style="margin-top: 30px;">
						
					
				</div>
			
			
			</div>
		</div>
	
			<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar Pensum Académico</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body ">
					<form id="frmnuevo2">
					<div class="row">
					<div class="col-md-12">
						 <label >Año Lectivo</label>
     <select class="form-control form-control-sm" id="anio2" name="anio2">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT id_aniolectivo, anio_lectivo   from aniolectivo a where estado_aniolectivo=1";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
					 <label >Curso</label>

    <select class="form-control form-control-sm" id="curso2" name="curso2">
							<option value="A">Selecciona ...</option>
							<?php
							$sql="SELECT cp.id_cursoparalelo, c.nombre_curso, p.nombre_paralelo  FROM curso c , paralelo p, curso_paralelo cp where  cp.fk_curso=c.id_curso and cp.fk_paralelo=p.id_paralelo and cp.estado=1";
	
		$result=mysqli_query($conexion,$sql);
							 while($ver=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver[0] ?>"><?php echo $ver[1].'-'.$ver[2]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
	</div>
			 <div class="row">
  	<div class="form-group col-md-10">
      <label >Docente</label>
     <select class="form-control form-control-sm" id="profesor2" name="profesor2">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT id_profesor, nombre_profesor from profesor ";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[0]."-".$ver2[1]; ?></option>
							<?php endwhile; ?>
						</select>
    </div>
  </div>
				<div class="row">	
				<div class="col-md-6">
					<label>Estado</label>
						<select class="form-control form-control-sm" id="estado2" name="estado2"  >
							<option value="A"> ...</option>
							<option value="1">Activo </option>
							<option value="2">Inactivo </option>
							<option value="3">Espera </option>
						</select>
					</div>
				</div>
					 <input type="hidden" name="idpensum" id="idpensum">

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

		$('#tabladatatable').load("PensumAcademico/tablapensumacademico.php");

		$('#btnAgregasistema').click(function(){

			vacios=validarFormVacio('frmingreso');

			if(vacios > 0){
				alertify.alert("Debes llenar todos los campos!!");
				return false;
			}

		datos=$('#frmingreso').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"../procesos/PensumAcademico/agregapensumacademico.php",
			success:function(r){
			
				if(r==1){
					$("#frmingreso")[0].reset();
					$('#tabladatatable').load("PensumAcademico/tablaPensumAcademico.php");
					alertify.success("Se guardado corectamentos los datos :D");
				}else{
					alertify.error("No se pudo agregar ");
				}
			}
		});
	});
	});
</script>

<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizar').click(function(){

				datos=$('#frmnuevo2').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/PensumAcademico/actualizapensumacademico.php",
					success:function(r){
						
						if(r==1){
							$('#modalEditar').modal('hide');
							$('#tabladatatable').load("PensumAcademico/tablaPensumAcademico.php");
							alertify.success("Actualizado con exito :)");
						}else{
							alertify.error("no se pudo actualizar :(");
						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		function agregaFrmActualizar(idpensum){
		$.ajax({
			type:"POST",
			data:"idpensum=" + idpensum,
			url:"../procesos/PensumAcademico/Obtendatospensumacademico.php",
			success:function(r){
								datos=jQuery.parseJSON(r);
				
				$('#curso2').val(datos['curso']);
				$('#profesor2').val(datos['profesor']);
				$('#anio2').val(datos['anio']);
				$('#estado2').val(datos['estado']);
				$('#idpensum').val(datos['idpensum']);
				
			}
		});
	}
		function eliminar(idpensum){
			alertify.confirm('Eliminar El PensumAcademico','¿Desea eliminar el item seleccionado?', function(){ 
				$.ajax({
					type:"POST",
					data:"idpensum=" + idpensum,
					url:"../procesos/PensumAcademico/eliminapensumacademico.php",
					success:function(r){
						
							if(r==1){
							$('#tabladatatable').load("PensumAcademico/tablaPensumAcademico.php");
							alertify.success("Eliminado con exito!!");
						}else{
							alertify.error("No se pudo eliminar :(");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelo !')
			});
		}
	</script>



<?php /*
	}else{
		header("location:../index.php");
	}*/
 ?>
 
 </body>