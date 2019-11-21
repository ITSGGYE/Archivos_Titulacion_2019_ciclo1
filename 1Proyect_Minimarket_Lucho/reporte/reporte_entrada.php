<?php
session_start();
error_reporting(0);
$versession= $_SESSION['usuario'];

if ($versession == null || $versession='') {
  echo '<script type="text/javascript"> alert("Usted no inició sesión/ No tienes permiso"); window.location="../index.php";  </script>';
  die();
}
?>

<?php
require('../librerias/pdf/fpdf.php');

class PDF extends FPDF{
// Cabecera de página
	function Header(){
    	$this->SetFont('Arial','B',15);
    	$this->Cell(190,10,utf8_decode('Minimarket - Tío Lucho'),0,0,'L');
    	$this->Ln(20);
    	$this->Cell(60);  // Movernos a la derecha
    	$this->Cell(90,10,'Reporte de Entradas de Productos',1,0,'C');
    	$this->Ln(20);// Salto de línea

    	$this->Cell(50,10,utf8_decode("Producto"),1,0,'C',0);
		$this->Cell(24,10,"Cantidad",1,0,'C',0);
		$this->Cell(34,10,"Precio Total",1,0,'C',0);
        $this->Cell(40,10,"Fecha Ingreso",1,0,'C',0);
		$this->Cell(46,10,"Fecha Caducidad",1,1,'C',0);
    }

// Pie de página
	function Footer(){
    	$this->SetY(-15);
    	// Arial italic 8
    	$this->SetFont('Arial','I',8);
    	// Número de página
    	$this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
}

require_once '../conexion/conexion.php';
$db_conex= new conectar_bd();
$conectando=$db_conex->conexion_bd();

$datos_entradas="SELECT sto.ing_prd_cod, sto.ing_stock, sto.ing_total, sto.ing_fcaptura, sto.ing_fcaducidad, pd.prd_descripcion 
          FROM ingreso_stock sto JOIN productos pd ON pd.prd_codigo=sto.ing_prd_cod";
$datos= $conectando->query($datos_entradas);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while ($fila=$datos->fetch_assoc()) {
    $pdf->Cell(50,10, ucfirst($fila['prd_descripcion']),1,0,'C',0);
    $pdf->Cell(24,10, $fila['ing_stock'],1,0,'C',0);
    $pdf->Cell(34,10, '$ '.$fila['ing_total'],1,0,'C',0);
    $pdf->Cell(40,10, $fila['ing_fcaptura'],1,0,'C',0);
    $pdf->Cell(46,10, $fila['ing_fcaducidad'],1,1,'C',0);
}
$pdf->Output();
?>