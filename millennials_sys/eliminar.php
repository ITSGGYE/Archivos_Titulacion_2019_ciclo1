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
?><?php 
require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos 
 
$id=$_GET['id'];  
$q=mysqli_query($con,"select * from detfactura where Det_Id=$id");
							while($rrw=mysqli_fetch_array($q))	{
						 $a=$rrw['Det_Numero'];
						 echo "$a";
	}				 
 
    $sqlborrar="DELETE FROM detfactura WHERE Det_Id=$id";
     
    $resborrar=mysqli_query($con,$sqlborrar);

 
 $consulta="SELECT SUM(Det_Costo) as TotalPrecios FROM detfactura where Det_Numero=$a";
  $resultado=$con -> query($consulta);
                       $fila=$resultado->fetch_assoc(); //que te devuelve un array asociativo con el nombre del campo

                      $TotalPrecios=$fila['TotalPrecios']; 	
                                   $sql="UPDATE factura SET Fac_Total='".$TotalPrecios."'  WHERE Det_Numero='".$a."'";
		$query_update = mysqli_query($con,$sql);    
		
		 
	 		
 
?><script> 
<!--
window.location.replace('facturas.php'); 
//-->
</script>
			 <?php   ?>