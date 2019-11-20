<?php session_start();

require '../Conexion/config.php';
require '../Conexion/functions.php';

$idEstudiante = $_POST['idEstudiante'];

$conexion =  conexion($bd_config);

$statement = $conexion->prepare("select * from estudiante where idEstudiante='$idEstudiante' ");
$statement->execute();

while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   echo "<input type='hidden' id='idEstudiante' value='".$data['idEstudiante']."'>";
   echo "<input type='text' class='form-control' id='nombresEstudiante' value='".$data['nombresEstudiante']."' style='width: 280px;' readonly>";

    
}

?>
   