<?php

require_once '../../conexion.php';
$respuesta;
header("Content-Type: application/json");
if (!isset($_SESSION['u'])) {
    session_start();
}
if (filter_has_var(INPUT_GET, "listardocentes")) {

    $docentes = Conexion::buscarVariosRegistro("select *from docentes where estado='1'");
    $info_docentes = array();
    if ($docentes) {
        $tabla = "";
        $cont = 1;

        foreach ($docentes as $u) {

            $texto_estado;
            if ($u['estado'] == 1) {
                $texto_estado = '<span class="badge badge-success">Activo</span>';
            } else {
                $texto_estado = '<span class="badge badge-secondary">Activo</span>';
            }

            $info_docentes[] = [
                "#" => "" . $cont,
                "nombres" => $u['nombres'],
                "cedula" => $u['cedula'],
                "celular" => $u['celular'],
                "carrera" => $u['carrera'],
                "usuario" => $u['usuario'],
                "" => " <div class='btn-group btn-group-sm' role='group' aria-label='Basic example'>
                            <button data-toggle='modal' data-target='#exampleModal' onclick='editar(" . $u['id'] . ");' type='button' class='btn btn-primary'>editar</button>
                            <button onclick='eliminar(" . $u['id'] . ");' type='button' class='btn btn-danger'>eliminar</button>
                        </div>"
            ];
            $cont++;
        }
        $respuesta = $info_docentes;
//     
    } else {
        $respuesta = $info_docentes;
    }
}

if (filter_has_var(INPUT_POST, "agregardocente")) {
    if (isset($_POST['agregardocente']))
        extract($_POST);
    try {
        Conexion::ejecutar("insert into docentes (nombres,cedula,celular,carrera,usuario,clave,administrador) values (?,?,?,?,?,md5(?),?)",
                [$nombres, $cedula, $celular, $carrera, $usuario, $clave, filter_input(INPUT_POST, "administrador")?:0]);
        $respuesta['status'] = "correcto";
        $respuesta['mensaje'] = "Se agrego docente correctamente";
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "Error: " . $ex->getMessage();
    }
}

if (filter_has_var(INPUT_POST, "eliminardocente")) {
    try {
        Conexion::ejecutar("delete from docentes  where  id=?", [filter_input(INPUT_POST, "eliminardocente")]);
        $respuesta['status'] = "correcto";
        $respuesta['mensaje'] = "Se elimino docente correctamente";
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "error: " . $ex->getMessage();
    }
}

if (filter_has_var(INPUT_POST, "editardocente")) {
    try {
        $usuario = Conexion::buscarRegistro("select * from docentes where id=?", [filter_input(INPUT_POST, "editardocente")]);
        if ($usuario) {
            $respuesta['status'] = "correcto";
            $respuesta['docente'] = $usuario;
        } else {
            $respuesta['status'] = "error";
            $respuesta['mensaje'] = "Error: No se encontro información de este docente";
        }
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "Error: " . $ex->getMessage();
    }
}
if (filter_has_var(INPUT_POST, "actualizardocente")) {
    if (isset($_POST['actualizardocente']))
        extract($_POST);
    try {
        if (filter_input(INPUT_POST, "clave_") != "") {
            Conexion::ejecutar("update docentes set nombres=?,cedula=?,celular=?,carrera=?,usuario=?,clave=md5(?),administrador=? where id=?",
                    [
                        $nombres_,
                        $cedula_,
                        $celular_,
                        $carrera_,
                        $usuario_,
                        $clave_,
                        filter_input(INPUT_POST, "administrador_")?:0,
                        $iddocente
            ]);
            $respuesta['clave'] = "con";
        } else {
            Conexion::ejecutar("update docentes set nombres=?,cedula=?,celular=?,carrera=?,usuario=?,administrador=? where id=?",
                    [
                        $nombres_,
                        $cedula_,
                        $celular_,
                        $carrera_,
                        $usuario_,
                          filter_input(INPUT_POST, "administrador_")?:0 ,
                        $iddocente
            ]);
            $respuesta['clave'] = "sin";
        }

        $respuesta['status'] = "correcto";
        $respuesta['mensaje'] = "Se actualizo correctamente";
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "error: " . $ex->getMessage();
    }
}
echo json_encode($respuesta);
