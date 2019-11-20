<?php
require '../Conexion/config.php';
require '../Conexion/functions.php';


$listadoHistorialRegistro = [];

$conexion =  conexion($bd_config);

   $sql = " select * from Historialcuras order by cura_id desc ";
   
   $statement = $conexion->prepare($sql);
   $statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   
    $listadoHistorialRegistro[] = $data;
    
}
echo json_encode($listadoHistorialRegistro);


?>
  
