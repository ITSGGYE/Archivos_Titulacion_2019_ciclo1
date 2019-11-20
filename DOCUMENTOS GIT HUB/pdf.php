<?php
if(!empty($_POST['submit']))
{
	$id_hist=$_POST['id_hist'];
	$paciente=$_POST['paciente'];
	$representante=$_POST['representante'];
	$especie=$_POST['especie'];
	$fecha=$_POST['fecha'];
	$hora=$_POST['hora'];
	$atendido=$_POST['atendido'];
	$registro=$_POST['registro'];
	$medicamento=$_POST['medicamento'];

	
require('fpdf17/fpdf.php');
$pdf=new FPDF();

$pdf->AddPage();
$pdf->SetFont("Arial","B",16);
$pdf->Cell(0,10,'welcome',1,1,'C');
$pdf->Cell(50,10,'nombre: ',1,0);
$pdf->Cell(50,10,$id_hist,1,1);
$pdf->Cell(50,10,'nombre: ',1,0);
$pdf->Cell(50,10,$paciente,1,1);
$pdf->Cell(50,10,'nombre: ',1,0);
$pdf->Cell(50,10,$representante,1,1);
$pdf->Cell(50,10,'nombre: ',1,0);
$pdf->Cell(50,10,$especie,1,1);
$pdf->Cell(50,10,'nombre: ',1,0);
$pdf->Cell(50,10,$fecha,1,1);
$pdf->Cell(50,10,'nombre: ',1,0);
$pdf->Cell(50,10,$hora,1,1);
$pdf->Cell(50,10,'nombre: ',1,0);
$pdf->Cell(50,10,$atendido,1,1);
$pdf->Cell(50,10,'nombre: ',1,0);
$pdf->Cell(50,10,$registro,1,1);
$pdf->Cell(50,10,'nombre: ',1,0);
$pdf->Cell(50,10,$medicamento,1,1);
$pdf->output();

}
?>