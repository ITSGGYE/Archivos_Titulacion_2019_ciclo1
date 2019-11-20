<?php
include_once('coneccion.php');
$nom = $_REQUEST["Nombre"];
$pre = $_REQUEST["Precio"];
$can = $_REQUEST["Cantidad"];
$tot = $_REQUEST["Total"];
//$con = mysqli_connect("localhost","id11392963_adm","987654321","id11392963_bdadita") or die ("Sin Conexion");
$sql = "insert into productos (nom_pro,pre_pro,can_pro,tot_pro) values ('$nom',$pre,$can,$tot)"; 
$resul = mysqli_query($conn,$sql);
echo $resul;
mysqli_close($conn);

?>