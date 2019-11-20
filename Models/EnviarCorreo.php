<?php

// definimos el mensaje
$mensaje="";
$mensaje.="Nombre: ".$_POST['fname']."\n";
$mensaje.="Correo Electronico: ".$_POST['femail']."\n";
$mensaje.="Comentario: ".$_POST['fcomment']."\n";
// definimos a quien se lo enviamos
$email_destiny=$_POST['emaildestino'];
$subject=$_POST['fasunto'];
// verificamos si se enviamos mensaje


if (mail($email_destiny,$subject,$mensaje,"From: Contacto<".$_POST['femail'].">")) {
    echo 'Correo Enviado con exito';
} else {
    echo 'Error al enviar Correo intento nuevamente luego';
}
?>