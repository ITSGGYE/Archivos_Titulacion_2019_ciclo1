<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Firebase\JWT\JWT;

class Pension {

    static function MesesDisponibles() {
        return [
            1 => "Enero",
            2 => "Febrero",
            3 => "Marzo",
            4 => "Abril",
            5 => "Mayo",
            6 => "Junio",
            7 => "Julio",
            8 => "Agosto",
            9 => "Septiembre",
            10 => "Octubre",
            11 => "Noviembre",
            12 => "Diciembre",
        ];
    }

    static function AñosDisponible() {
        $años = Conexion::buscarVariosRegistro("select distinct(anio) from pension_cab g", []);
        return array_column($años, 'anio');
    }

    static function Generar($mes) {
        $key = "Key ultra secreta";
        $key2 = "otra key ultra secreta";
        $existe_mes = Conexion::buscarRegistro("select *from pension_cab where anio=? and mes =?", [date('Y'), $mes]);
        if ($existe_mes) {
            throw new Exception("Ya se ha generado pensión para ese mes.");
        }
        $estudiantes = Conexion::buscarVariosRegistro("select * from estudiantes where estado='1'", []);
        if (count($estudiantes) == 0) {
            throw new Exception("No hay estudiantes para generar pensión.");
        }
        $precios = Conexion::buscarVariosRegistro("select * from precios", []);
        if (count($precios) == 0) {
            throw new Exception("No se ha definido los precios por año para la generación de pensiones.");
        }
        foreach ($precios as $p) {
            if ($p['precio'] <= 0 || $p['precio'] == "" || is_null($p['precio'])) {
                throw new Exception("El precio de pension para el año: " . $p['anio'] . " no se definido o su valor es igual a 0. ");
            }
        }
        Conexion::ejecutar("insert into pension_cab (anio,mes,usuario_create) values(?,?,?)", [date('Y'), $mes, $_SESSION['u']['usuario']]);

        $id = Conexion::LastID();
        $valor_total = 0;
        foreach ($estudiantes as $e) {
            $token = array(
                "alg" => "HS256",
                "typ" => "JWT",
                "data" => [
                    "curso" => $e['curso'],
                    "id" => $e['id'],
                    "anio" => $e['anio_actual'],
                //"nombres" => $e['nombres'],
                ]
            );
            $jwt_1 = JWT::encode($token, $key);
            $jwt_2 = JWT::encode($token, $key2);
            $indice_precio = array_search($e['anio_actual'], array_column($precios, 'anio'));

            Conexion::ejecutar("insert into pension_det (idpension,idestudiante,anio_curso,curso,total,token_genera,token_valida)"
                    . " values(?,?,?,?,?,?,?)",
                    [$id, $e['id'], $e['anio_actual'], $e['curso'], $precios[$indice_precio]['precio'], $jwt_1, $jwt_2]);
            $valor_total = $valor_total + $precios[$indice_precio]['precio'];
        }
        Conexion::ejecutar("update pension_cab set total=? where id=?", [$valor_total, $id]);
    }

}
