<?php
require '../Conexion/config.php';
require '../Conexion/functions.php';


$conexion =  conexion($bd_config);

$statement = $conexion->prepare("select * from iglesia");
$statement->execute();

echo '<option value="">Seleccione Iglesia...</option>';
while($data = $statement->fetch(PDO::FETCH_ASSOC)){
    echo '<option value="'.$data["igle_codigo"].'">'.$data["igle_nombre"].'</option>';
}

?>