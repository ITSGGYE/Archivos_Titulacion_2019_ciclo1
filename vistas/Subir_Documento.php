<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Matriculación</title>

	
</head>
<body>
	<style type="text/css">
	 	label{
	 		font-size: 14px;
	 		font-weight: bold;
	 		text-align: center;
	 		color:black;
	 	 	}
	 	 	

}
	 </style>

<body class="fondo">
<?php require_once "dependencias.php"; ?>


<?php require_once "menu.php"; ?>
		<?php require_once "../clases/conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
		$id=$_GET['id'];
		$sql="SELECT  		id_documento,
							fk_alumno,
								promocion1,
								promocion2,
								promocion3,
								planilla,
								informe1,
								informe2,
								partida,
								fotos,
								carnet,
								croquis,
								cedula1,
								cedula2,
								cedula3,
								certificado1,
								certificado2,
								documentos
										
							FROM documentos_alumno where  id_documento='$id'";
							$result=mysqli_query($conexion,$sql);
					while ($mostrar=mysqli_fetch_row($result)) {
						$id_documento=$mostrar[0];
						$fk_alumno=$mostrar[1];
						$promocion=$mostrar[2];
						$promocion2=$mostrar[3];
						$promocion3=$mostrar[4];
						$planilla=$mostrar[5];
						$notas=$mostrar[6];
						$informe2=$mostrar[7];
						$partida=$mostrar[8];
						$fotos=$mostrar[9];
						$carnet=$mostrar[10];
						$croquis=$mostrar[11];
						$cedula1=$mostrar[12];
						$cedula2=$mostrar[13];
						$cedula3=$mostrar[14];
						$certificado1=$mostrar[15];
						$certificado2=$mostrar[16];
						$documentos=$mostrar[17];

					}

		/*	$datos=array(
				'id_documento' => $ver[0],
				'promocion' => $ver[1],
				'promocion2' => $ver[2],
				'promocion3' => $ver[3],
				'planilla' => $ver[4],
				'informe' => $ver[5],
				'informe2' => $ver[6],
				'partida' => $ver[7],
				'fotos' => $ver[8],
				'carnet' => $ver[9],
				'croquis' => $ver[10],
				'cedula1' => $ver[11],
				'cedula2' => $ver[12],
				'cedula3' => $ver[13],
				'certificado1' => $ver[14],
				'certificado2' => $ver[15],
				'imagen' => $ver[16],
				'alumno' => $ver[17]
				);*/
		
		
		?>



	
	<div class="container-fluid col-md-10" style="background-color: white; margin-bottom: ">
		
		<div class="row">
		<div class="col-md-12 box ">
						<h1>Registro de Matricula</h1>
						<h2>Ingreso, Actualizar, Eliminar </h2>
					</div>
		<div class="card-body text-right">
						
						<a href="Documentos.php"><span class="btn btn-primary "><span class="fa fa-plus-circle"></span>
							Documentos </a>
						</span>
					</div>
		</div>
				<div class="card" style="margin-top: 30px; margin-bottom: 30px;">
  					<h5 class="card-header">DOCUMENTO DEL ESTUDIANTE</h5>
  						<div class="card-body">
  							<form id="frmingreso">
   					 			<h5 class="card-title"></h5>
   					<div class="row">
					<div class="col-md-8">
					
						<label>Nombre del Estudiante</label>
						<select class="form-control form-control-sm" id="alumno" name="alumno">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT a.cedula_alumno, a.apellido_alumno,a.nombre_alumno from datos_alumno a where a.cedula_alumno not in ( select c.fk_alumno 
								from documentos_alumno c) ";
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
						<select class="form-control form-control-sm" id="promocion" name="promocion"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
					<div class="col-md-4">
						<label >Informe de notas</label>
						<select class="form-control form-control-sm" id="notas" name="notas"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
					<div class="col-md-4">
						<label >C.I. Padre</label>
						<select class="form-control form-control-sm" id="cpadre" name="cpadre"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
					</div>
					<div class="row">
					<div class="col-md-4">
						<label >Promocion</label>
						<select class="form-control form-control-sm" id="promocion2" name="promocion2"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
					<div class="col-md-4">
						<label >Partida de Nacimiento</label>
						<select class="form-control form-control-sm" id="partida" name="partida"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
				<div class="col-md-4">
						<label >C. I. madre</label>
						<select class="form-control form-control-sm" id="cmadre" name="cmadre"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
				</div>

					<div class="row">
					<div class="col-md-4">
						<label >Promocion</label>
						<select class="form-control form-control-sm" id="promocion3" name="promocion3"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
					<div class="col-md-4">
						<label >Fotos</label>
						<select class="form-control form-control-sm" id="fotos" name="fotos"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
				<div class="col-md-4">
						<label >C. I. Estudiante</label>
						<select class="form-control form-control-sm" id="calumno" name="calumno"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
				</div>
					<div class="row">
					<div class="col-md-4">
						<label >Planilla de Luz</label>
						<select class="form-control form-control-sm" id="planilla" name="planilla"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
					<div class="col-md-4">
						<label >Carnet de vacunas</label>
						<select class="form-control form-control-sm" id="carnet" name="carnet"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
				<div class="col-md-4">
						<label >C. no deuda</label>
						<select class="form-control form-control-sm" id="certificado1" name="certificado1"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label >Informe ecónomico </label>
						<select class="form-control form-control-sm" id="informe" name="informe"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
					<div class="col-md-4">
						<label >Croquis</label>
						<select class="form-control form-control-sm" id="croquis" name="croquis"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
				<div class="col-md-4">
						<label >C. Matricula</label>
						<select class="form-control form-control-sm" id="certificado2" name="certificado2"  >
							<option value="A"> ...</option>
							<option value="1">Si </option>
							<option value="2">No </option>
						</select>
					</div>
				</div>
				<hr>
				<div class="row">							
						<div class="custom-file">
  							<input type="file" class="custom-file-input"  id="imagen" name="imagen" lang="es">
 							 <label class="custom-file-label" for="imagen">Seleccionar Archivo</label>
							</div>
					  </div>
<br>
								<div class="row">
									<div class="col-md-5">
									</div>
									<div class="col-md-2">
										<span class="btn btn-info" id="btnAgregasistema" style="margin-bottom: 10px;">Guardar</span>
								</div>
							</div>
   					 				<div> 

   					 			</div>

</form>
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

		

		$('#btnAgregasistema').click(function(){

			vacios=validarFormVacio('frmingreso');

			if(vacios > 0){
				alertify.alert("Debes llenar todos los campos!!");
				return false;
			}
		var formData = new FormData(document.getElementById("frmingreso"));

		
		$.ajax({
			
			url:"../procesos/Alumnos/agregarDocumentos.php",
			type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

			success:function(r){
			
				if(r){
					$("#frmingreso")[0].reset();
					
					alertify.success("Se guardado corectamentos los datos :D");
					location.href ="Documentos.php";
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