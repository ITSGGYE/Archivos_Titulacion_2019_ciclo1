<?php

function ConsultaIdModelCalificacion($id,$conexion) {
    
    $statement = $conexion->prepare("Select * from modelocalificacion where idseq_calif='$id' ");
    $statement->execute();
    return $data = $statement->fetch(PDO::FETCH_ASSOC);
    
}

?>