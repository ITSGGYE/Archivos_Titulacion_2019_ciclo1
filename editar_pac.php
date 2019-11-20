<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
      <?php include("head.php");?>
      <?php include("header.php");?>

      <link rel="stylesheet" href="../css/style-nave.css?nocache=" type="text/css" media="screen" />
         <script src="bootstrap/js/validarcampos.js"></script>
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
           <center> ACTUALIZAR DATOS DEL PACIENTE</center>
            </blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit-pac.php" method="POST" >
										<div class="control-group">
											<label class="control-label" for="basicinput">ID</label>
											<div class="controls">
												<input type="text" name="id_paciente" id="id_paciente" value="<?php echo $row['id_paciente']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Fecha de Nacimiento</label>
											<div class="controls">
												<input type="date" name="fechanac" id="fechanac" value="<?php echo $row['fechanac']; ?>" placeholder="" class="form-control span8 tip" required readonly="readonly">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Paciente</label>
											<div class="controls">
												<input type="text" name="nombrepac" id="nombrepac" value="<?php echo $row['nombrepac']; ?>" placeholder="" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Sexo</label>
											<div class="controls">
												<select name="sexo" id="sexo" placeholder="" class="form-control span8 tip" required>
											      <option value="<?php echo $row['sexo']; ?>"><?php echo $row['sexo']; ?></option>
											      <option value="MACHO" <?php if (@$_REQUEST["sexo"]=="MACHO") echo "selected" ?>>MACHO</option>
											      <option value="HEMBRA" <?php if (@$_REQUEST["sexo"]=="HEMBRA") echo "selected" ?>>HEMBRA</option>
											      </select>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Especie</label>
											<div class="controls">
												<select name="especie" id="especie" class="form-control span8 tip" type="text"  required >
											      <option value="<?php echo $row['especie'];?>"><?php echo $row['especie'];?></option>
											      <option value="perro" <?php if (@$_REQUEST["sexo"]=="perro") echo "selected" ?>>PERRO</option>
											      <option value="gato" <?php if (@$_REQUEST["sexo"]=="gato") echo "selected" ?>>GATO</option>
											      <option value="tortuga" <?php if (@$_REQUEST["sexo"]=="tortuga") echo "selected" ?>>TORTUGA</option>
											      <option value="erizo de tierra" <?php if (@$_REQUEST["sexo"]=="erizo de tierra") echo "selected" ?>>ERIZO DE TIERRA</option>
											      <option value="serpientes" <?php if (@$_REQUEST["sexo"]=="serpientes") echo "selected" ?>>SERPIENTES</option>
											      <option value="peces" <?php if (@$_REQUEST["sexo"]=="peces") echo "selected" ?>>PECES</option>
											      <option value="conejo" <?php if (@$_REQUEST["sexo"]=="conejo") echo "selected" ?>>CONEJO</option>
											      <option value="caballo" <?php if (@$_REQUEST["sexo"]=="caballo") echo "selected" ?>>CABALLO</option>
											      <option value="burro" <?php if (@$_REQUEST["sexo"]=="burro") echo "selected" ?>>BURRO</option>
											      <option value="oveja" <?php if (@$_REQUEST["sexo"]=="oveja") echo "selected" ?>>OVEJA</option>
											      <option value="cabra" <?php if (@$_REQUEST["sexo"]=="cabra") echo "selected" ?>>CABRA</option>
											      <option value="porcino" <?php if (@$_REQUEST["sexo"]=="porcino") echo "selected" ?>>PORCINO</option>
											      <option value="hamster" <?php if (@$_REQUEST["sexo"]=="hamster") echo "selected" ?>>HAMNSTER</option>
											      <option value="huron" <?php if (@$_REQUEST["sexo"]=="huron") echo "selected" ?>>HURON</option>
											      <option value="loro" <?php if (@$_REQUEST["sexo"]=="loro") echo "selected" ?>>LORO</option>
											      <option value="ardilla" <?php if (@$_REQUEST["sexo"]=="ardilla") echo "selected" ?>>ARDILLA</option>
											      <option value="camaleon" <?php if (@$_REQUEST["sexo"]=="camaleon") echo "selected" ?>>CAMALEON</option>
											      </select>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Raza</label>
											<div class="controls">
												<input name="raza" id="raza" value="<?php echo $row['raza']; ?>" class="form-control span8 tip" type="text"  required />
											</div>
										</div>
                                        
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Peso</label>
											<div class="controls">
												<input name="peso" id="peso" value="<?php echo $row['peso']; ?>" class=" form-control span8 tip" type="text" onkeypress="return val2(event)" />
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
                                               <a href="act_paciente.php" class="btn btn-sm btn-danger">Cancelar</a>

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
