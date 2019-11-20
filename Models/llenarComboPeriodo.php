<?php

require '../Conexion/config.php'; //importamos nuestro archivo de configuracion
require '../Conexion/functions.php';

$conexion = conexion($bd_config);

$statement = $conexion->prepare("Select * from periodos");
$statement->execute();
//echo '<option value="" >Seleccione Periodo..</option>';
while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo '<option value="' . $data["idPeriodo"] . '" >' . $data["nombrePeriodo"] . '</option>';
}


?>
    
