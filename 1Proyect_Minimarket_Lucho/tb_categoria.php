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
  <link rel="stylesheet" type="text/css" href="estilos/tablas.css">
  <link rel="stylesheet" type="text/css" href="estilos/formulario.css">
	<title>Modificar Categorías::</title>
</head>
<body>

  <?php 
    include_once("estructura_inventario/encabezado.php");
    include_once("estructura_inventario/menu.php");
  ?>
  
  <section id="cont_principal">
    <article>
      <h1>Modificar Categorias</h1>

      <?php 
        require_once ("conexion/conexion.php");
        $db_conex= new conectar_bd();
        $conectando=$db_conex->conexion_bd();
     
        $codigo=$_REQUEST["id"];
        $selec_categorias="SELECT * FROM categorias WHERE cat_codigo='$codigo'";
        $respuesta_categorias= $conectando->query($selec_categorias);
        $fila=$respuesta_categorias->fetch_assoc();
      ?>
      <div class="tablas">
        <table border="5" cellpadding="5" cellspacing="20" align="center">
          <form action="procesos/categ_modificar.php?id=<?php echo $fila["cat_codigo"]; ?>" method="post" class="form">
            <tr>
              <td class="td"><label>Nombre de Categorias:</label></td>
              <td class="td"><input type="text"  name="nomb_categ" autocomplete="off" required value="  <?php echo ucfirst($fila["cat_nombre"]) ?>"></td>
            </tr>
            <td colspan="2"><button type="submit" name="act_categ" id="boton">Actualizar categorias</button></td>
          </form>
        </table>
      </div>
    </article>
  </section> <!-- / #cont_principal -->
</body>
</html>