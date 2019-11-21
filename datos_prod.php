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
	<title>Datos Productos::</title>
</head>

<script type="text/javascript">
  function eliminarregistro(){
    var confirmar = confirm("¿Estas seguro que deseas eliminar este registro de producto?");
    if (confirmar == true) {
      return true;
    } else{
    return false; 
    }
  }
</script>

<body>
	  <?php 
    include_once("estructura_inventario/encabezado.php");
    include_once("estructura_inventario/menu.php");
  ?>
  
  <section id="cont_principal">
    <article>
      <!--Se presenta la tabla de resultado de todas la categorias-->
      <h1>Listado de Productos</h1>
      <div class="tablas">
        <table border="2" cellpadding="5" cellspacing="30" align="center">
          <tr>
            <td class="td">#</td>    
            <td class="td">Descripción</td>
            <td class="td">Presentación</td>
            <td class="td">Marca</td>
            <td class="td">Categorias</td>
            <td class="td">Proveedores</td>
            <td class="td">Cantidad de Stock</td>
            <td class="td">Costo de Compra</td>
            <td class="td">Costo de Venta</td>
            <th colspan="2">Operaciones</th>
          </tr>

          <?php 
            function contar(){
              static $contador = 1;
              return $contador++;
            }
       
            require_once 'conexion/conexion.php';
            $db_conex= new conectar_bd();
            $conectando=$db_conex->conexion_bd();

            $datos_productos  ="SELECT pd.prd_codigo, pd.prd_descripcion, pd.prd_presentacion, pd.prd_marca, pd.prd_existencia, pd.prd_costcompra, 
            pd.prd_costventa ,cg.cat_nombre, pv.prv_nombre FROM productos pd 
             LEFT JOIN categorias cg ON cg.cat_codigo = pd.prd_cat_cod 
             LEFT JOIN proveedores pv ON pv.prv_codigo=pd.prd_prv_cod";

            $respuesta_producto= $conectando->query($datos_productos);
            while ($fila=$respuesta_producto->fetch_assoc()) {             
          ?>
          <tr>
            <td class="td"> <?php echo contar()?></td>
            <!--Se presenta señalando con el nombre del campo determinada en la BD-->
            <td class="td"> <?php echo ucfirst($fila["prd_descripcion"]) ?></td>
            <td class="td"> <?php echo ucfirst($fila["prd_presentacion"]) ?></td>
            <td class="td"> <?php echo ucfirst($fila["prd_marca"]) ?></td>
            <td class="td"> <?php echo ucfirst($fila["cat_nombre"]) ?></td>
            <td class="td"> <?php echo ucfirst($fila["prv_nombre"]) ?></td>
            <td class="td"> <?php echo $fila["prd_existencia"] ?></td>
            <td class="td"> <?php echo '$ '.$fila["prd_costcompra"] ?></td>
            <td class="td"> <?php echo '$ '.$fila["prd_costventa"] ?></td>

            <!--Busca el id de la colmuna de la BD para modificar-->
            <td class="td"><a href= "tb_productos.php?id=<?php echo $fila["prd_codigo"];?>"><span class="lnr lnr-pencil" title="Modificar"></span></a></td>
            <td class="td"><a href= "procesos/prod_eliminar.php?id=<?php echo $fila["prd_codigo"];?>" onclick=" return eliminarregistro();"><span class="lnr lnr-trash" title="Eliminar"></span></a>
            </td>
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
