<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Calificaciones</title>
	
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
						<h1>Pensum Académico Detalle</h1>
						<h2>Ingreso, Actualizar, Eliminar </h2>
					</div>
					<div class="card-body text-left">
						<a href="pensumacademico.php" class="btn btn-primary ">  <span class="fa fa-plus-circle"></span>
							Regresar </a>
						
						<hr>
					</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<form id="frmingreso">
					<div class="row">
   
    <div class="form-group col-md-10" style="margin-top: 15px; margin-left: 15px;">
      <label >Pensum</label>
     <select class="form-control form-control-sm" id="pensum" name="pensum">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT p.id_pensum, c.nombre_Curso from curso c ,
							pensum_academico p where p.fk_curso=c.id_curso";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[0]."-".$ver2[1]; ?></option>
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
     <div class="form-group col-md-10" style="margin-top: 15px; margin-left: 15px;">
      <label >Materia</label>

    <select class="form-control form-control-sm" id="materia" name="materia">
							<option value="A">Selecciona ...</option>
							<?php
							$sql="SELECT id_materia, nombre_materia 
		from materia";
		$result=mysqli_query($conexion,$sql);
							 while($ver=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver[0] ?>"><?php echo $ver[0]."-".$ver[1]; ?></option>
							<?php endwhile; ?>
						</select>
    </div>

  </div>
     
  
 <div class="col-md-6">
					<label>Estado</label>
						<select class="form-control form-control-sm" id="estado" name="estado"  >
							<option value="A"> ...</option>
							<option value="1">Activo </option>
							<option value="2">Inactivo </option>
							<option value="3">Espera </option>
						</select>
					</div>
		<br>
					<span class="btn btn-primary" id="btnAgregasistema" style="margin-bottom: 10px;">Agregar</span>
				</form>
			</div>
			
			
			
				<div id="tabladatatable" class="col-md-8" style="margin-top: 30px;"></div>
			
			
			</div>
		</div>
	
			<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar datos Pensum Academico</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body ">
					<form id="frmnuevo2">
						<div class="row">
   
    <div class="form-group col-md-10">
      <label >Pensum</label>
     <select class="form-control form-control-sm" id="pensum2" name="pensum2">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT p.id_pensum, c.nombre_Curso from curso c ,
							pensum_academico p where p.fk_curso=c.id_curso";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[0]."-".$ver2[1]; ?></option>
							<?php endwhile; ?>
						</select>
    </div>
    </div>
					<div class="row">
					<div class="col-md-12">
						<label> Docente </label>
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
					<label >Materia</label>

    <select class="form-control form-control-sm" id="materia2" name="materia2">
							<option value="A">Selecciona ...</option>
							<?php
							$sql="SELECT id_materia, nombre_materia 
		from materia";
		$result=mysqli_query($conexion,$sql);
							 while($ver=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver[0] ?>"><?php echo $ver[0]."-".$ver[1]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
					</div>

					<div class="row">
					
					<div class="col-md-6">
				 <label >Estado</label>
     				<select class="form-control form-control-sm" id="estado2" name="estado2">
							<option value="A"> ...</option>
							<option value="1">Activo </option>
							<option value="2">Inactivo </option>
							<option value="3">Espera </option>
					</select>
				</div>
			</div>

					<input type="hidden" name="idpensum" id="idpensum">
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

		$('#tabladatatable').load("PensumAcademico/tablaPensumAcademico.php");

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
			url:"../procesos/PensumAcademico/agregapensumacademicodetalle.php",
			success:function(r){
				if(r==1){
					$("#frmingreso")[0].reset();
					$('#tabladatatable').load("PensumAcademico/tablaPensumAcademicodetalle.php");
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
					url:"../procesos/PensumAcademico/actualizapensumacademicodetalle.php",
					success:function(r){
						if(r==1){
							$('#modalEditar').modal('hide');
							$('#tabladatatable').load("PensumAcademico/tablaPensumAcademicodetalle.php");
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
			url:"../procesos/PensumAcademico/Obtendatospensumacademicodetalle.php",
			success:function(r){
				datos=jQuery.parseJSON(r);
				$('#pensum2').val(datos['pensum']);
				$('#profesor2').val(datos['profesor']);
				$('#materia2').val(datos['materia']);
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
					url:"../procesos/PensumAcademico/eliminapensumacademicodetalle.php",
					success:function(r){							
					if(r==1){
							$('#tabladatatable').load("PensumAcademico/tablaPensumAcademicodetalle.php");
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