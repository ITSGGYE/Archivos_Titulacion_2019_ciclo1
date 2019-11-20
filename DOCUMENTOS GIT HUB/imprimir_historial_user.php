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


/*********** Create PDF ***********************/
    $pdf = new fpdf('P','mm','A4');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
/***************  Header ***************************/
    $header_uno  = $pdf->Text(10, 15, "Clinica Veterinaria- SUPER DOC");
    $header_uno .= $pdf->text(10, 20, "PORTETE Y LA 11");
    $header_uno .=  $pdf->text(10, 25, "Dr. Francisco Quingaluisa");
    
    $pdf->Cell(190, 20,$header_uno);
    $pdf->Ln();
    $pdf->Cell(190, 10,"");
    $pdf->Ln();
/*************** Cuerpo del documento **************/
    $beg_bod = "CONSTANCIA DE HISTORIAL VETERINARIO";
    $pdf->Cell(190, 30,$beg_bod,0, 0, 'C');
    $pdf->Ln();
    $pdf->Image("images/huella.png", 30, 60, 150, 130);    
/**************** Campo ID ****************/    
    $pdf->SetFont('Arial','B',14);
    $camp_ced = "Numero de Historia:";
    $camp_ced_value = $id_hist;
    $pdf->Cell(80, 12,$camp_ced,1);
    $pdf->SetFont("Times");
    $pdf->Cell(110, 12,$camp_ced_value,1);
    $pdf->Ln();
/**************** Campo Paciente ****************/          
    $pdf->SetFont('Arial','B',14);
    $camp_nomprf = "Nombre del Paciente:";
    $camp_nomprf_value = $paciente;
    $pdf->Cell(80, 12,$camp_nomprf,1);
    $pdf->SetFont("Times");
    $pdf->Cell(110, 12,$camp_nomprf_value,1);
    $pdf->Ln();
/**************** Campo Representante o Dueño ****************/    
    $pdf->SetFont('Arial','B',14);
    $camp_ced = "Nombre del Representante:";
    $camp_ced_value = $representante;
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
    $camp_ced = "Fecha:";
    $camp_ced_value = $fecha;
    $pdf->Cell(80, 12,$camp_ced,1);
    $pdf->SetFont("Times");
    $pdf->Cell(110, 12,$camp_ced_value,1);
    $pdf->Ln();
/**************** Campo Hora ****************/            
    $pdf->SetFont('Arial','B',14);
    $camp_nomprf = "Hora:";
    $camp_nomprf_value = $hora;
    $pdf->Cell(80, 12,$camp_nomprf,1);
    $pdf->SetFont("Times");
    $pdf->Cell(110, 12,$camp_nomprf_value,1);
    $pdf->Ln();
/**************** Campo tención ****************/    
    $pdf->SetFont('Arial','B',14);
    $camp_ced = "Atendido por:";
    $camp_ced_value = $atendido;
    $pdf->Cell(80, 12,$camp_ced,1);
    $pdf->SetFont("Times");
    $pdf->Cell(110, 12,$camp_ced_value,1);
    $pdf->Ln();
/**************** Campo Registro ****************/            
    $pdf->SetFont('Arial','B',12);
    $camp_nomprf = "Registro de Historia:";
    $camp_nomprf_value = $registro;
    $pdf->Cell(80, 12,$camp_nomprf,1);
    $pdf->SetFont("Times");
    $pdf->Multicell(110, 12,$camp_nomprf_value,1);
/**************** Campo Medicamento ****************/    
    $pdf->SetFont('Arial','B',12);
    $camp_ced = "Medicamentos:";
    $camp_ced_value = $medicamento;
    $pdf->Cell(80, 12,$camp_ced,1);
    $pdf->SetFont("Times");
    $pdf->Multicell(110,12,$camp_ced_value,1);
    $pdf->Ln();

/************* Footer ************************/ 
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190, 40,"Constancia que entrega el ___ del mes de __________  del  20___",0,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190, 20,"La Directiva",0,0, 'C');
    
    $pdf->Output();
    
    }
    
    ?>