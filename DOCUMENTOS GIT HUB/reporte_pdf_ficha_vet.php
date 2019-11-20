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
			$sql = mysqli_query($conn, "SELECT * FROM paciente WHERE id_paciente='$id'");
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
                         
                         <form name="form1" id="form1" action="imprimir_historial_ficha_vet.php" method="post"  target="_blank" class="form-horizontal row-fluid">
										<div class="control-group">
											<label class="control-label" for="basicinput">ID</label>
											<div class="controls">
												<input type="text" name="id_paciente" id="id_paciente" value="<?php echo $row['id_paciente']; ?>" placeholder="" class="form-control span8 tip" readonly="readonly"readonly>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Nombre del Due&ntilde;o</label>
											<div class="controls">
												<input type="text" name="nombrerep" id="nombrerep" value="<?php echo $row['nombrerep']; ?>" placeholder="" class="form-control span8 tip" readonly>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Paciente</label>
											<div class="controls">
												<input type="text" name="nombrepac" id="nombrepac" value="<?php echo $row['nombrepac']; ?>" placeholder="" class="form-control span8 tip" readonly>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Fecha de Nac</label>
											<div class="controls">
												<input type="text" name="fechanac" id="fechanac" value="<?php echo $row['fechanac']; ?>" placeholder="" class="form-control span8 tip" readonly>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Especie</label>
											<div class="controls">
												<input name="especie" id="especie" value="<?php echo $row['especie']; ?>" class="form-control span8 tip" type="text" /readonly>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Sexo</label>
											<div class="controls">
												<input type="text" name="sexo" id="sexo" value="<?php echo $row['sexo']; ?>" placeholder="" class="form-control span8 tip" readonly>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Raza</label>
											<div class="controls">
												<input type="text" name="raza" id="raza" value="<?php echo $row['raza']; ?>" placeholder="" class="form-control span8 tip" readonly>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Peso</label>
											<div class="controls">
												<input type="text" name="peso" id="peso" value="<?php echo $row['peso']; ?>" placeholder="" class="form-control span8 tip" readonly>
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
