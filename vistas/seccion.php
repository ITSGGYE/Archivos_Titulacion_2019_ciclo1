<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear Sección</title>
	
</head>

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
						<h1>Registro de Secciones </h1>
						<h2>Ingreso, Actualizar, Eliminar </h2>
					</div>

			<div class="col-sm-5">
				<form id="frmsistema">
					<div class="form-row">
    
    <div class="form-group col-md-6" style="margin-top: 15px;">
      <label >Ingrese la Sección</label>
      <input type="text" class="form-control " id="nombre" name="nombre" autofocus="true">
      
    </div>

  </div>
     
  

 
					<span class="btn btn-primary" id="btnAgregasistema" style="margin-bottom: 10px;">Agregar</span>
				</form>
			</div>
			<br>
			
			<div class="col-sm-6">
				<div id="tabladatatable" style="margin-top: 15px;"></div>
			
			</div>
		</div>
	</div>
			<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar datos de la Seccion</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div clas
					<div class="modal-body">
						<form id="frmSeccion2">
							<input type="text" hidden="" id="idseccion" name="idseccion">
							<label>Nombre de la Sección</label>
							<input type="text" id="nombre2" name="nombre2" class="form-control input-sm">
						</form>


					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaSeccion" class="btn btn-warning" data-dismiss="modal">Guardar</button>

					</div>
				</div>
			</div>
		</div>

</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){

		$('#tabladatatable').load("Secciones/tablaSecciones.php");

		$('#btnAgregaSeccion').click(function(){

			vacios=validarFormVacio('frmSeccion');

			if(vacios > 0){
				alertify.alert("Debes llenar todos los campos!!");
				return false;
			}

		datos=$('#frmSeccion').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"../procesos/Secciones/agregaSeccion.php",
			success:function(r){
				if(r){
					$("#frmSeccion")[0].reset();
					$('#tabladatatable').load("Secciones/tablaSecciones.php");
					alertify.success("Curso agregado con exito :D");
				}else{
					alertify.error("No se pudo agregar el curso");
				}
			}
		});
	});
	});
</script>

<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizaSeccion').click(function(){

				datos=$('#frmSeccion2').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/Secciones/actualizaSeccion.php",
					success:function(r){
						if(r){
							$('#tabladatatable').load("Secciones/tablaSecciones.php");
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
		function agregaDato(idseccion,nombre){
			$('#idseccion').val(idseccion);
			$('#nombre2').val(nombre);
		}
		function eliminarSeccion(idseccion){
			alertify.confirm('Eliminar Seccion','¿Desea eliminar esta seccion?', function(){ 
				$.ajax({
					type:"POST",
					data:"idseccion=" + idseccion,
					url:"../procesos/Secciones/eliminaSeccion.php",
					success:function(r){
						if(r){
							$('#tabladatatable').load("Secciones/tablaSecciones.php");
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
</html>

