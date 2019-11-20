<?php
session_start();
if (isset($_SESSION['user'])) {
if ($_SESSION['rol']==1) {
		header('location: ./principal.php ');
}elseif ($_SESSION['rol']==3) {
	header('location: ./princ_user.php ');
}
}

?>
<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
      <?php include("head.php");?>
      <?php include("header_vet.php");?>


      <link rel="stylesheet" href="../css/style-nave.css?nocache=" type="text/css" media="screen" />
      
    </head>
    <body>
       
        </div><br />

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
           $id = intval($_GET['id']);
			$sql = mysqli_query($conn, "SELECT * FROM historial WHERE id_historial='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index1.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>

	<br>

            <blockquote>
           <center>REPORTE PDF</center>
            </blockquote>
                         
                         <form name="form1" id="form1" action="imprimir_historial_vet.php" method="post"  target="_blank" class="form-horizontal row-fluid">
										<div class="control-group">
											<label class="control-label" for="basicinput">ID</label>
											<div class="controls">
												<input type="text" name="id_hist" id="id_hist" value="<?php echo $row['id_historial']; ?>" placeholder="" class="form-control span8 tip" readonly="readonly"readonly>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Paciente</label>
											<div class="controls">
												<input type="text" name="paciente" id="paciente" value="<?php echo $row['paciente']; ?>" placeholder="" class="form-control span8 tip" readonly>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Representante</label>
											<div class="controls">
												<input type="text" name="representante" id="representante" value="<?php echo $row['representante']; ?>" placeholder="" class="form-control span8 tip" readonly>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Especie</label>
											<div class="controls">
												<input name="especie" id="especie" value="<?php echo $row['especie']; ?>" class="form-control span8 tip" type="text" /readonly>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Fecha</label>
											<div class="controls">
												<input type="date" name="fecha" id="fecha" value="<?php echo $row['fecha']; ?>" placeholder="" class="form-control span8 tip" readonly>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Hora</label>
											<div class="controls">
												<input type="time" name="hora" id="hora" value="<?php echo $row['hora']; ?>" placeholder="" class="form-control span8 tip" readonly>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Tipo de Atención</label>
											<div class="controls">
												<input type="text" name="atendido" id="atendido" value="<?php echo $row['atendido']; ?>" placeholder="" class="form-control span8 tip" readonly>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Registro</label>
											<div class="controls">
												<input name="registro" id="registro" value="<?php echo $row['registro']; ?>" class="form-control span8 tip" type="text"  /readonly>
											</div>
										</div>
                                        
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Receta</label>
											<div class="controls">
												<input name="medicamento" id="medicamento" value="<?php echo $row['medicamento']; ?>" class=" form-control span8 tip" type="text"  /readonly>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<input type="submit" name="submit" value="Exportar PDF" class="btn btn-sm btn-danger"/>
											</div>
										</div>
									</form>
<br>
<p>
            


                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        
        <!--/.wrapper--><br />
        
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        


      
    </body>
