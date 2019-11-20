<?php  
session_start();  
if(!isset($_SESSION["user"]))
{
 header("location:index.php");
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Hostal El Parque</title>
	<!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Navegación de palanca</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                             <a class="navbar-brand" href="inicio.php"><?php echo $_SESSION["user"]; ?> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
			
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>Perfil del usuario
</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Configuraciones</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión
</a>
                        </li>
                    </ul>
					
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="settings.php"><i class="fa fa-dashboard"></i>Estado de la habitación
</a>
                    </li>
					<li>
                        <a  href="habitacion.php"><i class="fa fa-plus-circle"></i>Agregar habitación</a>
                    </li>
                    <li>
                        <a   href="roomdel.php"><i class="fa fa-pencil-square-o"></i> Eliminar habitación
</a>
                    </li>
					  <li>
                        <a href="inicio.php"><i class="fa fa-dashboard"></i> Estado</a>
                    </li>
                    <li>
                        <a  href="mensajes.php"><i class="fa fa-desktop"></i> Boletines informativos</a>
                    </li>
                    <li>
                        <a  href="reservation.php"><i class="fa fa-bar-chart-o"></i>Reserva de habitacion</a>
                    </li>
                    <li>
                        <a  href="pago.php"><i class="fa fa-qrcode"></i> Pago</a>
                    </li>
                    <li>
                        <a  href="ganacia.php"><i class="fa fa-qrcode"></i> Lucro</a>
                    </li>
                    <li>
                        <a href="logout.php" ><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión
</a>
                    </li>

                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           Disponible
 <small> Habitaciones</small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <?php
						include ('db.php');
						$sql = "select * from room";
						$re = mysqli_query($con,$sql)
				?>
                <div class="row">
				<!DOCTYPE html>
<!-- 
Autor javascript: http://countdown.onlineclock.net/
Modificación javascript y autor html: Webempresa
Descripción : Archivo de cuenta regresiva, copiar en la raíz o en alguna carpeta del sitio web.
-->
<html lang="es">
<head>
    <meta charset="utf-8">
   
</head>
    <body>
        
    </body>
    
      
</html>
				
				<?php
										while($row= mysqli_fetch_array($re))
										{
												$id = $row['type'];
											if($id == "Superior Room") 
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$row['bedding']."</h3>
														</div>
														<div class='panel-footer back-footer-blue'>
															".$row['type']."
                                                                                                                      
    
 
														</div>
                                                                                                           <body>
    <div class='chronometer'>
        <div id='screen'>00 : 00 : 00 : 00</div>
        <div class='buttons'>
            <button class='emerald' onclick='start()''>START &#9658;</button>
            <button class='emerald' onclick='stop()'>STOP &#8718;</button>
            <button class='emerald' onclick='resume()'>RESUME &#8634;</button>
            <button class='emerald' onclick='reset()'>RESET &#8635;</button>
        </div>
    </div>
</body>
													</div>
 
												</div>";
											}
											else if ($id == "Deluxe Room")
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-green'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$row['bedding']."</h3>
														</div>
														<div class='panel-footer back-footer-green'>
															".$row['type']."

														</div>
                                                                                                           <body>
    <div class='chronometer'>
        <div id='screen'>00 : 00 : 00 : 00</div>
        <div class='buttons'>
            <button class='emerald' onclick='start()''>START &#9658;</button>
            <button class='emerald' onclick='stop()'>STOP &#8718;</button>
            <button class='emerald' onclick='resume()'>RESUME &#8634;</button>
            <button class='emerald' onclick='reset()'>RESET &#8635;</button>
        </div>
    </div>
</body>
													</div>
												</div>";
											
											}
											else if($id =="Guest House")
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-brown'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$row['bedding']."</h3>
														</div>
														<div class='panel-footer back-footer-brown'>
															".$row['type']."

														</div>
                                                                                                           <body>
    <div class='chronometer'>
        <div id='screen'>00 : 00 : 00 : 00</div>
        <div class='buttons'>
            <button class='emerald' onclick='start()''>START &#9658;</button>
            <button class='emerald' onclick='stop()'>STOP &#8718;</button>
            <button class='emerald' onclick='resume()'>RESUME &#8634;</button>
            <button class='emerald' onclick='reset()'>RESET &#8635;</button>
        </div>
    </div>
</body>
													</div>
												</div>";
											
											}
											else if($id =="Single Room")
											{
												echo"<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-red'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>".$row['bedding']."</h3>
														</div>
														<div class='panel-footer back-footer-red'>
															".$row['type']."

														</div>
                                                                                                           <body>
    <div class='chronometer'>
        <div id='screen'>00 : 00 : 00 : 00</div>
        <div class='buttons'>
            <button class='emerald' onclick='start()''>START &#9658;</button>
            <button class='emerald' onclick='stop()'>STOP &#8718;</button>
            <button class='emerald' onclick='resume()'>RESUME &#8634;</button>
            <button class='emerald' onclick='reset()'>RESET &#8635;</button>
        </div>
    </div>
</body>
													</div>
												</div>";
											
											}
										}
									?>
                    
                </div>
                <!-- /. ROW  -->
                
                                
                  
            
			 <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    <script type="text/javascript">
        window.onload = function() {
   pantalla = document.getElementById("screen");
}
var isMarch = false; 
var acumularTime = 0; 
function start () {
         if (isMarch == false) { 
            timeInicial = new Date();
            control = setInterval(cronometro,10);
            isMarch = true;
            }
         }
function cronometro () { 
         timeActual = new Date();
         acumularTime = timeActual - timeInicial;
         acumularTime2 = new Date();
         acumularTime2.setTime(acumularTime); 
         cc = Math.round(acumularTime2.getMilliseconds()/10);
         ss = acumularTime2.getSeconds();
         mm = acumularTime2.getMinutes();
         hh = acumularTime2.getHours()-18;
         if (cc < 10) {cc = "0"+cc;}
         if (ss < 10) {ss = "0"+ss;} 
         if (mm < 10) {mm = "0"+mm;}
         if (hh < 10) {hh = "0"+hh;}
         pantalla.innerHTML = hh+" : "+mm+" : "+ss+" : "+cc;
         }

function stop () { 
         if (isMarch == true) {
            clearInterval(control);
            isMarch = false;
            }     
         }      

function resume () {
         if (isMarch == false) {
            timeActu2 = new Date();
            timeActu2 = timeActu2.getTime();
            acumularResume = timeActu2-acumularTime;
            
            timeInicial.setTime(acumularResume);
            control = setInterval(cronometro,10);
            isMarch = true;
            }     
         }

function reset () {
         if (isMarch == true) {
            clearInterval(control);
            isMarch = false;
            }
         acumularTime = 0;
         pantalla.innerHTML = "00 : 00 : 00 : 00";
         }
    </script>

  
   
</body>
</html>
