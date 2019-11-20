<?php

    require '../Conexion/config.php';
    require '../Conexion/functions.php';


    $listaFiltroSacramento = [];

    
    $nombreSacramento = $_POST['nombreSacramento'];

    $sql = " select PER.per_cedula as Cedula,PER.per_nombre as Nombre,TS.tip_descripcion as nombreSacramento,HC.cura_nombres as nombreCura, IG.igle_nombre as nombreIglesia,IG.igle_direccion as nombreDireccion
    from sacramentos AS SC INNER JOIN participantes AS PAR ON SC.sac_codigo = PAR.par_sacramento
    INNER JOIN personas AS PER ON PER.per_cedula = PAR.par_cedula
    INNER JOIN tipo_sacramentos TS ON SC.sac_tipo = TS.tip_sacramentos
    INNER JOIN historialcuras HC ON HC.cura_id = SC.sac_cura
    INNER JOIN iglesia IG ON IG.igle_codigo = SC.sac_iglesia WHERE PAR.par_tipo_persona='S' AND TS.tip_descripcion LIKE '%$nombreSacramento%' ";
    $conexion = conexion($bd_config);
    $statement = $conexion->prepare($sql);
    $statement->execute();
    
    
    while($data = $statement->fetch(PDO::FETCH_ASSOC)){
     
        $listaFiltroSacramento[]= $data;
    } 
     
    echo json_encode($listaFiltroSacramento);

?>
   
