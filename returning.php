<!DOCTYPE html>
<?php
	require_once 'valid.php';
?>
<html lang = "eng">
	<head>
		<title>Sistema de Biblioteca | Colegio Físcal Industrial Febres Cordero</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/chosen.min.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
	</head>
	 <body style = "background:url('images/fondob.jpg');">
        <nav class = "navbar navbar-default navbar-fixed-top">
            <div class = "container-fluid">
                <div class = "navbar-header">
                    <img src = "images/febresc.png" width = "50px" height = "50px" />
                    <h4 class = "navbar-text navbar-right">Sistema de Biblioteca | Colegio Físcal Industrial Febres Cordero</h4>
                </div>
            </div>
        </nav>
        <div class = "container-fluid">
            <div class = "col-lg-2 well" style = "margin-top:70px;">
                <div class = "container-fluid" style = "word-wrap:break-word;">
                    <center><img src = "images/admin.png" width = "50px" height = "50px"/> </center>
                    <br>
                <center><label class = "text-muted"><?php require'account.php'; echo $name;?></label> </center>
                </div>


                <hr style = "border:1px dotted #d3d3d3;"/>
                <ul id = "menu" class = "nav menu">
                    
                    <li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-tasks"></i> Cuentas</a>
                        <ul style = "list-style-type:none;">
                            <li><a href = "admin.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-user"></i> Administrador</a></li>
                        </ul>


<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "student.php"><i class = "glyphicon glyphicon-user"></i> Registro</a></li>

                    </li>
                    <li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "book.php"><i class = "glyphicon glyphicon-book"></i> Libros</a></li>
                    <li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-th"></i> Transacción</a>
                        <ul style = "list-style-type:none;">
                            <li><a href = "borrowing.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-random"></i> Pres/Reser..</a></li>
                            <li><a href = "view_reservas.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-random"></i> Ver reserva</a></li>
                            <li><a href = "returning.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-random"></i> Devolución</a></li>
                        </ul>

<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-tasks"></i> Reportes</a>
                        <ul style = "list-style-type:none;">

                            <li><a href = "reporte_general.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-book"></i> General</a></li>
                        </ul>




<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "auditoria.php"><i class = "glyphicon glyphicon-th"></i> Auditoria</a></li>



                    </li>
                    <li><a  style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-cog"></i> Configuración</a>
                        <ul style = "list-style-type:none;">
                            <li><a style = "font-size:15px;" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Cerrar Sesión</a></li>
                        </ul>






					</li>
				</ul>
			</div>

			<div class = "col-lg-1"></div>
			<div class = "col-lg-9 well" style = "margin-top:60px;">
				<div class = "alert alert-info">Transacción / Devolución</div>
				<form method = "POST" action = "return.php" enctype = "multipart/form-data">
					<div class="table-responsive">
						<table id = "table" class = "table table-bordered">
							<thead class = "alert-success">
								<tr>
									<th>Estudiante</th>
									<th>Titulo del libro</th>
									<th>Autor</th>
									<th>Estado</th>
									<th>Fecha Devolución</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$qreturn = $conn->query("SELECT * FROM `borrowing` WHERE status = 'Borrowed'") or die(mysqli_error());
									while($freturn = $qreturn->fetch_array()){
								?>
								<tr>
									<td>
										<?php
											$qstudent = $conn->query("SELECT * FROM `student` WHERE `student_no` = '$freturn[student_no]'") or die(mysqli_error());
											$fstudent = $qstudent->fetch_array();
											echo $fstudent['firstname']." ".$fstudent['lastname'];
										?>


									</td>
									<td>
										<?php
											$qbook = $conn->query("SELECT * FROM `book` WHERE `book_id` = '$freturn[book_id]'") or die(mysqli_error());
											$fbook = $qbook->fetch_array();
											echo $fbook['book_title'];
										?>
									</td>
									<td>
										<?php
											$qbook = $conn->query("SELECT * FROM `book` WHERE `book_id` = '$freturn[book_id]'") or die(mysqli_error());
											$fbook = $qbook->fetch_array();
											echo $fbook['book_author'];

										?>



									</td>
									<td><?php echo $freturn['status']?></td>
									<td><?php echo date("m-d-Y", strtotime($freturn['date_delivery']))?></td>
									<td>
										<?php
											if($freturn['status'] == 'Returned'){
											echo '<center><button disabled = "disabled" class = "btn btn-primary" type = "button" href = "#" data-toggle = "modal" data-target = "#return"><span class = "glyphicon glyphicon-check"></span> Devuelto</button></center>';
											}else{
											echo ' <a class = "btn btn-primary" href = "./return.php?cod='.$freturn['borrow_id'].'">Volver</a>
											';
											}
										?>
									</td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
				
			</div>
		</div>
		<nav class = "navbar navbar-default navbar-fixed-bottom">
			<div class = "container-fluid">
				<label class = "navbar-text pull-left">  </label>
				<label class = "navbar-text pull-right">Sistema de Biblioteca | Creado por BELLA YAGUAL Y STEPHANY TORRES &copy; Todos los Derechos Reservados 2019</label>
			</div>
		</nav>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
	<script src = "js/sidebar.js"></script>
	<script src = "js/jquery.dataTables.js"></script>
	<script src = "js/chosen.jquery.min.js"></script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$("#student").chosen({ width:"auto" });
		})
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$("#table").DataTable();
		});
	</script>
</html>
