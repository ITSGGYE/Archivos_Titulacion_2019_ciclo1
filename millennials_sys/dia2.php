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
$objPHPExcel->getProperties()->setCreator("Millennials")
                             ->setLastModifiedBy("Millennials")
                             ->setTitle("Reporte de facturas de Millennials")
                             ->setSubject("Office 2010 XLSX Documento de prueba")
                             ->setDescription("Documento de prueba para Office 2010 XLSX, generado usando clases de PHP.")
                             ->setKeywords("office 2010 openxml php")
                             ->setCategory("Archivo con resultado de prueba");



// Combino las celdas desde A1 hasta E1
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:E1');

$objPHPExcel->setActiveSheetIndex(0)
   ->setCellValue('A1', 'Datos de cliente de Millennials')
            ->setCellValue('A2', 'Factura')
            ->setCellValue('B2', 'Nombre')
            ->setCellValue('C2', 'Apellido')
          
            ->setCellValue('D2', 'Costo')
            ->setCellValue('E2', 'Estilista')
            ->setCellValue('F2', 'Fecha')
            ->setCellValue('G2', 'Hora')
            ->setCellValue('H2', 'Servicio')
            ->setCellValue('I2', 'Sucursal')
            ->setCellValue('J2', 'Total');
            
// Fuente de la primera fila en negrita
$boldArray = array('font' => array('bold' => true,),'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));

$objPHPExcel->getActiveSheet()->getStyle('A1:J2')->applyFromArray($boldArray);      

    
            
//Ancho de las columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(8);   
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);  
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);  
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);  
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);          
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);  
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);  
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);  
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);  
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(15);       

/*Extraer datos de MYSQL*/
    # conectare la base de datos
        /* Connect To Database*/
    require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
    require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
      session_start();
      $az=$_SESSION['Sucur_Id'];
  $va= $_POST['vara'];   
    $sql="SELECT f.Fac_Id, c.Cli_Nombre,c.Cli_Correo,  c.Cli_Apellido, c.Cli_Numero, c.Cli_Edad,s.Servi_Nombre  
,m.Mar_Nombre,d.Det_Costo, d.Esti_Id, a.Sucur_Nombre,Fac_Fecha,Fac_Hora,Fac_Total

FROM factura f 
INNER JOIN clientes c ON f.Cli_Id = c.Cli_Id
INNER JOIN detfactura d ON f.Det_Numero = d.Det_Numero
INNER JOIN servicios s ON s.Servi_Id = d.Servi_Id
INNER JOIN marketing m ON m.Mar_Id = c.Mar_Id
INNER JOIN sucursales a ON f.Sucur_Id = a.Sucur_Id
WHERE f.Sucur_Id =  '$az' and Fac_Fecha =  '$va'
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
            // Agregar datos
            $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue($a, $id)
            ->setCellValue($b, $nombre)
            ->setCellValue($c, $apellido)
            ->setCellValue($d, $costo)
            ->setCellValue($e, $numero)
            ->setCellValue($f, $fecha)
            ->setCellValue($g, $hora)
            ->setCellValue($h, $servicio)
            ->setCellValue($i, $sucur)
               ->setCellValue($j, $total)   ;
            
    $cel+=1;
    }

/*Fin extracion de datos MYSQL*/
$rango="A2:$j";
$styleArray = array('font' => array( 'name' => 'Arial','size' => 10),
'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);
// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('reporte_millennials');


// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);


// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="reporte_millenials.xls"');
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
