<?php

require_once 'valid.php';
$id_student = $_GET['reserva'];
$query = "SELECT id FROM reservas WHERE cod_reserva = '$id_student'";
$stmt = $conn->query($query);
$result = $stmt->fetch_array(MYSQLI_ASSOC);
$id = $result['id'];
$query = "DELETE FROM reservas WHERE id = '$id'";
if ($stmt = $conn->query($query)) {
    echo '
    <script type = "text/javascript">
      alert("Reserva Eliminada con Exito");
      window.location = "view_reservas.php";
    </script>
  ';
} else {
    echo '
    <script type = "text/javascript">
      alert("¡Error! Eliminada con Exito");
      window.location = "view_reservas.php";
    </script>
  ';
}

