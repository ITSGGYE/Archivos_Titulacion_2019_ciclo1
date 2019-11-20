<%@page import="Models.ModelsListadoPeticiones"%>
<%@page import="Clases.Peticiones"%>
<%@page import="java.util.ArrayList"%>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Listado de Peticiones</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="../VENDOR/plugins/jquery/jquery.min.js"></script>
        
        <script src="../js/FiltroListadoPeticiones.js" type="text/javascript"></script>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="../VENDOR/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="../VENDOR/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="../VENDOR/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="../VENDOR/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../VENDOR/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="../VENDOR/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../VENDOR/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="../VENDOR/plugins/summernote/summernote-bs4.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">


                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>

                </ul>

            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="../VENDOR/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                         style="opacity: .8">
                    <span class="brand-text font-weight-light">Administrador</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <%
                                        HttpSession sesion = request.getSession();

                                        String usuario = "";
                                        String nivel = "";
                                        if (sesion.getAttribute("user") != null && sesion.getAttribute("nivel") != null) {
                                            usuario = sesion.getAttribute("user").toString();
                                            nivel = sesion.getAttribute("nivel").toString();
                                    %>
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="../imagenes/iconousuario2.png" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block"><%= usuario %></a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                            <li class="nav-item">
                                <a href="MenuPrincipal.jsp" class="nav-link ">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Menu Principal
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="ListadoPeticiones.jsp" class="nav-link active">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>
                                        Listado Peticiones
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="ListadoPedidosCompra.jsp" class="nav-link">
                                    <i class="nav-icon fas fa-table"></i>
                                    <p>
                                        Listado Pedidos Almuerzo
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="ActivacionProductos.jsp" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Activacion de Productos
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="RegistroUsuario.jsp" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Registro de Usuarios
                                    </p>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <% out.print("<a href='../index.jsp?cerrar=true' class='nav-link'><i class='nav-icon fas fa-power-off'></i><p> Cerrar Sesión</p></a>");%>
                                
                            </li>


                        </ul>
                    </nav>
                    
                    <%} else {
                                           out.print("<script>location.replace('../index.jsp');</script>");
                                       }%> 
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">


                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">

                        <!-- Main row -->
                        <div class="row">
                            <section class="col-lg-12" style="margin-top:10px;">
                                <div class="col-lg-4">
                                    <input type="text" id="textoFiltrar" class="form-control" placeholder="INGRESE TEXTO A FILTRAR" >
                                </div>
                            </section>
                            <!-- right col (We are only adding the ID to make the widgets sortable)-->
                            <section class="col-lg-12" style='margin-top:10px;'>

                                <table class="table table-bordered" style="background: white;">
                                    <thead >
                                        <tr>
                                            <th>Mensaje</th>
                                            <th>Mesa</th>
                                            <th>fecha de Peticion</th>
                                        </tr>
                                    </thead>
                                    <%

                                        ArrayList<Peticiones> objPeticiones = ModelsListadoPeticiones.ListadoPeticiones();

                                        for (Peticiones c : objPeticiones) {%>


                                    <tbody id="tablaListado">
                                        <tr>

                                            <td><%=c.getMensajePeticion()%></td>
                                            <td><%=c.getUsuarioPeticion()%></td>
                                            <td><%=c.getFechaPeticion()%></td>

                                        </tr>
                                    </tbody>
                                    <%}%> 
                                </table>

                            </section>

                            <!-- right col -->
                        </div>
                        <!-- /.row (main row) -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2019 <a href="http://adminlte.io"></a> Restaurant a lo Paisa.</strong>

            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->


        <!-- jQuery UI 1.11.4 -->
        
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="../VENDOR/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="../VENDOR/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="../VENDOR/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="../VENDOR/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="../VENDOR/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="../VENDOR/plugins/moment/moment.min.js"></script>
        <script src="../VENDOR/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="../VENDOR/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="../VENDOR/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="../VENDOR/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../VENDOR/dist/js/adminlte.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../VENDOR/dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../VENDOR/dist/js/demo.js"></script>
    </body>
</html>
