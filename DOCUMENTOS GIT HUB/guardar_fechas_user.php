<?php
include('conn.php');//CONEXION A LA BD

$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];

if(isset($_POST['generar_reporte']))
{
	// NOMBRE DEL ARCHIVO Y CHARSET
	header('Content-Type:text/csv; charset=latin1');
	header('Content-Disposition: attachment; filename="Reporte_Fechas.csv"');

	// SALIDA DEL ARCHIVO
	$salida=fopen('php://output', 'w');
	// ENCABEZADOS
	fputcsv($salida, array('Fecha', 'Paciente', 'Representante / Dueno', 'Especie', 'Hora', 'Tipo de Atencion', 'Registro', 'Medicamento', 'Atendido Por'));
	// QUERY PARA CREAR EL REPORTE
	$reporteCsv=$conn->query("SELECT * FROM historial where fecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY id_historial");
	while($filaR= $reporteCsv->fetch_assoc())
		fputcsv($salida, array(date('d/m/Y',strtotime($filaR['fecha'])), 
								$filaR['paciente'],
								$filaR['representante'],
								$filaR['especie'],
								date('H:i:s',strtotime($filaR['hora'])),
								$filaR['tipo_atencion'],
								$filaR['registro'],
								$filaR['medicamento'],
								$filaR['atendido']));

}

?>

