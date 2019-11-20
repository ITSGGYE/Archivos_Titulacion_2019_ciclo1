<?php
include "conn.php";
if(isset($_POST['update'])){
				$id_paciente			= intval($_POST['id_paciente']);
				$nombrepac	= mysqli_real_escape_string($conn,(strip_tags($_POST['nombrepac'], ENT_QUOTES)));
				$fechanac  	= mysqli_real_escape_string($conn,(strip_tags($_POST['fechanac'], ENT_QUOTES)));
				$especie  	= mysqli_real_escape_string($conn,(strip_tags($_POST['especie'], ENT_QUOTES)));
				$sexo 		= mysqli_real_escape_string($conn,(strip_tags($_POST['sexo'], ENT_QUOTES)));
				$raza  		= mysqli_real_escape_string($conn,(strip_tags($_POST['raza'], ENT_QUOTES)));
				$peso  		= mysqli_real_escape_string($conn,(strip_tags($_POST['peso'], ENT_QUOTES)));
               
				
				$update = mysqli_query($conn, "UPDATE paciente SET nombrepac='$nombrepac', fechanac='$fechanac', especie='$especie', sexo='$sexo', raza='$raza', peso='$peso' WHERE id_paciente='$id_paciente'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Los datos han sido actualizados!'); window.location = 'act_paciente.php'</script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'act_paciente.php'</script>";
				}
			}
  ?>