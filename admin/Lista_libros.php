

<?php
session_start();
include("conexion.php");
if(isset($_SESSION['user']))
 {?>

<?php 
$consulta1="SELECT id_categoria, nombre_categoria from categorias";
$categoria=mysqli_query($conexion, $consulta1);

$consulta2="SELECT id_proveedor, nombre_proveedor from proveedor";
$proveedor=mysqli_query($conexion, $consulta2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Biblioteca UNI | Panel Administracion</title>
    <link rel="shortcut icon" href="../images/iconolibreria.ico">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <link href="css/estilo.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="libros/myjava.js"></script>
</head>
<body>
      <?php include('navegacion.php');?>
        <div id="page-wrapper">
            <div class="container-fluid">
             <br>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">    
                    </div>
                </div>
                       <h1 class="page-header">
                            <small><img src="images/logo.png"></small> Listado de Libros
                        </h1>
                <!-- /Listado -->
    <table class="table table-bordered table-condensed table-responsive table-striped table-hover"  width="1300" border="0">
             <tr> 
              <form id="form1" name="form1" method="post" action="">
                 <td colspan="2" bgcolor="#dbeef7"><p align="right"><b>Busqueda de Libros : </b></td>
                 <td bgcolor="#dbeef7"><input type="text" name="txtbuscar" id="txtbuscar"/></td>
                 <td width="60" bgcolor="#dbeef7"><input title="Buscar un Libro" class="btn btn-success" type="submit" name="botonbuscar" id="botonbuscar" value="Buscar"/></td>
                 <td width="49" colspan="5" bgcolor="#dbeef7">
                 </form>

                 <form action="nuevo_libro.php" method="post">
                 <input title="Ingresar Nuevo Producto" class="btn btn-success" name="input" type="submit" value="Nuevo" />
                 </form></td>
                 <td  bgcolor="#dbeef7"> </td>
            </tr>
             <tr>
                 <td bgcolor="#D6D6D6" class="colorencabezado"><b>Imagen</b></td>
                 <td bgcolor="#D6D6D6" class="colorencabezado"><b>Nombre</b></td>
                 <td bgcolor="#D6D6D6" class="colorencabezado"><b>Descripcion</b></td>
              
                 <td bgcolor="#D6D6D6" class="colorencabezado"><b>curso</b></td>
                 <td bgcolor="#D6D6D6" class="colorencabezado"><b>Fecha Ingreso</b></td>
                 <td bgcolor="#D6D6D6" class="colorencabezado"><b>URL Descarga</b></td>
                 <td bgcolor="#D6D6D6" class="colorencabezado"><b>Acciones</b></td>
            </tr>
                  <?php
                       $consulta=mysqli_query($conexion, "SELECT * from libros ORDER BY curso asc");
                       if (isset($_POST['txtbuscar'])){
                       $consulta=mysqli_query($conexion, "SELECT * from libros where nombre like '%".$_POST['txtbuscar']."%'  ORDER BY curso asc "); 
                      }
                           while($filas=mysqli_fetch_array($consulta)){
                                 $id=$filas['id_libro'];
                                 $foto=$filas['foto'];
                                 $nombre=$filas['nombre'];
                                 $descripcion=$filas['descripcion'];
                                 $categoria=$filas['id_categoria'];
                                 $curso=$filas['curso'];
                                 $fecha=$filas['fecha_ingreso'];
                                 $descarga=$filas['url_descarga'];
                 ?>
            <tr>
               <td width="100"> <img src="<?php echo $foto?>"width="100" height="100"><br></td>
               <td width="300"><?php echo $nombre ?></td> 
               <td width="250"><?php echo $descripcion ?></td>
               <td width="50"><?php echo $curso  .'basica' ?></td>
               <td width="80"><?php echo $fecha ?></td>
               <td width="80"><?php echo $descarga ?></td>
               <td width="220">
            <form action="editar_libro.php" method="post" name="editar" enctype="multipart/form-data">
               <input name="idtxt" type="hidden" value="<?php echo $id ?>" />
               <input name="foto" type="hidden" value="<?php echo $foto ?>" />
               <input name="nombre" type="hidden" value="<?php echo $nombre ?>" />
               <input name="descripcion" type="hidden" value="<?php echo $descripcion ?>" />
               <input name="proveedor" type="hidden" value="<?php echo $curso?>" />
               <input name="fecha" type="hidden" value="<?php echo $fecha ?>" />
               <input name="descarga" type="hidden" value="<?php echo $descarga ?>" />
               <input title="Modificar este Libro" class="btn btn-info btn-xs" name="Comprar" type="submit" value="Editar" />
            </form>
              <br>
           <form action="borrar_libro.php" method="post">
              <input name="id" type="hidden" value="<?php echo $id ?>" />
              <input title="Borrar este Libro" class="btn btn-danger btn-xs" name="Borrar" value="Borrar" type="submit" />
                        <a href="<?php echo $descarga?>"  target="_blank"  class="btn btn-default add-to-cart">
                        <i class="fa fa-download"></i>Ver</a>
             </form>
            <?php }?>
              </td>
          </tr>
     </table>
               <!-- fin de Listado -->
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</body>
</html>
<?php
}else{
    echo '<script> window.location="../login/login.php"; </script>';
}
?>
