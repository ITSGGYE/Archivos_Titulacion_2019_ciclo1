<?php
$mensaje='';
try{
	$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
}catch(PDOException $e){
	echo "Error: ". $e->getMessage();
}

$consulta = $conexion -> prepare("
		SELECT 	* FROM citas order by citfecha desc ");

$consulta ->execute();
$consulta = $consulta ->fetchAll();
if(!$consulta){
	$mensaje .= 'NO HAY CITAS PARA MOSTRAR';
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
					<a class="agregar" href="agregarcitas.php">Agregar Citas</a>
				<form action="Interfaz/buscar_cita.php" method="get" class="form_search">
				<input type="text" name="busqueda" id="busqueda
						" placeholder="Buscar">
				<input type="submit" value="Buscar" class="btm_search">
			    </form>
					<br><br><br>
					<table class="tabla">
						  <tr>
						    <th>#Citas</th>
							<th>Fecha</th>
							<th>Hora</th>
							<th>Paciente</th>
							<th>Medico</th>
							<th>Estado</th>
							<th colspan="3">Opciones</th>
						  </tr>
						<?php foreach ($consulta as $Sql): ?>
						<tr>
						<?php echo "<td class='mayusculas'>". $Sql['idcita']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['citfecha']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['cithora']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['citPaciente']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['citMedico']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['citestado']. "</td>"; ?>
						<?php echo "<td class='centrar'>"."<a href='ver_cita.php?idcita=".$Sql['idcita']."' class='editar'>Visualizar</a>". "</td>"; ?>
                        <?php echo "<td class='centrar'>"."<a href='actualizarcitas.php?idcita=".$Sql['idcita']."' class='editar'>Editar</a>". "</td>"; ?>
						<?php echo "<td class='centrar'>"."<a href='eliminar_citas.php?idcita=".$Sql['idcita']."' class='eliminar'>Eliminar</a>". "</td>"; ?>
						</tr>
						<?php endforeach; ?>
						</table>
						<?php  if(!empty($mensaje)): ?>
							<ul>
							  <?php echo $mensaje; ?>
							</ul>
						<?php  endif; ?>	 

				</article>
	</section>

</body>
</html>