<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
require_once '../conexion.php';
$id_HC = $_GET['id'];
date_default_timezone_set('America/Guayaquil');
$fecha = date('Y-m-d');
$query = "SELECT * FROM ebenedent.historias_clinicas WHERE id = $id_HC";
$result = mysqli_query($conection,$query);
$fetch = mysqli_fetch_array($result);
$cedula = $fetch['cedula_paciente'];
$query = "SELECT * FROM ebenedent.personas WHERE cedula = '$cedula'";
$result = mysqli_query($conection,$query);
$row = mysqli_fetch_array($result);
$mes = date("m");
if ($mes == 1) {
  $mestext = "Enero";
}elseif ($mes == 2){
  $mestext = "Febrero";
}elseif ($mes == 3) {
  $mestext = "Marzo";
}elseif ($mes == 4) {
  $mestext = "Abril";
}elseif ($mes == 5) {
  $mestext = "Mayo";
}elseif ($mes == 6) {
  $mestext = "Junio";
}elseif ($mes == 7) {
  $mestext = "Julio";
}elseif ($mes == 8) {
  $mestext = "Agosto";
}elseif ($mes == 9) {
  $mestext = "Septiembre";
}elseif ($mes == 10) {
  $mestext = "Octubre";
}elseif ($mes == 11) {
  $mestext = "Noviembre";
}elseif ($mes == 12) {
  $mestext = "Diciembre";
}
ob_clean();
ob_start();
  require_once('./includes/tcpdf/tcpdf.php');
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ebenedent System');
$pdf->SetTitle("CERTIFICADO MÉDICO");
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(20, 20, 20, false);
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetFont('times', '', 16);
$pdf->addPage();
$content = '
<div class="encabezado" align="center" >
  <div class="logo">
    <b><font color="#808080">CONSULTORIO ODONTOLOGICO</font><b>
    <br>
    <b><font color="#808080">Ebene-Dent</font></b>
    <br>
    <b><font color="#808080">Direccion: Mapasingue Este Calle 9na y Av. Segunda</font></b>
    <br>
    <b><font color="#808080">Telefono: 0959960896</font></b>
    <font color="#808080">_________________________________________________________</font>
  </div>
  </div>
<br>
<b><div align="right"><span align = "right">Guayaquil '.date("d").' de '.$mestext.' del '.date("Y").'</span></div></b><br> <br>
<div class="content" align="left">
<div class="content" align="center">
  <b><span>CERTIFICADO MEDICO</span></b><br> <br> <br>
  </div>
  <div align="justify"><span>La Dra. Gabriela Albán Certifica que '.$row["nombres"].' con cedula # '.$row["cedula"].' fue atendido(a) el dia '.$fetch["fecha"].'</span>
  <span>por motivo de '.$fetch["motivo"].'.</span></div>
  <b><br><br><br><br><br><span>Atentamente<br><br><br> ___________________________<br>&nbsp;&nbsp; Dra. Gabriela Alban</span></b>
</div>
';
$pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastPage();
ob_end_clean();
$pdf->output('Reporte_de_Ingresos_'.date('Y-m-d').'.pdf', 'I');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <style media="screen">
      .encabezado{
        width: 100%;
        max-height: 100px;
        background-color: red;
      }

      .logo{
        width: 70%;
        display: flex;
        justify-content: center;
        align-items: center;
        
      }

      .logo img{
        max-height: 100px;
      }
    </style>
  </body>
</html>
