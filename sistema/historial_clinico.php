<?php
session_start();

include "../conexion.php";
$id_cita = $_GET['id'];
$query= mysqli_query($conection,"SELECT cedula_paciente,fecha,nota,id_cita FROM citas WHERE id = $id_cita");
$result = mysqli_fetch_array($query);
$idcita = $result['id_cita'];
$cedula_paciente = $result['cedula_paciente'];
$query = mysqli_query($conection,"SELECT nombres,cedula FROM personas WHERE cedula = $cedula_paciente");
$datos = mysqli_fetch_array($query);
$cedula = $datos['cedula'];

if (!empty($_POST)) {
  if (empty($_POST['cedula']) ||  empty($_POST['motivo']) || empty($_POST['descripcion']) || empty($_POST['prescripcion']) || empty($_POST['fecha']) || empty($_POST['precio'])) {
      $alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
  }else {
    $cedula = $_POST['cedula'];
    $motivo = $_POST['motivo'];
    $descripcion = $_POST['descripcion'];
    $prescripcion = $_POST['prescripcion'];
    $fecha = $_POST['fecha'];
    $precio = (float) $_POST['precio'];
    mysqli_query($conection,"set autocommit = 0");
    mysqli_query($conection,"START TRANSACTION");
    $query_insert = mysqli_query($conection,"INSERT INTO historias_clinicas (id_cita,cedula_paciente,motivo,descripcion,prescripcion,fecha,precio)
    VALUES ('$idcita','$cedula','$motivo','$descripcion','$prescripcion','$fecha',$precio)") or die(mysqli_error($conection));
    if ($query_insert) {
      $query_update = mysqli_query($conection,"UPDATE citas SET estatus = 0 WHERE id = $id_cita") or die(mysqli_error($conection));
      if ($query_update) {
        mysqli_query($conection,"commit");
        mysqli_query($conection,"set autocommit = 1");
        echo "<script>alert('Regristro creado con ¡Exito!');</script>";
        echo "<script>location.href ='./lista_cita.php';</script>";
        $alert='<p class="msg_save">registro de la Historia Clinica Exitoso.</p>';
      }else {
          mysqli_query($conection,"rollback");
          mysqli_query($conection,"set autocommit = 1");
          $alert='<p class="msg_error">1 Error al registrar la Historia Clinica.</p>';
      }
    }else {
        mysqli_query($conection,"rollback");
        mysqli_query($conection,"set autocommit = 1");
        $alert='<p class="msg_error">2 Error al registrar la Historia Clinica.</p>';
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<?php include "includes/scripts.php"; ?>
<title>Historial Clinico</title>
</head>
<body>
	<?php include "includes/header.php"; ?>
  <section id="container">
    <h1>HISTORIA CLINICA DE <?php echo $datos['nombres'];?></h1>

      <div class="form_register">
        <h1>Registro de Historia Clinica <?php  echo "<br> Fecha de la Cita:".$result['fecha']; ?></h1>
        <hr>
        <div class="alert"><?php echo isset($alert) ? $alert : ""; ?></div>
        <div class="alert"><?php echo isset($alert1) ? $alert1 : ""; ?></div>
        <form action="" method="post">

          <label for="cedula">cedula del paciente</label>
          <input redonly type="text" name="cedula" id="cedula" value="<?php echo $cedula; ?>">

          <label for = "nombre">Nombre del paciente </label>
          <input type="text" name="nombre" id="nombre" placeholder="nombre completo" value="<?php echo $datos['nombres'] ?>">

          <label for = "motivo">Motivo </label>
          <input type="text" name="motivo" id="motivo" placeholder="nombre completo" value="<?php echo $result['nota']; ?>">

          <label for = "descripcion">Descripción</label>
          <textarea name="descripcion" id="descripcion" rows="5" >
          </textarea>

          <label for = "prescripcion">Prescripcion</label>
          <textarea name="prescripcion" id="prescripcion" rows="5" >
          </textarea>

          <label for= "fecha">Fecha</label>
          <input type="date" name="fecha" id="fecha" placeholder="Fecha de cita" value="<?php date_default_timezone_set('America/Guayaquil');
		        echo $date = date("Y-m-d"); ?>">

          <label for="precio">Precio</label>
          <input type="text" name="precio" id="precio" placeholder="Use un punto para separar decimales (centavos)">

            <input type="submit" value="Registrar Historia Clínica" class="btn_save">

        </form>
      </div>

    </section>

    <style media="screen">
    section{
      width: 100%;
    }
      .form_register{
        width: 50%;
      }

      .form_register h1{
        width: 100%;
        text-align: center;
        margin-top: 1%;
      }

      #descripcion,#prescripcion{
        width: 100%;
        height: 100px;
        max-width: 100%;
        max-height: 100px;
      }

    </style>
</body>
</html>
