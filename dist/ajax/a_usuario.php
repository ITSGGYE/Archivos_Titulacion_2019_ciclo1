<?php

require_once '../../modelos/Usuario.php';
require_once '../../conexion.php';

$respuesta;
header("Content-Type: application/json");

if (filter_has_var(INPUT_POST, "validarusuario")) {
    if ((filter_input(INPUT_POST, "validarusuario"))) {
        extract($_POST);
    }
    try {
        Usuario::ValidarUsuario($usuario, $clave);
        if ($usuario) {
            $respuesta['status'] = "correcto";
        }
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "Error: " . $ex->getMessage();
    }
}

if (filter_has_var(INPUT_POST, "cambiarclave")) {
    if (!isset($_SESSION['u']['id'])) {
    session_start();
}
    $id_docente = $_SESSION['u']['id'];
    if ($id_docente) {
        try {
            Conexion::ejecutar("update docentes set clave=md5(?) where id=?", [filter_input(INPUT_POST, "cambiarclave"), $id_docente]);
            $respuesta['status'] = "correcto";
            $respuesta['mensaje'] = "Se actualizo contraseña";
        } catch (Exception $ex) {
            $respuesta['status'] = "error";
            $respuesta['mensaje'] = "Error: " . $ex->getMessage();
        }
    } else {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "No ha iniciado sesión";
    }
}

echo json_encode($respuesta);
