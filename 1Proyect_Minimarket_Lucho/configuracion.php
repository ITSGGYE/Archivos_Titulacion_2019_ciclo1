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
	<title>Control de Usuario::</title>
</head>
<body>
  <?php 
    include_once("estructura_inventario/encabezado.php");
    include_once("estructura_inventario/menu.php");
  ?>
  
  <section id="cont_principal">
    <article>
      <h1>Control Usuario</h1>  
      
      <div class="tablas">
        <table border="5" cellpadding="5" cellspacing="20" align="center">
          <tr>
            <td class="td">#</td>    
            <td class="td">Nombre</td>
            <td class="td">Usuario</td>
            <td class="td">Ultima conexión</td>
            <td class="td">Acción</td>
          </tr>

          <?php 
            function contar(){
              static $contador = 1;
              return $contador++;
            }

            require_once 'conexion/conexion.php';
            $db_conex= new conectar_bd();
            $conectando=$db_conex->conexion_bd();
          
            $tb_usuario="SELECT * FROM usuario";
            $resp_usuario= $conectando->query($tb_usuario);
            while ($fila=$resp_usuario->fetch_assoc()) {             
          ?>
          <tr>
            <!--Se presenta señalando con el nombre del campo determinada en la BD-->
            <td class="td"> <?php echo contar()?></td> 
            <td class="td"> <?php echo $fila["usu_nombre"] ?></td>
            <td class="td"> <?php echo $fila["usu_unombre"] ?></td>
            <td class="td"> <?php echo $fila["usu_ult_sesion"] ?></td>
            <td class="td"><a href= "configuracion_usuario.php?id=<?php echo $fila["usu_codigo"];?>"><span class="lnr lnr-pencil" title="Modificar">
            </span></a>
            </td>
          </tr>
       
          <?php  
            }
          ?>
        </table>
      </div>
    </article> <!-- /article -->
  </section> <!-- / #cont_principal -->
</body>
</html>
