<?php
session_start();
require_once "../conexion.php";
date_default_timezone_set('America/Guayaquil');
mysqli_query($conection,"SET FOREIGN_KEY_CHECKS=0");
$consult = mysqli_query($conection,"SELECT MAX(fecha) AS max_fecha FROM act_pacientes");
$result = mysqli_fetch_array($consult);
$fecha_actual = $result['max_fecha']; echo "<br>";
$fecha = date("Y-m-d",strtotime($fecha_actual."+ 6 month")); echo "<br>";
$date = date("Y-m-d"); echo "<br>";
$fecha_a = date("Y-m-d",strtotime($date)); echo "<br>";
if ($fecha_a >= $fecha) {
  $query = "DELETE FROM ebenedent.personas WHERE  estatus = 0";
  $query_delete = mysqli_query($conection,$query) or die (mysqli_error($conection));
  mysqli_query($conection,"SET FOREIGN_KEY_CHECKS=1");
  if ($query_delete) {
  $fecha_B = date("Y-m-d");
  $insert = mysqli_query($conection,"INSERT INTO ebenedent.act_pacientes (fecha) VALUES ('$fecha_B')");
  if ($insert) {
    mysqli_close($conection);
    echo "<script>alert('ELIMINADOS CON EXITO');
    window.location = 'lista_paciente.php';
    </script>";
  }else{
    echo "<script>alert('ERROR');
    window.location = 'lista_paciente.php';
    </script>";
  }
}else {
  mysqli_close($conection);
  echo "<script>alert('ERROR');
  window.location = 'lista_paciente.php';
  </script>";
}
}else {
  echo "<script>alert('ESPERA 6 MESES');
  window.location = 'lista_paciente.php';
  </script>";
}



 ?>
