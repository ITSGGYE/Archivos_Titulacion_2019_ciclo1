<?php
session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';

$listaEstudiantes = [];

$conexion =  conexion($bd_config);

$statement = $conexion->prepare("select * from estudiante order by nombresEstudiante");
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   
    $listaEstudiantes[] = $data;
    
}
echo json_encode($listaEstudiantes);
?>
   
