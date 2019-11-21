<?php
require './conexion.php';
require_once './constantes.php';
if (!isset($_SESSION['u']['usuario'])) {
    session_start();
}
if (!isset($_SESSION['u']['usuario'])) {
    header("Location: login.php");
}
iniciarPagina();
$objConexion = new Conexion();
$conexion = $objConexion::obtenerConexion();
$query = "SELECT MAX(cod_lectivo)AS lectivo FROM lectivo";
$stmt = $conexion->prepare($query);
$stmt->execute();
$periodo_lectivo = $stmt->fetch();
$mensaje = "Periodo lectivo en curso"." ".$periodo_lectivo['lectivo'];
?>
<div class="container" >
    <br>
    <div class="text-center">
        <h2 style="background: #003153;color: white" class="font-weight-bold">Sistema de Matriculación y Cobro de Pensiones</h2><hr>
        <br>
        <h3>Escuela Particular Dr.Maximo Agustin Rodriguez</h3>
        <h3> <?php echo $mensaje; ?></h3>
        <div class="text-center">
            <img width="500px" src="./dist/img/logo_escuela_matricula.jpg" class="img-fluid" alt="Responsive image">
        </div>
    </div>
</div>
