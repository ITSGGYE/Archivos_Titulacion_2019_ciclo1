<?php
session_start();

require '../Conexion/config.php';
require '../Conexion/functions.php';
ob_clean();
ob_start();
require_once('./tcpdf/tcpdf.php');
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);


$conexion = conexion($bd_config);
$usuario = iniciarSession('usuariosig', $conexion);

$nombre = $usuario['usuario'];
// put your code here

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $anio = $_POST['anio'];
    $mes = $_POST['mes'];
    echo $t_sacramento = (int) $_POST['sacramento'];
    echo $fecha = $anio . "-" . $mes . "-" . "01";
   // $new_fe = date("Y-m-d",strtotime($fecha_final."- 1 days"));
    echo $fecha_final = $anio . "-" . $mes . "-" . "31";
    echo $new_f = date("Y-m-d",strtotime($fecha_final."+ 1 days"));
    $query = "SELECT * FROM sacramentos WHERE sac_fecha > :_FECHA AND sac_fecha < :_FECHA_FINAL AND sac_tipo = :_TIPO";

    $stmt = $conexion->prepare($query);
    $stmt->bindParam(":_FECHA", $fecha);
    $stmt->bindParam(":_FECHA_FINAL", $new_f);
    $stmt->bindParam(":_TIPO",$t_sacramento,PDO::PARAM_INT,4000);
    $stmt->execute();
    $cont = 0;
    $sacramento = "";
    $cadena = "";
    while ($data = $stmt->fetch()) {
        $cont++;
        if ($data['sac_tipo'] == 1) {
            $sacramento = "BAUTISMO";
        } elseif ($data['sac_tipo'] == 2) {
            $sacramento = "PRIMERA COMUNION";
        } elseif ($data['sac_tipo'] == 3) {
            $sacramento = "CONFIRMACION";
        } elseif ($data['sac_tipo'] == 4) {
            $sacramento = "MATRIMONIO";
        }
        echo $cadena = $cadena . '<tr><td>' . $cont . '</td>
                                    <td>' . $sacramento . '</td>
                                    <td>' . $data["sac_fecha"] . '</td>
                                    <td>' . $data["sac_tomo"] . '</td>
                                    <td>' . $data["sac_pagina"] . '</td>
                                    <td>' . $data["sac_acta"] . '</td>
                                    <td>' . $data["sac_usuario"] . '</td></tr>';
    }


    if ($stmt) {
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Ebenedent System');
        $pdf->SetTitle("REPORTE DE SACRAMENTOS");
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetMargins(10, 10, 10, false);
        $pdf->SetAutoPageBreak(true, 20);
        $pdf->SetFont('times', '', 12);
        $pdf->addPage();
        $content = '';
        $content = "  
            
                        <div class='col-md-10'>                       
                            <h1 style='text-align:center;color: #245269'>ARQUIDIÓCESIS DE GUAYAQUIL</h1>
                            <h3 style='text-align:center;color: #245269;'>Parroquia SAN JERÓNIMO DE CHONGÓN</h3>
                            <h4 style='text-align:center;color: #245269'>Av. Principal y Calle 4ta. Mz.37 Solar 1</h4>
                            <h4 style='text-align:center;color: #245269'>Teléfono: 2738470</h4>
                            <h4 style='text-align:center;color: #245269'>Guayas - Guayaquil</h4> 
                            <h4 style='text-align:right;color: #245269';margin-top:20px;>Guayaquil " . date('Y-m-d') . "
                        
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class='col-md-1'>

                        </div>
                        <div class='col-md-10'>                 
                            <table border='3' cellpadding='10' align='center' style='width:100%;'>
                                <thead>
                                <tr>
                                <th>N°</th>
                                <th>SACRAMENTO</th>
                                <th>FECHA</th>
                                <th>TOMO</th>
                                <th>PAGINA</th>
                                <th>ACTA</th>
                                <th>RESPONSABLE</th>
                                </tr>
                                </thead>
                                <tbody>";
                                        $content = $content . $cadena;
                                        $content = $content . "<tr><td>TOTAL</td><td>".$cont."</td></tr></tbody></table>
                            </font>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>";

       $pdf->writeHTML($content, true, 0, true, 0);
       $pdf->lastPage();
       ob_end_clean();
        $pdf->output('Reporte_mensual_de_sacramento' . date("Y-m-d") . '.pdf', 'I');
    }
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<!--<html>
    <head>
        <meta charset='UTF-8'>
        <link href='css/bootstrap.css' rel='stylesheet' type='text/css'/>
        <title></title>
    </head>
    <body>

        <div class='container'>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='col-md-1'>

                        </div>
                        <div class='col-md-10'>
                            <h1 style='text-align:center;color: #245269'>ARQUIDIÓCESIS DE GUAYAQUIL</h1>
                            <h3 style='text-align:center;color: #245269;'>Parroquia SAN JERÓNIMO DE CHONGÓN</h3>
                            <h4 style='text-align:center;color: #245269'>Av. Principal y Calle 4ta. Mz.37 Solar 1</h4>
                            <h4 style='text-align:center;color: #245269'>Teléfono: 2738470</h4>
                            <h4 style='text-align:center;color: #245269'>Guayas - Guayaquil</h4> 
                            <h4 style='text-align:right;color: #245269';margin-top:20px;>Chóngon " . date('Y-m-d') . "

                        </div>
                    </div>
                    <div class='col-md-12'>
                        <div class='col-md-1'>

                        </div>
                        <div class='col-md-10'>
                            <table>
                                <thead>
                                <th>#</th>
                                <th>TIPO DE SACRAMENTO</th>
                                <th>FECHA</th>
                                <th>TOMO</th>
                                <th>PAGINA</th>
                                <th>ACTA</th>
                                <th>RESPNSABLE</th>
                                </thead>
                                <tbody>
                                    " . $cadena . "
                                </tbody>
                            </table>
                            </font>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>-->
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
                <li class=""><a href="ModeloAdministrador.php"><em class="fa fa-dashboard">&nbsp;</em> Menu Principal</a></li>
                <li class="active"><a href="ModeloReportes.php"><em class="fa fa-book">&nbsp;</em> Reportes</a></li>

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
                    <li class="active">Reportes</li>
                </ol>
            </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Reportes mensuales de los sacramentos</h1>

                </div>
            </div><!--/.row-->

            
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="col-md-3">
                                PDF de sacramentos
                            </div> 
                            <form action="ModeloReportes.php" method="POST" target="_blank">
                                <div class="col-md-2">

                                    <select class="form-control" id="Year" name="anio">
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
                                <div class="col-md-2">
                                    <select class="form-control" name="mes">
                                        <option disabled="" selected>Seleccione Mes</option>
                                        <option value="01">Enero</option>
                                        <option value="02">Febrero</option>
                                        <option value="03">Marzo</option>
                                        <option value="04">Abril</option>
                                        <option value="05">Mayo</option>
                                        <option value="06">Junio</option>
                                        <option value="07">Julio</option>
                                        <option value="08">Agosto</option>
                                        <option value="09">Septiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>



                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="sacramento">
                                        <option disabled="" selected="">Selecciona el Sacramento</option>
                                        <option value="1">BAUTISMO</option>
                                        <option value="2">PRIMERA COMUNION</option>
                                        <option value="3">CONFIRMACION</option>
                                        <option value="4">MATRIMONIO</option>
                                    </select>

                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input class="btn btn-primary" type="submit"  name="pdf" value="GENERAR PDF">
                                </div>
                            </form>

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
