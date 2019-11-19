           <?php
 error_reporting(0);
	session_start();

	if (!isset($_SESSION['active']) AND $_SESSION['active'] != true) {
        include("../loguot.php"); 
		exit;
        }        
$user_id=$_SESSION['idUser'];


 date_default_timezone_set('America/Guayaquil'); 
 
	$active_productos="";
	$active_clientes="";
	$active_usuarios="";	
	$title="Facturas | Millennials Sistema";
?><?php
 
	include("../config/db.php");
	include("../config/conexion.php");
	//Archivo de funciones PHP
	include("../funciones.php");

 
		
	//Variables por GET
	$id_cliente=intval($_GET['id_cliente']);
	$id_vendedor=intval($_GET['id_vendedor']); 
	$condiciones=mysqli_real_escape_string($con,(strip_tags($_REQUEST['condiciones'], ENT_QUOTES)));

	//Fin de variables por GET
	$sql=mysqli_query($con, "select LAST_INSERT_ID(Det_Numero) as last from factura order by Fac_Id desc limit 0,1 ");
	$rw=mysqli_fetch_array($sql);
	$numero_factura=$rw['last']+1;	 
    // get the HTML

 
$nums=1;
$sumador_total=0;
$sql=mysqli_query($con, "select * from servicios, tmp where servicios.Servi_Id=tmp.Servi_Id and tmp.User_Id='$user_id'");
while ($row=mysqli_fetch_array($sql))
	{

	$id_tmp=$row["Tmp_Id"];  
	$cantidad=$row['Tmp_Estilista'];
	$nombre_producto=$row['Servi_Id'];
	$precio_venta=$row['Tmp_Precio'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	 
	$precio_total_f=number_format($precio_venta_r,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador 
	if ($nums%2==0){
		$clase="clouds";
	} else {
		$clase="silver";
	}
 
	//Insert en la tabla detalle_cotizacion
	$insert_detail=mysqli_query($con, "INSERT INTO detfactura (Det_Numero,Servi_Id,Det_Costo,Esti_Id)VALUES ('$numero_factura','$nombre_producto','$precio_venta_r','$cantidad')");
	
	$nums++;
	}
	 
	$impuesto="14";
	$subtotal=number_format($sumador_total,2,'.','');
 $estado="1";
	$total_factura=$subtotal;
 
$date=date("Y-m-d H:i:s");
$date1=date("H:i:s");
$insert=mysqli_query($con,"INSERT INTO factura(Det_Numero,Fac_Fecha,Fac_Hora,Fac_Total,Fac_Estado,User_Id,Sucur_Id,Cli_Id) VALUES ('$numero_factura','$date','$date1','$total_factura','$estado','$user_id','$id_vendedor','$id_cliente')");

            if ($insert){
				$messages[] = "Servicio ha sido ingresado satisfactoriamente.";

				?><script> 
 
 
//-->
</script>
			 
				<?php 
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
 


$delete=mysqli_query($con,"DELETE FROM tmp WHERE User_Id='$user_id'");
 
?>
 
<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
	background:#DD0280;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>   
              
        
               
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
	<script type="text/javascript">
                document.write('<div id="mydiv" class="mydiv" style="font-size:11pt;text-align:center;font-weight:bold">Su factura ha sido Ingresada con exito!	   </div> ');
              
	</script>
    
        <page_footer>
    <div id="imp1">    <table class="page_footer">  
        	<tr >
        <td class="midnight-blue" style="width: 25%;text-align:right; " >
        	 <div class="midnight-blue">FACTURA Nº <?php echo $numero_factura;?></div><br>
        	  <div class="midnight-blue" style="text-align: center;" ><?php echo "CONTROL DE CLIENTES ATENDIDOS";?></div>

        	
        </td>		
  
            </tr>
        </table>
    </page_footer> 

    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:50%;" class='midnight-blue'>FACTURAR A:</td>
        </tr>
		<tr>
           <td style="width:50%;" >
			<?php 
				$sql_cliente=mysqli_query($con,"select * from clientes where Cli_Id='$id_cliente'");
				$rw_cliente=mysqli_fetch_array($sql_cliente);
						echo "<br> Cliente: ";
				echo $rw_cliente['Cli_Nombre']." ".$rw_cliente['Cli_Apellido'];  ?>
			
		   </td>
        </tr>
        
   
    </table>
    
       <br>
		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:35%;" class='midnight-blue'>Digitador:</td>
		  <td style="width:25%;" class='midnight-blue'>Fecha:</td> 
        </tr>
		<tr>
           <td style="width:35%;">
			<?php 
				$sql_user=mysqli_query($con,"select * from usuarios where User_Id='$user_id'");
				$rw_user=mysqli_fetch_array($sql_user);
				echo $rw_user['User_Nombre']." ".$rw_user['User_Apellido'];
			?>
		   </td>
		  <td style="width:25%;"><?php echo date("d/m/Y H:i:s");?></td>
		  
        </tr>
		
        
   
    </table>
	<br>
  
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 10%;text-align:center" class='midnight-blue'>CANT.</th>
            <th style="width: 60%" class='midnight-blue'>DESCRIPCION</th>
            <th style="width: 60%" class='midnight-blue'>Estilista</th>
        
            <th style="width: 15%;text-align: right" class='midnight-blue'>PRECIO TOTAL</th>
            
        </tr>

<?php
$nums=1;
$sumador_total=0;
$sql=mysqli_query($con, "select * from servicios, detfactura,estilistas,factura where servicios.Servi_Id=detfactura.Servi_Id and detfactura.Det_Numero=factura.Det_Numero and estilistas.Esti_Id=detfactura.Esti_Id and factura.Det_Numero='".$numero_factura."'");

while ($row=mysqli_fetch_array($sql))
	{
	$id_producto=$row["Servi_Id"];
	$codigo_producto=$row['Det_Numero'];
	$cantidad=$row['Det_Numero'];
	$nombre_producto=$row['Servi_Nombre'];
	$esti_nombre=$row['Esti_Nombre'];
	$precio_ventas=$row['Fac_Total'];
	$precio_venta=$row['Det_Costo'];
  
	?>

        <tr>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo "1"; ?></td>
            <td class='<?php echo $clase;?>' style="width: 60%; text-align: left"><?php echo $nombre_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 60%; text-align: left"><?php echo $esti_nombre;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $precio_venta;?></td>
 
            
        </tr>

	<?php 

	 
	}
 
	 
?>
	  
 
		<tr>  
        </tr><tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">TOTAL <?php echo "$";?> </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($precio_ventas,2);?></td>
        </tr>
    </table>
	
	
	
	<br>  
	
	
	
	  <div style="width: 50%; font-size:11pt;text-align:center;font-weight:bold">&copy; <?php echo  $anio=date('Y'); echo "- Millennials.sys ";  ?></div>
<form></div>
	<input  type="image" width="50px" src="../img/imprimir.png" name="Submit" onclick="javascript:imprim1(imp1);">
	<button class="midnight-blue" onclick="opener.location.href='../nueva_factura.php'; self.close();">Cerrar</button>
</form>
</page>
<script>
function imprim1(imp1){
var printContents = document.getElementById('imp1').innerHTML;
        w = window.open('', 'PRINT', 'height=400,width=600');
        w.document.write(printContents);
      
        w.focus(); // necessary for IE >= 10
		w.print();
		w.close();
        return true;}
</script>
<script>
<?php
echo "
<script>
setTimeout(function() {
    self.close();
}, 4000)
</script>
";
?>
</script>