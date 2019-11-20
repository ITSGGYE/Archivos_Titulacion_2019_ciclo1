<?php

function ConsultarUsuariosId($id,$conexion){
    
    $strSql= "SELECT US.idusuario,US.usuario,US.password,US.rol_id,RL.rol_descripcion,RL.rol_estado "
            . "FROM usuariosig AS US INNER JOIN roles AS RL ON US.rol_id = RL.rol_id where US.idusuario='$id' ";
    
    $statement = $conexion->prepare($strSql);
    $statement->execute();
    return $data = $statement->fetch(PDO::FETCH_ASSOC);
}

?>

