<?php
session_start();
if($_SESSION['rol'] != 1)
{
  header("location: ./");
}
include "../conexion.php";
$query = mysqli_query($conection,"SELECT nombres,cedula,user,nombre_rol,usuarios.id,usuarios.estatus FROM personas,usuarios,roles WHERE usuarios.rol = roles.type_rol AND usuarios.cedula_usuario = personas.cedula AND usuarios.estatus=1");
ob_clean();
ob_start();
require_once('./includes/tcpdf/tcpdf.php');
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ebenedent System');
$pdf->SetTitle("LISTA DE USUARIOS");
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
            	<h1 style="text-align:center;">LISTA DE USUARIOS<br> '.date("Y-m-d").'</h1>

      <table border="1" cellpadding="5" align="center" style="max-width:auto;">
        <thead>
          <tr>
          
          <th style="max-width:auto; font-weight: bold;">CEDULA</th>
          <th style="max-width:auto; font-weight: bold;">NOMBRES</th>
          <th style="max-width:auto; font-weight: bold;">USUARIO</th>
          <th style="max-width:auto; font-weight: bold;">ROL</th>
          
          </tr>
        </thead>
	';

  while ($user=mysqli_fetch_array($query)) {
    if($user['estatus']==1){  $color= '#f5f5f5'; $estatus = "ACTIVO"; }else{ $color= '#fbb2b2'; $estatus = "INACTIVO";}

echo $content .= '
  <tr bgcolor="'.$color.'">
    
    <td style="max-width:auto; font-weight: bold;">'.$user["cedula"].'</td>
    <td style="max-width:auto; font-weight: bold;">'.$user["nombres"].'</td>
    <td style="max-width:auto; font-weight: bold;">'.$user["user"].'</td>
    <td style="max-width:auto; font-weight: bold;">'.$user['nombre_rol'].'</td>
    
      </tr>
';
}

$content .= '</table>';


$pdf->writeHTML($content, true, 0, true, 0);
$pdf->lastPage();
ob_end_clean();
$pdf->output('Reporte_de_Usuarios_'.date("Y-m-d").'.pdf', 'I');
 ?>
