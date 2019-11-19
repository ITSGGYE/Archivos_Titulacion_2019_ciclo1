<?php
session_start();
include 'lib/config.php'; 
$post = mysqli_real_escape_string($conection,$_POST['id']);
$usuario = $_SESSION['id'];


$comprobar = mysqli_query($conection,"SELECT * FROM likes WHERE post = '".$post."' AND usuario = ".$usuario."");
$count = mysqli_num_rows($comprobar);

if ($count == 0) {

	$insert = mysqli_query($conection,"INSERT INTO likes (usuario,post,fecha) values ('$usuario','$post',now())");
	$update = mysqli_query($conection,"UPDATE publicaciones SET likes = likes+1 WHERE id_pub = '".$post."'");

}

else 

{

	$delete = mysqli_query($conection,"DELETE FROM likes WHERE post = ".$post." AND usuario = ".$usuario."");
	$update =mysqli_query($conection,"UPDATE publicaciones SET likes = likes-1 WHERE id_pub = '".$post."'");

}

$contar = mysqli_query($conection,"SELECT likes FROM publicaciones WHERE id_pub = ".$post."");
$cont = mysqli_fetch_array($contar);
$likes = $cont['likes'];

if ($count >= 1) { $megusta = "<i class='fa fa-thumbs-o-up'></i> Me gusta"; $likes = " (".$likes++.")"; } else { $megusta = "<i class='fa fa-thumbs-o-up'></i> No me gusta"; $likes = " (".$likes--.")"; }

$datos = array('likes' =>$likes,'text' =>$megusta);

echo json_encode($datos);

?>