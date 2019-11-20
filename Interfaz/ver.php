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
							<th>Identificacion</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Fecha Nacimiento</th>
							<th>Sexo</th>
						 
						  </tr>
					 
						<tr>
				<?php echo "<td class='mayusculas'>".$historial['pacIdentificacion']. "</td>"; ?>
				<?php echo "<td class='mayusculas'>". $historial['pacNombre']. "</td>"; ?>
				<?php echo "<td class='mayusculas'>". $historial['pacApellidos']. "</td>"; ?>
				<?php echo "<td>". $historial['pacFechaNacimiento']. "</td>"; ?>
				<?php echo "<td>". $historial['pacSexo']. "</td>"; ?>
				  
						</tr>
					 
					</table>
						 
		 <br><br>
					<div class="mensaje">
						<h2>Antecedentes Familiares</h2>
					</div>
				 
					<table class="tabla">
						  <tr>
							<th>Nombre del padre</th>
							<th>Fecha de nacimiento</th>
							<th>Estado Civil</th>
							<th>Direccion</th>
							<th>Telefono</th>
						    <th>Trabajo</th>
						    <th>Cargo</th>
						  </tr>
					 
						<tr>
				<?php echo "<td class='mayusculas'>".$historial['npadre']. "</td>"; ?>
				<?php echo "<td class='mayusculas'>". $historial['nfechaNacimiento']. "</td>"; ?>
				<?php echo "<td class='mayusculas'>". $historial['nsexo']. "</td>"; ?>
				<?php echo "<td>". $historial['direccion']. "</td>"; ?>
				<?php echo "<td>". $historial['telefono']. "</td>"; ?>
		        <?php echo "<td>". $historial['trabajo']. "</td>"; ?>  
		        	<?php echo "<td>". $historial['cargo']. "</td>"; ?>
		        	 
						</tr>
					 
					</table>
						 

	 <br><br>
					<div class="mensaje">
						<h2>Antecedentes Familiares</h2>
					</div>
				 
					<table class="tabla">
						  <tr>
							<th>Nombre del padre</th>
							<th>Fecha de nacimiento</th>
							<th>Estado Civil</th>
							<th>Direccion</th>
							<th>Telefono</th>
						    <th>Trabajo</th>
						    <th>Cargo</th>
						  </tr>
					 
						<tr>
				<?php echo "<td class='mayusculas'>".$historial['anpadre']. "</td>"; ?>
				<?php echo "<td class='mayusculas'>". $historial['anfechaNacimiento']. "</td>"; ?>
				<?php echo "<td class='mayusculas'>". $historial['ansexo']. "</td>"; ?>
				<?php echo "<td>". $historial['adireccion']. "</td>"; ?>
				<?php echo "<td>". $historial['atelefono']. "</td>"; ?>
		        <?php echo "<td>". $historial['atrabajo']. "</td>"; ?>  
		        	<?php echo "<td>". $historial['acargo']. "</td>"; ?>
		        	 
						</tr>
					 
					</table>	



	 <br><br>
					<div class="mensaje">
						<h2>Descripcion del niño</h2>
					</div>
				 
					<table class="tabla">
						  <tr>
							<th>Descripcion</th>
							<th>Habitos</th>
							 
						  </tr>
					 
						<tr>
				<?php echo "<td class='mayusculas'>".$historial['descripcion']. "</td>"; ?>
				<?php echo "<td class='mayusculas'>". $historial['habitos']. "</td>"; ?>
			 
						</tr>
					 
					</table>	


					 <br><br>
					<div class="mensaje">
						<h2>Antecedentes Academicos</h2>
					</div>
				 
					<table class="tabla">
						  <tr>
							<th>Escuela</th>
							<th>Nivel</th>
							<th>Profesor</th>
							<th>Rendimiento</th>
							 
						  </tr>
					 
						<tr>
				<?php echo "<td class='mayusculas'>".$historial['escuela']. "</td>"; ?>
				<?php echo "<td class='mayusculas'>". $historial['nivel']. "</td>"; ?>
				<?php echo "<td class='mayusculas'>". $historial['profesor']. "</td>"; ?>
				<?php echo "<td>". $historial['academico']. "</td>"; ?>
			 
		        	 
						</tr>
					 
					</table>					 
				</article>
	</section>

   
			 
        
		</article>
	</section>
</body>
</html>