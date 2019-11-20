<?php
date_default_timezone_set("America/Guayaquil");
$fecha_actual = date("Y-m-d");
include("conn.php");

$nombrepac = $_POST['nombrepac'];
$fechanac = $_POST['fechanac'];
$especie = $_POST['especie'];
$sexo = $_POST['sexo'];
$raza = $_POST['raza'];
$peso = $_POST['peso'];
$foto = $_POST['foto'];
$nombrerep = $_POST['nombrerep'];
$dni = $_POST['dni'];
$telefonos = $_POST['telefonos'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$fechareg = $_POST['fechareg'];
$img = $_FILES['foto'];

if($fechanac > $fecha_actual){
        echo "<script>alert('Fecha no válida');"
        . "window.location='reg_paciente_vet.php';"
        . "</script>";
}else{
if ($peso == "") {
    $peso = (int) 0;
}


    $formatos = array('image/jpg', 'image/pjpeg', 'image/bmp', 'image/jpeg', 'image/gif', 'image/png');
    if (in_array($_FILES["foto"]["type"], $formatos)) {
    $foto = "img_" . $dni . "_" . $nombrepac . "." . str_replace("image/", "", $_FILES['foto']["type"]);
    $x_ruta = "/var/www/html/imagenes/pacientes/" . $foto;
    $estado = move_uploaded_file($_FILES['foto']['tmp_name'], $x_ruta);
}


    $query = "INSERT INTO paciente(nombrepac,fechanac,especie,sexo,raza,peso,foto,nombrerep,dni,telefonos,direccion,correo,fechareg)
		VALUES('$nombrepac','$fechanac','$especie','$sexo','$raza',$peso,'$foto','$nombrerep','$dni','$telefonos','$direccion','$correo','$fechareg')";
    $resultado = $conn->query($query);
    if ($resultado) {
        print '<script language="JavaScript">';
        print 'alert("REGISTRO CORRECTO");';
        print '</script>';
        require('reg_paciente_vet.php');
    } else {
        echo "insercion NO exitosa";
        echo "<script>alert('insercion NO exitosa');"
        . "window.location='reg_paciente_vet.php';"
        . "</script>";
    }
}
//} else {
//    echo "<script>alert('NO SE PUEDE SUBIR LA IMAGEN');"
//    . "window.location='reg_paciente_vet.php';</script>";
//}
