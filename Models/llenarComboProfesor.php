<?php

require '../Conexion/config.php'; //importamos nuestro archivo de configuracion
require '../Conexion/functions.php';

$conexion = conexion($bd_config);

$statement = $conexion->prepare("Select * from profesor");
$statement->execute();
echo '<option value="" >Seleccione Profesor..</option>';
while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo '<option value="' . $data["idseq_profesor"] . '">' . $data["nombre"] . '</option>';
}
// put your code here
?>