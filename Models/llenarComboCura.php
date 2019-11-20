<?php
require '../Conexion/config.php';
require '../Conexion/functions.php';


$conexion =  conexion($bd_config);

$statement = $conexion->prepare("select * from historialcuras");
$statement->execute();

echo '<option value="">Seleccione Cura...</option>';
while($data = $statement->fetch(PDO::FETCH_ASSOC)){
    echo '<option value="'.$data["cura_id"].'">'.$data["cura_nombres"].'</option>';
}

?>