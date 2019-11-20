<?php
require '../Conexion/config.php';
require '../Conexion/functions.php';



$listaPersonas = [];

$conexion =  conexion($bd_config);

$sql = " SELECT * FROM personas";

$statement = $conexion->prepare($sql);
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
    $listaPersonas[] = $data;
}
echo json_encode($listaPersonas);
?>
