<?php
//require '../Conexion/config.php';
//require '../Conexion/functions.php';

function ConsultaPeriodoId($id,$conexion) {
    
    $statement = $conexion->prepare("Select * from periodos where idPeriodo='$id' ");
    $statement->execute();
    return $data = $statement->fetch(PDO::FETCH_ASSOC);
    
}

?>