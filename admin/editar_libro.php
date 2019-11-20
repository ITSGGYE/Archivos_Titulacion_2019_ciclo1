<?php
session_start();
include("conexion.php");
if(isset($_SESSION['user']))
 {?>

<?php 
$consulta1="SELECT id_categoria, nombre_categoria from categorias";
$categoria=mysqli_query($conexion,$consulta1);

$consulta2="SELECT id_proveedor, nombre_proveedor from proveedor";
$proveedor=mysqli_query($conexion,$consulta2);
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
 <?php 
$id=$_POST['idtxt'];
$foto=$_POST['foto'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$disponible=$_POST['disponible'];
$categoria=$_POST['categoria'];
$subcategoria=$_POST['subcategoria'];
$proveedor=$_POST['proveedor']; 
$fecha=$_POST['fecha'];
$descarga=$_POST['descarga']; 
 ?>
<body>
      <?php include('navegacion.php');?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">    
                    </div>
                </div>
                       <h1 class="page-header">
                            <small><img src="images/logo.png"></small> Libros
                        </h1>
                <!-- /Formulario -->
  
     <form action="recibir_edicion_libro.php" method="post" enctype="multipart/form-data">
       <table class="table table-bordered table-condensed table-responsive table-striped table-hover" width="79%" border="1">
          <tr>
             <td colspan="2" align="center"><h4> Actualizar Informacion de Libro</h4></td> 
         </tr>
         <tr>
             <td width="87">Imagen</td>
             <td width="271"> 
              <label for="imagen"></label>
              <img src="<?php echo ''.$foto ?>" alt="" width="80" height="60" /></td>
         </tr>
         <tr>
             <td width="87">Ruta de Imagen</td>
              <input name="id_oculto" type="hidden" value="<?php echo $id ?>"/>
             <td width="271"><input type="file" name="foto" id="foto" /></td>
         </tr>
         <tr>
             <td>Nombre</td>
             <td><input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>" /></td>
        </tr>
         <tr>
             <td>Descripcion</td>
            <td><input type="text" name="descripcion" id="nombre" value="<?php echo $descripcion ?>" /></td>
        </tr>
        <tr>
             <td>Disponible</td>
             <td><input type="text" name="disponible" id="nombre" value="<?php echo $disponible ?>" /></td>
        </tr>
        <tr>
             <td>Categoria:</td>
                <td> <input type="text" name="categoria" id="nombre" value="<?php echo $categoria ?>" />
                </td>
        </tr>
        <tr>
             <td>Subcategoria:</td>
                <td> <input type="text" name="subcategoria" id="nombre" value="<?php echo $subcategoria ?>" />
                </td>
        </tr>
        <tr>
              <td>Proveedor:</td>
              <td>  <input type="text" name="proveedor" id="nombre" value="<?php echo $proveedor ?>" />
             </td>
        </tr>
    
        <tr>
            <td>URL Descarga</td>
            <td><input type="text" name="descarga" id="descarga" value="<?php echo $descarga ?>" /></td>
       </tr> 
       <tr>
            <td></td>
            <td>
            <input class="btn btn-success btn-group-lg" type="submit" name="button" id="button" value="Enviar" />
            </form>
            </td>
       </tr>
  </table>
</form>
     <!-- fin de la tabla -->
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
