<?php
session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';

$listaPeriodos = [];

$conexion =  conexion($bd_config);

$statement = $conexion->prepare("select * from periodos");
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   
    $listaPeriodos[] = $data;
    
}
echo json_encode($listaPeriodos);
// put your code here
?>
   
