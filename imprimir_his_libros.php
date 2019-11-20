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
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
   $this->Cell(30);
date_default_timezone_set('America/Guayaquil');
    $this->Cell(420, 5,'Guayaquil, '. date('d') . ' de '. date('F'). ' del '. date('Y'), 0,1,'C');



 $this->Cell(30);
    // Título
    $this->Cell(27,10,'Colegio Fiscal Tecnico Industrial Febres Cordero',0,0,'C');
    // Salto de línea
    $this->Ln(5);


    

    $this->Cell(47,10,utf8_decode('Dirección: Calle 29 y la J'),0,0,'C');
    // Salto de línea
    $this->Ln(5);



    $this->Cell(51,10,'Administrador de Biblioteca',0,0,'C');
    // Salto de línea
    $this->Ln();






$this->SetFont('Arial','BU',12);
    $this->SetTextColor(16,87,97);
    $this->Cell(0,10,'INVENTARIO DE LIBROS',0,0,'C');
    // Salto de línea
    $this->SetTextColor(0,0,0);
    $this->Ln(15);




$this->SetFont('Arial','B',10);

  $this->SetFillColor(55, 89, 78);
$this->SetDrawColor(0,0,255);
$this->SetTextColor(3, 3, 3);



        $this->Cell(20,6,utf8_decode('Código'),1,0,'C', 0,'true');
        $this->Cell(95,6,utf8_decode('Titulo del libro'),1,0,'C',0,'true');
        $this->Cell(55,6,utf8_decode('Categoria'),1,0,'C',0,'true');
        $this->Cell(55,6,utf8_decode('Autor'),1,0,'C',0,'true');
        $this->Cell(30,6,utf8_decode('Publicación'),1,0,'C',0,'true');
        $this->Cell(20,6,utf8_decode('Disp..'),1,0,'C',0,'true');

$this->SetFillColor(0,0,0);
$this->SetDrawColor(0,0,0);
$this->SetTextColor(0,0,0);


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


$res = $conn->query("SELECT * FROM book");


$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',7);





$siape= 'utf8_encode';

while($row = $res->fetch_assoc())
   {
        



        $pdf->Cell(20,6,utf8_decode($row['book_codigo']),1,0,'C', 0);

        $pdf->Cell(95,6,utf8_decode($row['book_title']),1,0,'C',0);

        $pdf->Cell( 55,6,utf8_decode($row['book_category']),1,0,'C',0);
        $pdf->Cell(55,6,utf8_decode($row['book_author']),1,0,'C');
        $pdf->Cell(30,6,utf8_decode($row['date_publish']),1,0,'C',0);
        $pdf->Cell(20,6,utf8_decode($row['qty']),1,1,'C',0);
         









    }



$pdf->Output();
?>
