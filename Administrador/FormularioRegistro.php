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
        <title>Formulario Registro</title>
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../js/LlenarCombo_Sacramento.js" type="text/javascript"></script>
        <script src="../js/Boton_Siguiente_FrmRegistro.js" type="text/javascript"></script>
        <script src="../js/Guardar_Persona.js" type="text/javascript"></script>
        <script src="../js/Buscar_Nombre.js" type="text/javascript"></script>
        <script src="../js/llenar_combo_Iglesia.js" type="text/javascript"></script>
        <script src="../js/llenarComboCura.js" type="text/javascript"></script>
        <script src="../js/GuardarRegistrosGenerales.js" type="text/javascript"></script>
        
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
                <li class="parent active"><a data-toggle="collapse" href="#sub-item-1">
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
                    <li class="active">Inscripciones / Formulario Registro</li>
                </ol>
            </div><!--/.row-->



            <div class="panel-container">
                <div class="col-md-12">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <h1 class="page-header" style="font-size: 2em;text-align: center;">Formulario Registro</h1>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-1"> </div><!--// col-md-2// -->
                    <div class="col-md-10" id="formularioGeneral">
                        <div class="form-group">
                            <div class="form-group" id="form">
                                <div class="col-md-4">
                                    <label>Elija el sacramento:</label>
                                </div>
                                <div class="col-md-6">
                                    <select id="tipoSacramento" class="form-control">

                                    </select>
                                </div>
                            </div><!--// form-group // -->

                        </div>
                        <br><br>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="col-md-1">
                                    <label style="margin-top: 12px;float: left;">Acta:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="acta" placeholder="Digite la acta" >
                                </div>

                                <div class="col-md-3">
                                    <label style="float: right;">Pagina:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="Pagina" placeholder="Digite la pagina" >
                                </div>

                            </div><!--// col-md-12 // -->
                            <div class="col-md-12">
                                <div class="col-md-1">
                                    <label style="margin-top: 12px;float: left;">Fecha:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="date" class="form-control" id="Fecha_sacramento">
                                </div>

                                <div class="col-md-3">
                                    <label>Nombre de la iglesia:</label>
                                </div>
                                <div class="col-md-4">
                                    <select id='sac_iglesia' class='form-control'>
                                        
                                    </select>
                                </div>
                            </div><!--// form-group // -->
                            <div class="col-md-12">
                                <div class="col-md-1">
                                    <label style="margin-top: 12px;float: left;">Toma:</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="Toma">
                                </div>

                                <div class="col-md-3">
                                    <label>Cura:</label>
                                </div>
                                <div class="col-md-4">
                                    <select class='form-control' id='cura_id'>

                                    </select>
                                </div>
                                <input type="hidden" id="sac_usuario" value="<?php print_r($nombre) ?>">
                                <input type="hidden" id="sac_fechaRegistro" value="<?php print_r($fecharegistro) ?>">
                            </div><!--// form-group // -->
                        </div><!--// form-group // -->
                        <div class="col-md-12">
                            <div class="form-inline" style="margin-top: 15px;">
                                <div class="col-md-2 col-sm-offset-5">
                                    <button class="btn btn-primary" id="btnSiguiente">SIGUIENTE <i class="fa fa-arrow-right"></i></button>

                                </div>
                            </div><!--// form-inline // -->
                        </div>
                    </div><!--// formulario General// -->
                    <div class="col-md-10" id="Padrinos" style="display: none;">
                        <h4 style="text-align: center;">Datos de los Padrinos</h4>
                        <br>
                        <div class="col-md-12">
                            <div class="col-md-1">
                                <label style="margin-top: 12px;float: left;">Cedula:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="cedula1" placeholder="Digite la cedula" >
                            </div>

                            <div class="col-md-2">
                                <label style="float: right;">Nombres:</label>
                            </div>
                            <div class="col-md-4" id='nom'>
                                <input type="text" class="form-control"  readonly >
                            </div>
                            <!--input a cargar -->
                            <div class="col-md-4" id='inputs' style='display: none;'>
                                
                            </div>
                            <!-- ///-->
                            <input type='hidden' value='P' id='par_tipo_persona1'>
                            <div class="col-md-1">
                                <button class="btn btn-success" style="margin-top: 7px;" data-toggle="modal" data-target="#ventana1"><i class="fa fa-plus"></i> </button> 
                            </div>
                        </div><!--// col-md-12 // -->
                        <div class="col-md-12" >
                            <div class="col-md-1">
                                <label style="margin-top: 12px;float: left;">Cedula:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="cedula2" placeholder="Digite la cedula">
                            </div>

                            <div class="col-md-2">
                                <label>Nombres:</label>
                            </div>
                            <div class="col-md-4" id='nom2'>
                                <input type="text" class="form-control" readonly>
                            </div>
                            <div class="col-md-4" id='inputs2' style='display: none;'>
                                
                            </div>
                            <input type='hidden' value='P' id='par_tipo_persona2'>
                            <div class="col-md-1">
                                <button class="btn btn-success" style="margin-top: 7px;" data-toggle="modal" data-target="#ventana1"><i class="fa fa-plus"></i> </button> 
                            </div>
                        </div><!--// div col-md-12 // -->
                        <div class="col-md-12">
                            <div class="form-inline" style="margin-top: 15px;">
                                <div class="col-md-2 col-sm-offset-4">
                                    <button class="btn btn-primary" id="btnSiguientePadrinos">SIGUIENTE <i class="fa fa-arrow-right"></i></button>

                                </div>
                                <div class="col-md-2 col-sm-offset-1">
                                    <button class="btn btn-success" id="btnAnteriorPadrinos"><i class="fa fa-arrow-left"></i> ANTERIOR</button>
                                </div>
                            </div><!--// form-inline // -->
                        </div>
                    </div><!--// PADRINOS // -->

                    <div class="col-md-10" id="Testigos" style="display: none;">
                        <h4 style="text-align: center;">Datos del Testigo</h4>
                        <br>
                        <div class="col-md-12">
                            <div class="col-md-1">
                                <label style="margin-top: 12px;float: left;">Cedula:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="cedula5" placeholder="Digite la cedula" >
                            </div>

                            <div class="col-md-2">
                                <label style="float: right;">Nombres:</label>
                            </div>
                            <div class="col-md-4" id='nom5'>
                                <input type="text" class="form-control" id="nombresTestigos1" readonly >
                            </div>
                            <div class="col-md-4" id='inputs5' style='display: none;'>
                                
                            </div>
                            <input type='hidden' value='T' id='par_tipo_persona5'>
                            <div class="col-md-1">
                                <button class="btn btn-success" style="margin-top: 7px;" data-toggle="modal" data-target="#ventana1"><i class="fa fa-plus"></i> </button> 
                            </div>
                        </div><!--// col-md-12 // -->
                        <div class="col-md-12">
                            <div class="col-md-1">
                                <label style="margin-top: 12px;float: left;">Cedula:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="cedula6" placeholder="Digite la cedula">
                            </div>

                            <div class="col-md-2">
                                <label>Nombres:</label>
                            </div>
                            <div class="col-md-4" id='nom6'>
                                <input type="text" class="form-control" id="nombresTestigos2" readonly>
                            </div>
                            <div class="col-md-4" id='inputs6' style='display: none;'>
                                
                            </div>
                            <div class="col-md-1">
                                <button class="btn btn-success" style="margin-top: 7px;" data-toggle="modal" data-target="#ventana1"><i class="fa fa-plus"></i> </button> 
                            </div>
                            <input type='hidden' value='T' id='par_tipo_persona6'>
                        </div><!--// div col-md-12 // -->
                        <div class="col-md-12">
                            <div class="form-inline" style="margin-top: 15px;">
                                <div class="col-md-2 col-sm-offset-4">
                                    <button class="btn btn-primary" id="btnSiguienteTestigos">SIGUIENTE <i class="fa fa-arrow-right"></i></button>

                                </div>
                                <div class="col-md-2 col-sm-offset-1">
                                    <button class="btn btn-success" id="btnAnteriorTestigos"><i class="fa fa-arrow-left"></i> ANTERIOR</button>
                                </div>
                            </div><!--// form-inline // -->
                        </div><!--// div col-md-12 // -->
                    </div><!--// TESTIGOS //-->
                    <div class="col-md-10" id="Participantes" style="display: none;">
                        <h4 style="text-align: center;">Datos del Participante</h4>
                        <br>
                        <div class="col-md-12">
                            <div class="col-md-1">
                                <label style="margin-top: 12px;float: left;">Cedula:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="cedula3" placeholder="Digite la cedula" >
                            </div>

                            <div class="col-md-2">
                                <label style="float: right;">Nombres:</label>
                            </div>
                            <div class="col-md-4" id='nom3'>
                                <input type="text" class="form-control" readonly>
                            </div>
                             <!--input a cargar -->
                            <div class="col-md-4" id='inputs3' style='display: none;'>
                                
                            </div>
                            <!-- ///-->
                            <input type='hidden' value='S' id='par_tipo_persona3'>
                            <div class="col-md-1">
                                <button class="btn btn-success" style="margin-top: 7px;" data-toggle="modal" data-target="#ventana1"><i class="fa fa-plus"></i> </button> 
                            </div>
                        </div><!--// col-md-12 // -->
                        <div class="col-md-12" id='Part'>
                            <div class="col-md-1">
                                <label style="margin-top: 12px;float: left;">Cedula:</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="cedula4" placeholder="Digite la cedula">
                            </div>

                            <div class="col-md-2">
                                <label>Nombres:</label>
                            </div>
                            <div class="col-md-4" id='nom4'>
                                <input type="text" class="form-control" readonly>
                            </div>
                            <!--input a cargar -->
                            <div class="col-md-4" id='inputs4' style='display: none;'>
                                
                            </div>
                            <!-- ///-->
                            <input type='hidden' value='S' id='par_tipo_persona4'>
                            <div class="col-md-1">
                                <button class="btn btn-success" style="margin-top: 7px;"  data-toggle="modal" data-target="#ventana1"><i class="fa fa-plus"></i> </button> 
                            </div>
                        </div><!--// div col-md-12 // -->
                        <div class="col-md-12">
                            <div class="form-inline" style="margin-top: 15px;">
                                <div class="col-md-2 col-sm-offset-4">
                                    <button class="btn btn-primary" onclick="btnGuardarDatosGenerales()"><i class="fa fa-save"></i> Guardar </button>
                                </div>
                                <div class="col-md-2 col-sm-offset-1">
                                    <button class="btn btn-success" id="btnAnteriorParticipante"><i class="fa fa-arrow-left"></i> ANTERIOR</button>
                                </div>
                            </div><!--// form-inline // -->
                        </div><!--// div col-md-12 // -->

                    </div><!--// Participantes //-->
                    <!-- Modal  ventana 1-->
                    <div class="modal fade" id="ventana1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Datos Personales</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label>Cedula:</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="per_cedula" placeholder="*">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label>Nombres:</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="per_nombre" placeholder="*">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label>Dirección:</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="per_direccion">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label>Fecha Nacimiento:</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="date" class="form-control" id="per_fecha_nac">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label>Lugar Nacimiento:</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="per_lugarNacimiento">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label>Correo:</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="email" class="form-control" id="per_correo" placeholder="*">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label>Telefono:</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="per_telefono">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label>Nombres Padre:</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="per_nombresPadre">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label>Nombres Madre:</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="per_nombresMadre">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <label>Nota Marginal:</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <textarea class="form-control" id="per_observacion"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" id="per_usuario" value="<?php print_r($nombre) ?>">
                                            <input type="hidden" id="per_fechaRegistro" value="<?php print_r($fecharegistro) ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal" style='visibility: hidden' id='btnCancelarfrm'><i class="fa fa-arrow-right"></i> cancelar</button>
                                    <button type="button" class="btn btn-primary" onclick="GuardarPersona()"><i class="fa fa-save"></i> Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div><!--// ventana 1 //-->


                </div><!--// div col-md-12 //-->


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
