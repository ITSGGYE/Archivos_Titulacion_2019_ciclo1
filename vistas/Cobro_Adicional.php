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
			<br>
						<h1>Registro de Cobro de Adicional</h1>
						<h2>Ingreso, Actualizar, Eliminar </h2>
					</div>
		</div>
		<br>
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
							
			$sql="SELECT mes from cobro_pensiones where fk_alumno='$alumno' and tipo=2 and mes='1'";
$result=mysqli_query($conexion,$sql);
while ($mostrar=mysqli_fetch_row($result)) {
	$mes2=$mostrar[0];
}

?>
<div class="row">
	<div class="col-lg-2">
	</div>
			<div class="col-lg-6">


<form id="frmingreso">
	<?php 	
	if(isset($mes2)){
?>


	<div class="jumbotron">
  <h1 class="display-4">Estimado</h1>
  <p class="lead">Ya se ha registrado el cobro del adicional del estudiante</p>
  <hr class="my-4">
  <p> <?php echo $nalumno;?> del periodo <?php echo $nanio;?></p>
  <a class="btn btn-primary btn-lg" href="Registro_Cobro_Adicional.php" role="button">Regresar</a>
</div>
<?php } else {
				
					?>
				
					<div class="row">
						<div class="col-md-5">
							<label >Estudiante</label>
     						<select class="form-control form-control-sm" id="alumno2" name="alumno2" readonly>
							<?php
							$sql2="SELECT id_alumno, nombre_alumno from alumno where id_alumno='$alumno' ";
							$result=mysqli_query($conexion,$sql2)
 
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
							$sql2="SELECT cr.id_curso_alumno, c.nombre_Curso, c.id_curso, cr.estado from 
 								 curso c, curso_alumno cr where
 								cr.fk_alumno='$alumno' and cr.fk_curso=c.id_curso  ";
							$result=mysqli_query($conexion,$sql2);
							
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): 
							$id_curso=$ver2[2];
							$estado=$ver2[3];

							?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1]?></option>
							<?php endwhile; ?>
						</select>
					</div>
					<div class="col-md-10">

							<?php 
							


							if(($id_curso==1 && $estado==1)|| ($id_curso==2 and $estado==1)){
								$cobro=3;
							} else{
							if($id_curso==1 && $estado==2){
								$cobro=4;
							} else{
								if($id_curso==3 && $estado==1){
									$cobro=5;

							} else {
								if($id_curso==3 && $estado==2){
									$cobro=6;

							}
							}
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
					
				<?php
				$sql="SELECT mes from cobro_pensiones where fk_alumno='$alumno' and tipo=2 order by mes desc limit 1 ";
$result=mysqli_query($conexion,$sql);
while ($mostrar=mysqli_fetch_row($result)) {
	$mes=$mostrar[0];
}
if(isset($mes)){
	$mes=1;
} else {
	$mes=4;
}
switch ($mes) {
	case '1':
		$nmes="Enero";
		break;
	case '4':
		$nmes="Abril";
		break;
	case '5':
		$nmes="Mayo";
		break;
	case '6':
		$nmes="Junio";
		break;
	case '7':
		$nmes="Julio";
		break;
	case '8':
		$nmes="Agosto";
		break;
	case '9':
		$nmes="Septiembre";
		break;
	
	default:
		# code...
		break;
}

				?>
				
				<div class="row">
					<div class="col-md-4">
						<label>Pensión</label>
						<select id="tipo" name="tipo" class="form-control form-control-sm">
													<option value="2">Adicional </option>
						</select>
				</div>

					<div class="col-md-6">
						<label>Mes de Pago</label>
								<input type="text" class="form-control form-control-sm" id="nmes" name="nmes"  onpaste="return false" value="<?php echo $nmes;?>">
								<input type="hidden" class="form-control form-control-sm" id="mes" name="mes"  onpaste="return false" value="<?php echo $mes;?>"> 
					</div>
				</div>



					
							<div class="row">
							<div class="col-md-10 form-group green-border-focus">
							<label>Detalle</label>
							<textarea class="form-control" id="detalle" name="detalle" rows="3"></textarea>
							

							</div>
						</div>


							<?php
							$sql2="SELECT a.id_aniolectivo  from aniolectivo a  where  a.estado_aniolectivo='1'";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): 
							$anio=$ver2[0];
						
								
							endwhile; ?>
							<input type="hidden" class="form-control form-control-sm" id="anio" name="anio"  onpaste="return false" value="<?php echo $anio;?>"> 
						
				
						<div class="row">
								<span class="btn btn-primary" id="btnAgregasistema" style="margin-bottom: 10px;">Guardar</span>
								<input type="hidden" class="form-control form-control-sm" id="anio" name="anio"  onpaste="return false" value="<?php echo $anio;?>"> 
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
			url:"../procesos/Pago/agregaCobroPensiones.php",
			success:function(r){
					if(r==1){
						
					$("#frmingreso")[0].reset();
					alertify.success("Se guardado corectamentos los datos :D");
					location.href ="Pago_Pensiones.php";
					
				}else{
					
					
					alertify.success("Se guardado corectamentos los datos ");
					location.href ="Pago_Pensiones.php";
				}
			}
		});
	});
	});
</script>