<aside>
	<div class="widget">
		<?php         if($_SESSION['rol'] == 'Administrador'){  ?>
      <a href="ctterapias.php" title="CentroTerapeuticoIntegral"><i class="fa fa-camera-retro fa-lg"></i>Logros</a>	
			<a href="historial.php"title="Registro de paciente">Registro de Paciente</a>
			<a href="medicos.php" title="Medicos">Medicos</a>
			<a href="citas.php" title="Citas">Citas</a>
			<a href="reporte.php" title="Citas">Reportes</a>
			<a href="usuarios.php" title="Usuarios">Usuarios</a>
            <a href="cerrar.php" title="Cerrar">Cerrar Sesión</a>
			<?php
 	} 
							?>	


<?php   if($_SESSION['rol'] =='Especialista'){  ?>
      <a href="ctterapias.php" title="CentroTerapeuticoIntegral"><i class="fa fa-camera-retro fa-lg"></i>Logros</a>	
	        <a href="historial.php"title="Registro de paciente">Registro de Paciente</a>
			<a href="citas.php" title="Citas">Citas</a> 
			<a href="reporte.php" title="Citas">Reportes</a>
            <a href="cerrar.php" title="Cerrar">Cerrar Session</a>
 
			<?php
 	} 
							?>		 


		<?php   if($_SESSION['rol'] =='Recepcionista'){  ?>
      <a href="ctterapias.php" title="CentroTerapeuticoIntegral"><i class="fa fa-camera-retro fa-lg"></i>Logros</a>	
	 
			<a href="citas.php" title="Citas">Citas</a> 
            <a href="cerrar.php" title="Cerrar">Cerrar Session</a>
 
			<?php
 	} 
							?>		 

			
	</div>
</aside>
 