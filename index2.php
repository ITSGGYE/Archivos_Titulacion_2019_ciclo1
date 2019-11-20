<?php  
session_start();  
if(!isset($_SESSION["profesor"]))
{
 header("location:index.php");
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
<body>
<style >
  a i{
    text-decoration: none;
  }
  .fa-pencil {

color:  #FFC107;
font-size: 25px;  }


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
<div class="nav-side-menu">
    <div class="brand">
        <center>
      <h6><b> Bienvenido </b></h6>
      <img src="Imagenes/Profesores/<?php echo $_SESSION['profesor']['imagen'] ; ?>" class="rounded-circle" width="80" height="80"> 
      <h6 style="font-size: 14px;"><strong><?php echo $_SESSION['profesor']['nombre']; ?> </strong> </h6>
       <a class="btn btn-danger" href="salir.php" role="button">Logout</a>
       <br>
      </center>
    </div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
               

                <li  data-toggle="collapse" data-target="#parametros" class="collapsed active">
                  <a href="#"><i class="fa fa-th-list fa-lg"></i> Parámetros <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu  " id="parametros">
                    
                    <li><a href="vistas/anioLectivo.php">Año Lectivo</a></li>

                   
                    
                </ul>

            
                <li data-toggle="collapse" data-target="#service" class="collapsed">
                  <a href="#"><i class="fa fa-edit fa-lg"></i> Registros <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                  
                  <li><a href="vistas/curso.php">Cursos</a></li>
                  <li><a href="vistas/paralelo.php">Paralelos</a></li>
                  <li><a href="vistas/CursoParalelo.php">Cursos-Paralelo</a></li>
                 
                  <li><a href="vistas/profesor.php">Personal</a></li>
                 
                  <li><a href="vistas/Usuarios.php">Usuarios</a></li>
                  
                </ul>

                <li data-toggle="collapse" data-target="#alumno" class="collapsed">
                  <a href="#"><i class="fa fa-edit fa-lg"></i> Matriculación <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="alumno">
                  
                  <li><a href="vistas/Ver_Ficha_Matricula.php">Registro de Matricula</a></li>
                  <li><a href="vistas/pensumacademico.php">Asignar Tutor</a></li>
                 
                  <li><a href="vistas/AlumnoCurso.php">Curso por Alumno</a></li>
                  
                  
                </ul>
                

               
             </ul>
     </div>
</div> </div>
<div class="col-sm-12 col-md-6 col-lg-9">
<h2 style="color:#801515; text-align: center;"> ESCUELA DE EDUCACIÓN BÁSICA "JULIO PEÑA BERMEO" </h1>
<h3 style="text-align: center"> SISTEMA DE MATRICULACIÓN </h3>
<hr>
<?php 
  $sql="SELECT count(usuario) as numero from usuarios";
  $resul=mysqli_query($conexion,$sql);
  while($mostrar=mysqli_fetch_row($resul))
  {

?>
<div class="row">
  <div class="col-sm-6 col-md-6 col-lg-3" style="margin-bottom: 10px;">
    <div class="card text-white bg-primary">
    <div class="card-header text-center"><h6>Usuarios</h6></div>
      <div class="card-body">
        <div class="row">
        <div class="col-lg-12"><center><i class="fa fa-user" style="font-size: 30px;"></i></center>
        </div>
      </div>
        <div class="row">
        <div class="col-md-12 col-lg-12"> <center><p class="card-text text-center"><span class="badge badge-pill  badge-secondary"><?php echo $mostrar[0]; }?></span> <br> Registrados</p></center></div> </div>
        </div>
        
      </div>
    
  </div>

<?php 
  $sql="SELECT count(id_cursoparalelo) as numero from curso_paralelo";
  $resul=mysqli_query($conexion,$sql);
  while($mostrar=mysqli_fetch_row($resul))
  { 
    ?>

    <div class="col-sm-6 col-md-6 col-lg-3" style="margin-bottom: 10px;">
    <div class="card text-white bg-warning">
    <div class="card-header text-center"><h6>Cursos</h6></div>
      <div class="card-body">
        <div class="row">
        <div class="col-lg-12"><center><i class="fa fa-user" style="font-size: 30px;"></i></center>
        </div>
      </div>
        <div class="row">
        <div class="col-md-12 col-lg-12"> <center><p class="card-text text-center"><span class="badge badge-pill  badge-secondary"><?php echo $mostrar[0]; }?></span> <br> Registrados</p></center></div> </div>
        </div>
        
      </div>
    
  </div>

  <?php 
  $sql="SELECT count(cedula_alumno) as numero from datos_alumno";
  $resul=mysqli_query($conexion,$sql);
  while($mostrar=mysqli_fetch_row($resul))
  { 
    ?>

    <div class="col-sm-6 col-md-6 col-lg-3" style="margin-bottom: 3px;">
    <div class="card text-white bg-danger">
    <div class="card-header text-center"><h6>Alumnos</h6></div>
      <div class="card-body">
        <div class="row">
        <div class="col-lg-12"><center><i class="fa fa-user" style="font-size: 30px;"></i></center>
        </div>
      </div>
        <div class="row">
        <div class="col-md-12 col-lg-12"> <center><p class="card-text text-center"><span class="badge badge-pill  badge-secondary"><?php echo $mostrar[0]; }?></span> <br> Registrados</p></center></div> </div>
        </div>
        
      </div>
    
  </div>



  
  </div>

</div>
 
  
</body>