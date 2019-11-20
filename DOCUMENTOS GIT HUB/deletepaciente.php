<?php

require_once 'session_active.php';
require_once 'conn.php';
$id = $_GET['id'];
$query = "DELETE FROM paciente WHERE id_paciente = $id";
$stmt = $conn->query($query);
if($stmt){
    echo "<script>alert('Se elimino correctamente');"
    . "window.location='act_paciente.php';</script>";
}else{
    echo "<script>alert('¡Error! No se completo la acción);"
    . "window.location='act_paciente.php';</script>";
}
