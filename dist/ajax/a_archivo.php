<?php

require_once '../../conexion.php';

if (filter_has_var(INPUT_POST, "identificador")) {
    $archivos = Conexion::buscarVariosRegistro("select * from archivos where identificador=?", [filter_input(INPUT_POST, "identificador")]);
    echo "<form method='POST'>";
    echo "<table class='table table-striped'>";
    echo "<tbody>";
    foreach ($archivos as $a) {

        echo "<tr>";
        echo "<td class='align-middle'>{$a['archivo']}</td>";
        switch ($a['tipo']) {
            case "application/pdf":

                echo "<td><button class='btn btn-outline-light' formtarget='' formaction='descarga.php?ruta={$a['ruta']}'><img width='30px' src='dist/img/icon/icon_pdf.png'></button></td>";
                break;
            case "text/plain":
                echo "<td><button class='btn btn-outline-light' formtarget='' formaction='descarga.php?ruta={$a['ruta']}'><img width='30px' src='dist/img/icon/icon_txt.png'></button></td>";
                break;
            case "image/jpeg":
                echo "<td><button class='btn btn-outline-light' formtarget='' formaction='descarga.php?ruta={$a['ruta']}'><img width='30px' src='dist/img/icon/icon_imagen.png'></button></td>";
                break;
            case "image/png":
                echo "<td><button class='btn btn-outline-light' formtarget='' formaction='descarga.php?ruta={$a['ruta']}'><img width='30px' src='dist/img/icon/icon_imagen.png'></button></td>";
                break;
            case "image/jpg":
                echo "<td><button class='btn btn-outline-light' formtarget='' formaction='descarga.php?ruta={$a['ruta']}'><img width='30px' src='dist/img/icon/icon_imagen.png'></button></td>";
                break;
            case "image/gif":
                echo "<td><button class='btn btn-outline-light' formtarget='' formaction='descarga.php?ruta={$a['ruta']}'><img width='30px' src='dist/img/icon/icon_imagen.png'></button></td>";
                break;
            case "text/javascript":
                echo "<td><button class='btn btn-outline-light' formtarget='' formaction='descarga.php?ruta={$a['ruta']}'><img width='30px' src='dist/img/icon/icon_js.png'></button></td>";
                break;
            default:
                echo "<td><button class='btn btn-outline-light' formtarget='' formaction='descarga.php?ruta={$a['ruta']}'><img width='30px' src='dist/img/icon/icon_unknown.png'></button></td>";
                break;
        }

        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</form>";
}