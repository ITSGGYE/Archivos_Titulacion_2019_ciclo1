		<nav>
			<ul>
				<li><a href="index.php">Inicio</a></li>
			<?php
				if($_SESSION['rol'] == 1){
			 ?>

				<li class="principal">

					<a href="#">Usuarios</a>
					<ul>
						<li><a href="registro_usuario.php">Nuevo Usuario</a></li>
						<li><a href="lista_usuarios.php">Lista de Usuarios</a></li>
					</ul>
				</li>
<?php } ?>
				
				<li class="principal">
					<a href="#">pacientes</a>
					<ul>
						<li><a href="registro_paciente.php">Nuevo Paciente</a></li>
						<li><a href="lista_paciente.php">Lista de Pacientes</a></li>
					</ul>
				</li>

				<li class="principal">
					<a href="#">Cita</a>
					<ul>
						<li><a href="registro_citas.php">Nueva cita</a></li>
						<li><a href="lista_cita.php">Lista de citas</a></li>
					</ul>
				</li>

				<li class="principal">
					<a href="#">Reportes</a>
					<ul>
						<li><a target="_blank" href="reporte_ingresos.php">Reporte de Ingresos (Hoy)</a></li>
					</ul>
				</li>


			</ul>
		</nav>
		<style media="screen">
			nav,.principal{
				margin-top: 0;
			}
		</style>
