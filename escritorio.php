<?php

    session_start();

$id = $_SESSION['rol']; 
if($id != 0){

     $_SESSION = array();
     session_destroy();
     header("location: login.php");
     exit(); 
}else{
   // session_start();
}

if ($_SESSION["loggedin"] != true) {
    header("location: login.php");
} else {
    // echo("entraste");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>PUNTO FRIO ADMIN</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <!-- ===== Animation CSS ===== -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="css/style.css" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
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
        <?php include 'menu.php';?>
        <!-- ===== Left-Sidebar-End ===== -->
        <!-- Page Content -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row colorbox-group-widget ">
                    <div class="col-md-3 col-sm-6 info-color-box">
                        <div class="white-box">
                            <div class="media bg-primary">
                                <div class="media-body">
                                    <h3 class="info-count">Creemos<span class="pull-right"><i class="mdi mdi-checkbox-marked-circle-outline"></i></span></h3>
                                    <p class="info-text font-12">Estamos contigo </p>
                                    <p class="info-ot font-15">PUNTO FRIO</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 info-color-box">
                        <div class="white-box">
                            <div class="media bg-success">
                                <div class="media-body">
                                    <h3 class="info-count">Siguenos <span class="pull-right"><i class="mdi mdi-comment-text-outline"></i></span></h3>
                                    <p class="info-text font-12">En todas nuestras redes</p>
                                    <p class="info-ot font-15"> <span class="fab fa-youtube"></span> <span class="fab fa-facebook"></span> <span class="fab fa-instagram"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 info-color-box">
                        <div class="white-box">
                            <div class="media bg-danger">
                                <div class="media-body">
                                    <h3 class="info-count">Proforma <span class="pull-right"><i class="mdi mdi-coin"></i></span></h3>
                                    <p class="info-text font-12">Somos tú solución</p>
                                    <p class="info-ot font-15">Confiamos en ti</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 info-color-box">
                        <div class="white-box">
                            <div class="media bg-warning">
                                <div class="media-body">
                                    <h3 class="info-count">Garantia <span class="pull-right"><i class="mdi mdi-coin"></i></span></h3>
                                    <p class="info-text font-12">Es nuestra prioridad</p>
                                    <p class="info-ot font-15">De Lunes a Sabado: <span class="far fa-clock"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-sm-12">
                        <div class="white-box upload-widget2">
                            <h4 class="box-title text-center">Introducción</h4>
                            <ul class="up-file m-t-20">
                                <li>
                                    <i class="icon-people"></i>
                                    <div class="up-file-progress">
                                        <span>Crea tu perfil</span>
                                        <span class="pull-right">24%</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 24%">
                                                <span class="sr-only">34% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <i class="icon-basket-loaded"></i>
                                    <div class="up-file-progress">
                                        <span>Añade tus servicios</span>
                                        <span class="pull-right">47%</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 47%">
                                                <span class="sr-only">67% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <i class="icon-docs"></i>
                                    <div class="up-file-progress">
                                        <span>Descarga tu proforma.pdf</span>
                                        <span class="pull-right">29%</span>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 29%">
                                                <span class="sr-only">15% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="white-box upload-widget">
                            <div class="t-a-c"><br>
                                <img src="img/7.jpg" class="card-img-top" alt="...">
                                <p class="font-20 m-b-0">La mejor opción en tus manos</p>
                                <p class="text-primary font-semibold font-18">´Con repuestos originales</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="white-box album-widget text-center">
                            <h4 class="box-title text-center">Te Esperamos</h4>               
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.0807321132406!2d-79.90270718567037!3d-2.122608837707827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d6d46385d0513%3A0x286f198b4fe0faf5!2sPunto+Frio!5e0!3m2!1ses!2sec!4v1559483833001!5m2!1ses!2sec" width="300" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>   
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer t-a-c"> © 2019 PUNTO FRIO

            </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- ==============================
        Required JS Files
    =============================== -->
    <!-- ===== jQuery ===== -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="  crossorigin="anonymous"></script>
    <!-- ===== Bootstrap JavaScript ===== -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ===== Slimscroll JavaScript ===== -->
    <script src="js/jquery.slimscroll.js"></script>
    <!-- ===== Wave Effects JavaScript ===== -->
    <script src="js/waves.js"></script>
    <!-- ===== Menu Plugin JavaScript ===== -->
    <script src="js/sidebarmenu.js"></script>
    <!-- ===== Custom JavaScript ===== -->
    <script src="js/custom.js"></script>
    <!-- ===== Plugin JS ===== -->
    <!-- ===== Style Switcher JS ===== -->
    <script src="../plugins/components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
