<?php
require '../Conexion/config.php';
require '../Conexion/functions.php';



$listaUsuarios = [];

$conexion =  conexion($bd_config);

$sql = " SELECT US.idusuario,US.usuario,US.password,RL.rol_descripcion,RL.rol_estado FROM usuariosig AS US INNER JOIN roles AS RL ON US.rol_id = RL.rol_id ";

$statement = $conexion->prepare($sql);
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
    $listaUsuarios[] = $data;
}
echo json_encode($listaUsuarios);



?>
  
