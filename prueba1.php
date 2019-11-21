<?php
date_default_timezone_set("America/Guayaquil");
$fecha = date("Y-m-d");
        
        $date = date("Y-m-d");
        
        $new_fecha = date("Y-m-d", strtotime($date . "- 3 year"));
        if ($fecha > $new_fecha) {
            $respuesta['status'] = "ERROR";
            $respuesta['mensaje'] = "FECHA NO PERMITIDA";
            echo var_dump($respuesta);
        }
