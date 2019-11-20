<?php

$destino = "montalvanjosue@gmail.com";
$nombre = "josue";
$correo = 'josuezambranoreyes3h@gmail.com';

$mensaje = 'hola';
$contenido = "Nombre: " . $nombre . "\nCorreo: " . $correo . "\nMensaje: " . $mensaje;
echo mail($destino, "Contacto", $contenido);
//header("Location: index.html");
