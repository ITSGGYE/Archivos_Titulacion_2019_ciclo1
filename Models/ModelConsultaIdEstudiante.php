<?php
//require '../Conexion/config.php';
//require '../Conexion/functions.php';

function ConsultaEstudianteId($id,$conexion) {
    
    $statement = $conexion->prepare("Select * from estudiante where idEstudiante='$id' ");
    $statement->execute();
    return $data = $statement->fetch(PDO::FETCH_ASSOC);
    
}

?>