<?php
if (!isset($_SESSION['u']['usuario'])) {
    session_start();
}

//if (!isset($_SESSION['u']['usuario'])) {
//    header("location:login.php");
//}

function iniciarPagina() {
    ?>
    <html lang="es">
        <head>
            <base href="/recaudacion/">
            <meta>
            <link rel="shortcut icon" href="dist/img/logo.png">
            <link rel="stylesheet" href="dist/bootstrap.css" >
            <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
            <script type="text/javascript" src="dist/jquery-3.4.1.js"></script>
            <script src="dist/popper.js" ></script>
            <script src="dist/bootstrap.js" ></script>
            <link rel="stylesheet" type="text/css" href="dist/css/datatables.css"/>
            <script type="text/javascript" src="dist/js/datatable.js"></script>
            <script src="dist/jquery.validate.js" type="text/javascript"></script>
            <script src="dist/sweetalert.js"></script>
            <link rel="stylesheet" href="dist/css/menu.css">
            <title>MRP</title>
        </head>
        <body>
            <div class="wrapper">
                <nav id="sidebar">
                    <div class="sidebar-header text-center">
                        <h3>MRP</h3>
                    </div>


                    <ul class="list-unstyled components">
                        <p>Modulo de recaudaciones de pensiones académicas</p>
                        <li class="active">
                            <a href="#">Inicio</a>
                        </li>
                        <!--                        <li class="active">
                                                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                                                    <ul class="collapse list-unstyled" id="homeSubmenu">
                                                        <li>
                                                            <a href="#">home1</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">home2</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">home3</a>
                                                        </li>
                                                    </ul> 
                                                </li>-->

                        <!--                        <li>
                                                    <a href="#">About</a>
                                                </li>-->
                        <!--                        <li>
                                                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Page</a>
                                                    <ul class="collapse list-unstyled" id="pageSubmenu">
                                                        <li>
                                                            <a href="#">page1</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">page2</a>
                                                        </li>
                                                        <li>
                                                            <a href="#">page3</a>
                                                        </li>
                                                    </ul> 
                                                </li>-->
                        <?php
                        if ($_SESSION['u']['idrol'] == "3" || $_SESSION['u']['idrol'] == 3) {
                            ?>
                            <li>
                                <a href="form/ver_pensiones_estudiante.php">Ver pensiones</a>
                            </li>
                            <li>
                                <a href="form/ordenes_canceladas.php">Ordenes Canceladas</a>
                            </li>
                            <?php
                        }
                        if ($_SESSION['u']['idrol'] == "1" || $_SESSION['u']['idrol'] == 1) {
                            ?>
                            <li>
                                <a href="#pagePensiones" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pensiones</a>
                                <ul class="collapse list-unstyled" id="pagePensiones">
                                    <li>
                                        <a href="form/pensiones.php">Generar Pensiones</a>
                                    </li>
                                    <li>
                                        <a href="form/recaudacion.php">Reporte Recaudación</a>
                                    </li>
                                    <li>
                                        <a href="form/ordenes.php">Generación Ordenes de Pago</a>
                                    </li>
                                    <li>
                                        <a href="form/ver_pensiones.php">Ver Pensiones</a>
                                    </li>
                                    <li>
                                        <a href="form/detalle_ordenes.php">Detalle Ordenes</a>
                                    </li>
                                </ul> 
                            </li>
                            <li>
                                <a href="form/estudiantes.php">Administrar Estudiantes</a>
                            </li>

                            <li>
                                <a href="form/precios.php">Precios pensiones</a>
                            </li>
                            <li>
                                <a href="form/usuarios.php">Administrar Usuarios</a>
                            </li>
                            <li>
                                <a href="form/control.php">Control Usuarios</a>
                            </li>
                            <?php
                        }
                        if ($_SESSION['u']['idrol'] == "2" || $_SESSION['u']['idrol'] == 2) {
                            ?>
                            <li>
                                <a href="#pagePensiones" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pensiones</a>
                                <ul class="collapse list-unstyled" id="pagePensiones">
                                    <li>
                                        <a href="form/pensiones.php">Generar Pensiones</a>
                                    </li>
                                    <li>
                                        <a href="form/recaudacion.php">Recaudación</a>
                                    </li>
                                    <li>
                                        <a href="form/ordenes.php">Ordenes de Pago</a>
                                    </li>
                                    <li>
                                        <a href="form/ver_pensiones.php">Ver Pensiones</a>
                                    </li>

                                </ul> 
                            </li>
                            <li>
                                <a href="form/estudiantes.php">Administrar Estudiantes</a>
                            </li>

                            <li>
                                <a href="form/precios.php">Precios pensiones</a>
                            </li>
                            <?php
                        }
                        ?>


                    </ul>

                    <!--                    <ul class="list-unstyled CTAs">
                                            <li>
                                                <a href="#" class="download">Download code</a>
                                            </li>
                                            <li>
                                                <a href="#" class="article">article</a>
                                            </li>
                                        </ul>-->
                </nav>

                <div class="content w-100">
                    <nav style="background: green" class="navbar navbar-expand-lg  navbar-dark ">

                        <!--                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                                                    <i class="fa fa-align-justify"></i> <span>toggle sidebar</span>
                                                </button>-->

                        <!--<a class="navbar-brand" href="#">Navbar</a>--> 
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <!--                                <li class="nav-item active">
                                                                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                                                                </li>-->
                                <li class="nav-item active">
                                    <span class="nav-link" href=""><?php echo $_SESSION['u']['usuario'] ?></span>
                                </li><!--
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pricing</a>
                            </li>-->
                                <li class="nav-item">
                                    <a style="cursor: pointer" onclick="cerrasesion();" class="nav-link " >cerrar sesión</a>
                                </li>




                            </ul>
                        </div>
                    </nav>
                    <script>
                        function cerrasesion() {
                            swal({
                                title: "Está seguro?",
                                text: "Desea cerrar sesión!",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            $.ajax({
                                                url: "dist/ajax/a_usuario.php",
                                                data: {
                                                    cerrarsesion: 1
                                                },
                                                type: 'POST',
                                                dataType: 'json',
                                                success: function (data, textStatus, jqXHR) {
                                                    if (data.status === "correcto") {
                                                        window.location.href = "login.php";
                                                    } else {
                                                        swal(data.mensaje, {
                                                            icon: 'error'
                                                        });
                                                    }
                                                }
                                            });
                                        } else {

                                        }
                                    });
                        }
                    </script>
                    <div class="container-fluid">
                        <?php
                    }

                    function terminarPagina() {
                        ?>
                    </div> <!-- fin de container-fluid -->
                </div>  <!-- fin de content -->
            </div>      <!-- fin de wrapper -->
        </body>
    </html>
    <?php
}
