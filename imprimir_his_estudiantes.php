<?php
require('fpdf17/fpdf.php');

class PDF extends FPDF
{

// Cabecera de página
function Header()
{
    // Logo
      $this->Image('images/febresc3.jpg',240,16,20);


    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
   $this->Cell(30);
date_default_timezone_set('America/Guayaquil');
    $this->Cell(420, 5,'Guayaquil, '. date('d') . ' de '. date('F'). ' del '. date('Y'), 0,1,'C');



 $this->Cell(30);
    // Título
    $this->Cell(40,10,'Colegio Fiscal Tecnico Industrial Febres Cordero',0,0,'C');
    // Salto de línea
    $this->Ln(5);


    

    $this->Cell(51,10,utf8_decode('Dirección: Calle 29 y la J'),0,0,'C');
    // Salto de línea
    $this->Ln(5);



    $this->Cell(58,10,'Administrador de Biblioteca',0,0,'C');
    // Salto de línea
    $this->Ln();






$this->SetFont('Arial','BU',12);
    $this->SetTextColor(16,87,97);
    $this->Cell(0,10,'HISTORIAL DE REGISTRO DE ESTUDIANTES',0,0,'C');
    // Salto de línea
    $this->SetTextColor(0,0,0);
    $this->Ln(20);




$this->SetFont('Arial','B',12);



        $this->Cell(48,6,utf8_decode('Id Estudiante'),1,0,'C', 0);
        $this->Cell(50,6,utf8_decode('Primer nombre'),1,0,'C',0);
        $this->Cell(50,6,utf8_decode('Segundo nombre'),1,0,'C',0);
        $this->Cell(50,6,utf8_decode('Apellidos'),1,0,'C',0);
        $this->Cell(30,6,utf8_decode('Curso'),1,0,'C');
        $this->Cell(48,6,utf8_decode('Año y Sección'),1,0,'C',0);
  $this->Ln();




}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');





}
}



require 'connect.php';

//$mysqli = (new mysqli('localhost', 'root', '', 'db_ls');


$res = $conn->query("SELECT * FROM student");


$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while($row = $res->fetch_assoc())
    {
        $pdf->Cell(48,6,utf8_decode($row['student_no']),1,0,'C', 0);
        $pdf->Cell(50,6,utf8_decode($row['firstname']),1,0,'C',0);
        $pdf->Cell(50,6,utf8_decode($row['middlename']),1,0,'C',0);
        $pdf->Cell( 50,6,utf8_decode($row['lastname']),1,0,'C',0);
        $pdf->Cell(30,6,utf8_decode($row['course']),1,0,'C');
        $pdf->Cell(48,6,utf8_decode($row['section']),1,1,'C',0);
    }






$pdf->Output();
?>
