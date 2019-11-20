<?php include "conn.php"; ?>
<?php
session_start();
if (isset($_SESSION['user'])) {
if ($_SESSION['rol']==2) {
        header('location: ./princ_vet.php ');
}elseif ($_SESSION['rol']==3) {
    header('location: ./princ_user.php ');
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
      <?php include("head.php");?>
      <?php include("header.php");?>

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
			$sql = mysqli_query($conn, "SELECT * FROM login WHERE id='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index1.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>

	<br>

            <blockquote>
           <center> ACTUALIZAR DATOS DEL PACIENTE</center>
            </blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit-cli-adm.php" method="POST" >
										<div class="control-group">
											<label class="control-label" for="basicinput">ID</label>
											<div class="controls">
												<input type="text" name="id" id="id" value="<?php echo $row['id']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Usuario</label>
											<div class="controls">
												<input type="text" name="user" id="email" value="<?php echo $row['user']; ?>" placeholder="" class="form-control span8 tip" required readonly="readonly">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Contraseña</label>
											<div class="controls">
												<input type="password" name="password" id="password" value="<?php echo $row['password']; ?>" placeholder="" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
                                               <a href="act_cliente_adm.php" class="btn btn-sm btn-danger">Cancelar</a>

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
