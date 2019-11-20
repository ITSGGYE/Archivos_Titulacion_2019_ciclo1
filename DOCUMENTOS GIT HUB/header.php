
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SUPER DOC - SISTEMA VETERINARIO</title>
	<!--*********** cambio de hojas de estilo ***************-->

    <link rel="stylesheet" href="css/style-nave.css?nocache=" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/ident.css?nocache=" type="text/css" media="screen" />
 <link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
    <!--- ************** Menu ********************************-->

<?php  
error_reporting(E_ALL ^ E_DEPRECATED);


if(@$_SESSION["tipo"]=="ADMINISTRADOR"){@$tipo = "Administrador";}elseif(@$_SESSION["tipo"]=="ASISTENTE"){@$tipo="Asistente";}
?>
<html>
<body>

<!-- Menu -->
    <div class="wrapper">
  <nav role='navigation' class="topbar">
    <a class="toggle" href="#">&#9776; Menu</a>
    <ul class="nav">
      <li class="dropdown">
        <a href="#">Inicio</a>
        <ul>
          <li><a href="principal.php">Principal</a></li>
          <li><a href="desconectar.php">Salir</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#">Registros</a>
        <ul>
          <li><a href="registro_administracion.php">Administracion Sistema</a></li>
          <li><a href="registro_paciente.php">Registro Pacientes</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="registro_historial.php">Historial</a>
      </li>
      <li class="dropdown">
        <a href="#">Reportes</a>
        <ul>
          <li><a href="rep_hist.php">Por Historia (PDF)</a></li>
          <li><a href="rep_ficha.php">Por Ficha (PDF)</a></li>
         
        </ul>
      </li>
        
    </ul>
  </nav>
</div>



<?php
include("footer.php")
?>        