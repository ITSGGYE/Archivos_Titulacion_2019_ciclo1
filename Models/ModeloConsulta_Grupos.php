<?php
require '../Conexion/config.php';
require '../Conexion/functions.php';

$idGrupo_pastoral = $_POST['idGrupo_pastoral'];

$listagrupos = [];

$conexion =  conexion($bd_config);

$statement = $conexion->prepare("SELECT x.idseq_Contenedor,x.nombresIntegrante,x.EdadIntegrante,x.DireccionIntegrante,x.RolIntegrante,y.nombresGrupo FROM listado_grupo as x inner join grupospatorales as y on x.idGrupo_pastoral=y.idGrupo_pastoral
    where x.idGrupo_pastoral= '$idGrupo_pastoral' ");
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
   
    $listagrupos[] = $data;
    
}
echo json_encode($listagrupos);


?>
   
