<?php
session_start();
include '../lib/config.php'; 

 

if(!isset($_SESSION['usuario']))
{
  header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
  <?php include 'head.php'; ?>
  </head>

  <body class="skin-blue-light sidebar-mini" >
    <div class="wrapper">
      <!-- Main Header -->
      
       <?php include 'nav.php'; ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
  <?php include 'content.php'; ?>
        <!-- sidebar: style can be found in sidebar.less -->
  
        <!-- /.sidebar -->
      </aside>
 

      <!-- Content Wrapper. Contains page content -->
     
      <div class="content-wrapper">

        <section class="content">
<div class="row">
  <div class="col-md-12">
 
<div>
 <form  class="modal-content"   method="POST" id="addcategory" enctype="multipart/form-data" action="php/nuevoestudiante.php" role="form" >


    <div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">Nombre</label>
      <div class="col-md-6">
        <input autocomplete="off" type="text"  name="nombre"  required class="form-control" id="title" placeholder="Nombre" >
      </div>
    </div>

     <div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">Apellido</label>
      <div class="col-md-6">
        <input autocomplete="off" type="text" name="apellido" required class="form-control" id="title" placeholder="Apellido">
      </div>
    </div>

     <div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">correo</label>
      <div class="col-md-6">
        <input autocomplete="off" type="email" name="correo" required class="form-control" id="title" placeholder="Correo">
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">cedula</label>
      <div class="col-md-6">
        <input autocomplete="off" type="text" name="cedula" required class="form-control" id="title" placeholder="Cedula" placeholder="Solo numeros" pattern="[0-9]{10}">
      </div>
    </div>
     <div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">Contraseña</label>
      <div class="col-md-6">
        <input type="password" name="pass" required class="form-control" id="title" placeholder="xxxxxxx" >
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">Imagen destacada (1920x1080)*</label>
      <div class="col-md-6">
        <input type="file" name="imagen" >
      </div>
    </div>
 

    


</div>
<hr><br><br>
    <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
        <button type="submit" class="btn btn-primary">Agregar Estudiante</button>
      </div>
    </div>
  </form>

 
</section>


      </div><!-- /.content-wrapper -->

       
   <?php include 'header.php'; ?>

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".pickadate").pickadate({format: 'yyyy-mm-dd',min: '<?php echo date('Y-m-d',time()-(24*60*60)); ?>'});
        $(".pickatime").pickatime({format: 'HH:i',interval: 10 });
      })
    </script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="js/foro.js"></script>
  </body>
</html>

