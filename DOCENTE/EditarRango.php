<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Rangos</title>
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../js/ListadoEstudiantes.js" type="text/javascript"></script>
        <script src="../js/llenar_ComboPeriodo.js" type="text/javascript"></script>
        <script src="../js/Proceso1.js" type="text/javascript"></script>
        <script src="../js/ConsultaRangos.js" type="text/javascript"></script>
        <script src="../js/GuardarRango.js" type="text/javascript"></script>
        <script src="../js/EliminarRango.js" type="text/javascript"></script>
        <script src="../js/EditarRango.js" type="text/javascript"></script>

        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <!-- Custom styles for this template -->
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <link href="../css/stylecofgNotas.css" rel="stylesheet" type="text/css"/>

    </head>
    <body id="page-top">

        <?php
        session_start(); //creamos una variable local de tipo sesion
        require '../Conexion/config.php'; //importamos nuestro archivo de configuracion que contiene el nombre, usuario y contraseña de la base de datos
        require '../Conexion/functions.php';
        require '../Models/ModelConsultaIdRango.php';

        $conexion = conexion($bd_config);
        $usuario = iniciarSession('usuarios', $conexion);

        $nombre = $usuario['usuario'];
        if (!isset($_SESSION['usuario'])) {// si no esta seteada la variable usuario o sea si esta vacia lo redireccionara a..
          header('Location: '.RUTA.'login.php');
        }
        
        $id= $_GET['id'];
        $data = ConsultaRangoId($id,$conexion);
        
        date_default_timezone_set('America/Guayaquil');

        $fecharegistro = date("Y-m-d H:i:s");
        ?>
        <!-- Page Wrapper -->
        <div id="wrapper">

                  <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">ADMIN <sup></sup></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="../admin.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Menu Principal</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Menu
                </div>


                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Inicio Sesión</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pantallas de sesión:</h6>
                            <a class="collapse-item" href="<?php echo RUTA . 'close.php' ?>">Login</a>
                            <a class="collapse-item" href="DOCENTE/Registro.php">Registro</a>
                           
                        </div>
                    </div>
                </li>
                
                 <!-- Nav Item - Periodos -->
                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Periodos" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fa fa-calendar"></i>
                        <span>Periódos</span>
                    </a>
                    <div id="Periodos" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Periódos:</h6>
                            <a class="collapse-item" href="Periodos.php">Configuración</a>
                            <a class="collapse-item" href="Rangos.php">Rangos</a>

                        </div>
                    </div>
                </li> 
                 <!-- Nav Item - Asistencia -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Asistencia" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fa fa-users"></i>
                        <span>Asistencia</span>
                    </a>
                    <div id="Asistencia" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Asistencia:</h6>
                            <a class="collapse-item" href="IngresoAsistencias.php">Ingreso</a>
                            <a class="collapse-item" href='Listado_AsistenciaEstudiante.php'>Consulta</a>

                        </div>
                    </div>
                </li>
                
                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="ListadoEstudiantes.php">
                        <i class="fa fa-users"></i>
                        <span>Estudiantes</span></a>
                </li>
                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="EnviarCorreoElectronico.php">
                        <i class="fa fa-envelope"></i>
                        <span>Enviar Correos</span></a>
                </li>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Notas</span>
                    </a>
                    <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Notas:</h6>
                            <a class="collapse-item" href="ConfiguracionNotas.php">Configuración notas</a>
                            <a class="collapse-item" href="IngresoNotas.php">Ingresar Notas</a>
                            <a class="collapse-item" href="ListadoNotas.php">Listado Notas</a>
                        </div>
                    </div>
                </li>
                <!-- Nav Item - calendar -->
                <li class="nav-item">
                    <a class="nav-link" href="CalendarioWeb.php">
                        <i class="fa fa-calendar"></i>
                        <span>Agenda de Tareas</span></a>
                </li>
                
                
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>



                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <li class="nav-item dropdown no-arrow mx-1">

                                <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <select class='form-control' id='idPeriodo' style='margin-right: 35px; '> </select> 
                                </a>
                                 <button type="button" id="buscarDatos" onclick="BuscarDatos()" style="display: none;">Buscar</button>
                               
                            </li>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">

                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php print_r($nombre) ?></span>
                                    <img class="img-profile rounded-circle" src="../img/iconousuario2.png">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                   
                                    <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Cerrar Sesión
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h4 mb-2 text-gray-800">
                            <div class="form-inline">
                                <div class="col-sm-2">
                                    <h2> Rangos</h2>
                                </div>
                                <div class="col-sm-2">
                                    <h6 style="margin-top: 12px;color:#8c8c8c">Configuración</h6>   
                                </div>
                            </div>
                        </h1>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            
                            <div class="card-body">

                                
                                    <h4 class="m-2 font-weight-bold text-primary">Rango</h4>
                                    <br>
                                    <input type="hidden" id="idRango" value="<?= $id ?>">
                                    <div class="form-group">
                                        <label>Nombre Rango:</label>
                                        <input type="text" class="form-control" id="nombreRango" value="<?=$data["nombreRango"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Duración(En semanas):</label>
                                        <input type="text" class="form-control" id="duracionRango" value="<?=$data["duracionRango"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha Inicio:</label>
                                        <input type="text" class="form-control" id="fechaInicioRango" value="<?=$data["fechaInicioRango"] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha Fin:</label>
                                        <input type="text" class="form-control" id="fechaFinRango" value="<?=$data["fechaFinRango"] ?>">
                                    </div>
                                    <input type="hidden" id="usuarioRango" value="<?= $nombre ?>">
                                    <input type="hidden" id="fecharegistroRango" value="<?= $fecharegistro ?>">
                                    <div>
                                        <button class="btn btn-primary" onclick="ModificarRangos()" style="float: right;"><i class="fa fa-save"></i> Guardar</button>
                                    </div>
                               

                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; 2019</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Preparado para irme?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary" href="<?php echo RUTA . 'close.php' ?>">Cerrar Sesión</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->

        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->

        <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../js/demo/datatables-demo.js"></script>
    </body>
</html>
