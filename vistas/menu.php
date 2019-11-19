<head> 
<meta charset="utf-8">
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

  <a class="navbar-brand" href="#">
    <img src="../Imagenes/logo/logo.png" width="30" height="30" class="d-inline-block align-top" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      

<?php 
  if($_SESSION['profesor']['privilegio']==1)
  {

?>
 <li class="nav-item active">
        <a class="nav-link" href="../administracion.php">Inicio <span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item active">
        <a class="nav-link" href="curso.php">Cursos <span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item active">
        <a class="nav-link" href="profesor.php">Personal <span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item active">
        <a class="nav-link" href="Usuarios.php">Usuarios <span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Registro de Matricula 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Alumno.php">Ingreso Alumno</a>
          <a class="dropdown-item" href="Datos_Familiares.php">Datos Familiares</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="Datos_Representante.php">Datos Representante</a>
          <a class="dropdown-item" href="AlumnoCurso.php">Listado de Alumno</a>
        </div>
      </li>

  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Registro de Cobros 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Registro_Cobro_Matricula.php">Matricula</a>
          <a class="dropdown-item" href="Registro_Cobro_Pension.php">Pensión</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="Registro_Cobro_Adicional.php">Adicional</a>
          
      </li>
 
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Reporte 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Pago_Matriculas.php">Registro de Matricula</a>
          <a class="dropdown-item" href="Pago_Pensiones.php">Registro de Pension</a>
          <div class="dropdown-divider"></div>
         
          
      </li>
  <?php 
} 
  if($_SESSION['profesor']['privilegio']=='S') {
    ?>
     <li class="nav-item active">
        <a class="nav-link" href="../revisionnotas.php">Inicio <span class="sr-only">(current)</span></a>
  </li>
  
  <?php
} /*else {

  ?>
   <li class="nav-item active">
  <a class="nav-link" href="../inicio.php">Inicio <span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active">
  <a class="nav-link" href="../vernotas.php">Ver notas <span class="sr-only">(current)</span></a>
</li>

  <?php

}*/?>
      
      <li class="nav-item">
        <div class="row">
        <div class="col-md-7">
        </div>
        <div class="col-md-3">
        <a class=" btn btn-danger " href="../salir.php">Logout</a>      </li>
      </div>
      </div>
    </ul>

  </div>
</nav>

