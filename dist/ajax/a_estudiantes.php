<?php

require_once '../../conexion.php';
require_once '../../modelos/Cursos.php';
if (!isset($_SESSION['u'])) {
    session_start();
}
$respuesta;
$años = Años::listar();

if (filter_has_var(INPUT_GET, "listarestudiantes")) {

    $usuarios = Conexion::buscarVariosRegistro("select *from estudiantes where estado='1'");
    $info_usuario = array();
    if ($usuarios) {
        $tabla = "";
        $cont = 1;

        foreach ($usuarios as $u) {

            $texto_estado;
            if ($u['estado'] == 1) {
                $texto_estado = '<span class="badge badge-success">Activo</span>';
            } else {
                $texto_estado = '<span class="badge badge-secondary">Activo</span>';
            }

            $info_usuario[] = [
                "#" => "" . $cont,
                "nombres" => $u['nombres'],
                "apellidos" => $u['apellidos'],
                "año" => $u['anio_actual']." - ".$u['curso'],
                "estado" => $texto_estado,
                "" => " <div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>
                            <button data-toggle='modal' data-target='#exampleModal' onclick='editar(" . $u['id'] . ");' type='button' class='btn btn-primary'>editar</button>
                            <button onclick='eliminar(" . $u['id'] . ");' type='button' class='btn btn-danger'>eliminar</button>
                        </div>"
            ];
            $cont++;
        }
        $respuesta = $info_usuario;
//     
    } else {
        $respuesta = $info_usuario;
    }
}

if (filter_has_var(INPUT_POST, "agregarestudiante")) {
    if (isset($_POST['agregarestudiante']))
        extract($_POST);
    try {
        Conexion::ejecutar("insert into estudiantes (nombres,apellidos,anio_actual,identificador,curso,usuario_create) "
                . "values (?,?,?,?,?,?)", [$txtnombres, ($txtapellidos), $txtanio, $txtidentificador, $txtcurso, $_SESSION['u']['usuario']]);
        $respuesta['status'] = "correcto";
        $respuesta['mensaje'] = "Se agrego estudiante correctamente";
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "error: " . $ex->getMessage();
    }
}

if (filter_has_var(INPUT_POST, "eliminarestudiante")) {
    try {
        Conexion::ejecutar("update estudiantes set estado='0',fecha_delete=current_timestamp,usuario_delete=? where id=?", [$_SESSION['u']['usuario'], filter_input(INPUT_POST, "eliminarestudiante")]);
        $respuesta['status'] = "correcto";
        $respuesta['mensaje'] = "Se elimino estudiante correctamente";
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "error: " . $ex->getMessage();
    }
}

if (filter_has_var(INPUT_POST, "editarestudiante")) {
    try {
        $usuario = Conexion::buscarRegistro("select * from estudiantes where id=?", [filter_input(INPUT_POST, "editarestudiante")]);
        if ($usuario) {
            $respuesta['status'] = "correcto";
            $respuesta['estudiante'] = $usuario;
        } else {
            $respuesta['status'] = "error";
            $respuesta['mensaje'] = "Error: No se encontro información de este estudiante";
        }
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "Error: " . $ex->getMessage();
    }
}

if (filter_has_var(INPUT_POST, "actualizarestudiante")) {
    if (isset($_POST['actualizarestudiante']))
        extract($_POST);
    try {
        Conexion::ejecutar("update estudiantes set nombres=?,apellidos=?,anio_actual=?,identificador=?,curso=?,usuario_update=?,fecha_update=current_timestamp where id=?",
                [
                    $txt_nombres,
                    $txt_apellidos,
                    $txt_anio,
                    $txt_identificador,
                    $txt_curso,
                    $_SESSION['u']['usuario'],
                    $idestudiante,
        ]);
        $respuesta['status'] = "correcto";
        $respuesta['mensaje'] = "Se actualizo correctamente";
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "error: " . $ex->getMessage();
    }
}
header('Content-Type: application/json');
echo json_encode($respuesta);


