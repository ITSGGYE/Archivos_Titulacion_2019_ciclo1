<?php
session_start();
if (isset($_SESSION['user'])) {
if ($_SESSION['rol']==1) {
		header('location: ./principal.php ');
}elseif ($_SESSION['rol']==3) {
	header('location: ./princ_user.php ');
}
}

?>
<?php  
if (@!$_SESSION['user']) {
}elseif ($_SESSION['rol']==1) {    
}
?>


<?php
require_once 'libs/ez_sql_core.php';
require_once 'libs/ez_sql_mysql.php';
// Zebra Pagination
require_once 'libs/Zebra_Pagination.php';

///// INCLUIR LA CONEXIÓN A LA BD /////////////////
include('conexion.php');
///// CONSULTA A LA BASE DE DATOS /////////////////
$Alumnos="SELECT * FROM historial order by id_historial DESC";
$resAlumnos=$conexion->query($Alumnos);


$conn = new ezSQL_mysql('root', '', 'histovet');

$total_historial = $conn->get_var('SELECT count(*) FROM historial order by id_historial DESC');
$resultados   = 8;

$paginacion = new Zebra_Pagination();
$paginacion->records($total_historial);
$paginacion->records_per_page($resultados);

// Quitar ceros en numeros con 1 digito en paginacion
$paginacion->padding(false);

$historial = $conn->get_results('SELECT * FROM historial order by id_historial DESC LIMIT ' . (($paginacion->get_page() - 1) * $resultados) . ', ' . $resultados) ;


?>

<html lang="es">
	<head>
		<title>REPORTES DE historial</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		
		<link rel="stylesheet" href="css/bootstrap.min.css?nocache=" type="text/css" media="screen" />

		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>		
		
	</head>
	<body>

<?php
  include("header_vet.php");
  ?>

<br>


		<section>
			 <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
			


			<div class="panel panel-default">
              			
                        <div class="panel-body">
		<form method="post" class="form" action="guardar_fechas_vet.php">
		<input type="date" name="fecha1" id="fecha1">
		<input type="date" name="fecha2" id="fecha2">
		<input type="submit" name="generar_reporte" value="Exportar EXCEL" bgcolo="000">
		
		</form>
							<hr>

			<table class="table table-bordered table-hover">
				<thead bgcolor="#A7D3F3" align="center">
				<tr>
					<th>Id</th>
					<th>Fecha</th>
					<th>Paciente</th>
					<th>Representante</th>
					<th>Especie</th>
					<th>Hora</th>
					<th>Tipo Atención</th>
					<th>Registro</th>
					<th>Medicamento</th>
					<th>Atendido Por</th>
					
				</tr>
			</thead>
				<?php foreach ($historial as $pais): ?>
					<tr>
						<td><?php echo $pais->id_historial; ?></td>
						<td><?php echo $pais->fecha; ?></td>
						<td><?php echo $pais->paciente; ?></td>
						<td><?php echo $pais->representante; ?></td>
						<td><?php echo $pais->especie; ?></td>
						<td><?php echo $pais->hora; ?></td>
						<td><?php echo $pais->tipo_atencion; ?></td>
						<td><?php echo $pais->registro; ?></td>
						<td><?php echo $pais->medicamento; ?></td>
						<td><?php echo $pais->atendido; ?></td>												
					</tr>
					<?php endforeach ?>
			</table>

			<center><?php $paginacion->render(); ?>
		</section>
<br>
<br>

</div>
</div>
</div>
</div>
</div>
</div>
	</body>
</html>


