<?php

$r = new ReservationData();
$r->title = $_POST["title"];
$r->note = $_POST["note"];
$r->pacient_id = $_POST["pacient_id"];
$r->medic_id = $_POST["medic_id"];
$r->date_at = $_POST["date_at"];
$r->time_at = $_POST["time_at"];
$r->user_id = $_SESSION["user_id"];
date_default_timezone_set("America/Guayaquil");
$fecha_cita = $_POST["date_at"];
$time = $_POST["time_at"];
$date = date("Y-m-d");

if ($fecha_cita < $date) {
    echo "<script>alert('Fecha Pasada');"
    . "window.location='index.php?view=newreservation';</script>";
} else {
    $conexion = Database::getCon();
    $query = "SELECT * FROM reservation WHERE date_at = '$fecha_cita' AND time_at = '$time'";
    $stmt = $conexion->query($query);
    $fetch = $stmt->fetch_array(MYSQLI_ASSOC);
    $hora = $fetch['time_at'];
    date_default_timezone_set("America/Guayaquil");
    $new_hora = date("H:i", strtotime($hora) + 12000);
    if ($hora == $time) {
        echo "<script>alert('fecha ocupada sumale 20 minutos');"
        . "window.location='index.php?view=newreservation';"
        . "</script>";
    } else {
        $r->add();
        Core::redir("./index.php?view=reservations");
    }
}
?>