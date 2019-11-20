<?php
session_start();
$cedula =  $_GET['cedula'];
 ?>

 <?php
 session_start();
 
 if($_SESSION['rol'] != 1 and $_SESSION['rol'] != 2)
 
 {
   header("location: ./");
 }
 include "../conexion.php";
 $query = mysqli_query($conection,"SELECT nombres FROM personas
    WHERE cedula = '$cedula'");
    $result = mysqli_fetch_array($query);
    $query = mysqli_query($conection,"SELECT nombres,cedula,motivo,historias_clinicas.id,descripcion,prescripcion,fecha,precio FROM historias_clinicas,personas
       WHERE cedula_paciente = $cedula AND cedula = cedula_paciente ORDER BY fecha ASC
      ");
ob_clean();
ob_start();
   require_once('./includes/tcpdf/tcpdf.php');
 $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);


 $pdf->SetCreator(PDF_CREATOR);
 $pdf->SetAuthor('Ebenedent System');
 $pdf->SetTitle("REPORTE DEL HISTORIAL CLINICO");

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
             	<h2 style="text-align:center;">Reporte del historial clínico de '."<br>".$result["nombres"].'</h2>
               <center>
       <table border="1" cellpadding="5" align="center" style="width:100%;">
         <thead>
           <tr>
           
   				<th style="max-width:auto; font-weight: bold;">MOTIVO</th>
   				<th style="max-width:auto; font-weight: bold;">DESCRIPCION</th>
   				<th style="max-width:auto; font-weight: bold;">PRESCRIPCION</th>
   				<th style="max-width:auto; font-weight: bold;">FECHA</th>
           <th style="max-width:auto; font-weight: bold;">PRECIO</th>
           </tr>
         </thead>
 	';



   while ($user=mysqli_fetch_array($query)) {
     if($user['estatus']==1){  $color= '#f5f5f5'; $estatus = "ACTIVO"; }else{ $color= '#f5f5f5'; $estatus = "INACTIVO";}

 echo $content .= '
   <tr bgcolor="'.$color.'">
    
     <td style="max-width:auto; font-weight: bold;">'.$user["motivo"].'</td>
     <td style="max-width:auto; font-weight: bold;">'.$user["descripcion"].'</td>
     <td style="max-width:auto; font-weight: bold;">'.$user["prescripcion"].'</td>
     <td style="max-width:auto; font-weight: bold;">'.$user["fecha"].'</td>
     <td style="max-width:auto; font-weight: bold;">'.$user["precio"].'</td>

       </tr>

 ';


 }

 $content .= '</table> </center>';


 $pdf->writeHTML($content, true, 0, true, 0);
 $pdf->lastPage();
 ob_end_clean();
 $pdf->output('Reporte_de_Usuarios.pdf', 'I');
?>

