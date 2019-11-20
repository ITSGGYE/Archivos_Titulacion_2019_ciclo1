<title>SUPER DOC - SISTEMA VETERINARIO</title>
	<!--*********** cambio de hojas de estilo ***************-->

    <link rel="stylesheet" href="css/style-nave2.css?nocache=" type="text/css" media="screen" />
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
        <a href="#">INICIO</a>
        <ul>
          <li><a href="index.php">PRINCIPAL</a></li>
          <li><a href="html5-slideshow.php">GALERIA</a> </li>
        </ul>
      </li>


      <li class="dropdown">
        <a href="#">INFORMACIÓN</a>
        <ul>
          <li><a href="descripcion.php">ACERCA DE LA VETERINARIA </a></li>
        </ul>
      </li>


      <li class="dropdown">
        <a href="#">INGRESAR AL SISTEMA</a>
        <ul>
          <li><a href="index1.php">Iniciar Sesión</a></li>
        </ul>
      </li>
    </ul>
  </nav>
</div>


</html>

</body>


<?php
include("footer.php")
?>        

