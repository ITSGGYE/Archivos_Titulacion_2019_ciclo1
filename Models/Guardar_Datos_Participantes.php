<?php

require '../Conexion/config.php';
require '../Conexion/functions.php';

$idSacramento = $_POST['tipoSacramento'];

$errores = "";
$Exito = "Datos Guardados con exito";
$Error = "Error al Guardar datos intentelo nuevamente";


     $conexion = conexion($bd_config);    
     $statementconsult = $conexion->prepare("select COUNT(*)+1 as contador from sacramentos ");
     $statementconsult->execute();
     $data = $statementconsult->fetch(PDO::FETCH_ASSOC);
     
     $codigo = $data['contador'];

if ($errores == "") {

    if ($idSacramento == "1" || $idSacramento == "2" || $idSacramento == "3") {
        $cantidad = 3;

        for ($i = 1; $i <= $cantidad;) {
            $datos[$i] = array("cedula" => $_POST["cedula$i"], "par_tipo_persona" => $_POST["par_tipo_persona$i"]);

            $i ++;
        }
    } else {
        $cantidad = 6;
        for ($i=3; $i <= $cantidad;){
           $datos[$i] = array ("cedula"=>$_POST["cedula$i"], "par_tipo_persona"=>$_POST["par_tipo_persona$i"]);
           
           $i ++;
        }
    }



    foreach ($datos as $dato) {

        
          $conexion = conexion($bd_config);
          $statement = $conexion->prepare('INSERT INTO participantes (par_sacramento, par_cedula,par_tipo_persona)'
          . 'VALUES(:par_sacramento, :par_cedula,:par_tipo_persona)');


          $statement->execute([
          ':par_sacramento' => $codigo,
          ':par_cedula' => $dato["cedula"],
          ':par_tipo_persona' => $dato["par_tipo_persona"]

          ]);
         
    }

    echo $Exito;
} else {
    echo $errores;
}
?>
    
