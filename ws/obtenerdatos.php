<?php
include_once('coneccion.php');
// $con = mysqli_connect("localhost","id11392963_adm","987654321","id11392963_bdadita") or die ("sin conexion");
$sql = "select * from productos"; 
$datos = Array();
$resul = mysqli_query($conn,$sql);
while($row = mysqli_fetch_object($resul)){
$datos[] = $row;
}
 echo json_encode($datos);
mysqli_close($conn);

?>