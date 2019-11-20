<?php session_start();?>
<?php 
$id_cursoparalelo=$_GET['id'];

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
						<h2>Escuela de Educación Básica "Julio Peña Bermeo" </h2>
						<h3>Listado de Alumno </h3>
					</div>

					<div class="card-body text-left">
						
					</div>
						<div class="text-center ">  

						<?php
							$sql2="SELECT fk_curso, fk_paralelo from curso_paralelo where id_cursoparalelo='$id_cursoparalelo'"; 
							$result=mysqli_query($conexion,$sql2);
 						while($ver2=mysqli_fetch_row($result)): 
 							$fk_curso=$ver2[0];
 							$fk_paralelo=$ver2[1];
							 endwhile; 
							?>
							
    					<?php
							$sql2="SELECT nombre_curso from curso where id_curso='$fk_curso'"; 
							$result=mysqli_query($conexion,$sql2);
 						while($ver2=mysqli_fetch_row($result)): 
 							$nombre_curso=$ver2[0];

 							
							 endwhile; 
							?>
							<?php

							 $sql2="SELECT nombre_paralelo from paralelo where id_paralelo='$fk_paralelo'"; 
							$result=mysqli_query($conexion,$sql2);
 						while($ver2=mysqli_fetch_row($result)): 
 							$nombre_paralelo=$ver2[0];
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
							<h2 style="color: green">ESCUELA DE EDUCACION BASICA "JULIO PEÑA BERMEO"</h2>
 								<h3 style="color: red">LISTADO DE ALUMNOS POR CURSO</h3>
 								<h4> Año Lectivo </h4>
 								<h5> <?php echo $anio; ?></h5> 
								<h3>Nómina de Estudiante</h3>
								<br>
								<table width="100%">

								<tr>
								
								<td> <h6> Curso: <?php echo $nombre_curso; ?> </h6></td>
								<td> <h6> Paralelo: <?php echo $nombre_paralelo; ?> </h6></td>
							</tr>
							

						</table>
						<div class="card-body text-right">
						
						<a href="CursoParalelo.php" class="btn-xs btn btn-warning ">
							Regresar <span class="fa fa-plus-circle"></span>
						</a>
						<a href="../procesos/Reportes/Reporte_Genero.php?curso=<?php echo $id_cursoparalelo?>" class="btn btn-danger btn-sm">
							PDF <span class="glyphicon glyphicon-list-alt"></span>
						</a>
						<a href="../procesos/Reportes/Reporte_Edades.php?curso=<?php echo $id_cursoparalelo?>" class="btn btn-danger btn-sm">
							PDF2 <span class="glyphicon glyphicon-list-alt"></span>
						</a>
						<a href="../procesos/Reportes/Reporte_Curso.php?curso=<?php echo $id_cursoparalelo?>" class="btn btn-danger btn-sm">
							PDF3 <span class="glyphicon glyphicon-list-alt"></span>
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
							<th > Ficha Alumno  </td>
							
							<th > PDF </td>
							<th > Certificado </td>
							
							
						</tr>
							

						<?php 

						$sql="SELECT a.cedula_alumno, a.nombre_alumno, a.apellido_alumno, img.nombre  from datos_alumno a , curso_alumno ca, img_datosalumno img where
						    ca.fk_cursoparalelo='$id_cursoparalelo' and ca.fk_alumno=a.cedula_alumno and ca.fk_anio='$idanio' and img.id_imagen=a.imagen_alumno";
						$result=mysqli_query($conexion,$sql);
						while($mostrar=mysqli_fetch_row($result)){
							$i++;
							
							
	?>
				<tr>
					<td> <p><?php echo $i;?></p> </td>

	 				<td> <p><img src="../Imagenes/Alumno/<?php echo $mostrar[3];?>" width="50" height="50" ></p> </td>
	
 				<td> <p><?php echo $mostrar[0];?></p> </td>
 				<td> <p><?php echo $mostrar[2].' '.$mostrar[1];?></p> </td>
  				
				<td > <p><a href="Editar_FichaMatricula2.php?cedula=<?php echo $mostrar[0]?>&curso=<?php echo $id_cursoparalelo?>" class="btn btn-info btn-sm">
							Ficha  <span class="glyphicon glyphicon-list-alt"></span>
						</a></p>	 </td>
				<td > <p><a href="../procesos/Reportes/Ficha_Alumno.php?alumno=<?php echo $mostrar[0]?>&curso=<?php echo $id_cursoparalelo?>" class="btn btn-danger btn-sm">
							Descargar <span class="glyphicon glyphicon-list-alt"></span>
						</a></p>	 </td>
				<td > <p><a href="../procesos/Reportes/Certificado_Alumno.php?alumno=<?php echo $mostrar[0]?>&curso=<?php echo $id_cursoparalelo?>" class="btn btn-danger btn-sm">
							Descargar <span class="glyphicon glyphicon-list-alt"></span>
						</a></p>	 </td>
				

				
				</tr>

<?php
}
?>

</table>

</div>


						
						</div>
					
					<div class="card-footer text-muted">
						<p> Escuela de Educación Básica "Julio Peña Bermeo"</p>
					</div>
					
				
			</div>
		</div>
	</div>
</div>


?>