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
		<link rel = "stylesheet" type = "text/css" href = "css/estilos.css" />
	</head>
	<body style = "background:url('images/fondob.jpg');">
		<nav class = "navbar navbar-default navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<img src = "images/febresc.png" width = "50px" height = "50px" />
					<h4 class = "navbar-text navbar-right">Sistema de Biblioteca | Colegio Fiscal Industrial Febres Cordero</h4>
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
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "home.php"><i class = "glyphicon glyphicon-home"></i> Inicio</a></li>	
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
			<div class = "col-lg-9 well" style = "margin-top:70px;">
				<div class = "alert alert-info">Transacción / Préstamo</div>
				<form method = "POST" action = "borrow.php" enctype = "multipart/form-data">
					<div class = "form-group pull-left">
						<label>Nombre del estudiante:</label>
						<br />
						<select name = "student_no" id = "student">
							<option value = "" selected = "selected" disabled = "disabled">Seleccione una opción</option>
							<?php
								$qborrow = $conn->query("SELECT * FROM `student` ORDER BY `lastname`") or die(mysqli_error());
								while($fborrow = $qborrow->fetch_array()){
							?>
								<option value = "<?php echo $fborrow['student_no']?>"><?php echo $fborrow['firstname']." ".$fborrow['lastname']?></option>
							<?php
								}
							?>
						</select>
					</div>
					<div class = "form-group pull-right">
						<a class = "btn btn-primary" href="./reservas.php">Reservas</a>
						<button name = "save_borrow" class = "btn btn-primary"><span class = "glyphicon glyphicon-thumbs-up"></span> Prestar</button>
					</div>
					<br><br><br><br><br>
					<div class="table-responsive">
						<table id = "table" class = "table table-bordered">
							<thead class = "alert-success">
								<tr>
									<th>Seleccionar</button>
									<th>Titulo del libro</th>
									<th>Categoria de libro</th>
									<th>Autor</th>
									<th>Fecha de Publicación</th>
									<th>Cantidad</th>
									<th>Disponible</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$c=0;
								//$id =  array();
									$q_book = $conn->query("SELECT * FROM `book`") or die(mysqli_error());
									while($f_book = $q_book->fetch_array()){
										//$id[$c]=$f_book['book_id'];
										$c = $c +1;
									$q_borrow = $conn->query("SELECT SUM(qty) as total FROM `borrowing` WHERE `book_id` = '$f_book[book_id]' && `status` = 'Borrowed'") or die(mysqli_error());
									$new_qty = $q_borrow->fetch_array();
									$total = $f_book['qty'] - $new_qty['total'];
								?>
								<tr>
									<td>
										<?php
											if($total < 1){
												echo "<center><label class = 'text-danger'>No Disponible</label></center>";
											}else{
												echo '<input type = "hidden" name = "book_id[]" value = "'.$f_book['book_id'].'"><center><input type = "checkbox" name = "selector[]" value = "'.$f_book['book_id'].'"></center>';
											}
										?>
									</td>
									<td><?php echo $f_book['book_title']?></td>
									<td><?php echo $f_book['book_category']?></td>
									<td><?php echo $f_book['book_author']?></td>
									<td><?php echo date("m-d-Y", strtotime($f_book['date_publish']))?></td>
									<td><?php echo $f_book['qty']?></td>
									<td><?php echo $total?></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>

				</form>
			</div>
		</div>
		<br><br><br><br>
		<nav class = "navbar navbar-default navbar-fixed-bottom">
			<div class = "container-fluid">
				<label class = "navbar-text pull-right">Sistema de Biblioteca | Creado por BELLA YAGUAL Y STEPHANY TORRES &copy; Todos los Derechos Reservados 2019</label>
			</div>
		</nav>
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
