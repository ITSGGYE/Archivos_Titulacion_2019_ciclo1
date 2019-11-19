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
 


<section class="content">
<div class="row">
  <div class="col-md-12">
    <h1>Estudiantes</h1>

<form action="nuvoestudiante.php">
 <button type="submit" class="btn btn-danger btn-xs">
Nuevo Estudiante
</button> 
</form>
<!-- Button trigger modal -->

 
 
<div class="box box-primary">
<div class="box-body">
      <table class="table table-bordered table-hover datatable">
      <thead>
      <th>nombre</th>
      <th>apellido</th>
      <th>correo</th>
      <th>cedula</th>
      <th>foto</th> 
      </thead>
  <?php  
        $ps = mysqli_query($conection,"SELECT * FROM estudiantes");
              while($poss = mysqli_fetch_array($ps)) { 
                
  ?>


 
        <tr>
        <td><?php echo $poss['nombre']; ?></td>
         <td><?php echo $poss['apellido']; ?></td>
         <td><?php echo $poss['correo']; ?></td>
            <td><?php echo $poss['cedula']; ?></td>
        <td><?php echo $poss['foto']; ?></td>
        
 
   
         <td>
            <form method="post" action="ediestu.php">
<input type="hidden" name="id" value="<?php echo $poss['id_est']; ?>">
<button type="submit" class="btn btn-danger btn-xs" data-toggle="modal" data-target=""></form>
Editar
</button>

          </td>       
          <td>

              <script language="JavaScript">
function pregunta(){
    if (confirm('¿Estas seguro que deseas eliminar este formulario?')){
       document.elimina.submit()
    }
}
</script>  
            <form name="elimina" method="post" action="php/eliminares.php">
<input type="hidden" name="id" value="<?php echo $poss['id_est']; ?>">
<button type="submit" onclick="pregunta()"  class="btn btn-danger btn-xs" data-toggle="modal" data-target=""></form>
Eliminar
</button>

          </td>        
        </tr>
        <?php
 
 
 }  
 
        ?>
        </table> 
        </div>
        </div>
 

  </div>
</div>

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

