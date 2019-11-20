<?php
$mensaje='';
try{
	$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
}catch(PDOException $e){
	echo "Error: ". $e->getMessage();
}
//SELECT PARA MEDICOS
$medicos = $conexion -> prepare("SELECT * FROM medicos");

$medicos ->execute();
$medicos = $medicos ->fetchAll();
if(!$medicos){
	$mensaje .= 'No hay medicos, por favor registre primero! <br />';
}

//SELECT PARA PACIENTES
$historial = $conexion -> prepare("SELECT * FROM pacientes");

$historial ->execute();
$historial = $historial ->fetchAll();
if(!$historial){
	$mensaje .= 'No hay pacientes, por favor registre primero! <br />';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Citas - CentroLogros</title>
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
						<h2>CITAS</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
						<h2>Agregar Citas</h2>
						<label>Fecha:</label>
                        <input type="date" name="fecha" placeholder="Fecha:" required/>
                        <label>Hora:</label>
                        <input type="time" name="hora" value="11:45" max="20:30" min="08:00" step="60" required>
                        <label>Paciente:</label>
                        <select name="paciente" class="mayusculas" required> 
	                        <?php foreach ($historial as $Sql): ?>
							<?php echo "<option value='". $Sql['pacNombre']. " ". $Sql['pacApellidos']. "'>". $Sql['pacNombre']." ". $Sql['pacApellidos']. "</option>"; ?>
							<?php endforeach; ?>
                        </select>
                        <label>Medicos:</label>
                        <select name="medico" class="mayusculas" required> 
	                        <?php foreach ($medicos as $Sql): ?>
							<?php echo "<option value='". $Sql['mednombres']. " ". $Sql['medapellidos']. "'>". $Sql['mednombres']." ". $Sql['medapellidos']. "</option>"; ?>
							<?php endforeach; ?>
                        </select>
                       
                        <label>Estado:</label required>
                        <select name="estado">
                        	<option value="asignado">Asignado</option>
                        	<option value="atendido">Atendido</option> 
                        	<option value="pendiente">Pendiente</option>                     	
                        </select>
                        <label>Observaciones:</label>
                        <textarea name="observaciones"></textarea>
						<input type="submit" name="enviar" value="Guardar Cita">
					</form>
						<?php  if(!empty($mensaje)): ?>
							<ul>
							  <?php echo $mensaje; ?>
							</ul>
						<?php  endif; ?>
				</article>
	</section>
</body>
</html>