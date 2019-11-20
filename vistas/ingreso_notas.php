<?php session_start();
$id_profesor=$_SESSION['profesor']['id'];


$curso=$_GET['curso'];
$anio=$_GET['anio'];
$materia2=$_GET['materia'];

			     			
							

require_once '../clases/conexion.php';

$c= new conectar();
$conexion=$c->conexion();
$i=0;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "dependencias.php"; 
	 ?>
	 <style type="text/css">
	 td{
	 	font-size: 12px;
	 	font-weight: bold;
	 }
	 	label{
	 		font-size: 14px;
	 		font-weight: bold;
	 		text-align: center;
	 	 	}
	 	 	input[type="text"], input[type="date"] {
	 		font-size: 14px;
	 		
	 		padding: 2px;

}

.texto-vertical-2 {
    writing-mode: vertical-lr;
    transform: rotate(180deg);
    font-size: 14px;
    font-weight: bold;
    padding: 10px;
    text-align: center;
}
	 </style>
</head>
<body class="fondo">
<?php require_once "menunotas.php"; ?>
	<div class="container-fluid ">


 <div class="row">
 <div class="col-lg-12">
				<div class="card ">
					<div class="card-header box ">
						<h2>Unidad Educativa "Julio Peña Bermeo" </h2>
						<h3>Ingreso de Notas  Finales</h3>
					</div>
					<div class="card-body text-right">



?>
					</div>
						<div class="text-center" style="margin: 30px;">  
											
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
							echo $aniolectivo;
							
							?>
							
							<h2 style="color: green">UNIDAD EDUCATIVA PARTICULAR "Young Living Academy"</h2>
 								<h3 style="color: red">REPORTE DE CALIFICACIONES DEL FINALES</h3>
 								<h4><?php echo $anio2;?></h4>
								<h3>Nómina de Estudiante</h3>
								<br>
								<table width="100%">

								<tr>
								
									<select class="form-control form-control-sm" id="materia" name="materia">
              
              <?php
              $sql2="SELECT id_materia, nombre_materia from materia where id_materia='$materia2' ";
              $result=mysqli_query($conexion,$sql2);
              while($ver2=mysqli_fetch_row($result)){
              	$materia2=$ver2[0];
              	$nombre_materia=$ver2[1];

 
             

             } ?>
          
				


								


	<td> <h6 class="border"> Asignatura: <?php echo $nombre_materia; ?> </h6></td>
								<td> <h6 class="border"> Curso: <?php echo $nombre_curso.' '.$nombre_paralelo.''.$curso; ?> </h6></td>
								<td> <h6 class="border"> Docente: <?php echo $_SESSION['profesor']['nombre']; ?> </h6></td>
								
						</a></td>
					</tr>
				</table>
							
							<div id="rst"></div>
					<table class="table table-bordered table-responsive table-stripe table-sm" style="width: 90%; margin-left: 5%" >
						<tr>
							<th><p style="text-align: center;"><br><br>N</p> </th>
							<th><p style="text-align: center;"><br><br>Estudiantes</p> </th>
							<th > <p class=""> Nota Primer Quimestre </p> </th>
							<th > <p class=""> Nota Segundo Quimestre</p></th>
							
							
						</tr>
							<form id="frmnotas" method="POST">

						<?php
						$sql="SELECT a.nombre_alumno, a.apellido_alumno , ca.fk_alumno from datos_alumno a , curso_alumno ca where ca.fk_alumno=a.id_datosalumno and ca.fk_cursoparalelo='$curso' order by a.nombre_alumno ";
						$result=mysqli_query($conexion,$sql);
						while($mostrar=mysqli_fetch_row($result)){
							$i=$i+1;
							
	?>
						<tr>
				<td><?php echo $i ;?></td>
 				<td> <input type="text" name="nombre"  class="form-control-plaintext" value="<?php echo $mostrar[0].' '.$mostrar[1];?>" readonly > </td>
  				<td >	<input type="text" id="nota1[]" class="form-control form-control-sm" name="nota1[]" value="0" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" oninput="prueba(this);"> </td>
				<td >	<input type="text" id="nota2[]"  class="form-control form-control-sm"
					name="nota2[]" value="0" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" oninput="prueba(this);" > </td>
				
				
	
				 <input type="hidden" id="curso" name="curso" value="<?php echo $curso ?>"> 
				
			 <input type="hidden" id="profesor" name="profesor" value="<?php echo $id_profesor ?>"> 
			 <input type="hidden" id="alumno[]" name="alumno[]" value="<?php echo $mostrar[2];?>"> 
			 <input type="hidden" id="aniolectivo" name="aniolectivo" value="<?php echo $aniolectivo?>"> 
			 <input type="hidden" id="materia2" name="materia2" value="<?php echo $materia2?>"> 
			


	 
		

</tr>




	
	
	
	





<?php

}
?>

</table>
<input type="submit" id="btnguardar" name="btnguardar" class="btn btn-primary" value="Guardar">

</form>	


						</div>
					
					<div class="card-footer text-muted">
						Academia Young Living
					</div>
				
			</div>
		</div>
	</div>
</div>

<script>
function prueba(n) {
   var num = n.value;
   if (parseFloat(num) > 10.00) {
      /*document.getElementById('rst').innerHTML = 'OK: ' + num;*/
   
     document.getElementById('rst').innerHTML = '<p style="color:#E43A19;">Calificación Incorrecta</p>';

   } else {
   	document.getElementById('rst').innerHTML = '';
   }
}
</script>

	<script type="text/javascript">
		jQuery(document).on('submit','#frmnotas',function(event){
			event.preventDefault();
			jQuery.ajax({
				url:"../procesos/Calificaciones/ingresonotas.php",
				type: 'POST',
				dataType:'json',
				data:$(this).serialize(),
			})
			.done(function(respuesta){
				console.log(respuesta);
				if(!respuesta.error){

					$("#frmnotas")[0].reset();
					alertify.success("Notas ingresadas correctamente");
					location.href ="../index3.php";
				}
				else{
					alertify.error("Hubo un error:(");
				}
			})
			
		});

	</script>

	

