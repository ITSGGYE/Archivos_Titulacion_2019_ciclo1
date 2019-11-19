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
    <div  class="wrapper">
      <!-- Main Header -->
      
       <?php include 'nav.php'; ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
  <?php include 'content.php'; ?>
        <!-- sidebar: style can be found in sidebar.less -->
  
        <!-- /.sidebar -->
      </aside>
 

      <!-- Content Wrapper. Contains page content -->
     
      <div style="background-color: #fff;" class="content-wrapper">
         <section class="content-header">
      <nav class="nav-inner transparent">

 <div   class="col-md-4">
        <figure class="effect-marley">
          <img   src="../images/f.jpeg" alt="" class="img-responsive" />
 
        </figure>
      </div>
      <div style="float: center; " class="col-md-4">
   
          <style type="text/css">
            .a{

           color: blue;
           text-align: center; 
           font-size: 30px;
           text-transform: capitalize;
          }.s{

           color: blue;
           text-align: center; 
           font-size: 40px;
           text-transform: capitalize;
          }

          </style>
      <p class="a">UNIDAD EDUCATIVA FISCAL</p>
      <p class="s">GUAYAQUIL</p>
  
      </div>
     
 
        <div class="col-md-4">
        <figure class="effect-marley">
          <img   src="../images/g.jpeg" alt="" class="img-responsive" />
        
        </figure><br> 
      </div> 
  
 
   <div  class="col-md-4">
        <figure class="effect-marley">
          <img  width="1600px" src="../images/a.jpeg" alt="" class="img-responsive" />
 
        </figure>
      </div>
       <div class="col-md-4">
        <figure class="effect-marley">
          <img   src="../images/b.jpeg" alt="" class="img-responsive" />
 
        </figure>
      </div>
     
 
        <div class="col-md-4">
        <figure class="effect-marley">
          <img style="  margin-left: all;   max-width: 105%;" src="../images/c.jpeg" alt="" class="img-responsive" />
        
        </figure>
      </div>   
       
 
<br><br><br><br><br><br> </nav>
    </section>

<section class="content">



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
 
  </body>
</html>

