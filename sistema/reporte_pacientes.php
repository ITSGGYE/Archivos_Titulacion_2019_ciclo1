<?php
session_start();

include "../conexion.php";
$query = mysqli_query($conection,"SELECT * FROM personas
   WHERE type_persona = 3 AND personas.estatus=1 ORDER BY id ASC");
ob_clean();
ob_start();
  require_once('./includes/tcpdf/tcpdf.php');
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ebenedent System');
$pdf->SetTitle("LISTA DE PACIENTES");
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
            	<h1 style="text-align:center;">LISTA DE PACIENTES <br> '.date("Y-m-d").'</h1>
              <center>
      <table border="1" cellpadding="5" align="center" style="width:100%;">
        <thead>
          <tr>
          
  				<th style="max-width:auto; font-weight: bold;">CEDULA</th>
  				<th style="max-width:auto; font-weight: bold;">NOMBRES</th>
  				<th style="max-width:auto; font-weight: bold;">TELEFONO</th>
  				<th style="max-width:auto; font-weight: bold;">DIRECCION</th>
  				<th style="max-width:auto; font-weight: bold;">FECHA_N</th>
          
          </tr>
        </thead>
	';

  while ($user=mysqli_fetch_array($query)) {
    if($user['estatus']==1){  $color= '#f5f5f5'; $estatus = "ACTIVO"; }else{ $color= '#fbb2b2'; $estatus = "INACTIVO";}

echo $content .= '
  <tr bgcolor="'.$color.'">
   
    <td style="max-width:auto; font-weight: bold;">'.$user["cedula"].'</td>
    <td style="max-width:auto; font-weight: bold;">'.$user["nombres"].'</td>
    <td style="max-width:auto; font-weight: bold;">'.$user["telefono"].'</td>
    <td style="max-width:auto; font-weight: bold;">'.$user["direccion"].'</td>
    <td style="max-width:auto; font-weight: bold;">'.$user["fecha_nacimiento"].'</td>
    
      </tr>
';
}

$content .= '</table> </center>';


$pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastPage();
ob_end_clean();
$pdf->output('Reporte_de_Pacientes_'.date("Y-m-d").'.pdf', 'I');
 ?>
