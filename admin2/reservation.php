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
     <!-- Morris Chart Styles-->
   
        <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Navegación de palanca
</span>
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
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> Perfil del usuario</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Configuraciones</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar sesión</a>
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
                        <a  href="settings.php"><i class="fa fa-dashboard"></i>Estado de la habitación
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
                        <a  href="settings.php"><i class="fa fa-dashboard"></i>Tablero de usuario
</a>
                    </li>
                      <li>
                        <a href="inicio.php"><i class="fa fa-dashboard"></i> Estado</a>
                    </li>
                    <li>
                        <a  href="mensajes.php"><i class="fa fa-desktop"></i> Boletines informativos</a>
                    </li>
                    <li>
                        <a class="active-menu" href="reservation.php"><i class="fa fa-bar-chart-o"></i>Reserva de habitacion</a>
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
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            RESERVACION <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
                
                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
INFORMACION PERSONAL
                        </div>
                        <div class="panel-body">
						<form name="form" method="post">
                            <div class="form-group">
                                            <label>Titulo*</label>
                                            <select name="title" class="form-control" required >
												<option value selected ></option>
                                                <option value="Dr.">Dr.</option>
                                                <option value="Miss.">Miss.</option>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
												<option value="Prof.">Prof.</option>
												<option value="Rev .">Rev .</option>
												<option value="Rev . Fr">Rev . Fr .</option>
                                            </select>
                              </div>
							  <div class="form-group">
                                            <label>Nombre</label>
                                            <input name="fname" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Apellido</label>
                                            <input name="lname" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" type="email" class="form-control" required>
                                            
                               </div>
							   <div class="form-group">
                                            <label>tipo de documento*</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="nation"  value="Sri Lankan" checked="">Cedula
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="nation"  value="Non Sri Lankan ">Pasaporte
                                            </label>
                         
                                </div>
								<?php

								$countries = array("Ecuador" );

								?>
								<div class="form-group">
                                            <label>Passport Country*</label>
                                            <select name="country" class="form-control" required>
												<option value selected ></option>
                                                <?php
												foreach($countries as $key => $value):
												echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
												endforeach;
												?>
                                            </select>
								</div>
								<div class="form-group">
                                            <label>Numero Celular</label>
                                            <input name="phone" type ="text" class="form-control">
                                            
                               </div>
							   
                        </div>
                        
                    </div>
                </div>
                
                  
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                     INFORMACIÓN DE RESERVA

                        </div>
                        <div class="panel-body">
								<div class="form-group">
                                            <label>Tipo de habitación*</label>
                                            <select name="troom"  class="form-control" required>
												<option value selected ></option>
                                                <option value="Superior Room">  HABITACIÓN SUPERIOR</option>
                                                <option value="Deluxe Room">HABITACIÓN DE LUJO</option>
												<option value="Guest House">CASA DE HUESPEDES</option>
												<option value="Single Room">HABITACIÓN INDIVIDUAL
</option>
                                            </select>
                              </div>
							  <div class="form-group">
                                            <label>Tipo de cama
</label>
                                            <select name="bed" class="form-control" required>
												<option value selected ></option>
                                                <option value="Single">Simple</option>
                                                <option value="Double">Double</option>
												<option value="Triple">Triple</option>
                                                <option value="Quad">Cuatro</option>
												<option value="None">Ninguna</option>
                                                
                                             
                                            </select>
                              </div>
							  <div class="form-group">
                                            <label>No. de habitación *</label>
                                            <select name="nroom" class="form-control" required>
												<option value selected ></option>
                                                <option value="1">1</option>
                                            <option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option> 
                                            </select>
                              </div>
							 
							 
							  <div class="form-group">
                                            <label>Régimen de comidas</label>
                                            <select name="meal" class="form-control"required>
												<option value selected ></option>
                                                <option value="Room only">Sólo habitación
</option>
                                                <option value="Breakfast">Desayuno</option>
												<option value="Half Board">Madia pizarra</option>
												<option value="Full Board">Pensión completa</option>
												
                                                
                                             
                                            </select>
                              </div>
							  <div class="form-group">
                                            <label>Entrada</label>
                                            <input name="cin" type="datetime-local"  class="form-control">
                                            
                               </div>
							   <div class="form-group">
                                            <label>Salida</label>
                                            <input name="cout" type="datetime-local" class="form-control">
                                            
                               </div>
                       </div>
                        
                    </div>
                </div>
				
				
                <div class="col-md-12 col-sm-12">
                    <div class="well">
                        <h4>VERIFICACIÓN HUMANA</h4>
                        <p>Escriba debajo de este código
 <?php $Random_code=rand(); echo$Random_code; ?> </p><br />
						<p>Ingrese el código aleatorio
<br /></p>
							<input  type="text" name="code1" title="random code" />
							<input type="hidden" name="code" value="<?php echo $Random_code; ?>" />
						<input type="submit" name="submit" class="btn btn-primary">
						<?php
							if(isset($_POST['submit']))
							{
							$code1=$_POST['code1'];
							$code=$_POST['code']; 
							if($code1!="$code")
							{
							$msg="Invalide code"; 
							}
							else
							{
							
									$con=mysqli_connect("localhost","root","123456789","hotel2");
									$check="SELECT * FROM roombook WHERE email = '$_POST[email]'";
									$rs = mysqli_query($con,$check);
									$data = mysqli_fetch_array($rs, MYSQLI_NUM);
									if($data[0] > 1) {
										echo "<script type='text/javascript'> alert('El usuario ya existe')</script>";
										
									}

									else
									{
										$new ="Not Conform";
										$newUser="INSERT INTO `roombook`(`Title`, `FName`, `LName`, `Email`, `National`, `Country`, `Phone`, `TRoom`, `Bed`, `NRoom`, `Meal`, `cin`, `cout`,`stat`,`nodays`) VALUES ('$_POST[title]','$_POST[fname]','$_POST[lname]','$_POST[email]','$_POST[nation]','$_POST[country]','$_POST[phone]','$_POST[troom]','$_POST[bed]','$_POST[nroom]','$_POST[meal]','$_POST[cin]','$_POST[cout]','$new',datediff('$_POST[cout]','$_POST[cin]'))";
										if (mysqli_query($con,$newUser))
										{
											echo "<script type='text/javascript'> alert('Su solicitud de reserva ha sido enviadat')</script>";
											
										}
										else
										{
											echo "<script type='text/javascript'> alert('Error al agregar usuario en la base de datos')</script>";
											
										}
									}

							$msg="Tu código es correcto";
							}
							}
							?>
						</form>
							
                    </div>
                </div>
            </div>
           
                
                </div>
                    
            
				
					</div>
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
    
   
</body>
</html>
