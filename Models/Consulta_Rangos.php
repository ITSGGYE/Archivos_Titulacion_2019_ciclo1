<?php
session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';

$listaRangos = [];
$idPeriodo = $_POST['idPeriodo'];

$conexion =  conexion($bd_config);

$sql= "SELECT RG.idRango,RG.nombreRango,RG.duracionRango,RG.fechaInicioRango,RG.fechaFinRango,PER.nombrePeriodo 
    FROM rangos AS RG INNER JOIN periodos AS PER ON RG.idPeriodo = PER.idPeriodo
    WHERE RG.idPeriodo = '$idPeriodo' ";
$statement = $conexion->prepare($sql);
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   
    $listaRangos[] = $data;
    
}
echo json_encode($listaRangos);

?>
    
