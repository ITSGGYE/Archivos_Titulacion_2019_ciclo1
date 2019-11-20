<?php
//require '../Conexion/config.php';
//require '../Conexion/functions.php';

function ConsultaRangoId($id,$conexion) {
    
    $statement = $conexion->prepare("Select * from rangos where idRango='$id' ");
    $statement->execute();
    return $data = $statement->fetch(PDO::FETCH_ASSOC);
    
}

?>