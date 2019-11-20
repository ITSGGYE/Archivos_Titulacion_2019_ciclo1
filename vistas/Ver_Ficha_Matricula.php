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
						
						<a href="Ficha_Matricula.php"><span class="btn btn-danger "><span class="fa fa-plus-circle"></span>
							 Ingresar Matricula</a>
						</span>

						<a href="Documentos2.php"><span class="btn btn-warning "><span class="fa fa-plus-circle"></span>
							 Subir Documento</a>
						</span>
						
						
						
					</div>
					<br>
						<div id="tablaDatatable">  </div>
					
					<div class="card-footer text-muted">
						Escuela de Educación Básica "Julio Peña Bermeo"
					</div>
				
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
		$('#tablaDatatable').load('Alumno/tablaFichaMatricula.php');
	});
</script>


<script type="text/javascript">
	

	function eliminarDatos(cedula){
		alertify.confirm('Eliminar estudiante', '¿Seguro de eliminar este alumno :(?', function(){ 

			$.ajax({
				type:"POST",
				data:"cedula=" + cedula,	
				url:"../procesos//Alumnos/eliminarFichaMatricula.php",
				success:function(r){

					if(r){

						$('#tablaDatatable').load('Alumno/tablaFichaMatricula.php');
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