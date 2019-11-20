<?php
include("php/dbconnect.php");
include("php/checklogin.php");
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Sistema de Matriculación y Pensiones</title>

        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/font-awesome.css" rel="stylesheet" />
        <link href="css/basic.css" rel="stylesheet" />
        <link href="css/custom.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>

    <?php
include("php/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">

                <div class="row">

                    <div class="col-md-4">
                        <div class="main-box mb-1">
                            <a href="estudiantes.php">
                                <i class="fa fa-users fa-5x"></i>
                                <h5>Estudiantes</h5>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="main-box mb-2">
                            <a href="cobros.php">
                                <i class="fa fa-inr fa-5x"></i>
                                <h5>Matriculas y Pensiones</h5>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="main-box mb-3">
                            <a href="reportes.php">
                                <i class="fa fa-file-text fa-5x"></i>
                                <h5>Reportes</h5>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </div>

        <div id="footer-sec">
            Sistema de Matriculación y Pensiones en Linea
        </div>

        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.metisMenu.js"></script>
        <script src="js/custom1.js"></script>

        </body>

    </html>