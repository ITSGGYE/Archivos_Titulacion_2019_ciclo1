<?php

session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';

$Ingreso = "";

foreach ($_POST["filas"] as $fila) {
    $secuencia = $fila[0];
    $idEstudiante = $fila[1];
    $nombresEstudiante = $fila[2];
    $notaEstudiante = $fila[3];
    $idRango = $fila[4];
    $idProfesor = $fila[5];
    $idseqParcial = $fila[6];
    $idseq_calif = $fila[7];
    $idcurso = $fila[8];
    $idmateria = $fila[9];
    $idPeriodo = $fila[10];

    if ($notaEstudiante == "") {
        $Ingreso = "Todos los estudiantes deben tener notas Ingresadas";
    }
}

if ($Ingreso == "") {
    $Mensaje = "";
    foreach ($_POST["filas"] as $fila) {
        $secuencia = $fila[0];
        $idEstudiante = $fila[1];
        $nombresEstudiante = $fila[2];
        $notaEstudiante = $fila[3];
        $idRango = $fila[4];
        $idProfesor = $fila[5];
        $idseqParcial = $fila[6];
        $idseq_calif = $fila[7];
        $idcurso = $fila[8];
        $idmateria = $fila[9];
        $idPeriodo = $fila[10];

        $conexion = conexion($bd_config);
        $str = " select Nota from notas_estudiante where idEstudiante='$idEstudiante' and idcurso ='$idcurso' and idmateria='$idmateria' "
                . " and idProfesor='$idProfesor' and idRango='$idRango' and idPeriodo='$idPeriodo' and idseq_calif='$idseq_calif' and idseqParcial='$idseqParcial' ";


        $statement = $conexion->prepare($str);
        $statement->execute();
        $resultado = $statement->fetch();

        if ($resultado != false) {
            $Mensaje = 'Estos estudiantes ya tienen registrado notas';
        }

        if ($Mensaje == "") {
            $conexion = conexion($bd_config);
            $statement = $conexion->prepare('Insert into notas_estudiante (idEstudiante, idcurso, idmateria, idProfesor, idRango, idPeriodo, idseq_calif,idseqParcial,Nota) '
                    . 'VALUES(:idEstudiante, :idcurso, :idmateria, :idProfesor, :idRango,:idPeriodo, :idseq_calif, :idseqParcial, :Nota)');

            $statement->execute([
                ':idEstudiante' => $idEstudiante,
                ':idcurso' => $idcurso,
                ':idmateria' => $idmateria,
                ':idProfesor' => $idProfesor,
                ':idRango' => $idRango,
                ':idPeriodo' => $idPeriodo,
                ':idseq_calif' => $idseq_calif,
                ':idseqParcial' => $idseqParcial,
                ':Nota' => $notaEstudiante,
            ]);
            
        } else {
            echo $Mensaje = 'Este estudiante ya tiene nota';
            exit();
        }
    }
    echo $Mensaje = 'Notas Guardadas con exito';
}else{
    echo $Ingreso;
}
?>
    
