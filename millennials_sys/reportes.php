    <?php
 
	session_start();

	if (!isset($_SESSION['active']) AND $_SESSION['active'] != true) {
        include("loguot.php"); 
		exit;
        }        
$Rol_Id=$_SESSION['rol'];


 date_default_timezone_set('America/Guayaquil'); 
 
	$active_productos="";
	$active_clientes="";
	$active_usuarios="";	
	$title="Facturas | Millennials Sistema";
?>
<?php
 
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
 
 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("head.php");?>
  </head>
  <body>
	<?php
	include("navbar.php");
	?>
	
    <div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
    <div class="btn-group pull-right">
    	<?php 

if($_SESSION['rol'] == 1){    	 ?>
 <a  href="exportarfacturas.php" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span>Reporte General</a>
 
 
			 
<?php 

  } 

  if($_SESSION['rol'] == 2){   	 ?>
 
<a  href="exportar2.php" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> 	Descargar Reporte</a>

<?php
  }  

    	 ?>
				
			</div>
			<h4><i class='glyphicon glyphicon-plus'></i> Reporte General</h4>

		</div>
  
		<div class="panel-body">
		
  	<?php 

if($_SESSION['rol'] == 1){    	 ?>
 
   <form action="dia.php" method="post">
   	<input type="date" name="vara" value="<?php echo date("Y-m-d");?>" required>
   	<button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Descargar Reporte</button>
   </form>
 
			 
<?php 

  } if($_SESSION['rol'] == 2){    	 ?>
 
   <form action="dia2.php" method="post">
   	<input type="date" name="vara" value="<?php echo date("Y-m-d");?>" required>
   	<button class="btn btn-info"><span class="glyphicon glyphicon-plus"></span> Descargar Reporte</button>
   </form>
 
			 
<?php 

  } 
 ?>
			<div class="form-group row">
							
		 
						 
							
						</div>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>ºN</th>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Sucursales</th>
					<th>Clientes</th>
			 <th>Estilista</th>
					<th>costo</th>
					<th>servicio</th>  		</tr>
			
	 <?php 
 
if($_SESSION['rol'] == 1){
    
  $q=mysqli_query($con,"SELECT * FROM factura  INNER JOIN detfactura 
ON factura.Det_Numero=detfactura.Det_Numero 
ORDER BY Fac_Id desc limit 20 ");
      
  }  
if($_SESSION['rol'] == 2){
    $u=$_SESSION['Sucur_Id'];
  $q=mysqli_query($con,"SELECT * FROM factura  INNER JOIN detfactura 
ON factura.Det_Numero=detfactura.Det_Numero where Sucur_Id=$u
ORDER BY Fac_Id desc limit 20 ");
      
  }  

   

							while($r=mysqli_fetch_array($q))	{
			 		 
                
                     $costo=$r['Det_Costo'];  
                     $numero=$r['Det_Numero'];  
                     $fecha=$r['Fac_Fecha'];  
                     $hora=$r['Fac_Hora'];  
                     $servi=$r['Servi_Id'];  
                          $nombre=$r['Esti_Id'];  
                           $cli_id=$r['Cli_Id']; 
                            $sucur_id=$r['Sucur_Id']; 
 ?>


<tr>   <td ><?php echo $numero; ?></td> 	 
                         <td ><?php echo $fecha; ?></td>
				     	<td><?php echo $hora; ?></td>
                        
				 <?php 

$quer=mysqli_query($con,"SELECT * FROM estilistas where Esti_Id=$nombre");
							while($rsw=mysqli_fetch_array($quer))	{
			 		
 
$qu=mysqli_query($con,"SELECT * FROM clientes where Cli_Id=$cli_id");
							while($rasw=mysqli_fetch_array($qu))	{
$quas=mysqli_query($con,"SELECT * FROM sucursales where Sucur_Id=$sucur_id");
							while($rassw=mysqli_fetch_array($quas))	{			 		
	
 ?>
                        <td><?php echo $rassw['Sucur_Nombre'];?></td> 
						<td><?php echo $rasw['Cli_Nombre']." ".$rasw['Cli_Apellido'] ;?></td> 
						<td><?php echo $rsw['Esti_Nombre'] ;?></td> 


						<td><?php echo $costo;?></td>

 <?php 

$query_categoria=mysqli_query($con,"SELECT * FROM servicios where Servi_Id=$servi");
							while($rw=mysqli_fetch_array($query_categoria))	{
			 		
	
 ?>

						<td><?php echo $rw['Servi_Nombre'] ;?></td> 


		</tr>

<?php  } 	   } 	  }   } }

 ?>
			
		<tr>
					<td colspan=7><span class="pull-right">
			 </span></td>
				</tr>
			  </table>
			</div>
	
			
			
			
  </div>
</div>
		 
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/clientes.js"></script>
  </body>
</html>

