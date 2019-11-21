<?php
session_start();
require_once '../conexion.php';
$anio = $_POST['anio_curso'];
$curso = $_POST['curso'];
date_default_timezone_set('America/Guayaquil');
$fecha = date('Y-m-d');
$conexion = Conexion::obtenerConexion();
$query = "SELECT * FROM estudiantes WHERE anio_actual = :_anio AND curso = :_curso AND estado = 1";
$stmt = $conexion->prepare($query);
$stmt->bindParam(':_anio',$anio,PDO::PARAM_STR,4000);
$stmt->bindParam(':_curso',$curso,PDO::PARAM_STR,4000);
$stmt->execute();
$cadena = "";
$cont = 0;
while ($result = $stmt->fetch()) {
  $cont++;
$cadena = $cadena. '
<tr>
  <td width="30px">'.$cont.'</td>
  <td width="100px">'.$result["identificador"].'</td>
  <td width="410px">'.$result["nombres"]." ".$result["apellidos"].'</td>
</tr>
';
}

$stmt = null;
$query = null;
ob_clean();
ob_start();
  require_once('../tcpdf/tcpdf.php');
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('System');
$pdf->SetTitle("Reporte por curso ".$result['anio_actual']." ".$result['curso']);
$pdf->setPrintHeader(true);
$PDF_HEADER_LOGO="encabezado.png"; //Solo me funciona si esta dentro de la carpeta images de la libreria

$pdf->SetHeaderData($PDF_HEADER_LOGO,190,);
$pdf->setPrintFooter(false);
$pdf->SetMargins(10, 50, 10, 30);
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('times', '', 14);
$pdf->addPage();
$content = '
<br>
<b><div align="right"><span>Guayaquil, '.date("d-m-Y").'</span></div></b>
<b><div align="center"><span>REPORTE DE ALUMNOS/AS POR CURSO</span></div></b>
<b><div align="center"><span>CURSO: '.$anio.'  PARALELO: '.$curso.' </span></div></b>
<br>
<br>
<table border="1" cellpadding="5" align="center" style="width:100%;">
<thead bgcolor="#001427" color="white">
  <tr>
  <th width="30px" bgcolor="#001427" color="white" style="max-width:30px; font-weight: bold;">#</th>
    <th width="100px" bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">CEDULA</th>
    <th width="410px" bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">NOMBRES</th>
  </tr>
  </thead>
  <tbody>';
  $content = $content.$cadena;
  $content = $content.'</tbody>
  </table>';

$pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastPage();
ob_end_clean();
 header('Content-type: application/pdf'); header("Content-Disposition: attachment; filename='Reporte_de_alumnos_".$result['anio_actual']."_".$result['curso'].".pdf");
$pdf->output('Reporte_de_alumnos_'.$result['anio_actual']."_".$result['curso'].'.pdf', 'I');
 ?>
