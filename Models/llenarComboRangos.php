<?php

require '../Conexion/config.php'; //importamos nuestro archivo de configuracion
require '../Conexion/functions.php';

$conexion = conexion($bd_config);

$idperiodo = $_POST['idPeriodo'];

$statement = $conexion->prepare("Select * from rangos where idPeriodo = '$idperiodo' ");
$statement->execute();


echo "<option value=''>Seleccione Rango...</option>";
while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo '<option value="' . $data["idRango"] . '">' . $data["nombreRango"] . '</option>';
    
}

// put your code here
?>
    