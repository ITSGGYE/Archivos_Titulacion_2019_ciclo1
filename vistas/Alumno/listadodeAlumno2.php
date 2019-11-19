<?php require_once "../../clases/conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();
		
		?>

<select class="form-control form-control-sm" id="alumno" name="alumno">
						<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT a.id_alumno , a.nombre_alumno
								from alumno a
								where a.id_alumno not in ( select c.fk_alumno 
								from datos_representante c)";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[0].'-'.$ver2[1]; ?></option> </div>
							<?php endwhile; ?>
						</select>