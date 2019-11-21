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
  <title>Productos_Stock::</title>
</head>

<body>
  <?php 
    include_once("estructura_inventario/encabezado.php");
    include_once("estructura_inventario/menu.php");
    require "conexion/conexion.php";

    $db_conex= new conectar_bd();
    $conectando=$db_conex->conexion_bd();

    $selec_producto= "SELECT prd_codigo, prd_descripcion from productos";
    $resp_producto= mysqli_query($conectando, $selec_producto); 
  ?>

  <section id="cont_principal">
    <article>
      <h1>Stocks</h1>
      <div class="tablas">
        <table border="2" cellpadding="5" cellspacing="20" align="center">
      <form  action="procesos/stock_agregar.php" method="post" class="form">
        <tr>
          <td class="td"><label>Producto:</label></td>
          <td class="td"><select  id="seleccion_producto" name="prd_select"> 
            <option value="A">Seleccionar Productos</option>
            <?php while($vista=mysqli_fetch_row($resp_producto)): ?>
              <option value="<?php echo $vista[0] ?>"><?php echo $vista[1]; ?></option>
            <?php endwhile; ?>
          </select></td>
      </tr>
      <tr>
          <td class="td"><label>Cantidad de Stock:</label></td>
          <td class="td"><input type="number"  name="cant_stock" required min="0"></td>
      </tr>
      <!--<tr>
          <td class="td"><label>Costo ($):</label></td>
          <td class="td"><input type="number"  name="costo_vta" required min="0" step="0.01"></td>
      </tr>-->
      <tr>
          <td class="td"><label>Fecha de Caducidad:</label></td>
          <td class="td"><input type="date"  name="f_Caducidad" required></td>
      </tr>

        <td colspan="2"><button type="submit" name="ingreso_prod" id="boton">Ingresar Stocks</button></td>
      </form>
    </table>
  </div>


    </article>
  </section>
</body>
</html>