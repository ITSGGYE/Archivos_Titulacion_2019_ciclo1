<?php
session_start();
include("admin/conexion.php");
if(isset($_SESSION['carnet']))
 {?>

<?php 
$v1 = $_GET['variable'];
$consulta1="SELECT id_categoria, nombre_categoria from categorias";
$categoria=mysqli_query($conexion, $consulta1);

$consulta2="SELECT id_proveedor, nombre_proveedor from proveedor";
$proveedor=mysqli_query($conexion, $consulta2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="biblioteca virtual UNI">
    <title>Biblioteca Virtual | Inicio</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">     
    <link rel="shortcut icon" href="images/iconolibreria.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
      <?php include ('includes/header.php');?>
        <div id="page-wrapper">
            <div class="container-fluid">
             <br>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">    
                    </div>
                </div>
                       <h1 class="page-header">
                            <small></small> Listado de Libros <?PHP echo "$v1"?> AÑO
                        </h1>
                <!-- /Listado -->
    <table class="table table-bordered table-condensed table-responsive table-striped table-hover"  width="1300" border="0">
           <tr> 
              <form id="form1" name="form1" method="post" action="">
                 <td width="49" colspan="5" bgcolor="#dbeef7">
                 </form>
             <tr>
                 <td bgcolor="#D6D6D6" class="colorencabezado"><b>Imagen</b></td>
                 <td bgcolor="#D6D6D6" class="colorencabezado"><b>Nombre</b></td>
                 <td bgcolor="#D6D6D6" class="colorencabezado"><b>Descripcion</b></td>
                 <td bgcolor="#D6D6D6" class="colorencabezado"><b>Acciones</b></td>
            </tr>
                  <?php 
                      $consulta=mysqli_query($conexion, "SELECT * FROM libros  where  curso='$v1' ");
                        if (isset($_POST['txtbuscar'])){
                       $consulta=mysqli_query($conexion, "SELECT * from libros  where  curso='$v1' and nombre like '%".$_POST['txtbuscar']."%'"); 
                      }
                       
                           while($filas=mysqli_fetch_array($consulta)){
                                 $id=$filas['id_libro'];
                                 $foto=$filas['foto'];
                                 $nombre=$filas['nombre'];
                                 $descripcion=$filas['descripcion'];
                                                 ?>
            <tr>
               <td width="100"> <img src="admin/<?php echo $foto ?>"width="100" height="100"><br></td>
               <td width="300"><?php echo $nombre ?></td> 
               <td width="250"><?php echo $descripcion ?></td>
                <td><button class="btn btn-warning"><a href="<?php echo $filas['url_descarga']?> " target="_blank"><b>Ver</b></a></button></td>
               <td width="220">
            <form action="editar_libro.php" method="post" name="editar" enctype="multipart/form-data">
               <input name="idtxt" type="hidden" value="<?php echo $id ?>" />
               <input name="foto" type="hidden" value="<?php echo $foto ?>" />
               <input name="nombre" type="hidden" value="<?php echo $nombre ?>" />
               <input name="descripcion" type="hidden" value="<?php echo $descripcion ?>" />
            </form>
              <br>
           
            <?php }?>
              </td>
          </tr>
     </table>
               <!-- fin de Listado -->
        </div>
    </div>
    <script src="admin/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="admin/js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="admin/js/plugins/morris/raphael.min.js"></script>
    <script src="admin/js/plugins/morris/morris.min.js"></script>
    <script src="admin/js/plugins/morris/morris-data.js"></script>
</body>
</html>
<?php
}else{
    echo '<script> window.location="/login.php"; </script>';
}
?>

