<?php
if (!isset($_SESSION['u']['usuario'])) {
    session_start();
}

//if (!isset($_SESSION['u']['usuario'])) {
//    header("location:login.php");
//}

function iniciarPagina() {
    ?>
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <base href="/sistema_matricula/">
            <meta>
               <link rel="shortcut icon" href="dist/img/escudo.jpg">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script type="text/javascript" src="dist/jquery-3.4.1.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <link rel="stylesheet" type="text/css" href="dist/css/datatables.css"/>
            <script type="text/javascript" src="dist/js/datatable.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js" type="text/javascript"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <link rel="stylesheet" href="dist/css/menu.css">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
            <script src="dist/js/inputs.js"></script>
<!--            <script type="text/javascript"></script>-->
            <title>Escuela Particular Dr.Maximo Agustin Rodriguez</title>
        </head>
        <body>
            <div class="wrapper">
                <nav id="sidebar">
                    <div class="sidebar-header text-center">
                        <h3>SISTEMA DE MATRICULA </h3>
                    </div>


                    <ul class="list-unstyled components">
                        <b><p class="mb-0 pb-0">Usuario  </p></b>
                        <p class="mt-0 pt-0 pb-0 mb-0"><?php echo $_SESSION['u']['usuario']; ?></p>
                        <p class="mt-0 pt-0"><a style="cursor: pointer;color: rgba(255,255,255,.5)" onclick="cerrasesion();" class="pt-0 mt-0 " >cerrar sesión</a></p>
                        <li class="active">
                            <a href="#">Inicio</a>
                        </li>
                       

                        <li>
                            <a href="#pagePensiones" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pensiones</a>
                            <ul class="collapse list-unstyled" id="pagePensiones">
                                <li>
                                    <a href="form/cobro.php">Cobro de Pensiones</a>
                                </li>
                                <li>
                                    <a href="form/pension.php">Ver Pensiones</a>
                                </li>
                            </ul>
                        </li>

                        
                        <li>
                            <a href="#pageMatricula" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Matriculación</a>
                            <ul class="collapse list-unstyled" id="pageMatricula">
                                <li>
                                    <a href="form/matricular.php">Matricular Estudiante</a>
                                </li>
                                <li>
                                    <a href="form/ver_matriculas.php">Ver Matriculas</a>
                                </li>
                                <li>
                                    <a href="form/estudiantes.php">Estudiantes</a>
                                </li>
                                <li>
                                    <a href="form/pendientes.php">Documentos Pendientes</a>
                                </li>
                            </ul>
                        </li>
                      
                        <li>
                            <a href="#pageReporte" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Reportes</a>
                            <ul class="collapse list-unstyled" id="pageReporte">
                                <li>
                                   <a href="form/reporte_Pagos_Pendiente.php">Pagos Pendientes</a>
                                </li>
                                <li>
                                    <a  href="form/reporte_alumnosexists.php">Estudiantes por Curso</a>
                                </li>
                                <li>
                                     <a  href="form/reporte_deudores_all.php">Deudores</a>
                                </li>
                            </ul>
                         </li>
                               <?php
                                    if($_SESSION['u']['idrol'] == '1'){
                                        echo  $li = ' <li>
                            <a href="form/precios.php">Precios de Pensiones</a>
                        </li>
                        <li>
                            <a href="form/usuarios.php">Usuarios de Sistema</a>
                        </li>
                                         <li>
                           <a href="form/Periodoelectivo.php">Comienzo de Periodo</a>  
                        </li>';
                                    }
                               ?>
                    

                </nav>

                <div class="content w-100">
                    <br>
<!--                    <nav  class="navbar navbar-expand-lg bg-secondary  navbar-dark ">
                        <h3 class="text-white">Escuela Maximo Agustin Rodriguez </h3>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                                                <li class="nav-item active">
                                                                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                                                                </li>

                                <li class="nav-item">
                                    <a style="cursor: pointer" onclick="cerrasesion();" class="nav-link " >cerrar sesión</a>
                                </li>




                            </ul>
                        </div>
                    </nav>-->
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
                        if(!isset($_SESSION['u']['usuario'])){
                            ?>
                        <script>
                        $(document).ready(function(){
                            window.location.href="login.php";   
                        });
                        </script>
                        <?php 
                        }
                    }

                    function terminarPagina() {
                        ?>
                    </div> <!-- fin de container-fluid -->
                </div>  <!-- fin de content -->
            </div>      <!-- fin de wrapper -->
        </body>
    </html>
     <!--<li>
                                    <a  href="form/reporte_all_estudent_lectivo.php">Estudiantes Matriculados por Año Lectivo</a>
                                </li>-->
    <?php
}
