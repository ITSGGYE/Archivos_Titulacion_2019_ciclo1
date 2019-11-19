    <?php
 
	session_start();

	if (!isset($_SESSION['active']) AND $_SESSION['active'] != true) {
        include("../loguot.php"); 
		exit;
        }        
$Rol_Id=$_SESSION['rol'];


 date_default_timezone_set('America/Guayaquil'); 
 
	$active_productos="";
	$active_clientes="";
	$active_usuarios="";	
	$title="Facturas | Millennials Sistema";
?><?php  
    require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
    require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos


$id_cliente=$_POST['id_cliente'];
$id_vendedor=$_POST['id_vendedor'];
$id_factura=$_POST['id_factura'];
 $fecha=$_POST['fecha'];
  

$sql="UPDATE factura SET Cli_Id='".$id_cliente."',Fac_Fecha='".$fecha."', Sucur_Id='".$id_vendedor."' WHERE Fac_Id='".$id_factura."'";
        $query_update = mysqli_query($con,$sql);
            if ($query_update){
        ?>                
<script type="text/javascript" >alert("Ha actualizado correctamente ")  </script>

?><script> 
<!--
window.location.replace('../facturas.php'); 
//-->
</script>
             <?php 
            } else{
               echo "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
            }
 
  
        
        

?>