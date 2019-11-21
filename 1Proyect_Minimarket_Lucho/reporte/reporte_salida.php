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
    	$this->Cell(90,10,'Reporte de Salidas de Productos',1,0,'C');
    	$this->Ln(20);// Salto de línea

    	$this->Cell(50,10,utf8_decode("Producto"),1,0,'C',0);
		$this->Cell(40,10,"Cant. Vendidas",1,0,'C',0);
		$this->Cell(36,10,"Precio Total",1,0,'C',0);
        $this->Cell(44,10,"Fecha de Venta",1,1,'C',0);
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

$datos_ventas="SELECT vt.vta_prd_cod, vt.vta_cantidad, vt.vta_total, vt.vta_fcapt, pd.prd_descripcion 
    FROM ventas vt LEFT JOIN productos pd ON pd.prd_codigo = vt.vta_prd_cod";
$resp_producto= $conectando->query($datos_ventas);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while ($fila=$resp_producto->fetch_assoc()) { 
    $pdf->Cell(50,10, ucfirst($fila['prd_descripcion']),1,0,'C',0);
    $pdf->Cell(40,10, $fila['vta_cantidad'],1,0,'C',0);
    $pdf->Cell(36,10, '$ '.$fila['vta_total'],1,0,'C',0);
    $pdf->Cell(44,10, $fila['vta_fcapt'],1,1,'C',0);
}

$pdf->Output();
?>