<?php

$db_host = "18.216.95.231";
$db_user = "JosueMontalvan";
$db_pass = "#passwordMpntalvan2019";
$db_name = "rapidservices_histovet";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
$stmt = $conn->query("SET NAMES = 'UTF8'");
$stmt = null;
if (mysqli_connect_errno()) {
    echo 'Error, no se pudo conectar a la base de datos: ' . mysqli_connect_error();
    $conn = null;
}