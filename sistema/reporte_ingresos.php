<?php
session_start();
if($_SESSION['rol'] != 1)
{
  header("location: ./");
}
include "../conexion.php";
date_default_timezone_set('America/Guayaquil');
$fecha = date('Y-m-d');
$query = mysqli_query($conection,"SELECT motivo,precio FROM historias_clinicas WHERE fecha = '$fecha'");
ob_clean();
ob_start();
  require_once('./includes/tcpdf/tcpdf.php');
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ebenedent System');
$pdf->SetTitle("TOTAL DE INGRESOS ".date('Y-m-d'));
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(10, 10, 10, false);
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetFont('times', '', 12);
$pdf->addPage();
$content = '';
$content .= '
<div class="encabezado" align="center" >
  <div class="logo">
    <b><font color="#808080">CONSULTORIO ODONTOLOGICO</font><b>
    <br>
    <b><font color="#808080">Ebene-Dent</font></b>
    <br>
    <b><font color="#808080">Direccion: Mapasingue Este Calle 9na y Av. Segunda</font></b>
    <br>
    <b><font color="#808080">Telefono: 0959960896</font></b>
    
  </div>
<br>
		<div class="row">
        	<div class="col-md-12">
            	<h1 style="text-align:center;">TOTAL DE INGRESOS <br>'.date("Y-m-d").'</h1>
              <center>
      <table border="1" cellpadding="5" align="center" style="width:100%;">
        <thead>
          <tr>
  				<th style="max-width:auto; font-weight: bold;">MOTIVO</th>
          <th style="max-width:auto; font-weight: bold;">PRECIO</th>
          </tr>
        </thead>
	';
  $total = 00.00;
  while ($user=mysqli_fetch_array($query)) {
    $total = $total+$user['precio'];
    //if($user['estatus']==1){  $color= '#f5f5f5'; $estatus = "ACTIVO"; }else{ $color= '#f5f5f5'; $estatus = "INACTIVO";}

echo $content .= '
  <tr bgcolor="#f5f5f5">
    <td style="max-width:auto; font-weight: bold;">'.$user["motivo"].'</td>
    <td style="max-width:auto; font-weight: bold;">$ '.$user["precio"].'</td>
      </tr>
';
}

$content .= '</table> <table table border="1" cellpadding="5" align="center" style="width:100%;">
  <thead>
    <tr>
    <th style="max-width:auto; font-weight: bold; font-size: 100px;">TOTAL</th>
    <th bgcolor="	#b4ffb4" style="max-width:auto; font-weight: bold; font-size: 100px;"> $ '.$total.'</th>
    </tr>
  </thead>
</table> </center>';

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

   </body>
 </html>
