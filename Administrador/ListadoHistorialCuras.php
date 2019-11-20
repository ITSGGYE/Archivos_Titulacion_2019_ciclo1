<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listado de Registro de Curas</title>
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../js/Consulta_Historial_curas.js" type="text/javascript"></script>
        <script src="../js/Buscar_Historial_Cura.js" type="text/javascript"></script>
        <script src="../js/Cargar_DatosEdit_Historial.js" type="text/javascript"></script>
        <script src="../js/Editar_formHistorial_cura.js" type="text/javascript"></script>
        <script src="../js/Eliminar_Historial_Curas.js" type="text/javascript"></script>
        
        <link href="../imagenes/logo.png" rel="shortcut icon" type="images/x-icon"/>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/datepickder3.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">


    </head>
    <body>
        <?php
        session_start(); //creamos una variable local de tipo sesion
        require '../Conexion/config.php'; //importamos nuestro archivo de configuracion que contiene el nombre, usuario y contraseña de la base de datos
        require '../Conexion/functions.php';


        $conexion = conexion($bd_config);
        $usuario = iniciarSession('usuariosig', $conexion);

        $nombre = $usuario['usuario'];

        if (!isset($_SESSION['usuario'])) {// si no esta seteada la variable usuario o sea si esta vacia lo redireccionara a..
         header('Location: '.RUTA.'Models/ModeloIniciarSesion.php');
        }
        
        date_default_timezone_set("America/Guayaquil");
        $fecharegistro = date("Y-m-d H:i:s");
        ?>
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="#"><span>SGA</span>SAN JERÓNIMO</a>

                </div>
            </div><!-- /.container-fluid -->
        </nav>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <div class="profile-sidebar">
                <div class="profile-userpic">
                    <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"><?php print_r($nombre) ?></div>
                    <div class="profile-usertitle-status"><span class="indicator label-success"></span>En linea</div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="divider"></div>

            <ul class="nav menu">
                <li class=""><a href="../Models/ModeloAdministrador.php"><em class="fa fa-dashboard">&nbsp;</em> Menu Principal</a></li>
                <li class=""><a href="../Models/ModeloReportes.php"><em class="fa fa-book">&nbsp;</em> Reportes</a></li>
                <li class="parent"><a data-toggle="collapse" href="#sub-item-4">
                        <em class="fa fa-users">&nbsp;</em>  Usuarios <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-4">
                        <li><a class="" href="Registro.php">
                                <span class="fa fa-arrow-right">&nbsp;</span><i class="fa fa-user"></i>  Registro
                            </a></li>
                        <li><a class="" href="ListadoUsuarios.php">
                                <span class="fa fa-arrow-right">&nbsp;</span><i class="fa fa-list-alt"></i> Listado
                            </a></li>

                    </ul>
                </li>
                <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                        <em class="fa fa-pencil">&nbsp;</em> Inscripciones <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-1">
                        <li class=""><a class="" href="FormularioRegistro.php">
                                <span class="fa fa-arrow-right">&nbsp;</span> Formulario Registro
                            </a>
                        </li>
                        <li><a class="" href="ListadoSacramentos.php">
                                <span class="fa fa-list">&nbsp;</span> Listado
                            </a>
                        </li>
                        <li><a class="" href="ListadoPersonasD.php">
                                <span class="fa fa-user">&nbsp;</span> Listado Personas
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="parent"><a data-toggle="collapse" href="#sub-item-2">
                        <em class="fa fa-users">&nbsp;</em> Grupo Pastoral <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-2">
                        <li><a class="" href="Consulta_Grupos.php">
                                <span class="fa fa-arrow-right">&nbsp;</span> Consulta
                            </a>
                        </li>
                        <li><a class="" href="InscripcionGrupos.php">
                                <span class="fa fa-arrow-right">&nbsp;</span> Inscripciones
                            </a></li>
                    </ul>
                </li>
                <li class="parent active "><a data-toggle="collapse" href="#sub-item-3">
                        <em class="fa fa-archive">&nbsp;</em> Historial <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-3">
                        <li><a class="" href="FormHistorialCuras.php">
                                <span class="fa fa-arrow-right">&nbsp;</span><i class="fa fa-file"></i> Formulario Registro
                            </a></li>
                        <li><a class="" href="ListadoHistorialCuras.php">
                                <span class="fa fa-arrow-right">&nbsp;</span><i class="fa fa-list-alt"></i> Listado Historial
                            </a></li>

                    </ul>
                </li>
                <li class="parent"><a href="form_MantenimientoIglesia.php"><em class="fa fa-user">&nbsp;</em> Mantenimiento</a></li>

                <li><a href="<?php echo RUTA . 'Models/ModeloCerrarSesion.php' ?>"><em class="fa fa-power-off">&nbsp;</em> Cerrar Sesión</a></li>
            </ul>
        </div><!--/.sidebar-->


        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                            <em class="fa fa-list"></em>
                        </a></li>
                    <li class="active">Historial / Listado de Datos</li>
                </ol>
            </div><!--/.row-->


            <div class="panel-container">
                <div class="col-md-12">

                    <div class="form-group">

                        <div class="col-md-12">
                            
                            <div class="col-md-4">
                                <input type="text" id="textoafiltrar" class="form-control" placeholder="INGRESE EL TEXTO A FILTRAR">
                            </div>
                            
                            
                        </div>

                    </div>



                </div><!--// div col-md-12 //-->
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Cedula</th>
                                <th>Nombres</th>
                                <th>Fecha Nacimiento</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaHistorialCuras">

                        </tbody>
                    </table>
                </div><!--// div col-md-12 //-->


                <!-- Pantalla Modal  -->
                <!-- Button trigger modal -->

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Editar Datos Cura</h4>
                            </div>
                            <div class="modal-body" id="formulario">
                               
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" id="btnCancelar" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                                <button type="button" class="btn btn-primary" onclick="EditarDatosCuras()"><i class="fa fa-save"></i> Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--// div container //-->



        </div>	<!--/.main-->


        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/chart.min.js"></script>
        <script src="../js/chart-data.js"></script>
        <script src="../js/easypiechart.js"></script>
        <script src="../js/easypiechart-data.js"></script>
        <script src="../js/bootstrap-datepicker.js"></script>
        <script src="../js/custom.js"></script>


    </body>
</html>
