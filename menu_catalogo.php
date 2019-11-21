<?php
//include('php/conexion.php');
//$conexion=conexion();
//session_start();
$fila_variedad=0;
if(isset($_SESSION['cedula'])){
$x_user=$_SESSION['cedula'];
//echo "Usser:".$x_user;
$sql_orden="select orden_id from orden where orden_cedula='$x_user';";
//echo $sql_orden;
$sql_contador=mysqli_query($conexion,$sql_orden);
$fila_variedad=mysqli_num_rows($sql_contador);
}


//echo $fila_variedad;
if($fila_variedad==null || $fila_variedad=="" || $fila_variedad==0)
{$cont=0;}
else
{$cont=$fila_variedad;}
//echo cont;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css‌​/bootstrap-glyphicon‌​s.css">


<title>Documento sin título</title>
</head>

<body>
<div class="menu">
        <div class="container">
    	<div class="row">
			<div class="templatemo_topwrapper shadow">
            	<div class="col-sm-3">
                	<div class="templatemo_webtitle">LANGOQUIL</div>
                </div>
                <div class="col-sm-9">
                	<nav class="navbar navbar-default" role="navigation">
          <div class="container-fluid"> 
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id="top-menu">
              <div class="collapse navbar-collapse main_menu" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li><a href="index.html"><span class="fa fa-home"></span>HOME</a></li>
                  <li><a href="modal_1.php"><span class="fas fa-utensils"></span>RECETARIO</a></li>
                  <li><a href="catalogo.php"><span class="fas fa-book"></span>CATALOGO</a></li>
                  <li><a href="carrito.php"><span class="fa fa-cart-plus"></span>CARRITO(<?php echo $cont;?>)</a></li>
                  <li><a href="historico_venta.php"><span class="fa fa-shopping-basket" aria-hidden="true"></span>HISTORICO</a></li>
                 </ul>
              </div>
            </div>
            <!-- /.navbar-collapse --> 
          </div>
          <!-- /.container-fluid --> 
        </nav>
                </div>
            </div>
   	  </div>
      </div>
      </div>
      <!--FIN MENU-->    
      
</body>
</html>