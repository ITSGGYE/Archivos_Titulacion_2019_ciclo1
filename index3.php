<?php  
session_start();  
if(!isset($_SESSION["profesor"]))
{
 header("location:index.php");
 
}
if($_SESSION["profesor"]["privilegio"]=='I')
{
  header("location:inicial2.php");
}
if($_SESSION["profesor"]["privilegio"]=='P')
{
  header("location:PrimeroBasica.php");
}


?>  

<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="librerias/bootstrap/bootstrap2.min.css">
<link rel="stylesheet" type="text/css" href="librerias/bootstrap/bootstrapcdn.css">
<link rel="stylesheet" type="text/css" href="librerias/datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="librerias/alertify/css/alertify.css">
<link rel="stylesheet" type="text/css" href="librerias/alertify/css/themes/bootstrap.css">
<link rel="stylesheet" type="text/css" href="librerias/fontawesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/estilomenu.css">
<script src="librerias/jquery.min.js"></script>
<script src="librerias/bootstrap/popper.min.js"></script>
<script src="librerias/bootstrap/bootstrap.min.js"></script>
<script src="librerias/datatable/jquery.dataTables.min.js"></script>
<script src="librerias/datatable/dataTables.bootstrap4.min.js"></script>
<script src="librerias/alertify/alertify.js"></script>
<script src="ayuda/validaciones.js"></script>
<?php 
?>
<body >
<style >
  a i{
    text-decoration: none;
  }

</style>
<?php require_once "clases/conexion.php"; 
    $c= new conectar();
    $conexion=$c->conexion();

    
    ?>


<!-- Main -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container-fluid">
<div class="row">
<div class=" col-sm-12 col-md-6 col-lg-3">

<?php require_once 'sidernav.php'; ?>
    
<div class="col-lg-9 col-md-6 col-sm-12">
  <div  >
 
     
<center>
    <img src="Imagenes/logo/logo.png" class="img-fluid" height="300" width="300"> </center>
    <br>
    <h3 class="display-6 text-center" style="color: green; font-weight: bold">Sistema de Matriculación</h3>
    <br>
  
  
</div>


<h4 style="color: green; font-weight: bold">  Curso </h4>
<hr>
<div class="row">

<?php 
$id_profesor=$_SESSION['profesor']['id'];
$privilegio=$_SESSION["profesor"]["privilegio"];
if($privilegio=='2') {




       $sql="SELECT pensum.fk_curso, c.nombre_Curso, p.nombre_paralelo, pensum.fk_anio  from pensum_academico pensum, paralelo p, curso c, curso_paralelo cp where pensum.fk_curso = cp.id_cursoparalelo and c.id_curso=cp.fk_curso and p.id_paralelo=cp.fk_paralelo and
pensum.fk_profesor='$id_profesor'";
$result=mysqli_query($conexion,$sql);
while($ver2=mysqli_fetch_row($result)){



  

?>
 
  <div class="col-lg-3 col-md-6 col-sm-12" style="margin-bottom: 10px;">
    <div class="card  text-center  ">
      <div class="card-header"> <b>Estado Alumno</b> </div>
      <div class="card-body ">

        <h6 class="card-title" ><?php echo $ver2[1].' '.$ver2[2];?></h6>
       

        <form method="GET" action="vistas/update_estado.php">
        <input type="hidden" name="curso"  id="curso" value="<?php echo $ver2[0]; ?>">
        
        <input type="submit" name="" class="btn btn-primary" value="Ingresar">
        </form>
  
      </div>
    </div>
  </div>
<?php

  }
  ?>
</div>
<?php
}?>





