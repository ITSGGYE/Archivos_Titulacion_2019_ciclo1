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
  <?php include 'ax.php'; ?>
        <!-- sidebar: style can be found in sidebar.less -->
  
        <!-- /.sidebar -->
      </aside>
 

      <!-- Content Wrapper. Contains page content -->
     
      <div class="content-wrapper">
 <?php
$s=$_POST['id'];
    $ps = mysqli_query($conection,"SELECT * FROM post where id_post=$s");
              while($poss = mysqli_fetch_array($ps)) {  
          
  ?>

 
<div>
 <form  class="modal-content"   method="POST" id="addcategory" action="php/editarpost.php" enctype="multipart/form-data" role="form">


    <div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">Titulo</label>
      <div class="col-md-6">
        <input type="text" name="nombre" required class="form-control" id="title" placeholder="Nombre" value="<?php echo $poss['titulo'];?>">
      </div>
    </div>

     <div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">Contenido</label>
      <div class="col-md-6">
        <input type="text" name="apellido" required class="form-control" id="title" placeholder="Apellido" value="<?php echo $poss['content'];?>">
      </div>
    </div>

    
    <div class="form-group">
      <label for="inputEmail1" class="col-lg-4 control-label">Imagen destacada (1920x1080)*</label>
      <div class="col-md-6">
        <input type="file" name="imagen" value="<?php echo $poss['image'];?>" required  >
      </div>
    </div>
 

      <input type="hidden" name="id" value="<?php echo $poss['id_post'];?>" >


</div>
<hr><br><br>
    <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
        <button type="submit" class="btn btn-primary">Editar Foro</button>
      </div>
    </div>
  </form>

 

   <?php  




    }  ?>


      </div><!-- /.content-wrapper -->

       
   <?php   include 'header.php'; ?>

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

