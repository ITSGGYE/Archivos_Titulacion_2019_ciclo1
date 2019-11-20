<?php
	session_start();
	if($_SESSION['rol'] != 1)
	{
		header("location: ./");
	}

	include "../conexion.php";

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>
	<title>Lista de usuarios</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">

		<h1>Lista de usuarios</h1>
		<br>
		<a href="registro_usuario.php" class="btn_new">Crear usuario</a>
		<a target="_blank" href="reporte_usuarios.php" class="btn_new">Generar Reporte</a>

		<form action="buscar_usuario.php" method="POST" class="form_search">
			<input type="text" name="usuario" id="usuario" placeholder="Buscar" required>
			<input type="submit" value="Buscar" class="btn_search">
		</form>



		<table>
			<tr>
				<th>Cedula</th>
				<th>Nombres</th>
				<th>Usuario</th>
				<th>Rol</th>
				<th>Acciones</th>
			</tr>

		<?php
			//Paginador
			$sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM usuarios WHERE estatus = 1 ");
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

			$query = mysqli_query($conection,"SELECT nombres,cedula,user,nombre_rol,usuarios.id,usuarios.rol FROM personas,usuarios,roles WHERE usuarios.rol = roles.type_rol AND usuarios.estatus = 1 AND usuarios.cedula_usuario = personas.cedula ORDER BY usuarios.id ASC LIMIT $desde,$por_pagina
				");

			mysqli_close($conection);

			$result = mysqli_num_rows($query);
			if($result > 0){

				while ($data = mysqli_fetch_array($query)) {

			?>
				<tr>
					
					<td><?php echo $data["cedula"]; ?></td>
					<td><?php echo $data["nombres"]; ?></td>
					<td><?php echo $data["user"]; ?></td>
					<td><?php echo $data['nombre_rol']; ?></td>
					<td>
						<a class="link_edit" href="editar_usuario.php?id=<?php echo $data["id"]; ?>">Editar</a>

					
						|
						<a class="link_delete" href="eliminar_confirmar_usuario.php?id=<?php echo $data["id"]; ?>">Eliminar</a>
					

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
