<?php session_start();
$id_profesor=$_SESSION['profesor']['id'];


$curso=$_GET['curso'];

			     			
							

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
							
							
							?>
							
							<h2 style="color: green">ESCUELA DE EDUCACIÓN BÁSICA "JULIO PEÑA BERMEO"</h2>
 								<h3 style="color: red">REPORTE DE ALUMNOS </h3>
 								<h4><?php echo $anio2;?></h4>
								<h3>Nómina de Estudiante</h3>
								<br>
								<table width="100%">

								<tr>
								
									
           
          
				


								


	
								<td> <h6 class="border"> Curso: <?php echo $nombre_curso.' '.$nombre_paralelo?> </h6></td>
								<td> <h6 class="border"> Docente: <?php echo $_SESSION['profesor']['nombre']; ?> </h6></td>
								
						</a></td>
					</tr>
				</table>
							
							<div id="rst"></div>
					<table class="table table-bordered table-responsive table-stripe table-sm" style="width: 90%; margin-left: 30%" >
						<tr>
							<th><p style="text-align: center;"><br><br>N</p> </th>
							<th width="300px"><p style="text-align: center;"><br><br>Estudiantes</p> </th>
							<th > <p class=""> Estado de Alumno </p> </th>
							
							
							
						</tr>
							<form id="frmnotas" method="POST">

						<?php
						$sql="SELECT a.nombre_alumno, a.apellido_alumno , ca.fk_alumno from datos_alumno a , curso_alumno ca where ca.fk_alumno=a.cedula_alumno and ca.fk_cursoparalelo='$curso' order by a.nombre_alumno ";
						$result=mysqli_query($conexion,$sql);
						while($mostrar=mysqli_fetch_row($result)){
							$i=$i+1;
							
	?>
						<tr>
				<td><?php echo $i ;?></td>
 				<td> <input type="text" name="nombre"  class="form-control-plaintext" value="<?php echo $mostrar[0].' '.$mostrar[1];?>" readonly > </td>
  				<td > <select class="form-control form-control-sm" id="estado[]" name="estado[]"  >
									<option value="2">Aprobado </option>
											<option value="3">Reprobado </option>
											<option value="4">Supletorio </option>
											
										</select> </td>
				
	
				 <input type="hidden" id="curso" name="curso" value="<?php echo $curso ?>"> 
				
			 <input type="hidden" id="profesor" name="profesor" value="<?php echo $id_profesor ?>"> 
			 <input type="hidden" id="alumno[]" name="alumno[]" value="<?php echo $mostrar[2];?>"> 
			 <input type="hidden" id="aniolectivo" name="aniolectivo" value="<?php echo $aniolectivo?>"> 
			 
			


	 
		

</tr>




	
	
	
	





<?php

}
?>

</table>
<button type="button" class="btn btn-warning" id="btnguardar">Actualizar</button>
</form>	


						</div>
					
					<div class="card-footer text-muted">
						Escuela de Educacioón Básica "Julio Peña Bermeo"
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
			$('#btnguardar').click(function(){
			var formData = new FormData(document.getElementById("frmnotas"));

			$.ajax({
					url:"../procesos/Calificaciones/updateestado.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
					
					if(r){
						
						alertify.success("Actualizado con exito :D");
						location.href ="../index3.php";
					}else{
						alertify.error("Fallo al actualizar :(");
					}
				}
			});
		});

	</script>

	

