<?php
	session_start();
	include "../conexion.php";
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Lista de Citas</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">

		<h1>Lista de Citas</h1>
		<br>
		<a href="registro_citas.php" class="btn_new">Crear Cita</a>
		<a target="_blank" href="reporte_citas.php" class="btn_new">Reporte Citas (Hoy)</a>

		<form action="buscar_cita.php" method="POST" class="form_search">
			<input type="date" name="fecha" id="fecha" placeholder="Buscar">
			<input type="submit" value="Buscar" class="btn_search">
		</form>
</section>
		<table>
			<tr>
			
				<th>Cedula de paciente</th>
				<th>nombre de paciente</th>
				<th>Fecha </th>
				<th>Hora</th>
				<th>Observaciones</th>
				<th>Acciones</th>
			</tr>

		<?php
			//Paginador

			$sql_registe = mysqli_query($conection,"SELECT COUNT(id) as total_registro FROM citas WHERE estatus = 1");
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

			$query = mysqli_query($conection,"SELECT citas.id,citas.fecha,citas.hora,personas.nombres,citas.cedula_paciente,citas.nota FROM citas, personas  where citas.cedula_paciente = personas.cedula AND citas.estatus = 1 ORDER BY citas.id ASC LIMIT $desde,$por_pagina");

			mysqli_close($conection);

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {
					if($data["cedula_paciente"]==0)
						{
							$cedula = 'C/F';
						}else{
							$cedula = $data["cedula_paciente"];

						}

			?>
				<tr>
					
					<td><?php echo $data["cedula_paciente"]; ?></td>
					<td><?php echo $data["nombres"]; ?></td>
					<td><?php echo $data["fecha"]; ?></td>
					<td><?php echo $data["hora"]; ?></td>
					<td><?php echo $data["nota"]; ?></td>

					<td>
						<a class="link_edit" href="editar_cita.php?id=<?php echo $data["id"]; ?>">Editar|</a>

					<?php if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2){ ?>

						<a class="link_delete" href="eliminar_confirmar_cita.php?id=<?php echo $data["id"]; ?>">Eliminar|</a>
						<a class="link_edit" href="historial_clinico.php?id=<?php echo $data["id"]; ?>">Abrir</a>
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
	<style media="screen">
	.form_search{
		width: 30%;
	}
		input[type="date"]{
			width: 80%;
		}

		input[type="submit"]{
			max-width: 19%;
		}
	</style>
</body>
</html>
