<?php include("Acceso.php"); ?>

<!--Estilos-->
   <?php include("barra_factura.php"); 
    ?>
	<?php include("head.php");
	  ?>
</head>
<!--Estilos-->

<div style="visibility: hidden; position:absolute;" > 
<?php include "eventos.php";?></div>
<!--Menu_Producto-->
 
     <div class="main">
     
      <!-- Nuevo evento -->
      <?php if (isset($_GET["action"]) && ($_GET["action"]=="nuevo")):
      $evento = new calendario();
      $evento -> nuevo($db_connect);?>
      
      <!-- Eliminar evento -->
      <?php elseif (isset($_GET["action"]) && ($_GET["action"]=="eliminar")):
      $evento = new calendario();
      $evento -> eliminar($db_connect);?>

      <!-- Listado de eventos -->
      <?php else: ?>
      <?php include_once "calendario.php"; ?>

      <?php endif; ?>
</div>
<!--Fondo-->
<?php
     include("fondo.php");
?>
</div>
<!--Fondo-->

<!--Redes Sociales-->
<?php
     include("link.php");
?>
</ul>
<!--Redes Sociales-->

<!--Pie de Página-->
<?php
     include("footer.php");
?>  

<?php $db_connect = null; ?>