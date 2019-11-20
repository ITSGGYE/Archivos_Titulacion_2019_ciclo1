<?php
include("php/dbconnect.php");
include("php/checklogin.php");
$errormsg = '';
$action = "add";

$branch='';
$address='';
$detail = '';
$id= '';
if(isset($_POST['save']))
{

$branch = mysqli_real_escape_string($conn,$_POST['branch']);
$address = mysqli_real_escape_string($conn,$_POST['address']);
$detail = mysqli_real_escape_string($conn,$_POST['detail']);

 if($_POST['action']=="add")
 {

  $sql = $conn->query("INSERT INTO branch (branch,address,detail) VALUES ('$branch','$address','$detail')") ;

    echo '<script type="text/javascript">window.location="cursos.php?act=1";</script>';

 }else
  if($_POST['action']=="update")
 {
 $id = mysqli_real_escape_string($conn,$_POST['id']);
   $sql = $conn->query("UPDATE  branch  SET  branch  = '$branch', address  = '$address', detail  = '$detail'  WHERE  id  = '$id'");
   echo '<script type="text/javascript">window.location="cursos.php?act=2";</script>';
 }
}

if(isset($_GET['action']) && $_GET['action']=="delete"){

$conn->query("UPDATE  branch set delete_status = '1'  WHERE id='".$_GET['id']."'");
header("location: cursos.php?act=3");

}

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

if(isset($_REQUEST['act']) && @$_REQUEST['act']=="1")
{
$errormsg = "<div class='alert alert-success'><strong>Éxito!</strong> Curso agregado satisfactoriamente</div>";
}else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="2")
{
$errormsg = "<div class='alert alert-success'><strong>Éxito!</strong> Curso editado satisfactoriamente</div>";
}
else if(isset($_REQUEST['act']) && @$_REQUEST['act']=="3")
{
$errormsg = "<div class='alert alert-success'><strong>Éxito!</strong> Curso eliminado satisfactoriamente</div>";
}

?>

    <!DOCTYPE html>
    }<html lang="es">

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
						' <a href="cursos.php" class="btn btn-primary btn-sm pull-right">Atrás <i class="glyphicon glyphicon-arrow-right"></i></a>':'<a href="cursos.php?action=add" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar </a>';
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
                    <div class="row">

                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <?php echo ($action=="add")? "Agregar curso": "Editar curso"; ?>
                                </div>
                                <form action="cursos.php" method="post" id="signupForm1" class="form-horizontal">
                                    <div class="panel-body">

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Curso </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="branch" name="branch" value="<?php echo $branch;?>" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Password"> Paralelo </label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="address" name="address">
                                                    <?php echo $address;?>
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Confirm"> Detalles</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="detail" id="detail">
                                                    <?php echo $detail;?>
                                                </textarea>
                                            </div>
                                        </div>

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