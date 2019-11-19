<?php $privilegio=$_SESSION["profesor"]["privilegio"];
      $id_profesor=$_SESSION["profesor"]["id"]?>

<div class="nav-side-menu">
    <div class="brand">
       <center>
      <h6><b> Bienvenido </b></h6>
      <img src="Imagenes/Profesores/<?php echo $_SESSION['profesor']['imagen'] ; ?>" class="rounded-circle" width="80" height="80"> 
      <h6><strong><?php echo $_SESSION['profesor']['nombre']; ?> </strong> </h6>
       <a class="btn btn-danger" href="salir.php" role="button">Logout</a>
       <br>
      </center>
      </div>
<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
               

                <li  data-toggle="collapse" data-target="#parametros" class="collapsed active">
                  <a href="#"><i class="fa fa-th-list fa-lg"></i> Inf. Personal <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu  " id="parametros">
                    <li class="active"><a href="vistas/datosProfesor.php">Mis datos</a></li>
                    <li><a href="vistas/cambiarpassword.php">Cambiar de contraseña</a></li>

                    <li><a href="vistas/datosProfesoractualiza.php">Actualizar datos</a></li>
                    
                </ul>


                
                <?php if($privilegio=='C'){

                  ?>
                <li data-toggle="collapse" data-target="#notas" class="collapsed">
                  <a href="#"><i class="fa fa-address-book fa-lg"></i> Calificaciones <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="notas">
                   <li><a href="inicio.php">Ingresar notas  </a></li>
                                       <?php 
                    $id=$_SESSION['profesor']['id'];
                    $sql="SELECT count(*),fk_curso from tutor where fk_profesor='$id' and estado=1";
                    $result=mysqli_query($conexion,$sql);
                    while($mostrar=mysqli_fetch_row($result)){
                      $row=$mostrar[0];
                      $curso=$mostrar[1];
                    }
                    if($row>0){

                      
                   echo '<li><a href="vistas/registrar_asistencias.php?tutor='.$id.'&curso='.$curso.'">Asistencias</a></li>
                   <li><a href="vistas/ingreso_notas_conducta.php?tutor='.$id.'&curso='.$curso.'">Conducta</a></li>';
                    if($curso<=11)
                    {
                      
                   echo '<li><a href="vistas/ingreso_notas_proyecto.php?tutor='.$id.'&curso='.$curso.'">Proyecto Escolar</a></li>';
                   
                 }
                }
                    
                    $sql="SELECT count(id_examen) from examen where estado=1";
                    $result=mysqli_query($conexion,$sql);
                    while($mostrar=mysqli_fetch_row($result)){
                      $row=$mostrar[0];
                    }
                    if($row>0){
                      echo  '<li><a href="examen.php">Examen</a></li>';
                    }
                 ?>
                 <li><a href="supletorio.php">Supletorio</a></li>
                   
               </ul>
               <?php }?>
               <?php if($privilegio=='M'){
                    $id=$_SESSION['profesor']['id'];
                ?>
                <li data-toggle="collapse" data-target="#notas3" class="collapsed">
                  <a href="#"><i class="fa fa-address-book fa-lg"></i> Modificar Notas <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="notas3">
                   <li><a href="udpate_notas.php">Parciales </a></li>
                    <li><a href="udpate_examen.php"> Examen </a></li>
                    <?php
                    $sql="SELECT count(fk_profesor),fk_curso from tutor where fk_profesor='$id_profesor' and estado=1";
                    $result=mysqli_query($conexion,$sql);
                    while($mostrar=mysqli_fetch_row($result)){
                      $row=$mostrar[0];
                       $curso=$mostrar[1];
                    }
                    if($row>0){
                
                 echo ' <li><a href="vistas/updateasistencias.php?tutor='.$id.'&curso='.$curso.'">Asistencias</a></li>
                   <li><a href="vistas/updatenotas_conducta.php?tutor='.$id.'&curso='.$curso.'">Conducta</a></li>';
                   if($curso<=11){
                    
                   echo '<li><a href="vistas/updatenotas_proyecto.php?tutor='.$id.'&curso='.$curso.'">Proyecto Escolar</a></li>';
                
                 }
               }
               ?>
                  
               </ul>
              <?php } ?>
               <li data-toggle="collapse" data-target="#notas2" class="collapsed">
                  <a href="#"><i class="fa fa-search fa-lg"></i> Ver Calificaciones <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="notas2">
                   <li><a href="vernotas.php">Ver notas  </a></li>
                   <li><a href="vernotasfinales.php">Notas finales  </a></li>
                   
                   <?php
                    $sql="SELECT count(fk_profesor),fk_curso from tutor where fk_profesor='$id_profesor' and estado=1";
                    $result=mysqli_query($conexion,$sql);
                    while($mostrar=mysqli_fetch_row($result)){
                      $row=$mostrar[0];
                       $curso=$mostrar[1];
                    }
                    if($row>0){
                
                 echo ' <li><a href="vistas/verasistencias.php?tutor='.$id.'&curso='.$curso.'">Asistencias</a></li>
                   <li><a href="vistas/ver_notas_conducta.php?tutor='.$id.'&curso='.$curso.'">Conducta</a></li>';
                   if($curso<=11){
                    
                   echo '<li><a href="vistas/ver_notas_proyecto.php?tutor='.$id.'&curso='.$curso.'">Proyecto Escolar</a></li>';
                
                 }
               }
                  $sql="SELECT count(*) from examen where estado=1";
                    $result=mysqli_query($conexion,$sql);
                    while($mostrar=mysqli_fetch_row($result)){
                      $row=$mostrar[0];
                    }
                    if($row>0){
                 echo '  <li><a href="vernotasexamen.php">Examen</a></li>';
                   }
                   ?>
               </ul>
        
              </ul>
     </div>
</div>
</div>