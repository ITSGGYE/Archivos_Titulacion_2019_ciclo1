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
 
	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
 
?><!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="../assests/bootstrap/css/bootstrap.css">
	<title></title>
</head>
<body >
 
	 
  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_cliente" name="editar_cliente">
 
		 <div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>#</th> 
					<th>Fecha</th>
		 
				
		 
					<th>Servicio</th>
					<th>Estilista</th>
	<th>Costo</th>
					<th>Total</th> 
			
				</tr>
	<?php

		$id_cliente=$_POST['a'];
 
		$query_categoria=mysqli_query($con,"select * from factura where Cli_Id='".$id_cliente."'");
							while($rw=mysqli_fetch_array($query_categoria))	{
                                  $de=$rw['Det_Numero'];
                        

	$qu=mysqli_query($con,"select * from detfactura where Det_Numero=$de");
							while($rsw=mysqli_fetch_array($qu))	{
                                  $e=$rsw['Servi_Id'];
                                  $d=$rsw['Esti_Id'];
							$qsu=mysqli_query($con,"select * from servicios where Servi_Id=$e");
							while($rsaw=mysqli_fetch_array($qsu))	{

							$qazu=mysqli_query($con,"select * from estilistas where Esti_Id=$d");
							while($zrsw=mysqli_fetch_array($qazu))	{		 
	 ?>				<tr>
	 		<td><?php echo $rw['Fac_Id'];  ?></td>
	 	<td><?php echo $rw['Fac_Fecha'];  ?></td>
	 	
	 	<td><?php echo $rsaw['Servi_Nombre'];  ?></td>
	 	<td><?php echo $zrsw['Esti_Nombre'];  ?></td>
	 	<td><?php echo $rsw['Det_Costo'];  ?></td>
	 	<td><?php echo $rw['Fac_Total'];  ?></td>
	 	</tr>
	<?php }}}}	 ?>


</table>
		  </div></div>
		  <div class="modal-footer">
			<button type="button" onclick="cerrarse()" class="btn btn-info" data-dismiss="modal">Cerrar</button>
		 
		  </div>
		  </form>
  <script>
function cerrarse(){
window.close()
}
</script>
</body>
</html>