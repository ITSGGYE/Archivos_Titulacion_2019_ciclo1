    <?php
session_start();

	if (!isset($_SESSION['active']) AND $_SESSION['active'] != true) {
        include("../loguot.php"); 
		exit;
        }        
$user_id=$_SESSION['idUser'];
?><?php
 
if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['precio_venta'])){$precio_venta=$_POST['precio_venta'];}

	/* Connect To Database*/
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	include("../funciones.php");
if (!empty($id)  and !empty($precio_venta))
{
$insert_tmp=mysqli_query($con, "INSERT INTO tmp (Servi_Id,Tmp_Precio,Tmp_Estilista,User_Id) VALUES ('$id','$precio_venta','$cantidad','$user_id')");

}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
$id_tmp=intval($_GET['id']);	
$delete=mysqli_query($con, "DELETE FROM tmp WHERE Tmp_Id='".$id_tmp."'");
}
//$simbolo_moneda=get_row('perfil','moneda', 'id_perfil', 1);
?>
<table class="table">
<tr>
 
	<th class='text-center'>N.</th>
	<th class='text-center'>DESCRIPCIÓN</th>
 	<th class='text-center'>ESTILISTA</th>
 	<th class='text-center'>PRECIO</th>
 	<th class='text-center'>ELIMINAR</th>
	<th class='text-center'>PRECIO TOTAL</th>
	<th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "select * from servicios, tmp where servicios.Servi_Id=tmp.Servi_Id and tmp.User_Id='$user_id'");
	while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["Tmp_Id"]; 
	$cantidad=$row['Tmp_Estilista'];
	$nombre_producto=$row['Servi_Nombre'];
	
	
	$precio_venta=$row['Tmp_Precio'];
	$precio_venta_f=($precio_venta);//Formateo variables
	$precio_venta_f=($precio_venta);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	 
	$precio_total_f=($precio_venta_r);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador 
	
		?>
		<tr> 

	
			<td class='text-center'><?php echo "1";?></td>
			<td class='text-center'><?php echo $nombre_producto;?></td>
			<?php 
							$query_categoria=mysqli_query($con,"select * from estilistas where Esti_Id=$cantidad");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?><td class='text-center'><?php echo $rw['Esti_Nombre'];?></td> 			
								<?php
							}
							?>
			<td class='text-center'><?php echo $precio_venta_r;?></td>

			<td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>		
		<?php
	}
	$impuesto="14";
	$subtotal=number_format($sumador_total,2,'.','');
 
	$total_factura=$subtotal;

?>
 
 
<tr>
	<td></td> 
	<td class='text-right' colspan=4>TOTAL <?php echo "$";?></td>
	<td class='text-center'><?php echo number_format($total_factura,2);?></td>
	<td></td>
</tr>

</table>


