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
	<title>Ingresar Productos::</title>
</head>

<body>
  <?php 
    include_once("estructura_inventario/encabezado.php");
    include_once("estructura_inventario/menu.php");
    require "conexion/conexion.php";

    $db_conex= new conectar_bd();
    $conectando=$db_conex->conexion_bd();

    $selec_categoria="SELECT cat_codigo, cat_nombre from categorias"; //Consulta de categoria para llamar a los nombres de categorias
    $selec_proveedor="SELECT prv_codigo, prv_empresa from proveedores WHERE prv_estado='A'";
    
    $resp_categoria=mysqli_query($conectando,$selec_categoria);
    $resp_proveedor=mysqli_query($conectando, $selec_proveedor);
  ?>

  <section id="cont_principal">
    <article>
      <h1>Productos</h1>
      <div class="tablas">
        <table border="5" cellpadding="5" cellspacing="20" align="center">
          <form  action="procesos/prod_agregar.php" method="post" class="form">
            <tr>
              <td class="td"><label>Descripción:</label></td> 
              <td class="td"><input type="text"  placeholder=" Especificar Nombre y Peso" name="desc_producto" autocomplete="off" required></td>
            </tr>
            <tr>
              <td class="td"><label>Presentación:</label></td>
              <td class="td"><select  id="seleccion_cat" name="present_select"> 
                <option value="">Seleccionar el tamaño</option>
                <option value="Caja">Caja</option>
                <option value="Carton">Carton</option>
                <option value="Saco">Saco</option>
                <option value="Bolsa">Bolsa</option>
                <option value="Paquete">Paquete</option>
                <option value="Kilogramo">Kilogramo</option>
                <option value="Onzas">Onzas</option>
                <option value="Libras">Libras</option>
                <option value="Galón">Galón</option>
                <option value="Botella">Botella</option>
                <option value="Litro">Litro</option>
                <option value="Mililitro">Mililitro</option>
              </select></td>
            </tr>
            <tr>
              <td class="td"><label>Marca:</label></td>
              <td class="td"><input type="text"  placeholder=" Marca del producto" name="marca_producto" autocomplete="off"required></td>
            </tr>
            <tr>
              <td class="td"><label>Categorías:</label></td>
              <td class="td"><select  id="seleccion_cat" name="cat_select"> 
                <option value="">Seleccionar Categorias</option>
                  <?php while($vista=mysqli_fetch_row($resp_categoria)): ?>
                    <option value="<?php echo ucfirst($vista[0]) ?>"><?php echo ucfirst($vista[1]); ?></option>
                  <?php endwhile; ?>
              </select></td>
            </tr>
            <tr>
              <td class="td"><label>Proveedores:</label></td>
              <td class="td"><select  id="seleccion_cat" name="proveed_select"> 
                <option value="">Seleccionar Proveedores</option>
                  <?php while($vista=mysqli_fetch_row($resp_proveedor)): ?>
                <option value="<?php echo ucfirst($vista[0]) ?>"><?php echo ucfirst($vista[1]); ?></option>
                  <?php endwhile; ?>
              </select></td>
            </tr>
            <tr>
              <td class="td"><label>Costo de Compra:</label></td>
              <td class="td"><input type="number"  name="costo_compra" required min="0" step="0.01"></td>
            </tr>
            <tr>
              <td class="td"><label>Costo de Venta:</label></td>
              <td class="td"><input type="number"  name="costo_venta" required min="0" step="0.01"></td>
            </tr>
            <td colspan="2"><button type="submit" name="ingreso_prod" id="boton">Ingresar productos</button></td>
          </form>
        </table>
      </div>
      
      
    </article>
  </section>
</body>
</html>