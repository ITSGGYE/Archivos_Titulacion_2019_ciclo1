<?php
session_start();
$idestudiante = $_GET['id'];
$mes = $_GET['mes'];
require_once '../conexion.php';
$objConexion = new Conexion();
$conexion = $objConexion::obtenerConexion();
$query =  "SELECT * FROM cobros,estudiantes WHERE cobros.idestudiante = :_id AND mes = :_mes AND estudiantes.id = :_id";
$stmt = $conexion->prepare($query);
$stmt->bindParam(':_id',$idestudiante,PDO::PARAM_INT,4000);
$stmt->bindParam(':_mes',$mes,PDO::PARAM_STR,4000);
$stmt->execute();
$result = $stmt->fetch();
$mes_exists = $result['mes'];
$valor = $result['valor'];
$estdo1 = $result['estado'];
$cedula = $result['identificador'];
if($estdo1 == 1){
    $estado = "PAGADO";
}else {
    $estado = "NO PAGADO";
}

$mes_ex = "";
if($mes_exists == 1){
    $mes_ex = "Enero";
}elseif ($mes_exists == 2) {
    $mes_ex = "Febrero";
}elseif ($mes_exists == 3) {
    $mes_ex = "Marzo";
}elseif ($mes_exists == 4) {
    $mes_ex = "Abril";
}elseif ($mes_exists == 5) {
    $mes_ex = "Mayo";
}elseif ($mes_exists == 6) {
    $mes_ex = "Junio";
}elseif ($mes_exists == 7) {
    $mes_ex = "Julio";
}elseif ($mes_exists == 8) {
    $mes_ex = "Agosto";
}elseif ($mes_exists == 9) {
    $mes_ex = "Septiembre";
}elseif ($mes_exists == 10) {
    $mes_ex = "Octubre";
}elseif ($mes_exists == 11) {
    $mes_ex = "Noviembre";
}elseif ($mes_exists == 12) {
    $mes_ex = "Diciembre";
}
date_default_timezone_set('America/Guayaquil');
$anio = date("Y");

ob_clean();
ob_start();
  require_once('../tcpdf/tcpdf.php');
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('System');
$pdf->SetTitle("REPORTE DE COBRO ".date('Y-m-d'));
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(10, 10, 10,10);
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('times', '', 14);
$pdf->addPage();
$content = '';
echo $content = $content.'
<img src="/sistema_matricula/dist/img/encabezado.png" alt="" height="150px">
<div align="right"><b>GUAYAQUIL, '.date("d-m-Y").'</b></div>
<div align="center">
<b><h3><span>Reporte de Pago del mes: '.$mes_ex.'</span></h3></b>
<b><span>Cedula del Alumno(a): '.$cedula.'</span></b>
<br>
<b><span>Alumno(a): '.$result['nombres']." ".$result['apellidos'].'</span></b>
<br>
</div>
<table border="1" cellpadding="5" align="center" style="width:100%;">
<thead bgcolor="#001427" color="white">
  <tr>
  <th bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">#</th>
    <th bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">MES</th>
    <th bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">AÑO</th>
    <th bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">VALOR</th>
    <th bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">ESTADO</th>
  </tr>
  </thead>
  <tbody>';
  $content = $content. '

  <tr>
    <td>1</td>
    <td>'.$mes_ex.'</td>
    <td>'.$anio.'</td>
    <td>'.$valor.'</td>
    <td>'.$estado.'</td>
  </tr>
</tbody>
</table>
<br>
<br>
<br><br>
<br>
<br><br>
<br>
<br><br>
<br>
<br><br>
<br>
<br><br>
<br>
<br><br>
<br>
<br>
<img src="/sistema_matricula/dist/img/pie_de_pagina.png" alt="" height="150px">
';
$pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastPage();
ob_end_clean();
$pdf->output('Reporte_de_cobro_mensual'.date('Y-m-d').'.pdf', 'I');


