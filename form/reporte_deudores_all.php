<?php
session_start();
require_once '../constantes.php';
require_once '../conexion.php';
iniciarPagina();
date_default_timezone_set("America/Guayaquil");

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <form method="POST" action="form/view_all_report.php" target="_blank">
            <div class="container d-flex justify-content-center">
                <div class="card w-50">
                    <div class="card-header h3">Pagos Pendientes</div>
                    <div class="card-body">
                        <div class="">
                            <label class="font-weight-bold">Meses * </label><br>
                            <select name="meses">
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="8">Septiembre</option>
                                <option value="1o">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>
                        <br>
                        <button type="submit" name="g_reporte" class="btn btn-success">Generar Reporte</button>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>

