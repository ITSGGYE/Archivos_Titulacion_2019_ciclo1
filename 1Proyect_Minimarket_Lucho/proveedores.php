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
	<title>Proveedores</title>
</head>
<body>

  <?php 
    include_once("estructura_inventario/encabezado.php");
    include_once("estructura_inventario/menu.php");
  ?>
  
  <section id="cont_principal">
    <article>
      <h1>Proveedores</h1>
      <div class="tablas">
        <table border="2" cellpadding="5" cellspacing="20" align="center">
          <form  action="procesos/prove_agregar.php" method="post" class="form">
            <tr>
              <td class="td"><label>Nombre del Proveedor:</label></td>
              <td class="td"><input type="text"  name="nombre_proveedor" placeholder=" Nombre del proveedor" autocomplete="off" required></td>
            </div>
            </tr>
            <tr>
              <td class="td"><label>Empresa del Proveedor:</label></td>
              <td class="td"><input type="text"  name="empresa_proveedor" placeholder=" Empresa del proveedor" autocomplete="off" required></td>
            </tr>
            <tr>
              <td class="td"><label>Teléfono del proveedor:</label>
              <!--Validar numero de telefono-->
              <td class="td"><input type="tel"  name="telefono_proveedor" placeholder=" Telefono del proveedor" autocomplete="off" required pattern="[0-9]{10}" maxlength="10"></td>
            </tr>
            <tr>
              <td class="td"><label>Estado del Proveedor:</label></td>
              <td class="td"><select name="estado_proveedor"> 
                <option value="">Selecciona el Estado</option>
                <option value="A">Activo</option>
                <option value="I">Inactivo</option>
              </select></td>
            </tr>
            <td colspan="2"><button type="submit" name="ingresar_prov" id="boton">Ingresar proveedor</button></td>
          </form>
        </table>
      </div>

    </article>
  </section> <!-- / #cont_principal -->
</body>
</html>