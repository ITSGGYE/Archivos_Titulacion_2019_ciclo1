<?php
if(!empty($_POST['submit']))
{
    $id_paciente=$_POST['id_paciente'];
    $nombrerep=$_POST['nombrerep'];
    $nombrepac=$_POST['nombrepac'];
    $fechanac=$_POST['fechanac'];
    $especie=$_POST['especie'];
    $sexo=$_POST['sexo'];
    $raza=$_POST['raza'];
    $peso=$_POST['peso'];
    
require('fpdf17/fpdf.php');


/*********** Create PDF ***********************/
    $pdf = new fpdf('P','mm','A4');
	$pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
/***************  Header ***************************/
    $header_uno  = $pdf->Text(10, 15, "Super DOC");
    $header_uno .= $pdf->text(10, 20, "El Litre 2116 La Serena");
    $header_uno .=  $pdf->text(10, 25, "Dr. Francisco Quingaluisa");
	
	$pdf->Cell(190, 20,$header_uno);
	$pdf->Ln();
    $pdf->Cell(190, 10,"");
    $pdf->Ln();
/*************** Cuerpo del documento **************/
    $beg_bod = "FICHA DE LA MASCOTA";
    $pdf->Cell(190, 30,$beg_bod,0, 0, 'C');
    $pdf->Ln();
	$pdf->Image("images/huella.png", 30, 60, 150, 130);    
/**************** Campo ID ****************/	
    $pdf->SetFont('Arial','B',14);
	$camp_ced = "Numero de Id:";
	$camp_ced_value = $id_paciente;
	$pdf->Cell(80, 12,$camp_ced,1);
	$pdf->SetFont("Times");
	$pdf->Cell(110, 12,$camp_ced_value,1);
	$pdf->Ln();
/**************** Campo ID ****************/    
    $pdf->SetFont('Arial','B',14);
    $camp_ced = "Nombre del Dueno:";
    $camp_ced_value = $nombrerep;
    $pdf->Cell(80, 12,$camp_ced,1);
    $pdf->SetFont("Times");
    $pdf->Cell(110, 12,$camp_ced_value,1);
    $pdf->Ln();    
/**************** Campo Paciente ****************/			
    $pdf->SetFont('Arial','B',14);
	$camp_nomprf = "Nombre del Paciente:";
    $camp_nomprf_value = $nombrepac;
    $pdf->Cell(80, 12,$camp_nomprf,1);
    $pdf->SetFont("Times");
	$pdf->Cell(110, 12,$camp_nomprf_value,1);
	$pdf->Ln();
/**************** Campo Representante o Dueño ****************/    
    $pdf->SetFont('Arial','B',14);
    $camp_ced = "Fecha de Nacimiento:";
    $camp_ced_value = $fechanac;
    $pdf->Cell(80, 12,$camp_ced,1);
    $pdf->SetFont("Times");
    $pdf->Cell(110, 12,$camp_ced_value,1);
    $pdf->Ln();
/**************** Campo Especie ****************/            
    $pdf->SetFont('Arial','B',14);
    $camp_nomprf = "Especie:";
    $camp_nomprf_value = $especie;
    $pdf->Cell(80, 12,$camp_nomprf,1);
    $pdf->SetFont("Times");
    $pdf->Cell(110, 12,$camp_nomprf_value,1);
    $pdf->Ln();
/**************** Campo Fecha ****************/    
    $pdf->SetFont('Arial','B',14);
    $camp_ced = "Sexo:";
    $camp_ced_value = $sexo;
    $pdf->Cell(80, 12,$camp_ced,1);
    $pdf->SetFont("Times");
    $pdf->Cell(110, 12,$camp_ced_value,1);
    $pdf->Ln();
/**************** Campo Hora ****************/            
    $pdf->SetFont('Arial','B',14);
    $camp_nomprf = "Raza:";
    $camp_nomprf_value = $raza;
    $pdf->Cell(80, 12,$camp_nomprf,1);
    $pdf->SetFont("Times");
    $pdf->Cell(110, 12,$camp_nomprf_value,1);
    $pdf->Ln();
/**************** Campo tención ****************/    
    $pdf->SetFont('Arial','B',14);
    $camp_ced = "Peso:";
    $camp_ced_value = $peso;
    $pdf->Cell(80, 12,$camp_ced,1);
    $pdf->SetFont("Times");
    $pdf->Cell(110, 12,$camp_ced_value,1);
    $pdf->Ln();

/************* Footer ************************/	
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190, 60,"Constancia que entrega el ___ del mes de __________  del  20___",0,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190, 30,"La Directiva",0,0, 'C');
    
    $pdf->Output();
	
	}
	
	?>