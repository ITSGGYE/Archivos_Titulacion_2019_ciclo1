<?php
require_once 'session_active.php';
include "conn.php"; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <head>
        <?php include("header.php"); ?>
        <link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
        <link rel="stylesheet" href="css/style.css?nocache=" type="text/css" media="screen" rel="stylesheet" />
        <link type="text/css" href="css/bootstrap.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap.min.css?nocache=" > 
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css?nocache=" type="text/css" media="screen" />
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'    rel='stylesheet'>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../css/style-nave.css?nocache=" type="text/css" media="screen" />

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="content">
                        <?php
                        if (isset($_GET['action']) == 'delete') {
                            $id_delete = intval($_GET['id_historial']);
                            $query = mysqli_query($conn, "SELECT * FROM historial WHERE id_historial='$id_delete'");
                            if (mysqli_num_rows($query) == 0) {
                                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
                            } else {
                                $delete = mysqli_query($conn, "DELETE FROM historial WHERE id_historial='$id_delete'");
                                if ($delete) {
                                    echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los datos han sido eliminados correctamente.</div>';
                                } else {
                                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
                                }
                            }
                        }
                        ?>
                        <p><br>
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <div class="pull-right">
                                    <a href="reg_historial.php" class="btn btn-sm btn-primary">Nuevo Historial</a>
                                </div><br>
                                <hr>
                                <table id="lookup" class="table table-bordered table-hover">  
                                    <thead bgcolor="#eeeeee" align="center">
                                        <tr>

                                            <th>ID</th>
                                            <th>Fecha</th>
                                            <th>Paciente</th>
                                            <th>Representante / Dueño</th>
                                            <th>Especie</th>
                                            <th>Registro</th>
                                            <th>Medicamentos</th>
                                            <th>Atendido Por:</th>
                                            <th class="text-center"> Acciones </th> 

                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->

        <!--/.wrapper--><br />


        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                var dataTable = $('#lookup').DataTable({

                    "language": {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
                        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    },

                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        url: "ajax-grid-data.php", // json datasource
                        type: "post", // method  , by default get
                        error: function () {  // error handling
                            $(".lookup-error").html("");
                            $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#lookup_processing").css("display", "none");

                        }
                    }
                });
            });
        </script>
        <style>
            body{
                background-image: url('./images/fondo 3.jpg');
            }
        </style>
    </body>
