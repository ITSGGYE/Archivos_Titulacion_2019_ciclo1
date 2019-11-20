<?php
require '../Conexion/config.php';
require '../Conexion/functions.php';


$conexion =  conexion($bd_config);

$statement = $conexion->prepare("select * from tipo_sacramentos");
$statement->execute();

echo '<option value="">Seleccione Sacramento...</option>';
while($data = $statement->fetch(PDO::FETCH_ASSOC)){
    
    if($data['tip_estado'] == "A"){
        echo '<option value="'.$data["tip_sacramentos"].'">'.$data["tip_descripcion"].'</option>';
    }
    
}


?>
  
