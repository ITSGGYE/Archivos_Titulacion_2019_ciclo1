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
	<title>Modificar Productos::</title>
</head>
<body>

  <?php 
    include_once("estructura_inventario/encabezado.php");
    include_once("estructura_inventario/menu.php");
  ?>
  
  <section id="cont_principal">
    <article>
      <h1>Modificar Productos</h1>

      <?php 
        require_once ("conexion/conexion.php");
        $codigo=$_REQUEST["id"];
        $db_conex= new conectar_bd();
        $conectando=$db_conex->conexion_bd();

        /*$datos_productos  ="SELECT pd.prd_descripcion, pd.prd_presentacion, pd.prd_marca, pd.prd_existencia, pd.prd_costcomp,
             cg.cat_nombre, pv.prv_nombre FROM productos pd 
             LEFT JOIN categorias cg ON cg.cat_codigo = pd.prd_cat_cod 
             LEFT JOIN proveedores pv ON pv.prv_codigo=pd.prd_prv_cod WHERE pd.prd_codigo='$codigo'";*/

       //Consulta de categoria para llamar a los nombres de categorias
        $selec_categoria= "SELECT  cat_codigo, cat_nombre from categorias"; 
        $resp_categ= mysqli_query($conectando,$selec_categoria);

        //Consulta de categoria para llamar a los nombres de proveedores 
        $selec_proveedor= "SELECT prv_codigo, prv_empresa from proveedores WHERE prv_estado='A'";
        $resp_proveed= mysqli_query($conectando,$selec_proveedor);  

        $tb_productos="SELECT * FROM productos WHERE prd_codigo='{$codigo}'";
        $respuesta_productos= $conectando->query($tb_productos);
        $fila=$respuesta_productos->fetch_assoc();
      ?>
      <div class="tablas">
        <table border="5" cellpadding="5" cellspacing="20" align="center">
          <form action="procesos/prod_modificar.php?id=<?php echo $fila["prd_codigo"]; ?>" method="post" class="form">
            <tr>
              <td class="td"><label>Descripción:</label></td>
              <td class="td"><input type="text"  name="desc_producto" required value=" <?php echo $fila["prd_descripcion"] ?>"></td>
            </tr>
            <tr>
              <td class="td"><label>Presentación:</label></td>
              <td class="td"><select  id="seleccion_cat" name="present_select"> 
                <option value="">Seleccionar el tamaño</option>
                <option <?php if($fila["prd_presentacion"]  === "Caja") echo 'selected="selected"';?> value="Caja">Caja</option>
                <option <?php if($fila["prd_presentacion"]  === "Cartón") echo 'selected="selected"';?> value="Cartón">Cartón</option>
                <option <?php if($fila["prd_presentacion"]  === "Saco") echo 'selected="selected"';?> value="Saco">Saco</option>
                <option <?php if($fila["prd_presentacion"]  === "Bolsa") echo 'selected="selected"';?>value="Bolsa">Bolsa</option>
                <option <?php if($fila["prd_presentacion"]  === "Paquete") echo 'selected="selected"';?>value="Bolsa">Paquete</option>
                <option <?php if($fila["prd_presentacion"]  === "Kilogramo") echo 'selected="selected"';?>value="Kilogramo">Kilogramo</option>
                <option <?php if($fila["prd_presentacion"]  === "Onzas") echo 'selected="selected"';?>value="Onzas">Onzas</option>
                <option <?php if($fila["prd_presentacion"]  === "Libra") echo 'selected="selected"';?>value="Libras">Libras</option>
                <option <?php if($fila["prd_presentacion"]  === "Botella") echo 'selected="selected"';?> value="Botella">Botella</option>
                <option <?php if($fila["prd_presentacion"]  === "Botellón") echo 'selected="selected"';?> value="Botellón">Botellón</option>
                <option <?php if($fila["prd_presentacion"]  === "Galón") echo 'selected="selected"';?>value="Galón">Galón</option>
                <option <?php if($fila["prd_presentacion"]  === "Litro") echo 'selected="selected"';?>value="Litro">Litro</option>
                <option <?php if($fila["prd_presentacion"]  === "Mililitro") echo 'selected="selected"';?>value="Mililitro">Mililitro</option>
              </select></td>
            </tr>
            <tr>
              <td class="td"><label>Marca:</label></td>
              <td class="td"><input type="text"  name="marca_producto" required value=" <?php echo $fila["prd_marca"] ?>"></td>
            </tr>
            <tr>
              <td class="td"><label>Categoría:</label></td>
              <td class="td"><select  id="seleccion_cat" name="cat_select">
                <option value="">Seleccionar Categorias</option>
                  <?php while($ver=mysqli_fetch_array($resp_categ)): ?>
                <option <?php if($ver[0] === $fila["prd_cat_cod"]) echo "selected='selected'"; ?>value="<?php echo $ver[0]?>">
                <?php echo ucfirst($ver[1]); ?></option>
                  <?php endwhile; ?>
              </select></td>
            </tr>
            <tr>
              <td class="td"><label>Proveedores:</label></td>
              <td class="td"><select  id="seleccion_cat" name="proveed_select"> 
                <option value="">Seleccionar Proveedores</option>
                  <?php while($ver=mysqli_fetch_row($resp_proveed)): ?>
                <option <?php if($ver[0] === $fila["prd_prv_cod"]) echo "selected='selected'"; ?>value="<?php echo $ver[0]?>">
                <?php echo ucfirst($ver[1]); ?></option>
                  <?php endwhile; ?>
              </select></td>
            </tr>
            <tr>
              <td class="td"><label>Costo de compra($):</label></td>
              <td class="td"><input type="number"  name="costo_compra" required min="0" step="0.01" value="<?php echo $fila["prd_costcompra"] ?>"></td>
            </tr>
            <tr>
              <td class="td"><label>Costo de venta($):</label></td>
              <td class="td"><input type="number"  name="costo_venta" required min="0" step="0.01" value="<?php echo $fila["prd_costventa"] ?>"></td>
            </tr>
            <td colspan="2"><button type="submit" name="act_product" id="boton">Actualizar productos</button></td>
          </form>
        </table>
      </div>
    </article>
  </section> <!-- / #cont_principal --->
</body>
</html>
