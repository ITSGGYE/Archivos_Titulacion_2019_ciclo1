<?php
include("php/dbconnect.php");
include("php/checklogin.php");
$errormsg= '';
if(isset($_POST['save']))
{
$paid = mysqli_real_escape_string($conn,$_POST['paid']);
$submitdate = mysqli_real_escape_string($conn,$_POST['submitdate']);
$transcation_remark = mysqli_real_escape_string($conn,$_POST['transcation_remark']);
$sid = mysqli_real_escape_string($conn,$_POST['sid']);

$sql = "select fees,balance  from student where id = '$sid'";
$sq = $conn->query($sql);
$sr = $sq->fetch_assoc();
$totalfee = $sr['fees'];
if($sr['balance']>0)
{
$sql = "insert into fees_transaction(stdid,submitdate,transcation_remark,paid) values('$sid','$submitdate','$transcation_remark','$paid') ";
$conn->query($sql);
$sql = "SELECT sum(paid) as totalpaid FROM fees_transaction WHERE stdid = '$sid'";
$tpq = $conn->query($sql);
$tpr = $tpq->fetch_assoc();
$totalpaid = $tpr['totalpaid'];
$tbalance = $totalfee - $totalpaid;

$sql = "update student set balance='$tbalance' where id = '$sid'";
$conn->query($sql);

 echo '<script type="text/javascript">window.location="cobros.php?act=1";</script>';
}
}

if(isset($_REQUEST['act']) && @$_REQUEST['act']=="1")
{
$errormsg = "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Éxito!</strong> Cobro realizado satisfactoriamente</div>";
}

?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Cobros Matriculas y Pensiones| Sistema de Matricula y Pensión</title>

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

    </head>
    <?php
include("php/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Cobros Matriculas y Pensiones</h1>
                    </div>
                </div>

                <?php echo $errormsg;?>

                    <div class="row" style="margin-bottom:20px;">
                        <div class="col-md-12">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Búsqueda:</legend>
                                <form class="form-inline" role="form" id="searchform">
                                    <div class="form-group">
                                        <label for="email">Nombres</label>
                                        <input type="text" class="form-control" id="student" name="student">
                                    </div>

                                    <div class="form-group">
                                        <label for="email"> Fecha </label>
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
                                            type: 'studentname'
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

                                $("#subjectresult").html('<table class="table table-striped table-bordered table-hover" id="tSortable22"><thead><tr><th>Estudiante</th><th>Total Cobro</th><th>Saldo</th><th>Curso</th><th>DOJ</th><th>Accion</th></tr></thead><tbody></tbody></table>');

                                $("#tSortable22").dataTable({
                                    'sPaginationType': 'full_numbers',
                                    "bLengthChange": false,
                                    "bFilter": false,
                                    "bInfo": false,
                                    'bProcessing': true,
                                    'bServerSide': true,
                                    'sAjaxSource': "datatable.php?" + $('#searchform').serialize() + "&type=feesearch",
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
                                'sAjaxSource': "datatable.php?type=feesearch",

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
                                    req: '1'
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
                        <div class="panel-heading">Administrar Cobros</div>
                        <div class="panel-body">
                            <div class="table-sorting table-responsive" id="subjectresult">
                                <table class="table table-striped table-bordered table-hover" id="tSortable22">
                                    <thead>
                                        <tr>
                                            <th>Estudiante</th>
                                            <th>Total General</th>
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
                                    <h4 class="modal-title">Receptar cobros</h4>
                                </div>
                                <div class="modal-body" id="formcontent"></div>
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