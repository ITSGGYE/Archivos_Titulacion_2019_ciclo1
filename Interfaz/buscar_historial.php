 <?php  
    $busqueda =strtolower($_REQUEST['busqueda']);
   if (empty($busqueda)) {
	header("location:../historial.php");
    }
    ?>
<?php
$mensaje='';
try{
	$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
}catch(PDOException $e){
	echo "Error: ". $e->getMessage();
}

$consulta = $conexion -> prepare("
	SELECT 	* FROM pacientes WHERE (
		pacIdentificacion LIKE '$busqueda' OR
		pacNombre LIKE '%$busqueda%' OR
		pacApellidos LIKE '%$busqueda%' OR
		pacFechaNacimiento LIKE '$busqueda' OR
		pacSexo LIKE '$busqueda')");

$consulta ->execute();
$consulta = $consulta ->fetchAll();
if(!$consulta){
	$mensaje .= 'NO HAY PACIENTES PARA MOSTRAR';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Historial - CentroLogros</title>
	<link rel="stylesheet" href="../css/estilos.css">
	<link rel="icon" type="image/x-icon" href="../img/logo.jpeg">
</head>

<body>
<?php include 'arriba/header.php'; ?>
	</div>
	<section class="main">
		<div class="wrapp">
			<?php include 'arriba/nave.php'; ?>
	<?php  
    $busqueda =strtolower($_REQUEST['busqueda']);
   if (empty($busqueda)) {
	header("location:../historial.php");
    }
    ?>
				<article>
					<div class="mensaje">
						<h2>HISTORIA CLINICA</h2>
					</div>
					<a class="agregar" href="../agregarpacientes.php">Agregar Paciente</a>
				
		<form action="buscar_historial.php" method="get" class="form_search">
		<input type="text" name="busqueda" id="busqueda
						" placeholder="Buscar" value="<?php echo $busqueda;?>">
		<input type="submit" value="Buscar" class="btm_search">
			    </form>
					<br><br><br>
					<table class="tabla">
						  <tr>
							<th>Cédula</th>
							<th>Nombres</th>
							<th>Apellidos</th>
							<th>Fecha Nacimiento</th>
							<th>Sexo</th>
							<th colspan="6">Opciones</th>
						  </tr>
						<?php foreach ($consulta as $Sql): ?>
						<tr>
				<?php echo "<td class='mayusculas'>". $Sql['pacIdentificacion']. "</td>"; ?>
				<?php echo "<td class='mayusculas'>". $Sql['pacNombre']. "</td>"; ?>
				<?php echo "<td class='mayusculas'>". $Sql['pacApellidos']. "</td>"; ?>
				<?php echo "<td>". $Sql['pacFechaNacimiento']. "</td>"; ?>
				<?php echo "<td>". $Sql['pacSexo']. "</td>"; ?>
				  <?php echo "<td class='centrar'>"."<a href='../ver.php?idPaciente=".$Sql['idPaciente']."' class='editar'>Visualizar</a>". "</td>"; ?>
                <?php echo "<td class='centrar'>"."<a href='../actualizarhistorial.php?idPaciente=".$Sql['idPaciente']."' class='editar'>Editar</a>". "</td>"; ?>
                <?php echo "<td class='centrar'>"."<a href='../eliminar_paciente.php?idPaciente=".$Sql['idPaciente']."'class='eliminar'>Eliminar</a>". "</td>"; ?>
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