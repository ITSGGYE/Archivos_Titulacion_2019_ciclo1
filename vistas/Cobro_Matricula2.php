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
		$alumno=$_GET['alumno'];
		
		?>


	
	<div class="container-fluid " style="background-color: white;">
		
		<div class="row">
		<div class="col-sm-12 box ">
						<h1>Registro de Cobro de Matriculas</h1>
						<h2>Ingreso, Actualizar, Eliminar </h2>
					</div>
		</div>
		<br>
<div class="row">
	<div class="col-lg-2">
	</div>
			<div class="col-lg-6">
				<?php 
							$sql2="SELECT id_alumno, nombre_alumno from alumno where id_alumno='$alumno' ";
							$result=mysqli_query($conexion,$sql2);
							while($ver2=mysqli_fetch_row($result)): 
							$nalumno=$ver2[1];
							endwhile; 

							$sql2="SELECT a.id_aniolectivo, a.anio_lectivo  from aniolectivo a  where  a.estado_aniolectivo='1'";
							$result=mysqli_query($conexion,$sql2);
 
							while($ver2=mysqli_fetch_row($result)): 
							$anio=$ver2[0];
							$nanio=$ver2[1];
							endwhile; 
							

				$sql2="SELECT fk_alumno from cobro_matricula where fk_alumno='$alumno' and fk_anio='$anio' ";
							$result=mysqli_query($conexion,$sql2);	
							while($ver2=mysqli_fetch_row($result)): 
							$matricula=$ver2[0];
							endwhile; 
				?>


<form id="frmingreso">
				
				<?php if(isset($matricula)) {
					?>
			<div class="jumbotron">
  <h1 class="display-4">Estimado</h1>
  <p class="lead">Ya se ha registrado el cobro de matricula del estudiante</p>
  <hr class="my-4">
  <p> <?php echo $nalumno;?> del periodo <?php echo $nanio;?></p>
  <a class="btn btn-primary btn-lg" href="Registro_Cobro_Matricula.php" role="button">Regresar</a>
</div>
<?php 
				} else {

					?>
				
					<div class="row">
						<div class="col-md-5">
							<label >Estudiante</label>
     						<select class="form-control form-control-sm" id="id3" name="id3" readonly>
							<?php
							$sql2="SELECT id_alumno, nombre_alumno from alumno where id_alumno='$alumno' ";
							$result=mysqli_query($conexion,$sql2);
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[0]."-".$ver2[1]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
					<div class="col-md-5">
							<label >Representante</label>
     						<select class="form-control form-control-sm" id="alumno" name="alumno" readonly>
							<?php
							$sql2="SELECT id_datosrepresentante, nombre_repre from datos_representante where fk_alumno='$alumno' ";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[0]."-".$ver2[1]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
					<div class="col-md-10">
							<label >Curso</label>
     						<select class="form-control form-control-sm" id="curso" name="curso">
							<?php
							$sql2="SELECT cr.id_curso_alumno, c.nombre_Curso, c.id_curso from 
 								 curso c, curso_alumno cr where
 								cr.fk_alumno='$alumno' and cr.fk_curso=c.id_curso  ";
							$result=mysqli_query($conexion,$sql2);
							
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): 
							$id_curso=$ver2[2];

							?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1]?></option>
							<?php endwhile; ?>
						</select>
					</div>
					<div class="col-md-10">

							<?php if($id_curso==1){
								$cobro=1;
							} else{
							if($id_curso>=2){
								$cobro=2;
							}
							}
							
							?>

							<label >Elija el cobro a realizar</label>
     						<select class="form-control form-control-sm" id="cobro" name="cobro">
							
							<?php
							$sql2="SELECT id_cobro, cobro, valor  from cobro_valores  where id_cobro='$cobro'";
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
							<div class="col-md-10 form-group green-border-focus">
							<label>Detalle</label>
							<textarea class="form-control" id="detalle" name="detalle" rows="3"></textarea>
							

							</div>
						</div>
							<?php
							$sql2="SELECT a.id_aniolectivo  from aniolectivo a  where  a.estado_aniolectivo='1'";
							$result=mysqli_query($conexion,$sql2);
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): 
							$anio=$ver2[0];
						
								
							endwhile; ?>
							<input type="hidden" class="form-control form-control-sm" id="anio" name="anio"  onpaste="return false" value="<?php echo $anio;?>"> 
						<div class="row">
								<span class="btn btn-primary" id="btnAgregasistema" style="margin-bottom: 10px;">Agregar</span>
						</div>
						
			</form>
			<?php }
			?>
		</div>
	</div>

	
<script type="text/javascript">
	$(document).ready(function(){

		

		$('#btnAgregasistema').click(function(){

			vacios=validarFormVacio('frmingreso');

			if(vacios > 1){
				alertify.alert("Debes llenar todos los campos!!");
				return false;
			}

		datos=$('#frmingreso').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"../procesos/Pago/agregaCobroMatricula.php",
			success:function(r){
					if(r==1){
						
					$("#frmingreso")[0].reset();
					alertify.success("Se guardado corectamentos los datos :D");
					location.href ="Pago_Matriculas.php";
					
				}else{
					
					
					alertify.error("No se pudo agregar ");
				}
			}
		});
	});
	});
</script>