<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Agenda de Tareas</title>

        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../js/moment.min.js" type="text/javascript"></script>
        

        <!-- Calendario -->
        <link href="../css/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/fullcalendar.min.js" type="text/javascript"></script>
        <script src="../js/es.js" type="text/javascript"></script>


        <!-- js -->
        <script src="../js/popper.min.js" type="text/javascript"></script>


        <!-- Custom fonts for this template-->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        
        
   
        <!-- Custom styles for this template-->
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    </head>


    <body id="page-top" style="color:#000">
        <?php
        session_start(); //creamos una variable local de tipo sesion
        require '../Conexion/config.php'; //importamos nuestro archivo de configuracion que contiene el nombre, usuario y contraseña de la base de datos
        require '../Conexion/functions.php';


        $conexion = conexion($bd_config);
        $usuario = iniciarSession('usuarios', $conexion);

        $nombre = $usuario['usuario'];
        if (!isset($_SESSION['usuario'])) {// si no esta seteada la variable usuario o sea si esta vacia lo redireccionara a..
          header('Location: '.RUTA.'login.php');
        }
        date_default_timezone_set('America/Guayaquil');

        $hora = date("H:i:s");
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
                    <div class="sidebar-brand-text mx-3">PROFESOR <sup></sup></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="../profesor.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Menu Principal</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Menu
                </div>


                
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
                            <a class="collapse-item" href="IngresoNotas.php">Ingresar Notas</a>
                            <a class="collapse-item" href="ListadoNotas.php">Listado Notas</a>
                        </div>
                    </div>
                </li>
                <!-- Nav Item - calendar -->
                <li class="nav-item active">
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
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Agenda de Tareas</h1>
                        </div>
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="col-md-12">
                                    <input type="hidden" class="form-control" id="nomusuario" value="<?= $nombre ?>">
                                    <div class="col-md-12">
                                        <div id="CalendarioWEB"></div>
                                    </div>
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


        <!-- Modal(Agregar,Modificar,Eliminar) -->
        <div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TituloEvento">Titulo</h5>
                        <button type="button" class="close" id="btnCerrar" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                         <input type="hidden" class="form-control" id="usuario" value="<?= $nombre ?>">
                        <div class="form-group" style="display:none;">
                            <label>Id:</label>
                            <input type="text" class="form-control" id="txtId">
                        </div>
                        <div class="form-group">
                            <label>Fecha seleccionada:</label>
                            <input type="text" class="form-control" id="txtFecha" name="txtFecha" readonly>
                        </div>
                        <div class="form-group">
                            <label>Titulo:</label>
                            <input type="text" class="form-control" id="txtTitulo" name="txtTitulo">
                        </div>
                        <div class="form-group">
                            <label>Hora:</label> 
                            <input type="text" class="form-control" id="txtHora" value="<?= $hora ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label>Descripción:</label> 

                            <textarea type="text" class="form-control" id="txtDescripcion" name="txtDescripcion"></textarea>

                        </div>
                        <div class="form-group">
                            <label>Color:</label> 
                            <input type="color" class="form-control" style="width: 160px;" id="txtColor">

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
                        <button type="button" id="btnModificar" class="btn btn-success">Modificar</button>
                        <button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button>
                        <button type="button" class="btn btn-success" id="btnLimpiar" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>


       <script>
            $(document).ready(function () {
                var nomusuario = $("#nomusuario").val();
                
                
                var FechaHora;
                $("#CalendarioWEB").fullCalendar({//creo calendario
                    header: {
                        left: 'today,prev,next', //poner hoy, ayer y mañana
                        center: 'title', //centro el titulo
                        right: 'month,basicWeek,basicDay'

                    },
                    customButtons: {
                        Miboton: {
                            text: "Boton 1",
                            click: function () {
                                alert("Accion del boton");
                            }
                        }
                    },
                    dayClick: function (date, jsEvent, view) {//con el date obtengo la fecha seleccionada, jsevent -- un evento sobre el elemento dia, que contiene elementos java scritps.
                        $("#txtFecha").val(date.format());
                        $("#ModalEventos").modal();
                    },

                    events: '../Models/modeloConsulta.php?nomusuario='+nomusuario+' ' ,

                    eventClick: function (calEvent, jsEvent, view) {

                        $("#TituloEvento").html(calEvent.title);

                        $("#usuario").val(calEvent.usuario);
                        $("#txtId").val(calEvent.idAgenda);

                        $("#txtTitulo").val(calEvent.title);
                        $("#txtDescripcion").val(calEvent.descripcion);
                        $("#txtColor").val(calEvent.color);

                        FechaHora = calEvent.start._i.split(" ");
                        $("#txtFecha").val(FechaHora[0]);

                        $("#txtHora").val(FechaHora[1]);

                        $("#ModalEventos").modal();
                    }

                });


            });
        </script>

        <script>
            $(document).ready(function () {

                var NuevoEvento;

                $("#btnAgregar").click(function () {

                    RecolectarDatosGuia();
                    EnviarInformación('agregar', NuevoEvento);

                });
                $("#btnEliminar").click(function () {
                    var mensagge = confirm("¿Esta seguro que desea eliminar la tarea?");

                    if (mensagge == true) {
                        RecolectarDatosGuia();
                        EnviarInformación('eliminar', NuevoEvento);
                    }


                });
                $("#btnModificar").click(function () {
                    var mensagge = confirm("¿Esta seguro que desea modificar la tarea?");
                    if (mensagge == true) {
                        RecolectarDatosGuia();
                        EnviarInformación('modificar', NuevoEvento);
                    }

                });
                function RecolectarDatosGuia() {
                    NuevoEvento = {
                        usuario: $("#usuario").val(),
                        idAgenda: $("#txtId").val(),
                        title: $("#txtTitulo").val(),
                        start: $("#txtFecha").val() + " " + $("#txtHora").val(),
                        color: $("#txtColor").val(),
                        descripcion: $("#txtDescripcion").val(),
                        textColor: "#FFFFFF",
                        end: $("#txtFecha").val() + " " + $("#txtHora").val()


                    };
                }

                function EnviarInformación(accion, objEvento) {
                    $.ajax({
                        type: 'POST',
                        url: '../Models/modeloConsulta.php?accion=' + accion,
                        data: objEvento,
                        success: function (datos) {
                            alert(datos);
                            LimpiarCampos();
                            $('#CalendarioWEB').fullCalendar('refetchEvents');
                            $("#ModalEventos").modal('toggle');//cierro el modal
                        },
                        error: function () {
                            alert('Hay un error');
                        }

                    });
                }
                
                $("#btnCerrar").click(function(){
                   
                   LimpiarCampos();
                });
                $("#btnLimpiar").click(function(){
                    LimpiarCampos();
                });
                
                function LimpiarCampos(){
                    
                     $("#usuario").val("");
                     $("#txtId").val("");
                     $("#txtTitulo").val("");
                     $("#txtFecha").val("");
                     $("#txtColor").val("");
                     $("#txtDescripcion").val("");
                        
                }


            });
        </script>

        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>



    </body>

</html>
