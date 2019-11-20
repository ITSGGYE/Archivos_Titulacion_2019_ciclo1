<?php

require '../Conexion/config.php'; //importamos nuestro archivo de configuracion
require '../Conexion/functions.php';

$conexion = conexion($bd_config);

$statement = $conexion->prepare("Select * from materia");
$statement->execute();
echo '<option value="" >Seleccione Materia..</option>';
while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo '<option value="' . $data["idmateria"] . '">' . $data["nombremateria"] . '</option>';
}
// put your code here
?>
  