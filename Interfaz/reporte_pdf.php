
<?php
require('pdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
  // Logo
    $this->Image('../img/logo.jpeg',153,-4,50);
    // Arial bold 15
    $this->SetFont('Arial','B',16);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(215,60,'Reporte de Citas',0,0,'C');
    // Salto de línea
    $this->Ln(40);

$this->Cell(25,10,'#',1,0,'C',0);
$this->Cell(25,10,'Fecha',1,0,'C',0);
$this->Cell(23,10,'Hora',1,0,'C',0);
$this->Cell(70,10,'Paciente',1,0,'C',0);
$this->Cell(70,10,utf8_decode('Médico'),1,0,'C',0);
$this->Cell(25,10,'Estado',1,0,'C',0);
$this->Cell(96,10,utf8_decode('Observación'),1,1,'C',0);
}


// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',7);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}


// Tabla simple
function BasicTable($header, $data)
{
    // Cabecera
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Datos
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}

require '../basedato.php';
$consulta= "SELECT  * FROM citas ";
$resultado = $mysqli->query($consulta);

$pdf = new PDF('L','mm','legal',);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while ($row = $resultado-> fetch_assoc()) {
$pdf->Cell(25,10, $row['idcita'],1,0,'C',0);
$pdf->Cell(25,10, $row['citfecha'],1,0,'C',0);
$pdf->Cell(23,10, $row['cithora'],1,0,'C',0);
$pdf->Cell(70,10, utf8_decode($row['citPaciente']),1,0,'C',0);
$pdf->Cell(70,10, utf8_decode($row['citMedico']),1,0,'C',0);
$pdf->Cell(25,10, $row['citestado'],1,0,'C',0);
$pdf->MultiCell(96,10, utf8_decode($row['citobservaciones']),1,'L',0);
}
$pdf->Output();


