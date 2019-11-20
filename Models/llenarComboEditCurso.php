<?php


require '../Conexion/config.php';
require '../Conexion/functions.php';

$idGrupo = $_POST['idGrupo'];
$conexion =  conexion($bd_config);

$statement = $conexion->prepare("select * from grupospatorales");
$statement->execute();

while($data = $statement->fetch(PDO::FETCH_ASSOC)){
    
    echo '<option value="'.$data["idGrupo_pastoral"].'" '.(($idGrupo==$data["idGrupo_pastoral"])?'selected="selected"':"").'>'.$data["nombresGrupo"].'</option>';
}

// put your code here
?>

