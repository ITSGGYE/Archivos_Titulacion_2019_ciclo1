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
		$curso=$_GET['curso'];
		
		?>


	
	<div class="container-fluid " style="background-color: white;">
		
		<div class="row">
		<div class="col-sm-12 box ">
			<br>
						<h1>Tranferir Alumnos</h1>
						
					</div>
		</div>
		<br>
<div class="row">
	<div class="col-lg-2">
	</div>
			<div class="col-lg-6">


<form id="frmingreso">
				
					
				
					<div class="row">
						<div class="col-md-10">
							
							<?php
							$sql2="SELECT a.id_aniolectivo, a.anio_lectivo  from aniolectivo a  where  a.estado_aniolectivo='1'";
							$result=mysqli_query($conexion,$sql2);
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): 
							$canio=$ver2[0];
							$nanio=$ver2[1];
						
								
							endwhile; 
							echo "<label>Año Lectivo: ".$nanio."</label>"; 
							$anionuevo=$canio+1;

							?>
						

					<div class="col-md-10">
							
     						
							<?php
							$sql2="SELECT id_curso, nombre_Curso from 
 								 curso c where
 								 id_curso='$curso'  ";
							$result=mysqli_query($conexion,$sql2);
							
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): 
							$id_curso=$ver2[0];
							
							$ncurso=$ver2[1];

							?>
							
							<?php endwhile;
							$nuevocurso=$id_curso+1;
							

							echo "<label>Curso Actual: ".$ncurso."</label>"; ?>
						
					</div>


							
							<label >Listado de Estudiante</label>
     					
							<?php
							$i=0;
							$sql2="SELECT cr.id_curso_alumno, a.id_alumno ,a.nombre_alumno, c.nombre_Curso, anio.anio_lectivo, cr.estado, anio.id_aniolectivo from alumno a , curso c, aniolectivo anio, curso_alumno cr where
 							cr.fk_alumno=a.id_alumno and cr.fk_curso=c.id_curso and  cr.fk_anio=anio.id_aniolectivo and 
 							cr.fk_curso='$curso' and anio.estado_aniolectivo=1";
							$result=mysqli_query($conexion,$sql2);
 
							?>
							
							<table class="table   table-stripe table-sm table-bordered table-hover"  style="text-align: center;"">
								<tr>
							<td> <p> Nº </p> </td>
							<td> <p>  Matrícula </p> </td>
							<td width="45%"> <p> Estudiantes </p></td>
							<td width=100> <p> Año Lectivo </p></td>
						</tr>
							<?php while($ver2=mysqli_fetch_row($result)): 
							$i++;
							$codigo=$ver2[1];
							$alumno=$ver2[2];
							$anio=$ver2[4];
							$canio=$ver2[6];
							?>
							<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $codigo; ?></td>
							
							<td width="500px;"><p><?php echo $alumno; ?></p></td>
							<td><?php echo $anio; ?></td>
						</tr>
							<?php
							


								
							 endwhile; ?>
						</table>
					
					</div>
				
					
					<div class="col-md-10">
							<input type="hidden" class="form-control input-sm" name="anio" id="anio" value="<?php echo $canio ?>">
							<input type="hidden" class="form-control input-sm" name="curso" id="curso" value="<?php echo $id_curso ?>">
							<input type="hidden" class="form-control input-sm" name="anion" id="anion" value="<?php echo $anionuevo ?>">
							<input type="hidden" class="form-control input-sm" name="curson" id="curson" value="<?php echo $nuevocurso ?>">




				
						


							
						
				
						<div class="row">
								<span class="btn btn-primary" id="btnAgregasistema" style="margin-bottom: 10px;">Guardar</span>
								
						</div>
						
			</form>
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
			url:"../procesos/Cursos/tranferir_alumno.php",
			success:function(r){
					if(r==1){
						/*alert(r);*/
						
					$("#frmingreso")[0].reset();
					alertify.success("Se guardado corectamentos los datos :D");
					location.href ="curso.php";
					
					
				}else{
					
					
					alertify.success("Se guardado corectamentos los datos ");
					
				}
			}
		});
	});
	});
</script>