<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Menu Principal</title>
        
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../js/Total_Integrantes_Grupos.js" type="text/javascript"></script>
        <script src="../js/chart.min.js"></script>
        <script src="../js/chart-data.js"></script>
        <script src="../js/TotalUsuarios.js" type="text/javascript"></script>
        <script src="../js/TotalCuras.js" type="text/javascript"></script>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/font-awesome.min.css" rel="stylesheet">
        <link href="../css/datepickder3.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet">


    </head>
    <body>
        <?php
        $conexion = conexion($bd_config);
        $usuario = iniciarSession('usuariosig', $conexion);

        $nombre = $usuario['usuario'];
        // put your code here
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
                <li class="active"><a href="ModeloAdministrador.php"><em class="fa fa-dashboard">&nbsp;</em> Menu Principal</a></li>
                <li class=""><a href="ModeloReportes.php"><em class="fa fa-book">&nbsp;</em> Reportes</a></li>

                <li class="parent "><a data-toggle="collapse" href="#sub-item-4">
                        <em class="fa fa-users">&nbsp;</em>  Usuarios <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-4">
                        <li><a class="" href="../Administrador/Registro.php">
                                <span class="fa fa-arrow-right">&nbsp;</span><i class="fa fa-users"></i>  Registro
                            </a></li>
                            <li><a class="" href="../Administrador/ListadoUsuarios.php">
                                <span class="fa fa-arrow-right">&nbsp;</span><i class="fa fa-list-alt"></i> Listado
                            </a></li>

                    </ul>
                </li>
                <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                        <em class="fa fa-pencil">&nbsp;</em> Inscripciones <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-1">
                        <li><a class="" href="../Administrador/FormularioRegistro.php">
                                <span class="fa fa-arrow-right">&nbsp;</span> Formulario Registro
                            </a>
                        </li>
                        <li><a class="" href="../Administrador/ListadoSacramentos.php">
                                <span class="fa fa-list">&nbsp;</span> Listado
                            </a>
                        </li>
                        <li><a class="" href="../Administrador/ListadoPersonasD.php">
                                <span class="fa fa-user">&nbsp;</span> Listado Personas
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                        <em class="fa fa-users">&nbsp;</em> Grupo Pastoral <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-2">
                        <li><a class="" href="../Administrador/Consulta_Grupos.php">
                                <span class="fa fa-arrow-right">&nbsp;</span> Consulta
                            </a>
                        </li>
                        <li><a class="" href="../Administrador/InscripcionGrupos.php">
                                <span class="fa fa-arrow-right">&nbsp;</span> Inscripciones
                            </a></li>
                    </ul>
                </li>
                <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
                        <em class="fa fa-user">&nbsp;</em> Curas <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-3">
                        <li><a class="" href="../Administrador/FormHistorialCuras.php">
                                <span class="fa fa-arrow-right">&nbsp;</span><i class="fa fa-file"></i> Formulario Registro
                            </a></li>
                            <li><a class="" href="../Administrador/ListadoHistorialCuras.php">
                                <span class="fa fa-arrow-right">&nbsp;</span><i class="fa fa-list-alt"></i> Listado Historial
                            </a></li>

                    </ul>
                </li>
                <li class="parent"><a href="../Administrador/form_MantenimientoIglesia.php"><em class="fa fa-user">&nbsp;</em> Mantenimiento</a></li>

                <li><a href="<?php echo RUTA . 'Models/ModeloCerrarSesion.php' ?>"><em class="fa fa-power-off">&nbsp;</em> Cerrar Sesión</a></li>
            </ul>
        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="#">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">Tablero</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tablero</h1>
                    
                </div>
            </div><!--/.row-->

            <div class="panel panel-container">
                <div class="row">
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-orange panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                                <div class="large" id='numeroIntegranteGrupo'></div>
                                <div class="text-muted">Miembros</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-orange panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                                <div class="large" id='numeroUsuarios'></div>
                                <div class="text-muted">Usuarios</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-orange panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                                <div class="large" id='numeroCuras'></div>
                                <div class="text-muted">Curas</div>
                            </div>
                        </div>
                    </div>
                </div><!--/.row-->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="col-md-6">
                                Gráficos de total se sacramentos Realizados
                            </div>                           
                            <div class="col-md-3">
                              <select class="form-control" id="Year" onchange="Cargar()">
                                    <option value=""> Seleccione Año</option>
                                    <option value="1990"> 1990</option>
                                    <option value="1991"> 1991</option>
                                    <option value="1992"> 1992</option>
                                    <option value="1993"> 1993</option>
                                    <option value="1994"> 1994</option>
                                    <option value="1995"> 1995</option>
                                    <option value="1996"> 1996</option>
                                    <option value="1997"> 1997</option>
                                    <option value="1998"> 1998</option>
                                    <option value="1999"> 1999</option>
                                    <option value="2000"> 2000</option>
                                    <option value="2001"> 2001</option>
                                    <option value="2002"> 2002</option>
                                    <option value="2003"> 2003</option>
                                    <option value="2004"> 2004</option>
                                    <option value="2005"> 2005</option>
                                    <option value="2006"> 2006</option>
                                    <option value="2007"> 2007</option>
                                    <option value="2008"> 2008</option>
                                    <option value="2009"> 2009</option>
                                    <option value="2010"> 2010</option>
                                    <option value="2011"> 2011</option>
                                    <option value="2012"> 2012</option>
                                    <option value="2013"> 2013</option>
                                    <option value="2014"> 2014</option>
                                    <option value="2015"> 2015</option>
                                    <option value="2016"> 2016</option>
                                    <option value="2017"> 2017</option>
                                    <option value="2018"> 2018</option>
                                    <option value="2019"> 2019</option>
                                    <option value="2020"> 2020</option>
                                    <option value="2021"> 2021</option>
                                    <option value="2022"> 2022</option>
                                    <option value="2023"> 2023</option>
                                    <option value="2024"> 2024</option>
                                    <option value="2025"> 2025</option>
                                    <option value="2026"> 2026</option>
                                    <option value="2027"> 2027</option>
                                    <option value="2028"> 2028</option>
                                    <option value="2029"> 2029</option>
                                    <option value="2030"> 2030</option>
                                </select>  
                            </div>
                            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                        <div class="panel-body">
                            <div class="canvas-wrapper">
                                <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->


            
        </div>	<!--/.main-->

        <script src="../js/bootstrap.min.js"></script>
        
        <script src="../js/easypiechart.js"></script>
        <script src="../js/easypiechart-data.js"></script>
        <script src="../js/bootstrap-datepicker.js"></script>
        <script src="../js/custom.js"></script>
        <script>
            /*
            window.onload = function () {
                var chart1 = document.getElementById("line-chart").getContext("2d");
                window.myLine = new Chart(chart1).Line(lineChartData, {
                    responsive: true,
                    scaleLineColor: "rgba(0,0,0,.2)",
                    scaleGridLineColor: "rgba(0,0,0,.05)",
                    scaleFontColor: "#c5c7cc"
                });
            };*/
        </script>

    </body>
</html>
