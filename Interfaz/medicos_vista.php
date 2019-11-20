<?php
$mensaje='';
try{
	$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
}catch(PDOException $e){
	echo "Error: ". $e->getMessage();
}

$consulta = $conexion -> prepare("
	SELECT * FROM medicos ORDER BY medidentificacion");

$consulta ->execute();
$consulta = $consulta ->fetchAll();
if(!$consulta){
	$mensaje .= 'NO HAY MEDICOS PARA MOSTRAR';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Medicos - CentroLogros</title>
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
						<h2>MEDICOS</h2>
					</div>
						<a href="Interfaz/agg_medicos_vista.php"class="agregar">Agregar Medico</a>
						<table class="tabla">
						  <tr>
							<th>Cédula</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Correo</th>
							<th>Telefono</th>
							<th colspan ="2">Opciones</th>
						  </tr>
						<?php foreach ($consulta as $Sql): ?>
						<tr >
						<?php echo "<td class='mayusculas'>". $Sql['medidentificacion']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['mednombres']. "</td>"; ?>
						<?php echo "<td class='mayusculas'>". $Sql['medapellidos']. "</td>"; ?>
						<?php echo "<td>". $Sql['medcorreo']. "</td>"; ?>
						<?php echo "<td>". $Sql['medtelefono']. "</td>"; ?>
						<?php echo "<td class='centrar'>"."<a href='actualizarmedico.php?idMedico=".$Sql['idMedico']."' class='editar'>Editar</a>". "</td>"; ?>
						<?php echo "<td class='centrar'>"."<a href='eliminar_medico.php?idMedico=".$Sql['idMedico']."' class='eliminar'>Eliminar</a>". "</td>"; ?>
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