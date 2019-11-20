<?php
include "conn.php";
if(isset($_POST['update'])){
				$id_historial			= intval($_POST['id_historial']);
				$paciente	= mysqli_real_escape_string($conn,(strip_tags($_POST['paciente'], ENT_QUOTES)));
				$representante  	= mysqli_real_escape_string($conn,(strip_tags($_POST['representante'], ENT_QUOTES)));
				$especie  	= mysqli_real_escape_string($conn,(strip_tags($_POST['especie'], ENT_QUOTES)));
				$registro 		= mysqli_real_escape_string($conn,(strip_tags($_POST['registro'], ENT_QUOTES)));
				$medicamento  = mysqli_real_escape_string($conn,(strip_tags($_POST['medicamento'], ENT_QUOTES)));
               
				
				$update = mysqli_query($conn, "UPDATE historial SET paciente='$paciente', representante='$representante', especie='$especie', registro='$registro', medicamento='$medicamento' WHERE id_historial='$id_historial'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Los datos han sido actualizados!'); window.location = 'act_historial_vet.php'</script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'act_historial_vet.php'</script>";
				}
			}
  ?>