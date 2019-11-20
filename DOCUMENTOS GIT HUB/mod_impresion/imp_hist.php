<?php

?>
<?php
require_once("classpdf/fpdf.php");

/*********** Create PDF ***********************/
    $pdf = new fpdf('P','mm','A4');
	$pdf->AddPage();
    $pdf->SetFont('Arial','B',14);
/***************  Header ***************************/
    $header_uno  = $pdf->Text(10, 15, "Sistema de Veterinaria");
	$header_uno .= $pdf->text(10, 20, "Direccion de la clinica aqui");
	$header_uno .= 	$pdf->text(10, 25, "J.H.O.M");
	
	$pdf->Cell(190, 20,$header_uno);
	$pdf->Ln();
    $pdf->Cell(190, 10,"");
    $pdf->Ln();
/*************** Cuerpo del documento **************/
    $beg_bod = "Constancia del Historial";
    $pdf->Cell(190, 10,$beg_bod,0, 0, 'C');
    $pdf->Ln();
	$pdf->Image("../theme/images/logo-sist-380.jpg", 30, 60, 150, 130);    
/**************** Campo cedula ****************/	
    $pdf->SetFont('Arial','B',10);
	$camp_ced = "Numero de Historia:";
	$camp_ced_value = $_POST["cedula"];
	$pdf->Cell(50, 8,$camp_ced,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_ced_value,1);
	$pdf->Ln();
/**************** Campo nombre ****************/
    $pdf->SetFont('Arial','B',10);		
	$camp_nombre = "Nombre:";
    $camp_nombre_value = $_POST["nombre"];
	$pdf->Cell(50, 8,$camp_nombre,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_nombre_value,1);
	$pdf->Ln();
/**************** Campo Apllido ****************/	
	$pdf->SetFont('Arial','B',10);	
	$camp_apellido = "Apellidos:";        
	$camp_apellido_value = $_POST["apellido"];
	$pdf->Cell(50, 8,$camp_apellido,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_apellido_value,1);
	$pdf->Ln();
/**************** Campo Edad ****************/	
	$pdf->SetFont('Arial','B',10);	
	$camp_edad = "Edad:";
	$camp_edad_value = $_POST["edad"];
    $pdf->Cell(50, 8,$camp_edad,1);
    $pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_edad_value,1);
	$pdf->Ln();
/**************** Campo fecha de nacimiento ****************/	
    $pdf->SetFont('Arial','B',10);		
	$camp_fechan = "Fecha de nacimiento:";
	$camp_fechan_value = $_POST["fech_nac"];
    $pdf->Cell(50, 8,$camp_fechan,1);
    $pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_fechan_value,1);
	$pdf->Ln();
/**************** Campo Sexo ****************/	
    $pdf->SetFont('Arial','B',10);	
    $camp_sexo = "Sexo:";
    $camp_sexo_value = $_POST["sexo"];
    $pdf->Cell(50, 8,$camp_sexo,1);
    $pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_sexo_value,1);
	$pdf->Ln();
/**************** Campo Nombre del representante ****************/		
    $pdf->SetFont('Arial','B',10);
	$camp_nombrerep = "Nombre del Representante:";
    $camp_nombrerep_value = $_POST["nomrep"];
    $pdf->Cell(50, 8,$camp_nombrerep,1);
    $pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_nombrerep_value,1);
	$pdf->Ln();
/**************** Campo Nombre del profesional ****************/			
    $pdf->SetFont('Arial','B',10);
	$camp_nomprf = "Nombre del Profesional:";
    $camp_nomprf_value = $_POST["nomprf"];
    $pdf->Cell(50, 8,$camp_nomprf,1);
    $pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_nomprf_value,1);
	$pdf->Ln();
/**************** Campo Habitos ****************/		
    $pdf->SetFont('Arial','B',10);
	$camp_habitos = "Habitos:";
    $camp_habitos_value = $_POST["hab"];
    $pdf->Cell(50, 8,$camp_habitos,1);
    $pdf->SetFont("Times");
    $pdf->MultiCell(140, 8,$camp_habitos_value,1);
    $pdf->Ln();
/**************** Campo Observacion ****************/		
    $pdf->SetFont('Arial','B',10);
	$camp_observa = "Observación:";
    $camp_observa_value = $_POST["observa"];
    $pdf->Cell(50, 8,$camp_observa,1);
    $pdf->SetFont("Times");
    $pdf->MultiCell(140, 8,$camp_observa_value,1);
    $pdf->Ln();
/**************** Campo Diagnostico ****************/    
    $pdf->SetFont('Arial','B',10);
	$camp_diagnostico = "Diagnostico:";
    $camp_diagnostico_value = $_POST["diagnostico"];
    $pdf->Cell(50, 8,$camp_diagnostico,1);
    $pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_diagnostico_value,1);
	$pdf->Ln();
/**************** Campo Tratamiento ****************/ 	
    $pdf->SetFont('Arial','B',10);
	$camp_tratamiento = "Tratamiento:";
    $camp_tratamiento_value = $_POST["tratamiento"];
    $pdf->Cell(50, 8,$camp_tratamiento,1);
    $pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_tratamiento_value,1);
	$pdf->Ln();
/**************** Campo Receta ****************/ 		
    $pdf->SetFont('Arial','B',10);
	$camp_receta = "Receta:";
    $camp_receta_value = $_POST["receta"];
    $pdf->Cell(50, 8,$camp_receta,1);
    $pdf->SetFont("Times");
	$pdf->MultiCell(140, 8,$camp_receta_value,1);
	$pdf->Ln();
	/**************** Campo fecha Gen. Expediente ****************/	
    $pdf->SetFont('Arial','B',10);		
	$camp_fec_gen_hist = "Fecha Gen. Historial:";
	$camp_fec_gen_hist_value = $_POST["fec_gen_hist"];
    $pdf->Cell(50, 8,$camp_fec_gen_hist,1);
    $pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_fec_gen_hist_value,1);
	$pdf->Ln();
/**************** Campo Estatus del expediente *********/ 
	$pdf->SetFont('Arial','B',10);
	$camp_est = "Estatus de Expediente:";
	$camp_est_value = $_POST["est"];
	$pdf->Cell(50, 8,$camp_est,1);
	$pdf->SetFont("Times");
	$pdf->Cell(140, 8,$camp_est_value,1);
	$pdf->Ln();
/************* Footer ************************/	
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190, 20,"Constancia que se expide a los ___ dias del mes de ______  del  20___",0,0,'C');
    $pdf->Ln();
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190, 30,"La Directiva",0,0, 'C');
    
    $pdf->Output();
	
	
	
	?>