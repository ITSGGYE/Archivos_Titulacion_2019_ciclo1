<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Historial - CentroLogros</title>
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="icon" type="image/x-icon" href="img/logo.jpeg">
</head>
<body>
<?php include 'arriba/header.php'; ?>
<section class="main">
		<div class="wrapp">
			<?php include 'arriba/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>Datos del paciente</h2>
					</div>
					<table class="tabla">
						   <tr>
						    <th>#Citas</th>
							<th>Fecha</th>
							<th>Hora</th>
							<th>Paciente</th>
							<th>Medico</th>
							<th>Estado</th>
							
						  </tr>
                      <tr>
                        <?php echo "<td class='mayusculas'>". $cita['idcita']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $cita['citfecha']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $cita['cithora']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $cita['citPaciente']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $cita['citMedico']. "</td>"; ?>					
						<?php echo "<td class='mayusculas'>". $cita['citestado']. "</td>"; ?>
                    </tr>
			
					</table>
						 
		 <br><br>
		 <div class="mensaje">
						<h2>Descripción del problema</h2>
					</div>
					
						<table class="tabla">
					<tr>
						<th>Obsevaciones</th>
					</tr>
					 
						<tr height="150px" width="100px">
			            <?php echo "<td class='mayusculas'>". $cita['citobservaciones']. "</td>"; ?>
						</tr>
					 
				</table>					 
				</article>
	       </section>
        
		</article>
	</section>
</body>
</html>