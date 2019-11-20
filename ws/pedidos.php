<?php
include_once('coneccion.php');
$nom = $_REQUEST["Direccion"];
$nom = $_REQUEST["Celular"];
$nom = $_REQUEST["Nombre"];
$pre = $_REQUEST["Fecha"];
$can = $_REQUEST["cedula"];

//$con = mysqli_connect("localhost","id11392963_adm","987654321","id11392963_bdadita") or die ("Sin Conexion");
$sql = "insert into pedidos (dir_ped,cel_ped,nom_ped,fec_ped,ced_ped) values ('$dir','$cel','$nom','$fec','$ced')"; 
$resul = mysqli_query($conn,$sql);
echo $resul;
mysqli_close($conn);

?>