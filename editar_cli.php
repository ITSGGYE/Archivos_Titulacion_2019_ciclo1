<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <head>
        <?php include("head.php"); ?>
        <?php include("header.php"); ?>

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
                    if (mysqli_num_rows($sql) == 0) {
                        header("Location: index1.php");
                    } else {
                        $row = mysqli_fetch_assoc($sql);
                    }
                    ?>

                    <br>

                    <blockquote>
                        <center> ACTUALIZAR DATOS DEL PACIENTE</center>
                    </blockquote>
                    <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit-cli.php" method="POST" >
                        <div class="control-group">
                            <label class="control-label" for="basicinput">ID</label>
                            <div class="controls">
                                <input type="text" name="id_paciente" id="id_paciente" value="<?php echo $row['id_paciente']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Fecha de Registro</label>
                            <div class="controls">
                                <input type="date" name="fechareg" id="fechareg" value="<?php echo $row['fechareg']; ?>" placeholder="" class="form-control span8 tip" required readonly="readonly">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Paciente</label>
                            <div class="controls">
                                <input readonly=""  type="text" name="nombrepac" id="nombrepac" value="<?php echo $row['nombrepac']; ?>" placeholder="" class="form-control span8 tip" required >
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Representante</label>
                            <div class="controls">
                                <input  type="text" name="nombrerep" id="nombrerep" value="<?php echo $row['nombrerep']; ?>" placeholder="" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Dni</label>
                            <div class="controls">
                                <input readonly="" type="text" name="dni" id="dni" value="<?php echo $row['dni']; ?>" placeholder="" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Telefono</label>
                            <div class="controls">
                                <input name="telefonos" id="telefonos" value="<?php echo $row['telefonos']; ?>" class="form-control span8 tip" type="text"  required />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Direccion</label>
                            <div class="controls">
                                <input name="direccion" id="direccion" value="<?php echo $row['direccion']; ?>" class="form-control span8 tip" type="text"  required />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Correo</label>
                            <div class="controls">
                                <input name="correo" id="correo" value="<?php echo $row['correo']; ?>" class=" form-control span8 tip" type="text"  />
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
                                <a href="act_paciente_vet.php" class="btn btn-sm btn-danger">Cancelar</a>

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
