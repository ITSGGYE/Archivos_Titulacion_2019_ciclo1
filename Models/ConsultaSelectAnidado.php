<?php
session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';

$listaDepartamentos = [];

$conexion =  conexion($bd_config);

$statement = $conexion->prepare("select idDepartamento,nombreDepartamento from Departments");
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   
    $listaDepartamentos[] = $data;
    
}
echo json_encode($listaDepartamentos);

// put your code here
?>

