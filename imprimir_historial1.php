<?php
require('fpdf17/fpdf.php');
//exit();

class PDF extends FPDF
{

// Cabecera de página
function Header()
{
    // Logo
    ob_clean();
    ob_start();
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
    $this->Cell(0,10,'LIBROS PRESTADOS',0,0,'C');
    // Salto de línea
    $this->SetTextColor(0,0,0);
    $this->Ln(20);





$this->SetFont('Arial','B',12);

  $this->Cell(28,8,utf8_decode('Id'),1,0,'C', 0);
        $this->Cell(50,8,utf8_decode('Nombres'),1,0,'C',0);
        $this->Cell(18,8,utf8_decode('Curso'),1,0,'C',0);
        $this->Cell(125,8,utf8_decode('Nombre del Libro'),1,0,'C',0);
        $this->Cell(28,8,utf8_decode('F_Salida'),1,0,'C',0);
        $this->Cell(28,8,utf8_decode('F_Entrega'),1,0,'C',0);
       
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

//$mysqli = new mysqli('localhost', 'root', '', 'db_ls');


$res = $conn->query("SELECT * FROM borrowing,student,book WHERE borrowing.student_no = student.student_no AND borrowing.status = 'Borrowed' AND book.book_id = borrowing.`book_id`;");



$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);


while($row = $res->fetch_assoc())
    {
        $pdf->Cell(28,7,utf8_decode($row['student_no']),1,0,'C', 0);
        $pdf->Cell(50,7,utf8_decode($row['firstname'])." ".$row['middlename'],1,0,'C',0);
        $pdf->Cell(18,7,utf8_decode($row['course']),1,0,'C',0);
        $pdf->Cell(125,7,utf8_decode($row['book_title']),1,0,'C',0);
        $pdf->Cell(28,7,utf8_decode($row['date_departure']),1,0,'C');
        $pdf->Cell(28,7,utf8_decode($row['date_delivery']),1,1,'C');
        
        //$pdf->Cell(30,6,($row['section']),1,1,'C',0);




    }



 ob_end_clean();
$pdf->Output();
?>
