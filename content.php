<div class="col-md-12">              
              <div class="box box-primary direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">¿Desea subir una nueva noticia ?</h3>

                 
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                      <i class="fa fa-minus"></i>
                    </button>
              </div>

              <!-- /.box-body -->
                <div class="box-footer" >
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                      <textarea name="publicacion" onkeypress="return validarn(event)" placeholder="¿Nueva noticia?" class="form-control" cols="200" rows="3" required></textarea>
                      <br><br><br><br>

                    <!-- START Input file nuevo diseño .-->
                      <input type="file" name="foto" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected"/>
                      <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Sube una foto</span></label>
                    <!-- END Input file nuevo diseño .-->
                    <br>

                      <button type="submit" name="publicar" class="btn btn-primary btn-flat">Publicar</button>
                    </div>
                  </form>
                  <?php
                  if(isset($_POST['publicar'])) 
                  {       
    $publicacion =  mysqli_real_escape_string($conection,$_POST['publicacion']);

                    $result = mysqli_query($conection,"SHOW TABLE STATUS WHERE `Name` = 'publicaciones'");
                    $data = mysqli_fetch_assoc($result);
                    $next_increment = $data['Auto_increment'];

                    $alea = substr(strtoupper(md5(microtime(true))), 0,12);
                    $code = $next_increment.$alea;

                    $type = 'jpg';
                    $rfoto = $_FILES['foto']['tmp_name'];
                    $name = $code.".".$type;

                    if(is_uploaded_file($rfoto))
                    {
                      $destino = "../publicaciones/".$name;
                      $nombre = $name;
                      copy($rfoto, $destino);
                    
                    

                    $llamar = mysqli_num_rows(mysqli_query($conection,"SELECT * FROM albumes WHERE usuario ='1' AND nombre = 'Publicaciones'"));

                    if($llamar >= 1) {} else {

                    $crearalbum = mysqli_query($conection,"INSERT INTO albumes (usuario,fecha,nombre) values ('".$_SESSION['id']."',now(),'Publicaciones')");

                   }

                   $idalbum = mysqli_query($conection,"SELECT * FROM albumes WHERE usuario ='".$_SESSION['id']."' AND nombre = 'Publicaciones'");
                   $alb = mysqli_fetch_array($idalbum);

                    $subirimg = mysqli_query($conection,"INSERT INTO fotos (usuario,fecha,ruta,album,publicacion) values ('".$_SESSION['id']."',now(),'$nombre','1','$next_increment')");

                    $llamadoimg = mysqli_query($conection,"SELECT id_fot FROM fotos WHERE usuario = '".$_SESSION['id']."' ORDER BY id_fot desc");
                    $llaim = mysqli_fetch_array($llamadoimg);

                    }
                    else
                    {
                      $nombre = '';
                    }

                    $subir = mysql_query("INSERT INTO publicaciones (usuario,fecha,contenido,imagen,album,comentarios) values ('".$_SESSION['id']."',now(),'$publicacion','".$llaim['id_fot']."','".$alb['id_alb']."','1')");
                    if($subir) {echo '<c';}

                  }      
                  ?>           
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>