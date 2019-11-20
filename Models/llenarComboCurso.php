<?php

require '../Conexion/config.php'; //importamos nuestro archivo de configuracion
require '../Conexion/functions.php';

$conexion = conexion($bd_config);

$statement = $conexion->prepare("Select * from curso");
$statement->execute();
echo '<option value="" >Seleccione Curso..</option>';
while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo '<option value="'.$data["idcurso"].'">'.$data["nombrecurso"].'</option>';
}

?>
  
