<?php
$destino="giovy_27@hotmail.com,langoquilsa@gmail.com";
$nombre=$_REQUEST['name'];
$correo=$_REQUEST['email'];
$mensaje=$_REQUEST['message'];
$titulo="Consulta de Usuario";
$headers = "From:" . $correo;
//Preparamos el mensaje a enviar
$contenido="Nombre:".$nombre."\nCorreo:".$correo."\nTitulo:".$titulo."\nMensaje:".$mensaje;
mail($destino,"Consulta Cliente",$contenido,$headers);
//echo $contenido;
echo"<script>alert('Mensaje Enviado') ; window.location='../index.html';</script>";


?>