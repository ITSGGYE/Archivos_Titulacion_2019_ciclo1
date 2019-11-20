
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
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
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


<br>
					</li>
				</ul>
			</div>
			<div class = "col-lg-1"></div>
			<div class = "col-lg-9 well" style = "margin-top:70px;">
				<div class = "alert alert-info">Reportes</div>



<style media="screen">
@media only screen and (min-width : 332px) and (max-width: 992px){
	.container{
		width: 100%;
		margin-bottom: 15%;
	}
	.pdf{
		display: block;
		width: 100%;
		margin-bottom: 5%;
	}

	.pdf button{
		margin-top: 10%;
	}
}

@media only screen and (min-width : 1000px) {
	.pdf{
		display: inline-block;
		width: 25%;
	}

	.pdf button{
		margin-top: 4%;
	}
}
</style>
<br />
<br />
<div class="container">
	<div class="pdf">
		<center>
			<img src = "images/pdf1.png" width = "250px" height = "250px"/>
		<?php
		echo "<button><a  href='imprimir_his_estudiantes.php?' target='imprimir_his_estudiantes.php' onclick=\"window.open(this.href, this.target, ' width=1000, height=800, menubar=no');return false;\"> Registro de Estudiantes </a></button>";
		?>
	</center>
	</div>

	<div class="pdf">
				<center>
		<img src = "images/pdf1.png" width = "250px" height = "250px"/>
		<?php
		echo "<button><a  href='imprimir_his_libros.php?' target='imprimir_his_libros.php' onclick=\"window.open(this.href, this.target, ' width=1000, height=800, menubar=no');return false;\"> Inventario de libros </a></button>";

		?>
	</center>
	</div>

	<div class="pdf">
				<center>
		<img src = "images/pdf1.png" width = "250px" height = "250px"/>

		<?php
		echo "<button><a  href='imprimir_historial1.php?' target='imprimir_historial1.php' onclick=\"window.open(this.href, this.target, ' width=1000, height=800, menubar=no');return false;\"> Libros no devueltos </a></button>";

		?>
	</center>
	</div>

</div>
<br>
		<br />
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
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#add_student').click(function(){
				$(this).hide();
				$('#show_student').show();
				$('#student_table').slideUp();
				$('#student_form').slideDown();
				$('#show_student').click(function(){
					$(this).hide();
					$('#add_student').show();
					$('#student_table').slideDown();
					$('#student_form').slideUp();
				});
			});
		});
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$result = $('<center><label>Deleting...</label></center>');
			$('.delstudent_id').click(function(){
				$student_id = $(this).attr('value');
				$(this).parents('td').empty().append($result);
				$('.delstudent_id').attr('disabled', 'disabled');
				$('.estudiantes_id').attr('disabled', 'disabled');
				setTimeout(function(){
					window.location = 'delete_student.php?student_id=' + $student_id;
				}, 1000);
			});
			$('.estudiantes_id').click(function(){
				$student_id = $(this).attr('value');
				$('#show_student').show();
				$('#show_student').click(function(){
					$(this).hide();
					$('#edit_form').empty();
					$('#student_table').show();
					$('#add_student').show();
				});
				$('#student_table').fadeOut();
				$('#add_student').hide();
				$('#edit_form').load('load_reporte.php?student_id=' + $student_id);
			});
		});
	</script>
</html>
