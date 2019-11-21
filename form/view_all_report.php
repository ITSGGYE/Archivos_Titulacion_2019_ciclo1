<?php
session_start();
require_once '../conexion.php';
date_default_timezone_set("America/Guayaquil");
$meses = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $mes = $_POST['meses'];
            if($mes == 1){
            $meses="Enero";
        }elseif($mes == 2){
            $meses="Febrero";
        }elseif($mes== 3){
            $meses="Marzo";
        }elseif($mes == 4){
            $meses="Abril";
        }elseif($mes == 5){
            $meses="Mayo";
        }elseif($mes == 6){
            $meses="Junio";
        }elseif($mes == 7){
            $meses="Julio";
        }elseif($mes == 8){
            $meses="Agosto";
        }elseif($mes == 9){
            $meses="Septiembre";
        }elseif($mes == 10){
            $meses="Octubre";
        }elseif($mes == 11){
            $meses="Noviembre";
        }elseif($mes == 12){
            $meses="Diciembre";
        }
    $conexion = Conexion::obtenerConexion();
    $query = "Select * From estudiantes where Not id In (Select idestudiante From cobros WHERE mes = $mes);";
    $stmt = $conexion->query($query);
    $cadena = "";
    $cont++;
    while ($data = $stmt->fetch()) {
        $cont++;
        $cadena = $cadena.'
        <tr>
        <td>'.$cont.'</td>
        <td>'.$data["nombres"].'</td>
        <td>'.$data["apellidos"].'</td>
        <td>'.$data["anio_actual"].'</td>
            <td>'.$data["curso"].'</td>
                <td>'.$meses.'</td>
                <td>DEBE</td>
        </tr>';
    }

    ob_clean();
    ob_start();
    require_once('../tcpdf/tcpdf.php');
    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('System');
    $pdf->SetTitle("Reporte de Pagos Pendientes " . date('Y-m-d'));
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetMargins(10, 10, 10, 10);
    $pdf->SetAutoPageBreak(true, 10);
    $pdf->SetFont('times', '', 14);
    $pdf->addPage();
    $content = '';
    $content = $content . '
<div align="right"><b>GUAYAQUIL, ' . date("d-m-Y") . '</b></div>
<div align="center">
<b><h3><span>PAGOS PENDIENTES</span></h3></b>
<br>
<br>
</div>
<table border="1" cellpadding="5" align="center" style="width:100%;">
<thead bgcolor="#001427" color="white">
  <tr>
  <th bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">#</th>
    <th bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">NOMBRES</th>
    <th bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">APELLIDOS</th>
    <th bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">CURSO</th>
    <th bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">PARALELO</th>
    <th bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">MES</th>
    <th bgcolor="#001427" color="white" style="max-width:auto; font-weight: bold;">ESTADO</th>
  </tr>
  </thead>
  <tbody>';
    $content = $content.$cadena;
    $content = $content."</tbody>
</table>";
    $pdf->writeHTML($content, true, 0, true, 0);
    $pdf->lastPage();
    ob_end_clean();
    $pdf->output('Reporte_de_cobro_'.date('Y-m-d').'.pdf', 'I');
}
