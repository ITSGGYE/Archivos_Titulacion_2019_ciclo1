<?php

function ConsultarDatosId($id,$conexion){
    
    $statement = $conexion->prepare("Select * from listado_grupo where idseq_Contenedor='$id' ");
    $statement->execute();
    return $data = $statement->fetch(PDO::FETCH_ASSOC);
}

?>

