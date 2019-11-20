<?php
include("php/dbconnect.php");
include("php/checklogin.php");
$errormsg = '';
$action = "add";

$branch='';
$address='';
$detail = '';
$id= '';

$action = "add";
if(isset($_GET['action']) && $_GET['action']=="edit" ){
$id = isset($_GET['id'])?mysqli_real_escape_string($conn,$_GET['id']):'';

$sqlEdit = $conn->query("SELECT * FROM branch WHERE id='".$id."'");
if($sqlEdit->num_rows)
{
$rowsEdit = $sqlEdit->fetch_assoc();
extract($rowsEdit);
$action = "update";
}else
{
$_GET['action']="";
}
}

?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Cursos | Sistema de Matricula y Pensión</title>

        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/font-awesome.css" rel="stylesheet" />
        <link href="css/basic.css" rel="stylesheet" />
        <link href="css/custom.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

        <script src="js/jquery-1.10.2.js"></script>

    </head>
    <?php
include("php/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Cursos
            <?php
            echo (isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")?
            ' <a href="endyear.php" class="btn btn-primary btn-sm pull-right">Atrás <i class="glyphicon glyphicon-arrow-right"></i></a>':'<a href="cursos.php?action=add" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar </a>';
            ?>
            </h1>

                        <?php

echo $errormsg;
?>
                    </div>
                </div>

                <?php
     if(isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")
     {
    ?>

                    <script type="text/javascript" src="js/validation/jquery.validate.min.js"></script>

                    <script type="text/javascript">
                        $(document).ready(function() {

                            if ($("#signupForm1").length > 0) {
                                $("#signupForm1").validate({
                                    rules: {
                                        branch: "required",
                                        address: "required"

                                    },
                                    messages: {
                                        branch: "Por favor ingrese curso",
                                        address: "Por favor ingrese paralelo"

                                    },
                                    errorElement: "em",
                                    errorPlacement: function(error, element) {

                                        error.addClass("help-block");

                                        element.parents(".col-sm-10").addClass("has-feedback");

                                        if (element.prop("type") === "checkbox") {
                                            error.insertAfter(element.parent("label"));
                                        } else {
                                            error.insertAfter(element);
                                        }

                                        if (!element.next("span")[0]) {
                                            $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
                                        }
                                    },
                                    success: function(label, element) {

                                        if (!$(element).next("span")[0]) {
                                            $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
                                        }
                                    },
                                    highlight: function(element, errorClass, validClass) {
                                        $(element).parents(".col-sm-10").addClass("has-error").removeClass("has-success");
                                        $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
                                    },
                                    unhighlight: function(element, errorClass, validClass) {
                                        $(element).parents(".col-sm-10").addClass("has-success").removeClass("has-error");
                                        $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
                                    }
                                });

                            }

                        });
                    </script>

                    <?php
    }else{
    ?>

                        <link href="css/datatable.css" rel="stylesheet" />

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Administrar curso
                            </div>
                            <div class="panel-body">
                                <div class="table-sorting table-responsive">

                                    <table class="table table-striped table-bordered table-hover" id="tSortable22">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Curso</th>
                                                <th>Paralelo</th>
                                                <th>Detalle</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                  $sql = "select * from branch where delete_status='0'";
                  $q = $conn->query($sql);
                  $i=1;
                  while($r = $q->fetch_assoc())
                  {
                  echo '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$r['branch'].'</td>
                                            <td>'.$r['address'].'</td>
                                            <td>'.$r['detail'].'</td>
                      <td>
                      <a href="cursos.php?action=edit&id='.$r['id'].'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>

                      <a onclick="return confirm(\'Are you sure you want to delete this record\');" href="cursos.php?action=delete&id='.$r['id'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a> </td>
                                        </tr>';
                    $i++;
                  }
                  ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <script src="js/jquery.dataTables.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                $('#tSortable22').dataTable({
                                    "bPaginate": true,
                                    "bLengthChange": false,
                                    "bFilter": true,
                                    "bInfo": false,
                                    "bAutoWidth": true
                                });

                            });
                        </script>

                        <?php
    }
    ?>

                            <script type="text/javascript">
                                $(document).ready(function() {

                                    /******************/
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

                                        $("#subjectresult").html('<table class="table table-striped table-bordered table-hover" id="tSortable22"><thead><tr><th>Estudiante</th><th>Total Cobro</th><th>Saldo</th><th>Curso</th><th>DOJ</th></tr></thead><tbody></tbody></table>');

                                        $("#tSortable22").dataTable({
                                            'sPaginationType': 'full_numbers',
                                            "bLengthChange": false,
                                            "bFilter": false,
                                            "bInfo": false,
                                            'bProcessing': true,
                                            'bServerSide': true,
                                            'sAjaxSource': "datatablegeneral.php?" + $('#searchform').serialize() + "&type=report",
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
                                        'sAjaxSource': "datatablegeneral.php?type=report",

                                        'aoColumnDefs': [{
                                            'bSortable': false,
                                            'aTargets': [-1]
                                        }]
                                    });
                                });
                            </script>

                            <style>
                                #doj .ui-datepicker-calendar {
                                    display: none;
                                }
                            </style>

                            <?php

            ?>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Alumnos de los Cursos selecionados
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
                                                <h4 class="modal-title">Reporte por Curso</h4>
                                            </div>
                                            <div class="modal-body" id="formcontent">

                                            </div>
                                            <div class="modal-footer">
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