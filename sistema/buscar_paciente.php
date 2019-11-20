<?php
session_start();
include "../conexion.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$cedula = $_POST['cedula'];
}
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<?php include "includes/scripts.php"; ?>
 	<title>Lista de Paciente</title>
 </head>
 <body>
 	<?php include "includes/header.php"; ?>
 	<section id="container">

 		<h1>Lista de Paciente</h1>
 		<br>
 		<a href="registro_paciente.php" class="btn_new">Crear Paciente</a>
 		<a target="_blank" href="reporte_pacientes.php" class="btn_new">Reporte de Pacientes</a>
 		<a target="_blank" href="eliminar_inactivos.php" class="btn_new">Eliminar Pacientes Inactivos</a>

 		<form action="buscar_paciente.php" method="POST" class="form_search">
 			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
 			<input type="submit" value="Buscar" class="btn_search">
 		</form>

 		<table>
 			<tr>
 				
 				<th>Cedula</th>
 				<th>Nombre</th>
 				<th>Telefono</th>
 				<th>Direccion</th>
 				<th>FechaNacimiento</th>
 				<th>Acciones</th>
 			</tr>
 		<?php
 			//Paginador
 			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM personas WHERE type_persona = 3 ");
 			$result_register = mysqli_fetch_array($sql_registe);
 			$total_registro = $result_register['total_registro'];

 			$por_pagina = 5;

 			if(empty($_GET['pagina']))
 			{
 				$pagina = 1;
 			}else{
 				$pagina = $_GET['pagina'];
 			}

 			$desde = ($pagina-1) * $por_pagina;
 			$total_paginas = ceil($total_registro / $por_pagina);

 			$query = mysqli_query($conection,"SELECT * FROM personas
 			   WHERE cedula = '$cedula' ORDER BY id ASC LIMIT $desde,$por_pagina
 				");

 			mysqli_close($conection);

 			$result = mysqli_num_rows($query);
 			if($result > 0){

 				while ($data = mysqli_fetch_array($query)) {
 					if($data["cedula"]==0)
 						{
 							$cedula = 'C/F';
 						}else{
 							$cedula = $data["cedula"];

 						}

 			?>
 				<tr>
 					
 					<td><?php echo $data["cedula"]; ?></td>
 					<td><?php echo $data["nombres"]; ?></td>
 					<td><?php echo $data["telefono"]; ?></td>
 					<td><?php echo $data["direccion"]; ?></td>
 					<td><?php echo $data["fecha_nacimiento"]; ?></td>

 					<td>
 						<a class="link_edit" href="editar_paciente.php?id=<?php echo $data["id"]; ?>">Editar</a>

 					<?php if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2){ ?>

 						<a class="link_delete" href="eliminar_confirmar_paciente.php?id=<?php echo $data["id"]; ?>">Eliminar</a>
 						<a class="link_edit" href="view_HC.php?id=<?php echo $data["id"]; ?>">Ver HC</a>
 	<?php } ?>

 					</td>
 				</tr>

 		<?php
 				}

 			}
 		 ?>


 		</table>
 		<div class="paginador">
 			<ul>
 			<?php
 				if($pagina != 1)
 				{
 			 ?>
 				<li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
 				<li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>
 			<?php
 				}
 				for ($i=1; $i <= $total_paginas; $i++) {
 					# code...
 					if($i == $pagina)
 					{
 						echo '<li class="pageSelected">'.$i.'</li>';
 					}else{
 						echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
 					}
 				}

 				if($pagina != $total_paginas)
 				{
 			 ?>
 				<li><a href="?pagina=<?php echo $pagina + 1; ?>">>></a></li>
 				<li><a href="?pagina=<?php echo $total_paginas; ?> ">>|</a></li>
 			<?php } ?>
 			</ul>
 		</div>


 	</section>
 	<?php include "includes/footer.php"; ?>
 </body>
 </html>
