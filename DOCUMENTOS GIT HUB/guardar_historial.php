<?php

include("conn.php");

$paciente = $_POST['paciente'];
$representante = $_POST['representante'];
$especie = $_POST['especie'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$tipo_atencion = $_POST['tipo_atencion'];
$registro = $_POST['registro'];
$medicamento = $_POST['medicamento'];
$atendido = $_POST['atendido'];
$id_paciente = $_POST['id_paciente'];

$query = "INSERT INTO historial (id_paciente,paciente,representante,especie,fecha,hora,tipo_atencion,registro,medicamento,atendido)
		VALUES($id_paciente,'$paciente','$representante','$especie','$fecha','$hora','$tipo_atencion','$registro','$medicamento','$atendido')";
$resultado = $conn->query($query);

if ($resultado) {
    print '<script language="JavaScript">';
    print 'alert("REGISTRO CORRECTO");';
    print '</script>';
    require('reg_historial.php');
} else {
    echo "insercion NO exitosa";
}
?>