<?php

require '../Conexion/config.php';
require '../Conexion/functions.php';


$CargarDatosList = [];
$cura_id = $_POST['cura_id'];


   $conexion =  conexion($bd_config);

   $sql = " select * from Historialcuras where cura_id = '$cura_id' ";
   
   $statement = $conexion->prepare($sql);
   $statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   
    $CargarDatosList[] = $data;
   
}
 echo json_encode($CargarDatosList);

?>
    