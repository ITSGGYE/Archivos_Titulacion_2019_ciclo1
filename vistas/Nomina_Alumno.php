<?php session_start();?>
<?php 
$id_curso=$_GET['curso'];

require_once '../clases/conexion.php';
$c= new conectar();
$conexion=$c->conexion();
$i=0;
$suma=0;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "dependencias.php"; 
	 ?>

</head>
<body class="fondo">
<?php require_once "menu.php"; ?>
	<div class="container-fluid ">




 <div class="row">
 <div class="col-lg-12">
				<div class="card ">
					<div class="card-header box ">
						<br>
						<h2>Centro de Educación Inicial CEI "Mundo de Colores"</h2>
						<h3>Listado de Alumno </h3>
					</div>

					<div class="card-body text-left">
						
					</div>
						<div class="text-center ">  

				
						<?php 
							
    					

							$sql2="SELECT nombre_curso from curso where id_curso='$id_curso'"; 
							$result=mysqli_query($conexion,$sql2);
 						while($ver2=mysqli_fetch_row($result)): 
 							$nombre_curso=$ver2[0];

 							
							 endwhile; 
							?>
						

							
							<?php
							$sql2="SELECT id_aniolectivo, anio_lectivo from aniolectivo where estado_aniolectivo=1"; 
							$result=mysqli_query($conexion,$sql2);
 						while($ver2=mysqli_fetch_row($result)): 
 								$idanio=$ver2[0];
 								$anio=$ver2[1];
 								
 							endwhile; ?>

							
				
						
			
							<br>
							<h2 style="color: green">Centro de Educación Inicial CEI "Mundo de Colores"</h2>
 								<h3 style="color: red">NOMINA DE ALUMNOS POR CURSO</h3>
 								<h4> Año Lectivo </h4>
 								<h5> <?php echo $anio; ?></h5> 
								<h3>Nómina de Estudiante</h3>
								<br>
								<table width="100%">

								<tr>
								
								<td> <h6> Curso: <?php echo $nombre_curso; ?> </h6></td>
								
							</tr>
							

						</table>
						<div class="card-body text-right">
						
						<a href="Curso.php" class="btn-xs btn btn-warning ">
							Regresar <span class="fa fa-plus-circle"></span>
						</a>
						
					</div>
								

						<div class="table-responsive">	
							
				<br>
					<table class="table   table-stripe table-sm table-bordered table-hover"  style="text-align: center; width: 90%; margin-left: 5%;">
						<tr>
							<th> <p> Nº </p> </th>
							<th> <p>  Foto </p> </th>
							<th> <p>  Matrícula </p> </th>
							<th width=300> <p> Estudiantes </p></th>
						
							<th> Ficha de Matricula </th>
						
							
						</tr>
							

						<?php 

						$sql="SELECT a.id_alumno, a.nombre_alumno, img.nombre  from alumno a , curso_alumno ca, img_alumno img, aniolectivo an where
						    ca.fk_curso='$id_curso' and ca.fk_alumno=a.id_alumno and ca.fk_anio='$idanio' and img.id_imagen=a.imagen_alumno and an.estado_aniolectivo=1	 ";
						$result=mysqli_query($conexion,$sql);
						while($mostrar=mysqli_fetch_row($result)){
							$i++;
							
							
	?>
				<tr>
					<td> <p><?php echo $i;?></p> </td>

	 				<td> <p><img src="../Imagenes/Alumno/<?php echo $mostrar[2];?>" width="50" height="50" ></p> </td>
	
 				<td> <p><?php echo $mostrar[0];?></p> </td>
 				<td> <p><?php echo $mostrar[1];?></p> </td>
 				
				<td><a href="../procesos/Reportes/Ficha_Alumno.php?alumno=<?php echo $mostrar[0]?>" class="btn btn-danger btn-sm">
							REPORTE <span class="glyphicon glyphicon-list-alt"></span>
						</a></td>
						

  			
				

				
				</tr>

<?php
}
?>

</table>

</div>


						
						</div>
					
					<div class="card-footer text-muted">
						
					</div>
					
				
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
		<div class="modal-dialog  modal-lg" role="document" >
			<div class="modal-content modal-lg">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Cobro de Pensión </h5>
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
     						<select class="form-control form-control-sm" id="cobro" name="cobro">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT id_cobro, cobro, valor  from cobro_valores where id_cobro  between 3 and 6  ";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1]."-".$ver2[2]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
				</div>
					
					<br>
					<div class="row">
					<div class="col-md-4">
						<label>Pension/Adicional</label>
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
							<div class="col-md-8 form-group green-border-focus">
							<label>Detalle</label>
							<textarea class="form-control" id="detalle" name="detalle" rows="3"></textarea>
														<input type="hidden" class="form-control input-sm" name="anio" id="anio" value="<?php echo $idanio ?>">


							</div>
							
							
							</div>
						
							
							
						</div>
						</div>
						
					</form>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-danger" id="btnActualizar">Guardar</button>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	function agregaFrmActualizar(id){
		$.ajax({
			type:"POST",
			data:"id=" + id,
			url:"../procesos/Pago/obtenDatosAlumno.php",
			success:function(r){
			
				datos=jQuery.parseJSON(r);
			$('#alumno2').val(datos['idalumno']);
			$('#id3').val(datos['idalumno']);
				
				}
		});
	}
</script>

<script type="text/javascript">
	$('#btnActualizar').click(function(){
			var formData = new FormData(document.getElementById("frmnuevo2"));

			$.ajax({
					url:"../procesos/Pago/agregaCobroPensiones.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
					alert(r);
						if(r==1){
						$('#frmnuevo2')[0].reset();
						$('#modalEditar').modal('hide');
						alertify.success("Registro guardado con exito :D");
					}else{
						alertify.error("Fallo el ingreso :(");
					}
				}
			});
		});
</script>





