<?php
include("php/dbconnect.php");
include("php/checklogin.php");

?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Reportes | Sistema de Matricula y Pensión</title>

        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/font-awesome.css" rel="stylesheet" />
        <link href="css/basic.css" rel="stylesheet" />
        <link href="css/custom.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

        <link href="css/ui.css" rel="stylesheet" />
        <link href="css/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" />
        <link href="css/datepicker.css" rel="stylesheet" />
        <link href="css/datatable.css" rel="stylesheet" />

        <script src="js/jquery-1.10.2.js"></script>
        <script type='text/javascript' src='js/jquery/jquery-ui-1.10.1.custom.min.js'></script>
        <script type="text/javascript" src="js/validation/jquery.validate.min.js"></script>

        <script src="js/jquery.dataTables.min.js"></script>

        <script language="Javascript">
          function imprSelec(myModal) {
            var ficha = document.getElementById(myModal);
            var ventimp = window.open(' ', 'popimpr');
            ventimp.document.write( ficha.innerHTML );
            ventimp.document.close();
            ventimp.print( );
            ventimp.close();
          }
        </script>

    </head>
    <?php
include("php/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Reportes</h1>
                    </div>

                    <div class="row" style="margin-bottom:20px;">
                        <div class="col-md-12">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Búsqueda:</legend>
                                <form class="form-inline" role="form" id="searchform">
                                    <div class="form-group">
                                        <label for="email">Nombre</label>
                                        <input type="text" class="form-control" id="student" name="student">
                                    </div>

                                    <div class="form-group">
                                        <label for="email"> Fecha de Búsqueda </label>
                                        <input type="text" class="form-control" id="doj" name="doj">
                                    </div>

                                    <div class="form-group">
                                        <label for="email"> Curso </label>
                                        <select class="form-control" id="branch" name="branch">
                                            <option value="">Seleccionar Curso</option>
                                            <?php
                  $sql = "select * from branch where delete_status='0' order by branch.branch asc";
                  $q = $conn->query($sql);

                  while($r = $q->fetch_assoc())
                  {
                  echo '<option value="'.$r['id'].'"  '.(($branch==$r['id'])?'selected="selected"':'').'>'.$r['branch'].'</option>';
                  }
                  ?>
                                        </select>
                                    </div>

                                    <button type="button" class="btn btn-success btn-sm" id="find"> Buscar </button>
                                    <button type="reset" class="btn btn-danger btn-sm" id="clear"> Limpiar </button>
                                </form>
                            </fieldset>

                        </div>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function() {

                            $("#doj").datepicker({

                                changeMonth: true,
                                changeYear: true,
                                showButtonPanel: true,
                                dateFormat: 'mm/yy',
                                onClose: function(dateText, inst) {
                                    var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                                    $(this).val($.datepicker.formatDate('MM yy', new Date(year, month, 1)));
                                }
                            });

                            $("#doj").focus(function() {
                                $(".ui-datepicker-calendar").hide();
                                $("#ui-datepicker-div").position({
                                    my: "center top",
                                    at: "center bottom",
                                    of: $(this)
                                });
                            });

                            $('#student').autocomplete({
                                source: function(request, response) {
                                    $.ajax({
                                        url: 'ajx.php',
                                        dataType: "json",
                                        data: {
                                            name_startsWith: request.term,
                                            type: 'report'
                                        },
                                        success: function(data) {

                                            response($.map(data, function(item) {

                                                return {
                                                    label: item,
                                                    value: item
                                                }
                                            }));
                                        }

                                    });
                                }

                            });

                            $('#find').click(function() {
                                mydatatable();
                            });

                            $('#clear').click(function() {

                                $('#searchform')[0].reset();
                                mydatatable();
                            });

                            function mydatatable() {

                                $("#subjectresult").html('<table class="table table-striped table-bordered table-hover" id="tSortable22"><thead><tr><th>Estudiante</th><th>Total Cobro</th><th>Saldo</th><th>Curso</th><th>DOJ</th><th>Action</th></tr></thead><tbody></tbody></table>');

                                $("#tSortable22").dataTable({
                                    'sPaginationType': 'full_numbers',
                                    "bLengthChange": false,
                                    "bFilter": false,
                                    "bInfo": false,
                                    'bProcessing': true,
                                    'bServerSide': true,
                                    'sAjaxSource': "datatable.php?" + $('#searchform').serialize() + "&type=report",
                                    'aoColumnDefs': [{
                                        'bSortable': false,
                                        'aTargets': [-1]
                                    }]
                                });

                            }
                            $("#tSortable22").dataTable({

                                'sPaginationType': 'full_numbers',
                                "bLengthChange": false,
                                "bFilter": false,
                                "bInfo": false,

                                'bProcessing': true,
                                'bServerSide': true,
                                'sAjaxSource': "datatable.php?type=report",

                                'aoColumnDefs': [{
                                    'bSortable': false,
                                    'aTargets': [-1]
                                }]
                            });
                        });

                        function GetFeeForm(sid) {

                            $.ajax({
                                type: 'post',
                                url: 'getfeeform.php',
                                data: {
                                    student: sid,
                                    req: '2'
                                },
                                success: function(data) {
                                    $('#formcontent').html(data);
                                    $("#myModal").modal({
                                        backdrop: "static"
                                    });
                                }
                            });

                        }
                    </script>

                    <style>
                        #doj .ui-datepicker-calendar {
                            display: none;
                        }
                    </style>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Administrar Reporte
                        </div>
                        <div class="panel-body">
                            <div class="table-sorting table-responsive" id="subjectresult">
                                <table class="table table-striped table-bordered table-hover" id="tSortable22">
                                    <thead>
                                        <tr>
                                            <th>Estudiante</th>
                                            <th>Total Cobro</th>
                                            <th>Saldo</th>
                                            <th>Curso</th>
                                            <th>Fecha de Registro</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Reporte</h4>
                                </div>
                                <div class="modal-body" id="formcontent">

                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:imprSelec('myModal')" class="btn btn-imprimir">Imprimir Detalles</a>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer-sec">
            Sistema de Matriculación y Pensiones en Linea
        </div>

        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.metisMenu.js"></script>
        <script src="js/custom1.js"></script>

        </body>

    </html>