<?php
require '../Conexion/config.php';
require '../Conexion/functions.php';


$conexion =  conexion($bd_config);

$statement = $conexion->prepare("select * from grupospatorales");
$statement->execute();

echo '<option value="">Seleccione Grupo...</option>';
while($data = $statement->fetch(PDO::FETCH_ASSOC)){
    echo '<option value="'.$data["idGrupo_pastoral"].'">'.$data["nombresGrupo"].'</option>';
}

?>
   