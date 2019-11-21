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
	<title>Datos Proveedores::</title>
</head>

<script type="text/javascript">
  function eliminarregistro(){
    var confirmar = confirm("¿Estas seguro que deseas eliminar este registro de proveedor?");
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
      <!---------------Presentacion en Tabla -------------------------------------------------------------------->
      <h1>Listado de Proveedores</h1>
      <div class="tablas">
        <table border="2" cellpadding="5" cellspacing="30" align="center">
          <tr>
            <td class="td">#</td>
            <td class="td">Nombre</td>
            <td class="td">Empresa</td>
            <td class="td">Teléfono</td>
            <td class="td">Estado</td>
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

            $tb_proveedor="SELECT * FROM proveedores";
            $respuesta_proveedor= $conectando->query($tb_proveedor);
            while ($fila=$respuesta_proveedor->fetch_assoc()) {             
            ?>
              <tr>
                <td class="td"> <?php echo contar()?></td>
                <td class="td"> <?php echo $fila["prv_nombre"]?></td><!--Se presenta señalando con el nombre del campo determinada en la BD-->
                <td class="td"> <?php echo $fila["prv_empresa"]?></td>
                <td class="td"> <?php echo $fila["prv_telefono"]?></td>
                <td class="td"> <?php echo $fila["prv_estado"]?></td>

                <td class="td"><a href= "tb_proveedor.php?id=<?php echo $fila["prv_codigo"];?>"><span class="lnr lnr-pencil" title="Modificar"></span></a></td><!--Busca el id de la colmuna de la BD para modificar-->
                <td class="td"><a href= "procesos/prove_eliminar.php?id=<?php echo $fila["prv_codigo"];?>" onclick=" return eliminarregistro();"><span class="lnr lnr-trash" title="Eliminar"></span>
                </a></td>
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