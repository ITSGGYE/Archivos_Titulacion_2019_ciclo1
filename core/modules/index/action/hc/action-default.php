<?php

if (count($_POST) > 0) {
    $user = ReservationData::getById($_POST["id"]);
    $user->title = $_POST["title"];
    $user->pacient_id = $_POST["pacient_id"];
    $user->medic_id = $_POST["medic_id"];
    $user->date_at = $_POST["date_at"];
    $user->time_at = $_POST["time_at"];
    $user->note = $_POST["note"];
    $user->descripcion = $_POST["descripcion"];
    $user->estado = 0;
    $user->hc_insert();

    print "<script>window.location='index.php?view=reservations';</script>";
}
?>