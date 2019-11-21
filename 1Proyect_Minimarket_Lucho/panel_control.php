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
  <title>Panel de Control</title>
  <link rel="stylesheet" type="text/css" href="estilos/estructuras.css">
  <link rel="stylesheet" type="text/css" href="estilos/formulario.css">
</head>
<body>
  <?php
    include_once("estructura_inventario/encabezado.php");
    include_once("estructura_inventario/menu.php"); 
  ?>

  <div id="cont_principal">
    <h1>Bienvenidos a su Sistema Web</h1>
    <button type="button" onclick="location.href='reporte/reporte_inventario.php'" id="boton">Reporte de inventario</button><br>
    <!--<button type="button" onclick="location.href='reporte/reporte_entrada.php'" id="boton">Reporte de Entradas </button><br>
    <button type="button" onclick="location.href='reporte/reporte_salida.php'" id="boton">Reporte de Salidas</button>-->

  </div>
</body>
</html>