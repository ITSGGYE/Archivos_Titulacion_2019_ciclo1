<div class="col-md-12">
    <div class="card">
	<?php
	
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }

	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos


	$active_Agendamiento="active";
	$title="Agendamiento | CONTROL DE AGENDAMIENTO";
?>
<div class="card-header" data-background-color="orange">
            <h4 class="title">Datos Importantes!</h4>
            <p class="category">Informate de los eventos pendientes y realizados ultimamente!</p>
        </div>
        <div class="card-content table-responsive">
        <div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
									<i class="material-icons">date_range</i>
								</div>
								<div class="card-content">
									<p class="category">Horarios sin recibir</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="red">
                                <i class="material-icons">info_outline</i>
								</div>
								<div class="card-content">
									<p class="category">Horarios pendientes</p>
									<h3 class="title"> 
										<?php
											$confirmado="false";

											$con = new mysqli("localhost","root", "" , "sishorario");
											$sql = "SELECT count(*) FROM events WHERE confirmado='$confirmado'";
											$cantidad= mysqli_query($con, $sql);

												while ($resultado=mysqli_fetch_array($cantidad)) 
												{
														echo "<p> <b> $resultado[0] </b> </p>";
												}
									
									    ?>
									</h3>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="blue">
									<i class="material-icons">done</i>
								</div>
								<div class="card-content">
									<p class="category">Horarios aprobados</p>
									<h3 class="title">
											<?php
											$confirmado="true";

											$con = new mysqli("localhost","root", "" , "sishorario");
											$sql = "SELECT count(*) FROM events WHERE confirmado='$confirmado'";
											$cantidad= mysqli_query($con, $sql);

												while ($resultado=mysqli_fetch_array($cantidad)) 
												{
													echo "<p> <b> $resultado[0] </b> </p>";
												}
									
									    ?>			
									</h3>
								</div>
							</div>
						</div>

						
					</div>
        </div>
    </div>
</div>