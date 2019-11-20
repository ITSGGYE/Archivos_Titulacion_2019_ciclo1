<?php
require '../Conexion/config.php';
require '../Conexion/functions.php';


$sac_codigo = $_POST['sac_codigo'];


$Cedula = $_POST['Cedula'];

$tip_codigo = $_POST['tip_codigo'];
$listaSacramentos = [];

$conexion =  conexion($bd_config);

$sql = " select PER.per_cedula as Cedula,PER.per_nombre as Nombre,PAR.par_tipo_persona,
PER.per_direccion as Direccion,PER.per_fecha_nac as FechaNacimiento,
PER.per_lugarNacimiento as LugarNacimiento,PER.per_correo as Correo,PER.per_telefono as Telefono,
TS.tip_descripcion as nombreSacramento,SC.sac_fecha fechaSacramento,PER.per_observacion Observacion,
HC.cura_nombres as nombreCura, IG.igle_nombre as nombreIglesia,IG.igle_direccion as DireccionIglesia
from sacramentos AS SC INNER JOIN participantes AS PAR ON SC.sac_codigo = PAR.par_sacramento
INNER JOIN personas AS PER ON PER.per_cedula = PAR.par_cedula
INNER JOIN tipo_sacramentos TS ON SC.sac_tipo = TS.tip_sacramentos
INNER JOIN historialcuras HC ON HC.cura_id = SC.sac_cura
INNER JOIN iglesia IG ON IG.igle_codigo = SC.sac_iglesia WHERE
 SC.sac_codigo='$sac_codigo' and TS.tip_codigo='$tip_codigo'
";

$statement = $conexion->prepare($sql);
$statement->execute();


while($data = $statement->fetch(PDO::FETCH_ASSOC)){
    $listaSacramentos[] = $data;
}
echo json_encode($listaSacramentos);


?>
  
