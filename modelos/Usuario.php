<?php

require_once __DIR__ . '/../conexion.php';
if (!isset($_SESSION['u']['usuario'])) {
    session_start();
}

class Usuario {

    public static function ValidarUsuario($usuario, $clave) {
        $u = Conexion::buscarRegistro("select * from docentes where usuario=? and clave=?", [$usuario, md5($clave)]);
        if ($u) {
            $_SESSION['u'] = $u;
            return true;
        } else {
            throw new Exception("Credenciales incorrectas.");
        }
    }

}
