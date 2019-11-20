<?php
       //llamando a los campos
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $mensaje = $_POST['mensaje'];


      //datos para el correo

            $destinatario = "suarezcf144@hotmail.com";
            $asunto = "Contacto desde nuestra web";

            $carta = "De: $nombre \n";
            $carta .= "Correo: $email \n";
            $carta .= "Teléfono: $telefono \n";
            $carta .= "Mensaje: $mensaje";

            $clavesecreta = "6Le3-q4UAAAAADSvfPaG5QIkF_y0l1f2SMphnwBB";
            $claverespuesta = $_POST['g-recaptcha-response'];
            $usuario = $_SERVER['REMOTE_ADDR'];
            $url = "https://www.google.com/recaptcha/api/siteverify?clave=$clavesecreta&response=$claverespuesta&remoteip=$usuario";

            $response = file_get_contents($url);
            $response = json_decode($response);

            //enviando mensaje
            if ($response->success)
               {
                 mail($destinatario, $asunto, $carta);
                 echo "Mensaje enviado con éxito";   
                 header("location:contactos.php");
               }else{
                echo "<span>Captcha inválido, Por favor intente nuevamente</span>";
               }
?>