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
	<title>Modificar Proveedor::::</title>
</head>
<body>

  <?php 
    include_once("estructura_inventario/encabezado.php");
    include_once("estructura_inventario/menu.php");
  ?>
  
  <section id="cont_principal">
    <article>
      <h1>Modificar Proveedores</h1>

      <?php 
        require_once ("conexion/conexion.php");
        $codigo=$_REQUEST["id"];
        $db_conex= new conectar_bd();
        $conectando=$db_conex->conexion_bd();
     
        $tb_proveedor="SELECT * FROM proveedores WHERE prv_codigo='$codigo'";
        $respuesta_proveedor= $conectando->query($tb_proveedor);
        $fila=$respuesta_proveedor->fetch_assoc();
      ?>
      <div class="tablas">
        <table border="2" cellpadding="5" cellspacing="20" align="center">
          <form action="procesos/prove_modificar.php?id=<?php echo $fila["prv_codigo"]; ?>" method="post" class="form">
            <tr>
              <td class="td"><label>Nombre del Proveedor:</label></td>
              <td class="td"><input type="text"  name="nombre_proveedor" autocomplete="off" required value=" <?php echo $fila["prv_nombre"] ?>"></td>
            </tr>
            <tr>
              <td class="td"><label>Empresa del Proveedor:</label></td>
              <td class="td"><input type="text"  name="empresa_proveedor" autocomplete="off" required value=" <?php echo $fila["prv_empresa"] ?>"></td>
            </tr>
            <tr>
              <td class="td"><label>Teléfono del proveedor:</label></td>
              <td class="td"><input type="number" name="telefono_proveedor" pattern="[0-9]{10}" maxlength="10" autocomplete="off" required value="<?php echo $fila["prv_telefono"]?>"></td>
            </tr>
            <tr>
              <td class="td"><label>Estado del Proveedor:</label></td>
              <td class="td"><select name="estado_proveedor">
                <option <?php  if ($fila["prv_estado"] === "A") echo 'selected="selected"';?>value="A">Activo</option>
                <option <?php  if ($fila["prv_estado"] === "I") echo 'selected="selected"';?>value="I">Inactivo</option>
              </select></td>
            </tr>
            <td colspan="2"><button type="submit" name="act_proveed" id="boton">Actualizar proveedores</button></td>
          </form>
        </table>
      </div>
    </article>
  </section> <!-- / #cont_principal -->
</body>
</html>
