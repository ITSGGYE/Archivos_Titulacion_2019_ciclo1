<?php

require_once '../../conexion.php';
$respuesta;
header("Content-Type: application/json");
if (!isset($_SESSION['u'])) {
    session_start();
}
$identificador = filter_input(INPUT_POST, "identificador");
$docente = filter_input(INPUT_POST, "docente");
$fecha = filter_input(INPUT_POST, "fecha");
$asunto = filter_input(INPUT_POST, "asunto");
$mensaje = filter_input(INPUT_POST, "mensaje");


$ds = DIRECTORY_SEPARATOR;  //1

$storeFolder = 'uploads';   //2

if (!empty($_FILES)) {

    $tempFile = $_FILES['qqfile']['tmp_name'];          //3             

    $targetPath = dirname(dirname(__DIR__)) . $ds . $storeFolder . $ds;  //4
    $nombre_real= str_replace(["%"," ","?",","], "",  $_FILES['qqfile']['name']);
    $nombre_archivo = time() .$nombre_real;
    $targetFile = $targetPath . $nombre_archivo;  //5

    move_uploaded_file($tempFile, $targetFile); //6
}
try {
    Conexion::ejecutar("insert into archivos (asunto,mensaje,fecha,identificador,iddocente,de,ruta,archivo,tipo) "
            . " values (?,?,?,?,?,?,?,?,?)", [$asunto, $mensaje, $fecha, $identificador, $docente, $_SESSION['u']['usuario'], $nombre_archivo,$_FILES['qqfile']['name'],$_FILES['qqfile']['type']]);
    $respuesta['success'] = true;
} catch (Exception $ex) {
    $respuesta['error'] = true;
}






echo json_encode($respuesta);
