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
  <title>Datos Productos Salientes::</title>
</head>
<body>
    <?php 
    include_once("estructura_inventario/encabezado.php");
    include_once("estructura_inventario/menu.php");
  ?>
  
  <section id="cont_principal">
    <article>
            <!--Se presenta la tabla de resultado de todas la categorias-->
      <h1>Listado de Ventas</h1>
      <div class="tablas">
        <table border="2" cellpadding="5" cellspacing="30" align="center">
      
        <tr>
          <td class="td">#</td>    
          <td class="td">Producto</td>
          <td class="td">Cantidad de Ventas</td>
          <td class="td">Precio</td>
          <td class="td">Fecha de Venta</td>
        </tr>

        <?php 
          function contar(){
            static $contador = 1;
            return $contador++;
          }

          require_once 'conexion/conexion.php';
          $db_conex= new conectar_bd();
          $conectando=$db_conex->conexion_bd();
          
          $tb_ventas="SELECT vt.vta_prd_cod, vt.vta_cantidad, vt.vta_total, vt.vta_fcapt, pd.prd_descripcion 
          FROM ventas vt LEFT JOIN productos pd ON pd.prd_codigo = vt.vta_prd_cod";
          $resp_producto= $conectando->query($tb_ventas);
          while ($fila=$resp_producto->fetch_assoc()) {             
        ?>
        <tr>
          <!--Se presenta señalando con el nombre del campo determinada en la BD-->
          <td class="td"> <?php echo contar()?></td> 
          <td class="td"> <?php echo $fila["prd_descripcion"] ?></td>
          <td class="td"> <?php echo $fila["vta_cantidad"] ?></td>
          <td class="td"> <?php echo '$ '.$fila["vta_total"] ?></td>
          <td class="td"> <?php echo $fila["vta_fcapt"] ?></td>
        </tr>
       
        <?php  
          }
        ?>
      </table>
    </div>
  </article>
</section>
</body>
</html>