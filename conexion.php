<?php

require_once __DIR__ . "/config.php";

class Conexion {

    private static $conexion;

    public static function abrir() {
        if (!isset(self::$conexion)) {
            try {
                self::$conexion = new PDO("mysql:host=" . servidor . "; dbname=" . db, usuario, contrasena);
               
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                self::$conexion->exec("SET NAMES 'UTF8'");
            } catch (Exception $ex) {
                print 'Error :' . $ex->getMessage() . "<br>";
            }
        }
    }

    public static function cerrar() {
        if (!isset(self::$conexion)) {
            self::$conexion = null;
        }
    }

    public static function obtenerConexion() {
        self::abrir();
        return self::$conexion;
    }

    public static function buscarRegistro($sql, $data = null) {
       
        $con = self::obtenerConexion();
        $rs = $con->prepare($sql);
        $rs->execute($data);
        return $rs->fetch();

    }

    public static function buscarVariosRegistro($sql, $data = null) {
     
        try {
            $con = self::obtenerConexion();
            $rs = $con->prepare($sql);
            $rs->execute($data);
            return $rs->fetchAll();
        } catch (Exception $ex) {
            echo "Error: " . $ex->getMessage();
        }
    }

    public static function ejecutar($sql, $data) {

        $con = self::obtenerConexion();
        $rs = $con->prepare($sql);
        if ($rs->execute($data)) {
            return true;
        }
        return false;
    }

    public static function LastID() {
        $con = self::obtenerConexion();
        $id = $con->lastInsertId();
        return $id;
    }

}
