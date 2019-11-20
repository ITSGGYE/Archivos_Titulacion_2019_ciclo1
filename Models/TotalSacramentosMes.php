<?php

require '../Conexion/config.php';
require '../Conexion/functions.php';
       
$listadoTotales = [];
$año = $_POST['Year'];
$conexion =  conexion($bd_config);

for ($month = 1; $month <= 12; $month ++){
   $sql = " select COUNT(*) Total from sacramentos where MONTH (sac_fecha)= '$month' and YEAR(sac_fecha)='$año' group by MONTH (sac_fecha); ";
   $statement = $conexion->prepare($sql);
   $statement->execute();
   $data = $statement->fetch(PDO::FETCH_ASSOC);
   $listadoTotales[] = $data;
   
}


  echo json_encode($listadoTotales);
?>
  
