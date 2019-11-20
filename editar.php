<?php include "conn.php";
session_start();?>
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
                    $sql = mysqli_query($conn, "SELECT * FROM historial WHERE id_historial='$id'");
                    if (mysqli_num_rows($sql) == 0) {
                        header("Location: index1.php");
                    } else {
                        $row = mysqli_fetch_assoc($sql);
                    }
                    ?>

                    <br>

                    <blockquote>
                        <center> ACTUALIZAR DATOS DEL HISTORIAL</center>
                    </blockquote>
                    <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST" >
                        <div class="control-group">
                            <label class="control-label" for="basicinput">ID</label>
                            <div class="controls">
                                <input type="text" name="id_historial" id="id_historial" value="<?php echo $row['id_historial']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Fecha</label>
                            <div class="controls">
                                <input type="date" name="fecha" id="fecha" value="<?php echo $row['fecha']; ?>" placeholder="" class="form-control span8 tip" required disabled>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Paciente</label>
                            <div class="controls">
                                <input readonly="" type="text" name="paciente" id="paciente" value="<?php echo $row['paciente']; ?>" placeholder="" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Representante</label>
                            <div class="controls">
                                <input readonly="" type="text" name="representante" id="representante" value="<?php echo $row['representante']; ?>" placeholder="" class="form-control span8 tip" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Especie</label>
                            <div class="controls">
                                <input readonly="" name="especie" id="especie" value="<?php echo $row['especie']; ?>" class="form-control span8 tip" type="text"  required />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Registro</label>
                            <div class="controls">
                                <input name="registro" id="registro" value="<?php echo $row['registro']; ?>" class="form-control span8 tip" type="text"  required />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Medicamento</label>
                            <div class="controls">
                                <input name="medicamento" id="medicamento" value="<?php echo $row['medicamento']; ?>" class=" form-control span8 tip" type="text"  />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Atendido por:</label>
                            <div class="controls">
                                <input readonly="" type="text" name="atendido" id="atendido" value="<?php echo $row['atendido']; ?>" placeholder="" class="form-control span8 tip" >
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
                                <?php if($_SESSION['rol'] == 1){
                                echo '<a href="act_historial.php" class="btn btn-sm btn-danger">Cancelar</a>';  
                                }elseif($_SESSION['rol'] == 2){
                                         echo '<a href="act_historial_vet.php" class="btn btn-sm btn-danger">Cancelar</a>'; 
                                    }
                                ?>

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
