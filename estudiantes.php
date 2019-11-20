<?php
include("php/dbconnect.php");
include("php/checklogin.php");
$errormsg = '';
$action = "add";

$id="";
$emailid='';
$sname='';
$joindate = '';
$remark='';
$contact='';
$balance = 0;
$fees='';
$matricula='';
$pension='';

$about = '';
$branch='';

if(isset($_POST['save']))
{

$sname = mysqli_real_escape_string($conn,$_POST['sname']);
$joindate = mysqli_real_escape_string($conn,$_POST['joindate']);

$contact = mysqli_real_escape_string($conn,$_POST['contact']);
$about = mysqli_real_escape_string($conn,$_POST['about']);
$emailid = mysqli_real_escape_string($conn,$_POST['emailid']);
$branch = mysqli_real_escape_string($conn,$_POST['branch']);

 if($_POST['action']=="add")
 {
 /*$remark = mysqli_real_escape_string($conn,$_POST['remark']);*/
 /*$fees = mysqli_real_escape_string($conn,$_POST['fees']);*/
 $matricula = mysqli_real_escape_string($conn,$_POST['matricula']);
 $pension = mysqli_real_escape_string($conn,$_POST['pension']);

 /*$advancefees = mysqli_real_escape_string($conn,$_POST['advancefees']);*/
 /*$balance = $fees-$advancefees;*/
 /*$totalgeneral = $balance+$pension;*/
 $insertfees = $matricula+($pension*10);

  $q1 = $conn->query("INSERT INTO student (sname,joindate,contact,about,emailid,branch,balance,fees,matricula,pension) VALUES ('$sname','$joindate','$contact','$about','$emailid','$branch','$insertfees','$insertfees','$matricula','$pension')") ;

  $sid = $conn->insert_id;

 /*$conn->query("INSERT INTO  fees_transaction (stdid,paid,submitdate,transcation_remark) VALUES ('$sid','$advancefees','$joindate','$remark')") ;*/

   echo '<script type="text/javascript">window.location="estudiantes.php?act=1";</script>';

 }else
  if($_POST['action']=="update")
 {
 $id = mysqli_real_escape_string($conn,$_POST['id']);   
   $sql = $conn->query("UPDATE  student  SET  branch  = '$branch', address  = '$address', detail  = '$detail'  WHERE  id  = '$id'");
   echo '<script type="text/javascript">window.location="estudiantes.php?act=2";</script>';
 }

}

if(isset($_GET['action']) && $_GET['action']=="delete"){

$conn->query("UPDATE  student set delete_status = '1'  WHERE id='".$_GET['id']."'");    
header("location: estudiantes.php?act=3");

}

$action = "add";
if(isset($_GET['action']) && $_GET['action']=="edit" ){
$id = isset($_GET['id'])?mysqli_real_escape_string($conn,$_GET['id']):'';

$sqlEdit = $conn->query("SELECT * FROM student WHERE id='".$id."'");
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

if(isset($_REQUEST['act']) && @$_REQUEST['act']=="1")
{
$errormsg = "<div class='alert alert-success'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Éxito!</strong> Estudiante agregado satisfactoriamente</div>";
}else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="2")
{
$errormsg = "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> <strong>Éxito!</strong> Estudiante editado satisfactoriamente</div>";
}
else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="3")
{
$errormsg = "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Éxito!</strong> Estudiante eliminado satisfactoriamente</div>";
}

?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Estudiantes | Sistema de Matricula y Pensión</title>

        <link href="css/bootstrap.css" rel="stylesheet" />
        <link href="css/font-awesome.css" rel="stylesheet" />
        <link href="css/basic.css" rel="stylesheet" />
        <link href="css/custom.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

        <link href="css/ui.css" rel="stylesheet" />
        <link href="css/datepicker.css" rel="stylesheet" />

        <script src="js/jquery-1.10.2.js"></script>

        <script type='text/javascript' src='js/jquery/jquery-ui-1.10.1.custom.min.js'></script>

    </head>
    <?php
include("php/header.php");
?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Estudiantes  
                        <?php echo (isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")?
                        ' <a href="estudiantes.php" class="btn btn-primary btn-sm pull-right">Atrás <i class="glyphicon glyphicon-arrow-right"></i></a>':'<a href="estudiantes.php?action=add" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Añadir </a>'; ?>
                        </h1>
                        <?php echo $errormsg; ?>
                    </div>
                </div>

                <?php 
         if(isset($_GET['action']) && @$_GET['action']=="add" || @$_GET['action']=="edit")
         {
        ?>
                    <script type="text/javascript" src="js/validation/jquery.validate.min.js"></script>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <?php echo ($action=="add")? "Añadir Estudiante": "Editar Estudiante"; ?>
                                </div>
                                <form action="estudiantes.php" method="post" id="signupForm1" class="form-horizontal">
                                    <div class="panel-body">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">Informacion Personal:</legend>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="Old">Nombres* </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="sname" name="sname" value="<?php echo $sname;?>" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="Old">Cédula* </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $contact;?>" maxlength="10" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="Old">Curso* </label>
                                                <div class="col-sm-10">
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
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="Old">Fecha de registro </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="joindate" name="joindate" value="<?php echo date(" Y-m-d ");?>" style="background-color: #fff;" readonly />
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">Informacion de pago:</legend>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="Old">Matricula* </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control  itemTotalNeto" id="matricula" name="matricula" value="<?php echo $matricula;?>" <?php echo ($action=="update" )? "disabled": ""; ?> />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="Old">Pensión mensual* </label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control  itemTotalNeto" id="pension" name="pension" value="<?php echo $pension;?>" <?php echo ($action=="update" )? "disabled": ""; ?> />
                                                </div>
                                            </div>

                                            <!--<div class="form-group">
                                                <label class="col-sm-2 control-label" for="Old">Total a Pagar</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="balance" name="balance" value="<?php echo $balance;?>" disabled />
                                                </div>
                                            </div>-->

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="Old">Total a Pagar</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="totalGeneral" name="balance" disabled />
                                                </div>
                                            </div>

                                        </fieldset>

                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border">Información opcional:</legend>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="Password">Acerca del estudiante </label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" id="about" name="about">
                                                        <?php echo $about;?>
                                                    </textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="Old">Email</label>
                                                <div class="col-sm-10">

                                                    <input type="text" class="form-control" id="emailid" name="emailid" value="<?php echo $emailid;?>" />
                                                </div>
                                            </div>
                                        </fieldset>

                                        <div class="form-group">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                                <input type="hidden" name="action" value="<?php echo $action;?>">

                                                <button type="submit" name="save" class="btn btn-primary">Guardar </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>

                    <script type="text/javascript">
                        $(document).ready(function() {

                                    $("#joindate").datepicker({
                                        dateFormat: "yy-mm-dd",
                                        changeMonth: true,
                                        changeYear: true,
                                        yearRange: "1970:<?php echo date('Y');?>"
                                    });

                                    if ($("#signupForm1").length > 0) {

                                        <?php if($action=='add')
                                     {
                                     ?>

                                        $("#signupForm1").validate({
                                                rules: {
                                                    sname: "required",
                                                    joindate: "required",
                                                    emailid: "email",
                                                    branch: "required",

                                                    contact: {
                                                        required: true,
                                                        digits: true
                                                    },

                                                    fees: {
                                                        required: true,
                                                        digits: true
                                                    },

                                                    advancefees: {
                                                        required: true,
                                                        digits: true
                                                    },

                                                },
                                                <?php
                                            }else
                                            {
                                            ?>

                                                $("#signupForm1").validate({
                                                    rules: {
                                                        sname: "required",
                                                        joindate: "required",
                                                        emailid: "email",
                                                        branch: "required",

                                                        contact: {
                                                            required: true,
                                                            digits: true
                                                        }

                                                    },

                                                    <?php
                                                    }
                                                    ?>

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

                                    items = document.getElementsByClassName("itemTotalNeto")
                                    
                                    for (var i = 0; i < items.length; i++) {
                                     items[i].addEventListener('change', function() {
                                      n = document.getElementById("totalGeneral");
                                      n.value = parseInt("0"+n.value) + parseInt("0"+this.value) - parseInt("0"+this.defaultValue);
                                     this.defaultValue = this.value;
                                     });
                                    };

                                    $("#matricula").keyup(function() {
                                        $("#advancefees").val("");
                                        $("#balance").val(0);
                                        var fee = $.trim($(this).val());
                                        if (fee != '' && !isNaN(fee)) {
                                            $("#advancefees").removeAttr("readonly");
                                            $("#balance").val(fee);
                                            $('#advancefees').rules("add", {
                                                max: parseInt(fee)
                                            });

                                        } else {
                                            $("#advancefees").attr("readonly", "readonly");
                                        }

                                    });

                                    $("#advancefees").keyup(function() {

                                        var advancefees = parseInt($.trim($(this).val()));
                                        var totalfee = parseInt($("#fees").val());
                                        if (advancefees != '' && !isNaN(advancefees) && advancefees <= totalfee) {
                                            var balance = totalfee - advancefees;
                                            $("#balance").val(balance);

                                        } else {
                                            $("#balance").val(totalfee);
                                        }

                                    });
                    </script>

                    <?php
        }else{
        ?>

                        <link href="css/datatable.css" rel="stylesheet" />

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Administra estudiante
                            </div>
                            <div class="panel-body">
                                <div class="table-sorting table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="tSortable22">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre/Contacto</th>
                                                <th>Fecha de Ingreso</th>
                                                <th>Matricula</th>
                                                <th>Pensión</th>
                                                <th>Total a Pagar</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                    $sql = "select * from student where delete_status='0'";
                                    $q = $conn->query($sql);
                                    $i=1;
                                    while($r = $q->fetch_assoc())
                                    {

                                    echo '<tr '.(($r['balance']>0)?'class="danger"':'').'>
                                            <td>'.$i.'</td>
                                            <td>'.$r['sname'].'<br/>'.$r['contact'].'</td>
                                            <td>'.date("d M y").'</td>
                                            <td>'.$r['matricula'].'</td>
                                            <td>'.$r['pension'].'</td>
                                            <td>'.$r['balance'].'</td>
                                            <td>

                                            <a href="estudiantes.php?action=edit&id='.$r['id'].'" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span></a>

                                            <a onclick="return confirm(\'Are you sure you want to delete this record\');" href="estudiantes.php?action=delete&id='.$r['id'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></a> </td>

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
                                    "bLengthChange": true,
                                    "bFilter": true,
                                    "bInfo": false,
                                    "bAutoWidth": true
                                });

                            });
                        </script>
                        <?php
                        }
                        ?>

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