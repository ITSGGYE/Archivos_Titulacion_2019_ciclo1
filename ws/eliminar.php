<?php
include_once('coneccion.php');
$id = $_REQUEST["Id"];
//$conn = mysqli_connect("localhost","id11392963_adm","987654321","id11392963_bdadita") or die ("Sin Conexion");
$sql = "delete from productos where id_pro=$id"; 
if( mysqli_query($conn,$sql)){
   echo "Producto Eliminado Correctamente!!";
 }else{
echo "Error: " .mysqli_error($conn);
}
mysqli_close($conn);

?>