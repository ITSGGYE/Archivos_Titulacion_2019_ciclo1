    <?php
 
	include('is_logged.php');//
?><?php 
	if (empty($_POST['nombre'])) {
           $errors[] = "Nombre vacío";
        } else if (!empty($_POST['nombre'])){
		/* Connect To Database*/
		require_once ("../config/db.php"); 
		require_once ("../config/conexion.php"); 	
		$nombre=mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
		$apellido=mysqli_real_escape_string($con,(strip_tags($_POST["apellido"],ENT_QUOTES)));
			$edad=mysqli_real_escape_string($con,(strip_tags($_POST["edad"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$email=mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
		 $estado=mysqli_real_escape_string($con,(strip_tags($_POST["mod_estado"],ENT_QUOTES)));
	 $genero=mysqli_real_escape_string($con,(strip_tags($_POST["genero"],ENT_QUOTES)));
			 
		 
			$marketing=intval($_POST['marketing']);
		$date_added=date("Y-m-d H:i:s");
		$sql="INSERT INTO clientes (Cli_Nombre,Cli_Apellido,Cli_Numero,Cli_Correo,Cli_Fecha_Ingreso,Mar_Id,Cli_Edad,Cli_Estado,Cli_Genero) VALUES ('$nombre','$apellido','$telefono','$email','$date_added','$marketing','$edad','1','$genero')";
		$query_new_insert = mysqli_query($con,$sql);
			if ($query_new_insert){
				$messages[] = "Cliente ha sido ingresado satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>