 <?php
	session_start();

	include "../conexion.php";

	if(!empty($_POST))
	{
		$alert='';


    if (empty($_POST['bus_cedula'])) {
      $alert1='<p class="msg_error">Ingrese la Cedula del Paciente para Agendar la Cita</p>';
    }else {
      $bus_cedula = mysqli_real_escape_string($conection,$_POST['bus_cedula']);
      $query = mysqli_query($conection,"SELECT cedula,nombres FROM personas WHERE cedula = $bus_cedula AND type_persona= 3");
      $bus = mysqli_fetch_array($query);
      $row = mysqli_num_rows($query);
      mysqli_close($conection);
      if ($row>0) {
        $cedula_p = $bus['cedula'];
        $nombres_p = $bus['nombres'];
      }else {
        echo "<script>alert('Ingrese una Cedula Válida');</script>";
        $_POST['bus_cedula'] = null;
        echo "<script>location.href ='./registro_citas.php';</script>";
      }
    }

		if(empty($_POST['cedula']) ||empty($_POST['nombre']) || empty($_POST['fecha']) || empty($_POST['hora']))
		{
			$alert='<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{

      $cedula     = $_POST['cedula'];
		    $nombre      = $_POST['nombre'];
		      $fecha       = $_POST['fecha'];
		        $hora        = $_POST['hora'];
		          $nota        = $_POST['nota'];


                $id_cita = mysqli_query($conection,"SELECT MAX(id)+1 AS COD FROM citas");
                  $idcitas = mysqli_fetch_array($id_cita);
                  $codigo = "CT-".$idcitas['COD'];
                  mysqli_query($conection,"set autocommit = 0");
                  mysqli_query($conection,"START TRANSACTION");
				              $query_insert = mysqli_query($conection,"INSERT INTO citas(id_cita,cedula_paciente,nota,fecha,hora,estatus)
					                 VALUES('$codigo','$cedula','$nota','$fecha','$hora',1)");


				if($query_insert){
          mysqli_query($conection,"commit") or die(mysqli_error($conection));
					mysqli_query($conection,"set autocommit = 1") or die(mysqli_error($conection));
          echo "<script>alert('cita guardado correctamente.');</script>";
				}else{
          mysqli_query($conection,"rollback") or die(mysqli_error($conection));
          mysqli_query($conection,"set autocommit = 1") or die(mysqli_error($conection));
          echo "<script>alert('Error al guardar cita.');</script>";
				}
        			mysqli_close($conection);
			}
		}





 ?>




<!Doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php include "includes/scripts.php"; ?>

	<title>REGISTROS DE CITAS</title>
  <script>
    function solonumeros(e){
      key=e.keyCode || e.wich;
      teclado=String.fromCharCode(key);
      numeros="0123456789";
      especiales="8-37-38-46";//array
      teclado_especial=false;

      for(var i in especiales){
        if(key==especiales[i]){
          teclado_especial=true;
        }
      }
      if(numeros.indexOf(teclado)==-1 && !teclado_especial){
        return false;
      }

    }
  </script>
</head>
<body>

<?php include "includes/header.php"; ?>
<?php if (!isset($_POST['bus_cedula'])) {
  echo '
  <section id="container">

  	<div class="form_register">
  		<h4>Busqueda del Paciente</h4>
  		<hr>
  		<div class="alert"><?php echo isset($alert1) ? $alert1 : ""; ?></div>
  		<form action="" method="post">

  			<label for="bus_cedula">Cédula del Paciente</label>
  			<input type="text" name="bus_cedula" id="bus_cedula" placeholder="cedula del paciente" minlength="10" maxlength="10" onkeypress=" return solonumeros(event)" >
        <input type="submit" value="Buscar Paciente" class="btn_save">

  		</form>
  	</div>
  </section>
  ';
} ?>
<?php
if (isset($bus_cedula)) {
echo $form = '
<section id="container">

  <div class="form_register">
    <h1>Registros de Citas</h1>
    <hr>
    <div class="alert"><?php echo isset($alert) ? $alert : ""; ?></div>
    <div class="alert"><?php echo isset($alert1) ? $alert1 : ""; ?></div>
    <form action="" method="post">

      <label for="cedula">cedula del paciente</label>
      <input redonly type="text" name="cedula" id="cedula" value="'.$cedula_p.'">

      <label for = "nombre">Nombre del paciente </label>
      <input type="text" name="nombre" id="nombre" placeholder="nombre completo" value="'.$nombres_p.'">

      <label for= "fecha">Fecha</label>
      <input type="date" name="fecha" id="fecha" placeholder="Fecha de cita">

      <label for="hora">Hora</label>
      <input type="time" name="hora" id="hora" placeholder="hora de cita">

      <label for="nota">OBSERVACIONES O JUSTIFICATIVO</label>
      <input type="text" name="nota" id="nota" placeholder="nota">

        <input type="submit" value="Guardar cita" class="btn_save">

    </form>
  </div>

</section>
';
}
 ?>

	<?php include "includes/footer.php"; ?>


</body>

</html>
