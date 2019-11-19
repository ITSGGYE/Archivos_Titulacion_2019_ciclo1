<?php
  $vas= $_POST['vara'];
  $fecha=date("Y-m-d"); 
if ($vas<=$fecha) {
 
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    1.8.0, 2014-03-02
 */



if (PHP_SAPI == 'cli')
    die('Este ejemplo sólo se puede ejecutar desde un navegador Web');

/** Incluye PHPExcel */
require_once dirname(__FILE__) . '/lib/PHPExcel/PHPExcel.php';
// Crear nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Propiedades del documento
$objPHPExcel->getProperties()->setCreator("Millennials") //Autor
                             ->setLastModifiedBy("Millennials") //Ultimo usuario que lo modific贸
                             ->setTitle("Reporte de facturas de Millennials")
                             ->setSubject("Reporte Excel")
                             ->setDescription("Reporte de facturas")
                             ->setKeywords("reporte facturas datos")
                             ->setCategory("Reporte excel");

      $tituloReporte = "Datos de cliente de Millennials";
        $titulosColumnas = array('FACTURA', 'NOMBRE', 'APELLIDO', 'ESTILISTA', 'NUMERO', 'EDAD', 'COMO LLEGO', 'FECHA', 'TOTAL', 'SERVICIO', 'COSTO');
        
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:N1');

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Datos de cliente de Millennials')
            ->setCellValue('A2', 'Factura')
            ->setCellValue('B2', 'Nombre')
            ->setCellValue('C2', 'Apellido')
            ->setCellValue('D2', 'Edad')
            ->setCellValue('E2', 'Numero')
            ->setCellValue('F2', 'Correo')
            ->setCellValue('G2', 'Como Llego')
            ->setCellValue('H2', 'Costo')
            ->setCellValue('I2', 'Estilista')
            ->setCellValue('J2', 'Fecha')
            ->setCellValue('K2', 'Hora')
            ->setCellValue('L2', 'Servicio')
            ->setCellValue('M2', 'Sucursal')
            ->setCellValue('N2', 'Total');
 
$boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()->getStyle('A1:N2')->applyFromArray($boldArray);      

    
            
//Ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);   
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);  
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);  
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);  
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);          
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);  
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);  
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);  
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);  
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(15);  
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15); 
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(15); 
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15); 
/*Extraer datos de MYSQL*/
    # conectare la base de datos
        include("config/db.php");
include("config/conexion.php");
$va= $_POST['vara'];
    $sql="SELECT f.Fac_Id, c.Cli_Nombre,c.Cli_Correo,  c.Cli_Apellido, c.Cli_Numero, c.Cli_Edad,s.Servi_Nombre  
,m.Mar_Nombre,d.Det_Costo, d.Esti_Id, a.Sucur_Nombre,Fac_Fecha,Fac_Hora,Fac_Total

FROM factura f 
INNER JOIN clientes c ON f.Cli_Id = c.Cli_Id
INNER JOIN detfactura d ON f.Det_Numero = d.Det_Numero
INNER JOIN servicios s ON s.Servi_Id = d.Servi_Id
INNER JOIN marketing m ON m.Mar_Id = c.Mar_Id
INNER JOIN sucursales a ON f.Sucur_Id = a.Sucur_Id
WHERE Fac_Fecha =  '$va'
ORDER BY Fac_Fecha desc , c.Cli_Apellido ASC";
    $query=mysqli_query($con,$sql);
    $cel=3;//Numero de fila donde empezara a crear  el reporte
    while ($row=mysqli_fetch_array($query)){
        $id=$row['Fac_Id'];
        $apellido=$row['Cli_Apellido'];
        $nombre=$row['Cli_Nombre'];
        $edad=$row['Cli_Edad'];
        $numero=$row['Cli_Numero'];
        $servicio=$row['Servi_Nombre'];
        $marketing=$row['Mar_Nombre'];
        $costo=$row['Det_Costo'];
       $correo=$row['Cli_Correo'];
        $hora=$row['Fac_Hora'];
        $fecha=$row['Fac_Fecha'];
          $total=$row['Fac_Total'];
                $sucur=$row['Sucur_Nombre'];
 $Esti_Id=$row['Esti_Id'];


 

$query_categoria=mysqli_query($con,"SELECT * FROM estilistas where Esti_Id=$Esti_Id");
                            while($rw=mysqli_fetch_array($query_categoria)) {
                    
 
  $estilista=$rw['Esti_Nombre'];  





            $a="A".$cel;
            $b="B".$cel;
            $c="C".$cel;
            $d="D".$cel;
            $e="E".$cel;
            $f="F".$cel;
            $g="G".$cel;
            $h="H".$cel;
            $i="I".$cel;
            $j="J".$cel;
            $k="K".$cel;
             $l="L".$cel;
              $m="M".$cel;
               $n="N".$cel;
            // Agregar datos
            $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue($a, $id)
            ->setCellValue($b, $nombre)
            ->setCellValue($c, $apellido)
            ->setCellValue($d, $edad)
            ->setCellValue($e, $numero)
            ->setCellValue($f, $correo)
            ->setCellValue($g, $marketing)
            ->setCellValue($h, $costo)
            ->setCellValue($i, $estilista)
            ->setCellValue($j, $fecha)
            ->setCellValue($k, $hora)
            ->setCellValue($l, $servicio)
            ->setCellValue($m, $sucur)
            ->setCellValue($n, $total);
    $cel+=1;
    }}     

/*Fin extracion de datos MYSQL*/
$rango="A2:$n";
$styleArray = array('font' => array( 'name' => 'Arial','size' => 12),
'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);
// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('reporte_millennials');

// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);


// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="reporte_millennials.xls"');
header('Cache-Control: max-age=0');
// Si usted está sirviendo a IE 9 , a continuación, puede ser necesaria la siguiente
header('Cache-Control: max-age=1');

// Si usted está sirviendo a IE a través de SSL , a continuación, puede ser necesaria la siguiente
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;


}else {
$mensaje = "Esta fecha no esta disponible en el reporte";
echo "<script>";
echo "alert('$mensaje');";  
echo "window.location = 'reportes.php';";
echo "</script>"; 
}

 ?>
 
