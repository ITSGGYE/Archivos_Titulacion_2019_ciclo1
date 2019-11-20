<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
if ($_SESSION["loggedin"] != true) {
    header("location: login.php");
} else {
    // echo("entraste");
}
class conectar
{
    public function conexion()
    {
        $conexion = mysqli_connect('localhost', 'root', '', 'puntofrio');
        $conexion->set_charset('utf8');
        return $conexion;
    }
}
$id = $_SESSION['id']; 
$obj      = new conectar();
$conexion = $obj->conexion();
$sql      = "SELECT * from clientes where id_clientes = $id";
    
$result = mysqli_query($conexion, $sql);
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>PUNTO FRIO CONTACTOS</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <!-- ===== Animation CSS ===== -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="mini-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- ===== Top-Navigation ===== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="top-left-part">
                    <a class="logo">
                        <h4 class="text-center text-white"><img src="img/13.jpg" width="30" height="30" class="d-inline-block align-top" alt=""> PUNTO FRIO</h4>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li>
                        <a href="javascript:void(0)" class="sidebartoggler font-20 waves-effect waves-light"><i class="icon-arrow-left-circle"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- ===== Top-Navigation-End ===== -->
        <!-- ===== Left-Sidebar ===== -->
        <?php include 'menuUsuario.php'; ?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- .row -->
                <div class="row">
<!--                     <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="../plugins/images/large/img1.jpg"> </div>
                        </div>
                    </div> -->
                    <div class="col-md-12 col-xs-12">
                        <div class="white-box">
                            <!-- .tabs -->
                            <ul class="nav nav-tabs tabs customtab">
                                <li class="active tab">
                                    <a href="#profile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Perfil</span> </a>
                                </li>
                                <li class="tab">
                                    <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Editar Perfil</span> </a>
                                </li>
                            </ul>
                            <!-- /.tabs -->
                            <div class="tab-content">
                                <!-- .tabs 1 -->
                                
                                <!-- /.tabs1 -->
                                <!-- .tabs2 -->
                                <div class="tab-pane active" id="profile">
                                    <div class="row">
                                        <div class="modal-body">
                                            <?php  
                                            while ($mostrar = mysqli_fetch_row($result)) { 
                                            ?>

                                            <h3>Nombre:</h3><?php echo $mostrar[1] ?> <br>
                                            <h3>Correo:</h3><?php echo $mostrar[2] ?><br>
                                            <h3>Teléfono:</h3><?php echo $mostrar[3] ?><br>
                                            <h3>Dirección:</h3><?php echo $mostrar[4] ?><br>

                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- /.tabs2 -->
                                <!-- .tabs3 -->
                                <div class="tab-pane" id="settings">
                                        <div class="modal-body">

                                            
                                            <form action="" id="actualizarr" name="frmAgregarDatos" method="POST" >
                                                    <input type="hidden" name="idjuego" value="<?php echo $mostrar[0] ?>">
                                                    <label>Nombre</label>
                                                    <input type="text" value="<?php echo $mostrar[1] ?>" id="nombre" name="nombreU" class="form-control form-control-sm">
                                                    <label>Correo</label>
                                                    <input type="email" id="correo" value="<?php echo $mostrar[2] ?>" name="correoU" class="form-control form-control-sm">
                                                    <label>Teléfono</label>
                                                    <input type="number" id="telefono" value="<?php echo $mostrar[3] ?>" name="telefonoU" class="form-control form-control-sm validanumericos">
                                                    <label>Dirección</label>
                                                    <input type="text" id="direccion" value="<?php echo $mostrar[4] ?>" name="direccionU" class="form-control form-control-sm">
                                                    <input type="submit" class="d-none">
                                            </form>
                                            <?php }  ?>
                                        </div>
                                        <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button> -->
                                            <button type="button" class="btn btn-warning" data-dismiss="modal" id="btnActualizar">Actualizar</button>
                                        </div>
                                    
                                </div>
                                <!-- /.tabs3 -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer t-a-c">
                © 2019 PUNTO FRIO
            </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
   <script src="https://code.jquery.com/jquery-2.2.4.min.js"  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="  crossorigin="anonymous"></script>
    <script src="js/toastr.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="js/sidebarmenu.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
    <script src="js/funciones.js"></script>
    <script type="text/javascript">


      $(function() {
        $('#nombre,#paterno,#materno,#nombreu,#paternou,#maternou').keydown(function (e) {
          if (e.shiftKey || e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
            if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
              e.preventDefault(); 
            }
          }
        });
     });

        onload = function(){ 
        var ele = document.querySelectorAll('.validanumericos')[0];
        ele.onkeypress = function(e) {
            if(isNaN(this.value+String.fromCharCode(e.charCode)))
                return false;
          }
          ele.onpaste = function(e){
             e.preventDefault();
          }
        }

       $('#btnActualizar').click(function(){
           datoss = $('#actualizarr').serialize();

           $.ajax({
               type:"POST",
               data:datoss,
               url:"procesos/actualizarperfil.php",
               // dataType:'json',
               success:function(response){
                    $("#actualizarr").append('<div class="alert alert-success" role="alert">'+response+' </div>');
                
                    setTimeout(function(){ $(".alert").addClass("d-none"); }, 3000);
               }
            });
       });

    </script>
</body>

</html>
