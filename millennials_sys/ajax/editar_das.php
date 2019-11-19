    <?php
 
include('is_logged.php');//
?><?php
$e=$_POST['mod_id'];
 
		
	if (empty($_POST['mod_id'])) {
           $errors[] = "ID vacío";
        } else if (empty($_POST['mod_nombre'])){
			$errors[] = "Nombre del producto vacío";
		} else if (empty($_POST['mod_precio'])){
			$errors[] = "Precio de venta vacío";
		} else if ( 
			!empty($_POST['mod_id']) &&
			!empty($_POST['mod_nombre']) && 
			!empty($_POST['mod_precio'])
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$id_producto=mysqli_real_escape_string($con,(strip_tags($_POST["mod_id"],ENT_QUOTES)));
 
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["mod_nombre"],ENT_QUOTES)));
		$servicio=mysqli_real_escape_string($con,(strip_tags($_POST["mod_servicio"],ENT_QUOTES)));
		$precio_venta=floatval($_POST['mod_precio']);
 
		$sql="UPDATE detfactura SET Esti_Id='".$nombre."',Servi_Id='".$servicio."', Det_Costo='".$precio_venta."' WHERE Det_Id='".$id_producto."'";
		$query_update = mysqli_query($con,$sql);
	 
		 
			
$q=mysqli_query($con,"select * from detfactura where Det_Id=$id_producto");
							while($rrw=mysqli_fetch_array($q))	{
						 $a=$rrw['Det_Numero'];
 
 
			           $consulta="SELECT SUM(Det_Costo) as TotalPrecios FROM detfactura where Det_Numero=$a";
                       $resultado=$con -> query($consulta);
                       $fila=$resultado->fetch_assoc(); //que te devuelve un array asociativo con el nombre del campo

                      $TotalPrecios=$fila['TotalPrecios']; 	
                                   $sql="UPDATE factura SET Fac_Total='".$TotalPrecios."'  WHERE Det_Numero='".$a."'";
		$query_update = mysqli_query($con,$sql);    
					 

			}	}?><script> 
<!--
window.location.reload();; 
//-->
</script>
             <?php 

?>