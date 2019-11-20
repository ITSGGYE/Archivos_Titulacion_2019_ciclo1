<?php

function ConsultarPersona($id,$conexion){
    
    $strSql= "SELECT * from personas where per_cedula='$id' ";
    
    $statement = $conexion->prepare($strSql);
    $statement->execute();
    return $data = $statement->fetch(PDO::FETCH_ASSOC);
}

?>

