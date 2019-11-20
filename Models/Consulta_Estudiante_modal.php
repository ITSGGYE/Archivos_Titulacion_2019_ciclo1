<?php
  session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';

$listadoEstudiantes = [];

$conexion =  conexion($bd_config);

$statement = $conexion->prepare("select * from estudiante order by nombresEstudiante");
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   
    $listadoEstudiantes[] = $data;
    
}
echo json_encode($listadoEstudiantes);

?>
  
