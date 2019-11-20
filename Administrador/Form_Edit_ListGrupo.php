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
        <title>Formulario Bautismo</title>

        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../js/ComboEditCurso.js" type="text/javascript"></script>
        <script src="../js/Editar_List_Grupos.js" type="text/javascript"></script>

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

        require '../Models/Modelo_ConsulForm_id.php';

        //Estables conexion a la base de datos
        $conexion = conexion($bd_config);
        //llamo a mi metodo usuario iniciarsesion
        $usuario = iniciarSession('usuariosig', $conexion);
        //Obtengo el usuario que inicio sesion 
        $nombre = $usuario['usuario'];
        
        if (!isset($_SESSION['usuario'])) {// si no esta seteada la variable usuario o sea si esta vacia lo redireccionara a..
         header('Location: '.RUTA.'Models/ModeloIniciarSesion.php');
        }
        //Obtengo fecha y hora de zona local
        date_default_timezone_set("America/Guayaquil");
        $fecharegistro = date("Y-m-d H:i:s");

        //llamo a mi metodo Consulta por id
        $id = $_GET['id']; //obtengo el id que me llego 

        $data = ConsultarDatosId($id, $conexion)
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
                <li class="parent active "><a data-toggle="collapse" href="#sub-item-2">
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
                <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
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
                            <em class="fa fa-pencil"></em>
                        </a></li>
                    <li class="active">Inscripciones / Editar Datos</li>
                </ol>
            </div><!--/.row-->


            <div class="panel-container">

                <div class="col-md-12">
                    <h1 class="page-header" style="font-size: 2em;text-align: center;">Editar Datos</h1>
                    <div class="col-md-2"> </div><!--// col-md-3// -->
                    <div class="col-md-7" style="background-color: white;border-radius: 2px;border: 1px solid silver;padding: 10px;margin-bottom: 25px;">

                        <div id="contenedor">
                            
                            
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Grupos:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="hidden" id="idGrupo" class="form-control" value="<?= $data['idGrupo_pastoral'] ?>">
                                        <select class="form-control" id="idGrupo_pastoral">

                                        </select>     
                                    </div>
                                </div><!--// form-group // -->
                                <br><br><br>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Rol:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" id="RolIntegrante" class="form-control" value="<?= $data['RolIntegrante'] ?>">
                                       
                                    </div>
                                </div><!--// form-group // -->
                                <br><br>
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Nombres:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="nombresIntegrante" value="<?= $data['nombresIntegrante'] ?> ">
                                    </div>
                                </div><!--// form-group // -->

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Fecha de Nacimiento:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" id="EdadIntegrante" value="<?= $data['EdadIntegrante'] ?>">
                                    </div>
                                </div><!--// form-group // -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Direccion:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="DireccionIntegrante" value="<?= $data['DireccionIntegrante'] ?>" >
                                    </div>
                                </div><!--// form-group // -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Telefono:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="TelefonoIntegrante" value="<?= $data['TelefonoIntegrante'] ?>">
                                    </div>
                                </div><!--// form-group // -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Correo:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="CorreoIntegrante" value="<?= $data['CorreoIntegrante'] ?>">
                                    </div>
                                </div><!--// form-group // -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Nombres del Padre:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="nombresPadreFamilia" value="<?= $data['nombresPadreFamilia'] ?>">
                                    </div>
                                </div><!--// form-group // -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Telefono Padre:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="telefonoPadreFamilia" value="<?= $data['telefonoPadreFamilia'] ?>">
                                    </div>
                                </div><!--// form-group // -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Nombres de la Madre:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="nombresMadreFamilia" value="<?= $data['nombresMadreFamilia'] ?>">
                                    </div>
                                </div><!--// form-group // -->
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label>Telefono Madre:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="telefonoMadreFamilia"  value="<?= $data['telefonoMadreFamilia'] ?>">
                                    </div>
                                </div><!--// form-group // -->
                                <input type="hidden" id="idseq_Contenedor" value="<?= $id ?>">
                                <input type="hidden" id="usuario" value="<?= $nombre ?>">
                                <input type="hidden" id="fechaRegistro" value="<?= $fecharegistro ?>">
                                
                                <div class="form-inline">
                                    <div class="col-md-2 col-sm-offset-5">
                                        <button class="btn btn-success" onclick="GuardarEditor()"><i class="fa fa-save"></i> GUARDAR</button>

                                    </div>
                                </div><!--// form-inline // -->
                                
                        </div><!--// contenedor // -->

                    </div><!--// div col-md-7 //-->

                </div><!--// div col-md-12 //-->
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
