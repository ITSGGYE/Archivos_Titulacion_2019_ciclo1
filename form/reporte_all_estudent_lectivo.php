<?php

require_once '../conexion.php';
$objConexion = new Conexion();
$conexion = $objConexion::obtenerConexion();
$query = "SELECT MAX(cod_lectivo) AS Cod_Lectivo FROM lectivo";
$stmt = $conexion->prepare($query);
$stmt->execute();
$lectivo = $stmt->fetch();
$cod_lectivo = $lectivo['Cod_Lectivo'];
$query = "SELECT * FROM estudiantes,matriculas WHERE matriculas.idestudiante = estudiantes.id AND matriculas.anio = '$cod_lectivo' ORDER BY anio_curso , matriculas.curso ASC";
$stmt = $conexion->prepare($query);
$stmt->execute();
$cadena = "";
$cont = 0;
while
($estudent = $stmt->fetch()) {
    $cont++;
    $cadena = $cadena. '
        <tr>
    <td width="30px">'.$cont.'</td>
        <td width="100px">'.$estudent["identificador"].'</td>
        <td width="180px">'.$estudent["nombres"]." ".$estudent["apellidos"].'</td>
            <td width="80px">'.$estudent["anio_curso"].'</td>
                <td width="80px">'.$estudent["curso"].'</td>
                    <td width="80px">'.$estudent["anio"].'</td>
                        </tr>
             ';
}

require_once '../tcpdf/tcpdf.php';
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
//<link rel="shortcut icon" href="dist/img/escudo.jpg">
<b><div align="right"><span>Guayaquil, '.date("d-m-Y").'</span></div></b>
<b><div align="center"><span>REPORTE DE ALUMNOS/AS POR AÑO LECTIVO</span></div></b>
<br>
<br>
<table border="1" cellpadding="5" align="center" style="width:100%;">
<thead bgcolor="#001427" color="white">
  <tr>
  <th width="30px" bgcolor="#001427" color="white" style="max-width:30px; font-weight: bold;">#</th>
    <th width="100px" bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">CEDULA</th>
    <th width="180px" bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">NOMBRES</th>
    <th width="80px" bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">CURSO</th>
    <th width="80px" bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">SECCION</th>
    <th width="80px" bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">AÑO LECTIVO</th>
  </tr>
  </thead>
  <tbody>';
  $content = $content.$cadena;
  $content = $content.'</tbody>
  </table>';
  $pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastPage();
ob_end_clean();
// header('Content-type: application/pdf'); header("Content-Disposition: attachment; filename='Reporte_de_alumnos_".$result['anio_actual']."_".$result['curso'].".pdf");
$pdf->output('Reporte_de_alumnos_por_año_lectivo.pdf', 'I');

