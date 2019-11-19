<?php
session_start();
include 'lib/config.php'; 

 

if(!isset($_SESSION['usuario']))
{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html class="no-js">
<head>
<?php 
include 'head.php';

 ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <?php include 'navar.php';
  ?>

<div class="container">
<div class="row">
<div class="col-md-12">


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

    <!-- Script validar caracteres -->
    <script type="text/javascript">    
    function validarn(e) {
    tecla = (document.all) ? e.keyCode : e.which;
   if (tecla==8) return true;
   if (tecla==9) return true;
   if (tecla==11) return true;
    patron = /[A-Za-zñ!#$%&()=?¿¡*+0-9-_á-úÁ-Ú :;,.]/;
 
    te = String.fromCharCode(tecla);
    return patron.test(te);
} 
    </script>
    <!-- Script validar caracteres -->

      
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- /.box -->
          <div class="row">
     <?php 
  
 

             ?>
            <!-- CAJA QUÉ ESTÁS PENSANDO? -->
          
            <!-- /.col -->            
          </div>


          <!-- codigo scroll -->
          <div class="scroll">
            <?php require_once 'publicaciones.php'; ?>
          </div>

              <script>
              //Simple codigo para hacer la paginacion scroll
            $(document).ready(function() {
              $('.scroll').jscroll({
                loadingHtml: '<img src="images/invisible.gif" alt="Loading" />'
            });
            });
            </script>
          <!-- codigo scroll -->


        </div>

        <div class="col-md-4">          

          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Compañeros</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">

              <?php $amistade= mysqli_query($conection,"SELECT * FROM estudiantes order by id_est desc LIMIT 4");
              while($am = mysqli_fetch_array($amistade)) { 

 
                ?>
                <li class="item">
                  <div class="product-img">
                    <img src="avatars/<?php echo $am['foto']; ?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                  <?php echo $am['nombre']; ?>
                      
                        <span class="product-description">
                          <?php echo $am['apellido']; ?>
                        </span>
                  </div>
                </li>
                <!-- /.item -->

                <?php } ?>


              </ul>
            </div>
            <!-- /.box-body -->
 
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

 
            <!-- /.col -->


      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 


<br>
<hr>
<?php 
include 'header.php';

 ?></div>
</div>
</div> 
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- JS modificar diseño input file -->
<script src="js/custom-file-input.js"></script>
</body>
</html>
