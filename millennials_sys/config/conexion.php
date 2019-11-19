<?php
 header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set('America/Guayaquil');
    $con=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  
if (!$con->set_charset("utf8")) {
       
    } else {
     
    }
          


    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_error()) {
        die("Conexión fallo: ".mysqli_connect_error()." : ". mysqli_connect_error());
    }
?>
