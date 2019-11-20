<?php
session_start();

include "../conexion.php";
date_default_timezone_set('America/Guayaquil');
$fecha = date('Y-m-d');
$query = mysqli_query($conection,"SELECT citas.id,citas.estatus,citas.fecha,citas.hora,personas.nombres,citas.cedula_paciente,citas.nota FROM citas, personas  where citas.cedula_paciente = personas.cedula  AND fecha = '$fecha'  ORDER BY citas.id ASC");
ob_clean();
ob_start();
  require_once('./includes/tcpdf/tcpdf.php');
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ebenedent System');
$pdf->SetTitle("LISTA DE CITAS ".date('Y-m-d'));
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
            	<h1 style="text-align:center;">LISTA DE CITAS <br> '.date("Y-m-d").'</h1>
              <center>
      <table border="1" cellpadding="5" align="center" style="width:100%;">
        <thead>
          <tr>
         
  				<th style="max-width:auto; font-weight: bold;">CEDULA</th>
  				<th style="max-width:auto; font-weight: bold;">NOMBRES</th>
  				<th style="max-width:auto; font-weight: bold;">FECHA</th>
  				<th style="max-width:auto; font-weight: bold;">HORA</th>
  				<th style="max-width:auto; font-weight: bold;">MOTIVO</th>
          </tr>
        </thead>
	';

  while ($user=mysqli_fetch_array($query)) {
    if($user['estatus']==1){  $color= '#f5f5f5'; $estatus = "ACTIVO"; }else{ $color= '#fbb2b2'; $estatus = "INACTIVO";}

echo $content .= '
  <tr bgcolor="'.$color.'">
    
    <td style="max-width:auto; font-weight: bold;">'.$user["cedula_paciente"].'</td>
    <td style="max-width:auto; font-weight: bold;">'.$user["nombres"].'</td>
    <td style="max-width:auto; font-weight: bold;">'.$user["fecha"].'</td>
    <td style="max-width:auto; font-weight: bold;">'.$user["hora"].'</td>
    <td style="max-width:auto; font-weight: bold;">'.$user["nota"].'</td>
      </tr>
';
}

$content .= '</table> </center>';


$pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastPage();
ob_end_clean();
$pdf->output('Reporte_de_Citas'.date("Y-m-d").'.pdf', 'I');
error_reporting(E_ALL);
 ?>
