<?php
if (!isset($_SESSION['u']['usuario'])) {
    session_start();




function iniciarPagina() {
    ?>
    <html lang="es">
        <head>
            <base href="/admin_archivo/">
            <meta>
            <link rel="shortcut icon" href="dist/img/logo.png">
          
            <link rel="stylesheet" href="dist/css/boostrap.css">            

            <script type="text/javascript" src="dist/jquery-3.4.1.js"></script>
    
            <script type="text/javascript" src="dist/css/boostrap.js"></script>
            <link rel="stylesheet" type="text/css" href="dist/css/datatables.css"/>
            <script type="text/javascript" src="dist/js/datatable.js"></script>
           
            <script type="text/javascript" src="dist/css/sweetalert.js"></script>
            <link rel="stylesheet" href="dist/css/menu.css">
            <title>SISTEMA  ARCHIVO</title>
        </head>
        <body>
            <div class="wrapper">
                <nav id="sidebar">
                    <div class="sidebar-header text-center">
                        <h3>Archivo</h3>
                    </div>


                    <ul class="list-unstyled components">
                        <li class="active mb-3 text-center">
                            <a href="#">Opciones</a>
                        </li>
                        <?php
                        if ($_SESSION['u']['administrador'] == 1) {
                            ?>
                            <a href="form/docentes.php">
                                <div class="d-flex justify-content-center">
                                    <div class="card mb-3 w-75 text-white bg-primary" style="max-width: 540px;">
                                        <div class="row no-gutters">
                                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                                <img  src="dist/icon/docente.png" class="card-img w-75" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h7 class="card-title">Registro de docentes</h7>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <?php
                        }
                        ?>
                        <a href="form/ajustes.php">
                            <div class="d-flex justify-content-center">
                                <div class="card mb-3 w-75 text-white bg-primary" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                                            <img src="dist/icon/ajustes.png" class="card-img w-75" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h7 class="card-title">Ajustes</h7>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="form/envio.php">
                            <div class="d-flex justify-content-center">
                                <div class="card mb-3 w-75 text-white bg-primary" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                                            <img src="dist/icon/envio.png" class="card-img w-75" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h7 class="card-title">Envio de Archivos</h7>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="form/bandeja.php">
                            <div class="d-flex justify-content-center">
                                <div class="card mb-3 w-75 text-white bg-primary" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                                            <img src="dist/icon/bandeja.png" class="card-img w-75" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h7 class="card-title">Bandeja de Entrada</h7>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="cerrar.php">
                            <div class="d-flex justify-content-center">
                                <div class="card mb-3 w-75 text-white bg-primary" style="max-width: 540px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                                            <img src="dist/icon/cerrar.png" class="card-img w-75" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h7 class="card-title">Cerrar</h7>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </ul>
                </nav>

                <div class="content w-100">
                    <nav style="background: #282e3f"  class="navbar navbar-expand-lg  navbar-dark">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                               
                                <li class="nav-item active">
                                    <span class="nav-link" href="">Bienvenido, <?php echo $_SESSION['u']['usuario'] ?></span>
                                </li>



                            </ul>
                        </div>
                    </nav>
                    <div class="container-fluid">
                        <?php
                    }

                    function terminarPagina() {
                        ?>
                    </div> 
                </div>  
            </div>      
        </body>
    </html>
    <?php
}
}
