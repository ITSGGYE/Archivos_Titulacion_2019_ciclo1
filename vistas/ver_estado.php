<?php session_start();?>
<?php 
$profesor=$_SESSION['profesor']['id'];

$curso=$_GET['curso'];





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
	





	 </style>
</head>
<body class="fondo">
<?php require_once "menunotas.php"; ?>
	<div class="container-fluid ">




 <div class="row">
 <div class="col-lg-12">
				<div class="card ">
					<div class="card-header box "> 
						<h2>Escuela de Educación Básica "Julio Peña Bermeo" </h2>
						<h3>Notas Ingresadas </h3>
					</div>
					<div class="card-body text-left">
						
					</div>
						<div class="text-center ">  
						
											
							<?php 
							$sql="SELECT c.nombre_curso, p.nombre_paralelo   FROM curso c , paralelo p, curso_paralelo cp where  cp.fk_curso=c.id_curso and cp.fk_paralelo=p.id_paralelo and cp.id_cursoparalelo='$curso'";
							$result=mysqli_query($conexion,$sql);
							while($mostrar=mysqli_fetch_row($result)){
  							$nombre_curso=$mostrar[0];
  							$nombre_paralelo=$mostrar[1];
  }
  								
							?>

							
							<?php 
							$sql="SELECT a.id_aniolectivo, a.anio_lectivo from  aniolectivo a where a.estado_aniolectivo='1' ";
							$result=mysqli_query($conexion,$sql);
							while($mostrar=mysqli_fetch_row($result)){
								$aniolectivo=$mostrar[0];
								$anio2=$mostrar[1];
								
							}
							
							
							?>







						
							
							<h2 style="color: green">ESCUELA DE EDUCACIÓN BÁSICO "Julio Peña Bermeo"</h2>
 								<h3 style="color: red">REPORTE DE CALIFICACIONES </h3>
 								<h4><?php echo($anio2);?></h4>
								<h3>Nómina de Estudiante</h3>
								<br>
								<table width="100%">

								<tr>
								
								<td> <h6 class="border"> Curso: <?php echo $nombre_curso.' '.$nombre_paralelo; ?> </h6></td>
								<td> <h6 class="border"> Docente: <?php echo $_SESSION['profesor']['nombre']; ?> </h6></td>
								<td> <a href="../procesos/Calificaciones/reportenotas.php?profesor=<?php echo $profesor ?>&materia=<?php echo $materia2 ?>&curso=<?php echo $curso ?>" class="btn btn-danger btn-sm">
							 <i class="fa fa-download"></i>
						</a></td>
					</tr>
				</table>
						<div class="table-responsive">	
							
					<table class="table   table-stripe table-sm table-bordered table-hover"  style="text-align: center; width: 90%; margin-left: 5%;">
						<tr>
							<th> <p> Nº </p> </th>
							<th> <p>  Matrícula </p> </th>
							<th width=300> <p>  Estudiantes </p></th>
							<th > <p class="texto-vertical-2"> Estado</p></th>
							
							
						</tr>
							

						<?php 
						$cont=0;

							$sql="SELECT a.nombre_alumno, a.apellido_alumno , ca.fk_alumno, a.estado_alumno from datos_alumno a , curso_alumno ca where ca.fk_alumno=a.cedula_alumno and ca.fk_cursoparalelo='$curso' order by a.nombre_alumno ";
						$result=mysqli_query($conexion,$sql);
						while($mostrar=mysqli_fetch_row($result)){
							
							$cont++;
							
	?>
						<tr>
							<td> <p><?php echo $cont;?></p> </td>
							<td> <p><?php echo $mostrar[2];?></p> </td>
 				<td> <p><?php echo $mostrar[1].' '.$mostrar[0];?></p> </td>
 				<?php if($mostrar[3]==2){
 					$estado='Aprobado';
 				} else {
 					if($mostrar[3]==3){
 					$estado='Reprobado';
 				} else {
 					if($mostrar[3]==4){
 					$estado='Supletorio';
 				}
 			}

 				}
 				?>
  				<td > <p><?php echo $estado;?></p>	 </td>
			

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


