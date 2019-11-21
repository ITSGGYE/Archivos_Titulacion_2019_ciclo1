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
  <title>Datos Productos Entrantes::</title>
</head>
<body>
    <?php 
    include_once("estructura_inventario/encabezado.php");
    include_once("estructura_inventario/menu.php");
  ?>
  
  <section id="cont_principal">
    <article>
      <!--Se presenta la tabla de resultado de todas la categorias-->
      <h1>Listado de Stock</h1>
      <div class="tablas"> 
      <table border="2" cellpadding="5" cellspacing="20" align="center">
        <tr>
          <td class="td">#</td>    
          <td class="td">Producto</td>
          <td class="td">Cantidad de Stock</td>
          <td class="td">Costo total</td>
          <td class="td">Fecha de Ingreso</td>
          <td class="td">Fecha de Caducidad</td>
        </tr>

        <?php 
          function contar(){
            static $contador = 1;
            return $contador++;
          }

          require_once 'conexion/conexion.php';
          $db_conex= new conectar_bd();
          $conectando=$db_conex->conexion_bd();
          
          $datos_entradas="SELECT sto.ing_prd_cod, sto.ing_stock, sto.ing_total, sto.ing_fcaptura, sto.ing_fcaducidad, pd.prd_descripcion 
          FROM ingreso_stock sto JOIN productos pd ON pd.prd_codigo=sto.ing_prd_cod"; 
          $select_entrada= $conectando->query($datos_entradas);
          while ($fila=$select_entrada->fetch_assoc()) {             
        ?>
        <tr>
          <!--Se presenta señalando con el nombre del campo determinada en la BD-->
          <td class="td"> <?php echo contar()?></td> 
          <td class="td"> <?php echo $fila["prd_descripcion"] ?></td>
          <td class="td"> <?php echo $fila["ing_stock"] ?></td>
          <td class="td"> <?php echo '$ '.$fila["ing_total"] ?></td>
          <td class="td"> <?php echo $fila["ing_fcaptura"] ?></td>
          <td class="td"> <?php echo $fila["ing_fcaducidad"] ?></td>
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