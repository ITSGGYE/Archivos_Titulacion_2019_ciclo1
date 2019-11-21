<?php

require_once '../conexion.php';

class Matricula {

    static function Listar() {
        return Conexion::buscarVariosRegistro("select m.id,e.apellidos,e.nombres,m.fecha "
                . " from matriculas m"
                . " inner join estudiantes e on m.idestudiante=e.id "
                . " where m.estado=1 order by fecha desc", []);
    }

}
