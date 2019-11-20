<?php
session_start();

include "../conexion.php";
$id_paciente = $_GET['id'];
$query = mysqli_query($conection,"SELECT nombres,cedula FROM personas WHERE id = $id_paciente");
$datos = mysqli_fetch_array($query);
$cedula = $datos['cedula'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<?php include "includes/scripts.php"; ?>
<title>Historial Clinico</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
  <section id="container">

		<h1>HISTORIA CLINICA DE <?php echo $datos['nombres'];?></h1>
		<a target="_blank" href="reporte_hc.php?cedula=<?php echo $cedula; ?>" class="btn_new">Reporte HC</a>

    <table>
			<tr>
			
				<th>Motivo</th>
				<th>Descripción</th>
				<th>Prescripción</th>
				<th>Fecha</th>
        <th>Precio</th>
				<th>Certificado</th>

			</tr>

      <?php
        //Paginador
        $sql_registe = mysqli_query($conection,"SELECT COUNT(*) as total_registro FROM historias_clinicas WHERE cedula_paciente = $cedula");
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

        $query = mysqli_query($conection,"SELECT nombres,cedula,motivo,historias_clinicas.id,descripcion,prescripcion,fecha,precio FROM historias_clinicas,personas
           WHERE cedula_paciente = $cedula AND cedula = cedula_paciente ORDER BY id ASC LIMIT $desde,$por_pagina
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
				
          <td><?php echo $data["motivo"]; ?></td>
          <td><?php echo $data["descripcion"]; ?></td>
					<td><?php echo $data["prescripcion"]; ?></td>
					<td><?php echo $data["fecha"]; ?></td>
					<td>$ <?php echo $data["precio"]; ?></td>
					<td><a class="link_edit" href="./editar_HC.php?id=<?php echo $data["id"]; ?>&idpaciente=<?php echo $id_paciente;?>">Editar </a>||
					<a class="link_edit" href="./certificado.php?id=<?php echo $data["id"]; ?>">Certificado</a></td>


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
