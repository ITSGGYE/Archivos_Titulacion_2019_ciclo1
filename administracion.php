<?php 
session_start();


 include('estilos2.php'); ?>
<link rel="stylesheet" type="text/css" href="css/administracion.css">


<?php require_once "clases/conexion.php"; 
    $c= new conectar();
    $conexion=$c->conexion();
    
    ?>



<!-- Main -->

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
                  
                 
                  <li><a href="vistas/profesor.php">Personal</a></li>
                  
                  <li><a href="vistas/Usuarios.php">Usuarios</a></li>
                  
                </ul>

               <li data-toggle="collapse" data-target="#alumno" class="collapsed">
                  <a href="#"><i class="fa fa-edit fa-lg"></i> Matriculación <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="alumno">
                  
                  <li><a href="vistas/Alumno.php">Ingreso de Matricula</a></li>
                  <li><a href="vistas/Datos_Familiares.php">Datos Familiares</a></li>
                 
                  <li><a href="vistas/Datos_Representante.php">Datos del Representante</a></li>

                   <li><a href="vistas/AlumnoCurso.php">Registro de Alumnos</a></li>
                 
                  
                </ul>

                 <li data-toggle="collapse" data-target="#alumno5" class="collapsed ">
                  <a href="#"><i class="fa fa-edit fa-lg"></i>Registro de Cobro<span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="alumno5">
                  
                  <li><a href="vistas/Registro_Cobro_Matricula.php">Cobro de Matriculas</a></li>
                  <li><a href="vistas/Registro_Cobro_Pension.php">Cobro de Pensión</a></li>
                   <li><a href="vistas/Registro_Cobro_Adicional.php">Cobro de Adicional</a></li>
                </ul>


                 <li data-toggle="collapse" data-target="#alumno4" class="collapsed ">
                  <a href="#"><i class="fa fa-edit fa-lg"></i>Reporte<span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="alumno4">
                  
                  <li><a href="vistas/Pago_Matriculas.php">Registro de Cobro Matricula</a></li>
                  <li><a href="vistas/Pago_Pensiones.php">Registro de Cobro Pensión</a></li>
                 
                  
                 
                  
                </ul>
                
                

               
             </ul>
     </div>
</div> </div>
   
            
                <div class="col-xs-6 col-sm-7 col-md-8 col-lg-9">
                <div class="banneradmin">
                
                    <h1 style="text-align: center; font-weight: bold;">CENTRO EDUCACION INICIAL C.E.I  "MUNDO DE COLORES"</h1>
                   <p style="text-align: center;"> SISTEMA DE MATRICULACIÓN Y REGISTRO DE COBROS </p>
                </div>
               
               <?php 
  $sql="SELECT count(fk_alumno) as numero from curso_alumno";
  $resul=mysqli_query($conexion,$sql);
  while($mostrar=mysqli_fetch_row($resul))
  {
    $numero1=$mostrar[0];
}

  $sql="SELECT count(id_usuario) as numero from usuarios";
  $resul=mysqli_query($conexion,$sql);
  while($mostrar=mysqli_fetch_row($resul))
  {
    $numero2=$mostrar[0];
}

 $sql="SELECT count(id_curso) as numero from curso";
  $resul=mysqli_query($conexion,$sql);
  while($mostrar=mysqli_fetch_row($resul))
  {
    $numero3=$mostrar[0];
}
 $sql="SELECT count(id_alumno) as numero from alumno";
  $resul=mysqli_query($conexion,$sql);
  while($mostrar=mysqli_fetch_row($resul))
  {
    $numero4=$mostrar[0];
  }
 $sql="SELECT count(id_cobromatricula) as numero from cobro_matricula";
  $resul=mysqli_query($conexion,$sql);
  while($mostrar=mysqli_fetch_row($resul))
  {
    $numero5=$mostrar[0];
  }
   $sql="SELECT count(id_cobro) as numero from cobro_pensiones";
  $resul=mysqli_query($conexion,$sql);
  while($mostrar=mysqli_fetch_row($resul))
  {
    $numero6=$mostrar[0];
}




?>
                <!-- /.col-lg-12 -->
           
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <div class="huge"><span class="badge" style="font-size: 15px;"><?php echo $numero1; ?></span></div>
                                    <div>
                                      <p style="font-size: 18px; ">Agregar / Editar / Eliminar / Consultar</p>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="vistas/AlumnoCurso.php">
                            <div class="panel-footer">
                                <span class="pull-left" style="font-size: 15; color: black;">Alumnos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right" style="font-size: 15px; color: blue;"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                 <div class="col-lg-4 col-md-4">
                    <div class="panel panel-orange">
                        <div class="panel-heading">
                           <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <div class="huge"><span class="badge" style="font-size: 15px;"><?php echo $numero2; ?></span></div>
                                    <div>
                                      <p style="font-size: 18px; ">Agregar / Editar / Eliminar / Consultar</p>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="vistas/Usuarios.php">
                            <div class="panel-footer">
                                <span class="pull-left" style="font-size: 15; color: black;">Usuarios</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right" style="font-size: 15px; color: blue;"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                             <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-university fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <div class="huge"><span class="badge" style="font-size: 15px;"><?php echo $numero3; ?></span></div>
                                    <div>
                                      <p style="font-size: 18px; ">Agregar / Editar / Eliminar / Consultar</p>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="vistas/curso.php">
                             <div class="panel-footer">
                                <span class="pull-left" style="font-size: 15; color: black;">Cursos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right" style="font-size: 15px; color: blue;"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                           <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-id-card fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <div class="huge"><span class="badge" style="font-size: 15px;"><?php echo $numero4; ?></span></div>
                                    <div>
                                      <p style="font-size: 18px; ">Agregar / Editar / Eliminar / Consultar</p>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="vistas/Alumno.php">
                            <div class="panel-footer">
                                <span class="pull-left" style="font-size: 15; color: black;">Matriculas</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right" style="font-size: 15px; color: blue;"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                              <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <div class="huge"><span class="badge" style="font-size: 15px;"><?php echo $numero5; ?></span></div>
                                    <div>
                                      <p style="font-size: 18px; ">Agregar / Editar / Eliminar / Consultar</p>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="vistas/Registro_Cobro_Matricula.php">
                           <div class="panel-footer">
                                <span class="pull-left" style="font-size: 15; color: black;">Cobro Matriculas</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right" style="font-size: 15px; color: blue;"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-blue">
                        <div class="panel-heading">
                              <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <div class="huge"><span class="badge" style="font-size: 15px;"><?php echo $numero6; ?></span></div>
                                    <div>
                                      <p style="font-size: 18px; ">Agregar / Editar / Eliminar / Consultar</p>                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="vistas/Registro_Cobro_Pension.php">
                            <div class="panel-footer">
                                <span class="pull-left" style="font-size: 15; color: black;">Cobro Pensiones</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right" style="font-size: 15px; color: blue;"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            </div>

            
    
   
        
     
    
</div>

<!-- /Main -->

