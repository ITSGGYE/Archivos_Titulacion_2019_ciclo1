<?php
	require_once 'connect.php';
	$q_student = $conn->query("SELECT * FROM `student` WHERE `student_no` = '$_REQUEST[student_id]'") or die(mysqli_error());
	$f_student = $q_student->fetch_array();
?>
<script src="./js/inputs.js"></script>
<div class = "col-lg-3"></div>
<div class = "col-lg-6">
	<form method = "POST" action = "edit_student_query.php?student_id=<?php echo $f_student['student_id']?>" enctype = "multipart/form-data">
		<div class = "form-group">
			<label>Cédula:</label>
                        <input onkeypress="return soloNumeros(event);" type = "num"  readonly  minlength="10" maxlength = "10" name = "student_no" value = "<?php echo $f_student['student_no']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Primer nombre:</label>
                        <input onkeypress="return soloLetras(event);" type = "text" minlength="4" maxlength = "10" name = "firstname" value = "<?php echo $f_student['firstname']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Segundo nombre:</label>
                        <input onkeypress="return soloLetras(event);" type = "text" minlength="4" maxlength = "10"name = "middlename" value = "<?php echo $f_student['middlename']?>" placeholder = "(Optional)" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Apellidos:</label>
                        <input onkeypress="return soloLetras(event);" type = "text" minlength="4" maxlength = "18"  required = "required" value = "<?php echo $f_student['lastname']?>" name = "lastname" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Curso/Sección:</label>
                        <input onkeypress="return soloMail(event);" type = "text" maxlength = "3"  required = "required" value = "<?php echo $f_student['course']?>" name = "course" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Periodo lectivo</label>
                        <input onkeypress="return soloNumeros(event);" type = "text" maxlength = "4" name = "section" value = "<?php echo $f_student['section']?>" required = "required" class = "form-control" />
		</div>


<div class = "form-group">
									<label>Jornada</label>
									<select class = "form-control" name="jornada">
										<option value="MATUTINA">MATUTINA</option>
										<option value="VESPERTINA">VESPERTINA</option>
									</select>



		<div class = "form-group">
			<button class = "btn btn-warning" name = "edit_student"><span class = "glyphicon glyphicon-edit"></span>  Guardar cambios</button>
		</div>
	</form>
</div>
