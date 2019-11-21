<?php 
  session_start(); 
  error_reporting(0);
  $versession= $_SESSION['usuario'];

  if ($versession == null || $versession='') {
    echo '<script type="text/javascript"> alert("Usted no inició sesión/ No tienes permiso"); window.location="index.php";  </script>';
    die();
  } 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilos/estructuras.css">
  <link rel="stylesheet" type="text/css" href="estilos/formulario.css">
  <link rel="stylesheet" type="text/css" href="estilos/tablas.css">
  <!--<link rel="stylesheet" type="text/css" href="librerias/bootstrap-4.3.1/dist/css/bootstrap.css">-->
	<title>Ingresar Categorías::</title>
</head>
<body>

  <?php 
    include_once("estructura_inventario/encabezado.php");
    include_once("estructura_inventario/menu.php");
  ?>
  
  <section id="cont_principal">
    <article>
      
      <h1>Categorias</h1>
      <div class="tablas">
        <table border="2" cellpadding="5" cellspacing="20" align="center">
          <form  action="procesos/categ_agregar.php" method="post" class="form">
            <tr>
              <td class="td"><label>Nombre de Categorias:</label></td>
              <td class="td"><input type="text"  name="nomb_categ" autocomplete="off" required></td>
            </tr>
            <td colspan="2"><button type="submit" name="ingreso_cat" id="boton">Ingresar categorias</button></td>
          </form>
        </table><br>
      </div>
     
      
    </article>
  </section> <!-- / #cont_principal -->
</body>
</html>