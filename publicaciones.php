<?php
include 'lib/config.php';
?>
<script type="text/javascript" src="js/likes.js"></script>
<script type="text/javascript">
$(document).ready(function() {

    $(".enviar-btn").keypress(function(event) {

      if ( event.which == 13 ) {

        var getpID =  $(this).parent().attr('id').replace('record-','');

        var usuario = $("input#usuario").val();
        var comentario = $("#comentario-"+getpID).val();
        var publicacion = getpID;
        var avatar = $("input#avatar").val();
        var nombre = $("input#nombre").val();
        var now = new Date();
        var date_show = now.getDate() + '-' + now.getMonth() + '-' + now.getFullYear() + ' ' + now.getHours() + ':' + + now.getMinutes() + ':' + + now.getSeconds();

        if (comentario == '') {
            alert('Debes añadir un comentario');
            return false;
        }

        var dataString = 'usuario=' + usuario + '&comentario=' + comentario + '&publicacion=' + publicacion;

        $.ajax({
                type: "POST",
                url: "agregarcomentario.php",
                data: dataString,
                success: function() {
                    $('#nuevocomentario'+getpID).append('<div class="box-comment"><img class="img-circle img-sm" src="avatars/'+ avatar +'"><div class="comment-text"><span class="username"> '+ nombre +'<span class="text-muted pull-right">' + date_show + '</span></span>' + comentario + '</div></div>');
                }
        });
        return false;
      }
    });

});
</script>

<?php
$CantidadMostrar=5;
     // Validado  la variable GET
    $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 


	$TotalReg       =mysqli_query($conection,"SELECT * FROM publicaciones");
	$totalr = mysqli_num_rows($TotalReg);
	//Se divide la cantidad de registro de la BD con la cantidad a mostrar 
	$TotalRegistro  =ceil($totalr/$CantidadMostrar);
	 //Operacion matematica para mostrar los siquientes datos.
	$IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):0;
	//Consulta SQL
	$consultavistas ="SELECT *
				FROM
				publicaciones
				ORDER BY
				id_pub DESC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
	$consulta=mysqli_query($conection,$consultavistas);
	while ($lista=mysqli_fetch_array($consulta)) { 
       $userid = mysqli_real_escape_string($conection,$lista['usuario']); 

		$usuariob = mysqli_query($conection,"SELECT * FROM admin WHERE id_admin = '1'");
    $use = mysqli_fetch_array($usuariob);

    $fotos = mysqli_query($conection,"SELECT * FROM fotos WHERE publicacion = '$lista[id_pub]'");
    $fot = mysqli_fetch_array($fotos);
	?>
	<!-- START PUBLICACIONES -->
          <!-- Box Comment -->
          <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <img class="img-circle" src="avatars/<?php echo $use['foto']; ?>" alt="User Image">
                <span class="description" onclick="location.href='perfil.php?id=<?php echo $use['id_est'];?>';" style="cursor:pointer; color: #3C8DBC;"><?php echo $use['nombre'];?></span>
                <span class="description"><?php echo $lista['fecha'];?></span>
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- post text -->
              <p><?php echo $lista['contenido'];?></p>

              <?php 
              if($lista['imagen'] != 0)
              {
              ?>
              <img src="publicaciones/<?php echo $fot['ruta'];?>" width="100%">
              <?php
          	  }
          	  ?>

              <br><br>
              <?php 
              $numcomen = mysqli_num_rows(mysqli_query($conection,"SELECT * FROM comentarios WHERE publicacion = '".$lista['id_pub']."'"));
              ?>
              <!-- Social sharing buttons -->
            <ul class="list-inline">

              <?php
              $query = mysqli_query($conection,"SELECT * FROM likes WHERE post = '".$lista['id_pub']."' AND usuario = ".$_SESSION['id']."");

              if (mysqli_num_rows($query) == 0) { ?>

                <li><div class="btn btn-default btn-xs like" id="<?php echo $lista['id_pub']; ?>"><i class="fa fa-thumbs-o-up"></i> Me gusta </div><span id="likes_<?php echo $lista['id_pub']; ?>"> (<?php echo $lista['likes']; ?>)</span></li>

              <?php } else { ?>
                
                <li><div class="btn btn-default btn-xs like" id="<?php echo $lista['id_pub']; ?>"><i class="fa fa-thumbs-o-up"></i> No me gusta </div><span id="likes_<?php echo $lista['id_pub']; ?>"> (<?php echo $lista['likes']; ?>)</span></li>

              <?php } ?>



                    <li class="pull-right">
                      <span href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comentarios
                        (<?php echo $numcomen; ?>)</span></li>
                  </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer box-comments">

            <?php 
            $comentarios = mysqli_query($conection,"SELECT * FROM comentarios WHERE publicacion = '".$lista['id_pub']."' ORDER BY id_com desc LIMIT 5");
            while($com=mysqli_fetch_array($comentarios)){
              $usuarioc = mysqli_query($conection,"SELECT * FROM estudiantes WHERE id_est = '".$com['usuario']."'");
              $usec = mysqli_fetch_array($usuarioc);
              ?>


              <div class="box-comment">
                <!-- User image -->
                <img class="img-circle img-sm" src="avatars/<?php echo $usec['foto'];?>">

                <div class="comment-text">
                      <span class="username">
                        <?php echo $usec['nombre'];?>
                        <span class="text-muted pull-right"><?php echo $com['fecha'];?><form name="elimina" method="post" action="eliminacoment.php">
<input type="hidden" name="id" value="<?php echo $com['id_com']; ?>">
<button   type="submit" class="btn btn-danger btn-xs"onclick="pregunta()" data-toggle="modal" data-target=""></form>
X
</button>  <br> <form name="elimina" method="post" action="editarcomen.php">
<input type="hidden" name="id" value="<?php echo $com['id_com']; ?>">
<button   type="submit" class="btn btn-danger btn-xs"onclick="pregunta()" data-toggle="modal" data-target=""></form>
Editar
</button>  </span>          <!-- /.username -->
                  <?php echo $com['comentario'];?>
 


          

                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              <?php } ?>

              <?php if ($numcomen > 2) { ?> 
              <br>
  
              <?php } ?>
 
              <br>
                        <form method="post" action="agregarcomentario.php">
                <label id="record-<?php  echo $lista['id_pub'];?>">
                <input type="text" class="enviar-btn form-control input-sm" style="width: 500px;" placeholder="Escribe un comentario" name="comentario" id="comentario-<?php  echo $lista['id_pub'];?>" onclick="javascript: limpia(this);" ">
                <input type="hidden" name="usuario" value="<?php echo $_SESSION['id'];?>" id="usuario">
                <input type="hidden" name="publicacion" value="<?php echo $lista['id_pub'];?>" id="publicacion">
                <input type="hidden" name="avatar" value="<?php echo $_SESSION['avatar'];?>" id="avatar">
                <input type="hidden" name="nombre" value="<?php echo $_SESSION['usuario'];?>" id="nombre">
                <input type="submit" name="">

                </form>

              </div>
<script>
function limpia(elemento)
{
elemento.value = "";
}

 
</script>
        </div>
        <!-- /.col -->
        <!-- END PUBLICACIONES -->
    
    <br><br>

	<?php
	}
	//Validmos el incrementador par que no genere error
	//de consulta.  
    if($IncrimentNum<=0){}else {
	echo "<a href=\"publicaciones.php?pag=".$IncrimentNum."\">Seguiente</a>";
	}
?>