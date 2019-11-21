<?php

require_once '../../conexion.php';
require_once '../../modelos/Usuario.php';
if (!isset($_SESSION['u'])) {
    session_start();
}
$respuesta;
if (filter_has_var(INPUT_POST, "usuario") && filter_has_var(INPUT_POST, "clave")) {
    extract($_POST);
    try {

        $usuario_validar = Conexion::buscarRegistro("select *from usuarios where usuario=? and clave=?", [$usuario, md5($clave)]);
            if ($usuario_validar) {
            //session_start();
            $_SESSION['u'] = $usuario_validar;
            try {
                Conexion::ejecutar("insert into ingreso_usuarios (idusuario,fecha) values (?,current_timestamp)", [$usuario_validar['id']]);
            } catch (Exception $ex) {
                
            }
            $respuesta['status'] = "correcto";
            $respuesta['usuario'] = $usuario_validar;
        } else {
            $usuario_validar = Conexion::buscarRegistro("select *from estudiantes where identificador=? and  identificador=?", [$usuario, $clave]);
            if ($usuario_validar) {
                if ($usuario_validar['estado'] == 1) {
                    $_SESSION['u'] = $usuario_validar;
                    $_SESSION['u']['usuario'] = "Estudiante - " . $usuario_validar['apellidos'] . " " . $usuario_validar['nombres'];
                    $_SESSION['u']['idrol'] = "3";

                    $respuesta['status'] = "correcto";
                    $respuesta['usuario'] = $usuario_validar;
                } else {
                    $respuesta['status'] = "error";
                    $respuesta['mensaje'] = "Este usuario esta inactivo.";
                }
            } else {
                $respuesta['status'] = "error";
                $respuesta['mensaje'] = "Credenciales incorrectas, intentelo de nuevo ";
            }
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

if (filter_has_var(INPUT_GET, "listausuarios")) {

    $usuarios = Conexion::buscarVariosRegistro("select *from usuarios where estado='1'");
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
            $roles = Usuario::roles();
            $info_usuario[] = [
                "#" => "" . $cont,
                "usuario" => $u['usuario'],
                "nombre" => $u['nombres'] . " " . $u['apellidos'],
                "rol" => $roles[$u['idrol']],
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

if (filter_has_var(INPUT_POST, "agregarusuario")) {
    if (isset($_POST['agregarusuario']))
        extract($_POST);
    try {
        Conexion::ejecutar("insert into usuarios (usuario,clave,idrol,fecha_create,usuario_create,nombres,apellidos) "
                . "values (?,?,?,current_timestamp,?,?,?)", [$txtusuario, md5($txtcontrasena), $idrol, $_SESSION['u']['usuario'], $txtnombres, $txtapellidos]);
        $respuesta['status'] = "correcto";
        $respuesta['mensaje'] = "Se agrego usuario correctamente";
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "error: " . $ex->getMessage();
    }
}

if (filter_has_var(INPUT_POST, "eliminarusuario")) {
    try {
        Conexion::ejecutar("update usuarios set estado='0',fecha_delete=current_timestamp,usuario_delete=? where id=?", [$_SESSION['u']['usuario'], filter_input(INPUT_POST, "eliminarusuario")]);
        $respuesta['status'] = "correcto";
        $respuesta['mensaje'] = "Se elimino usuario correctamente";
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "error: " . $ex->getMessage();
    }
}

if (filter_has_var(INPUT_POST, "editarusuario")) {
    try {
        $usuario = Conexion::buscarRegistro("select * from usuarios where id=?", [filter_input(INPUT_POST, "editarusuario")]);
        if ($usuario) {
            $respuesta['status'] = "correcto";
            $respuesta['usuario'] = $usuario;
        } else {
            $respuesta['status'] = "error";
            $respuesta['mensaje'] = "Error: No se encontro información de este usuario";
        }
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "Error: " . $ex->getMessage();
    }
}

if (filter_has_var(INPUT_POST, "actualizarusuario")) {
    if (isset($_POST['actualizarusuario']))
        extract($_POST);
    try {
        Conexion::ejecutar("update usuarios set usuario=?,nombres=?,apellidos=?,idrol=?,clave=?,usuario_update=?,fecha_update=current_timestamp where id=?",
                [
                    $txt_usuario,
                    $txt_nombres,
                    $txt_apellidos,
                    $id_rol,
                    $txt_contrasena,
                    $_SESSION['u']['usuario'],
                    $idusuario,
        ]);
        $respuesta['status'] = "correcto";
        $respuesta['mensaje'] = "Se actualizo correctamente";
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "error: " . $ex->getMessage();
    }
}
if (filter_has_var(INPUT_POST, "cerrarsesion")) {
    try {
        unset($_SESSION['u']);
        session_destroy();
        $respuesta['status'] = "correcto";
    } catch (Exception $ex) {
        $respuesta['status'] = "error";
        $respuesta['mensaje'] = "Error al eliminar sesion: " . $ex->getMessage();
    }
}
header('Content-Type: application/json');
echo json_encode($respuesta);


