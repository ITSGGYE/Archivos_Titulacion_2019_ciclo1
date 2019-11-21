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
    	$this->SetFont('Arial','B',12);
    	$this->Cell(190,10,utf8_decode('Minimarket - Tío Lucho'),0,0,'L');
    	$this->Ln(20);
    	$this->Cell(60);  // Movernos a la derecha
    	$this->Cell(70,10,'Reporte de Inventario',1,0,'C');
    	$this->Ln(20);// Salto de línea

    	$this->Cell(50,10,"Producto",1,0,'C',0);
		$this->Cell(30,10,"Marca",1,0,'C',0);
		$this->Cell(36,10,utf8_decode("Categoría"),1,0,'C',0);
		$this->Cell(36,10,"Proveedor",1,0,'C',0);
		$this->Cell(18,10,"Stock",1,0,'C',0);
		$this->Cell(25,10,"Costo",1,1,'C',0);
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

$productos  ="SELECT pd.prd_descripcion, pd.prd_marca, pd.prd_existencia, pd.prd_costcompra, pd.prd_cat_cod, pd.prd_prv_cod,
             cg.cat_nombre, pv.prv_nombre FROM productos pd 
             LEFT JOIN categorias cg ON cg.cat_codigo = pd.prd_cat_cod 
             LEFT JOIN proveedores pv ON pv.prv_codigo=pd.prd_prv_cod";
$datos= $conectando->query($productos);            

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while ($fila=$datos->fetch_assoc()) {
    $pdf->Cell(50,10, ucfirst($fila['prd_descripcion']),1,0,'C',0);
    $pdf->Cell(30,10, ucfirst($fila['prd_marca']),1,0,'C',0);
	$pdf->Cell(36,10, ucfirst($fila['cat_nombre']),1,0,'C',0);
	$pdf->Cell(36,10, ucfirst($fila['prv_nombre']),1,0,'C',0);
	$pdf->Cell(18,10, $fila['prd_existencia'],1,0,'C',0);
	$pdf->Cell(25,10, '$ '.$fila['prd_costcompra'],1,1,'C',0);	
}

$pdf->Output();
?>