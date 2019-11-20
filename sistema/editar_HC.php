<?php
session_start();
include '../conexion.php';
$id = $_GET['id'];
$idpaciente = $_GET['idpaciente'];
$query = "SELECT  * FROM ebenedent.historias_clinicas WHERE id = $id";
$result = mysqli_query($conection,$query);
$fetch = mysqli_fetch_array($result);
$cedula = $fetch['cedula_paciente'];
$query = "SELECT nombres FROM ebenedent.personas WHERE cedula = '$cedula'";
$resul = mysqli_query($conection,$query);
$nom = mysqli_fetch_array($resul);

if (isset($_POST['editar'])) {
  $cedula = $_POST['cedula'];
  $motivo = $_POST['motivo'];
  $descripcion = $_POST['descripcion'];
  $prescripcion = $_POST['prescripcion'];
  $fecha = $_POST['fecha'];
  $precio = (float) $_POST['precio'];

  mysqli_query($conection,"set autocommit = 0");
  mysqli_query($conection,"START TRANSACTION");
  $query_update = "UPDATE ebenedent.historias_clinicas SET motivo = '$motivo', descripcion = '$descripcion',prescripcion = '$prescripcion', fecha = '$fecha', precio = '$precio'
  WHERE id = $id";
  $result = mysqli_query($conection,$query_update);
  if ($result) {
    mysqli_query($conection,"commit");
    mysqli_query($conection,"set autocommit = 1");
    echo "<script>alert('EXITO');
    window.location = 'view_HC.php?id=".$idpaciente."';</script>";
  }else {
    mysqli_query($conection,"commit");
    mysqli_query($conection,"set autocommit = 1");
    echo "<script>alert('ERROR');
    window.location = 'view_HC.php?id=".$idpaciente."';</script>";
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
   <header>
      	<?php include "includes/header.php"; ?>
   </header>
   <main>
     <section id="container">
       <h1>HISTORIA CLINICA DE <?php echo $nom['nombres'];?></h1>

         <div class="form_register">
           <h1>Registro de Historia Clinica <?php  echo "<br> Fecha de la Cita:".$fetch['fecha']; ?></h1>
           <hr>
           <div class="alert"><?php echo isset($alert) ? $alert : ""; ?></div>
           <div class="alert"><?php echo isset($alert1) ? $alert1 : ""; ?></div>
           <form action="" method="post">

             <label for="cedula">cedula del paciente</label>
             <input redonly type="text" name="cedula" id="cedula" value="<?php echo $fetch["cedula_paciente"]; ?>">

             <label for = "nombre">Nombre del paciente </label>
             <input type="text" name="nombre" id="nombre" placeholder="nombre completo" value="<?php echo $nom['nombres'] ?>">

             <label for = "motivo">Motivo </label>
             <input type="text" name="motivo" id="motivo" placeholder="nombre completo" value="<?php echo $fetch['motivo']; ?>">

             <label for = "descripcion">Descripción</label>
             <input type="text" name="descripcion" value="<?php echo $fetch["descripcion"]; ?>" id="descripcion">

             <label for = "prescripcion">Prescripcion</label>
             <input type="text" name="prescripcion" value="<?php echo $fetch["prescripcion"]; ?>" id="prescripcion">


             <label for= "fecha">Fecha</label>
             <input type="date" name="fecha" id="fecha" placeholder="Fecha de cita" value="<?php echo $fetch["fecha"]; ?>">

             <label for="precio">Precio</label>
             <input type="text" name="precio" value="<?php echo $fetch["precio"]; ?>" id="precio" placeholder="Use un punto para separar decimales (centavos)">

               <input type="submit" name="editar" value="Registrar Historia Clínica" class="btn_save">

           </form>
         </div>

       </section>
   </main>


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
       header{
         position: fixed;
         z-index: inherit;
       }
     </style>
 </body>
 </html>
