<?php
require('lib/config.php');

$usuario = ($_POST['usuario']);
$comentario = ($_POST['comentario']);
$publicacion = ($_POST['publicacion']);

$insert = mysqli_query($conection,"INSERT INTO comentarios (usuario, comentario, fecha, publicacion) VALUES ('$usuario', '$comentario', now(), '$publicacion')");
 

$llamado = mysqli_query($conection,"SELECT * FROM publicaciones WHERE id_pub = '".$publicacion."'");
$ll =mysqli_fetch_array($llamado);

$usuario2 = ($ll['usuario']);

$insert2 = mysqli_query($conection,"INSERT INTO notificaciones (user1, user2, tipo, leido, fecha, id_pub) VALUES ('$usuario', '$usuario2', 'ha comentado', '0', now(), '$publicacion')");
 

?><script>

setTimeout("history.back(1)", 1);

</script>