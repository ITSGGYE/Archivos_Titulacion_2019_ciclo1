<?php session_start();?>
<?php  

if(!isset($_SESSION["profesor"]))
{
 header("location:index.php");
 
}
 
$id=$_SESSION['profesor']['id'];
require_once "../clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$imgVer="";
$sql="SELECT 
			 p.nombre_profesor,				
			 p.direccion_profesor,			
			 p.telefono_profesor,				
			 p.celular_profesor,				
			 p.cedula_profesor,			
			 p.email_profesor,					
			 p.titulo_profesor,
			 p.fechanac_profesor,
			 p.id_profesor,
			 p.imagen_profesor,
			 p.genero_profesor			
			 FROM profesor p  where p.id_profesor='$id' ";
$result=mysqli_query($conexion,$sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require_once "dependencias.php"; 
	 ?>
	 <style type="text/css">
	 	label{
	 		font-size: 14px;
	 		font-weight: bold;
	 		text-align: center;
	 	 	}
	 	 	input[type="text"], input[type="date"], input[type="email"], input[type="file"]{
	 		font-size: 14px;
			}
		select {
     
     font-size: 14px;
     height: 30px;
     padding: 5px;
     
  }
	 </style>
</head>
<body class="fondo">
<?php
if($_SESSION["profesor"]["privilegio"]=='I'){
	require_once "menu2.php";
} else {
	if($_SESSION["profesor"]["privilegio"]=='P'){
require_once "menu3.php";
} else {
	require_once "menunotas.php"; 


}
}

?>
	<div class="container-fluid " >


 <div class="row">
 <div class="col-lg-12">
				<div class="card text-left ">
					<div class="card-header box ">
						<h1><?php echo $_SESSION['profesor']['nombre']?></h1>
						<img src="../Imagenes/Profesores/<?php echo $_SESSION['profesor']['imagen'] ; ?>" class="rounded-circle" width="80" height="80"> 
						<br>
					</div>
					
						
							<form id="frmnuevo2">
							<div class="container" style="margin: 20px;" >


	
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>

				
  <div class="form-row"  >
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre y Apellido del Docente</label>
      <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Nombre"  value="<?php echo $mostrar[0];?>">
    </div>
    <div class="form-group col-md-5">
      <label for="inputPassword4">Dirección</label>
      <input type="text" class="form-control"  id="direccion2" name="direccion2" placeholder="Password" value="<?php echo $mostrar[1];?>">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress">Email</label>
    <input type="text" class="form-control" id="email2" name="email2" placeholder="1234 Main St" value="<?php echo $mostrar[5];?>">
  </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputCity">Cédula</label>
      <input type="text" class="form-control" id="cedula2" name="cedula2" value="<?php echo $mostrar[4];?>">
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">Teléfono</label>
      <input type="text" class="form-control" id="telefono2" name="telefono2" value="<?php echo $mostrar[2];?>">
    </div>
    <div class="form-group col-md-3">
      <label for="inputZip">Celular</label>
      <input type="text" class="form-control" id="celular2" name="celular2" value="<?php echo $mostrar[3];?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
    	
    	
      <label for="inputCity">Título</label>
      <select class="form-control form-control-sm" id="titulo2" name="titulo2"  >
      <?php 
			switch ($mostrar[6]) {
										case '1':
											echo '<option selected="selected" value="1">Rector/a </option>
											<option value="2">Docente  </option>
											<option value="3">Auxiliar </option>
											</option>';
											break;
										case '2':
											echo '<option  value="1">Rector/a </option>
											<option selected="selected" value="2">Docente  </option>
											<option value="3">Auxiliar </option>
											</option>';
											break;
										case '3':
											echo '<option  value="1">Rector/a </option>
											<option  value="2">Docente  </option>
											<option selected="selected" value="3">Auxiliar </option>
											</option>';
											break;
									
																				
										default:
											# code...
											break;
									}
											?>
									</select>
				
     
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">Fecha de Nacimiento</label>
      <input type="date" class="form-control" id="fecha2" name="fecha2"  value="<?php echo $mostrar[7];?>">
    </div>
    
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputCity">Imagen</label>
      <input type="file" class="form-control" id="imagennueva" name="imagennueva"  >
    </div>
    <div class="form-group col-md-3">
      
      <input type="hidden" class="form-control" id="genero2" name="genero2"  value="<?php echo $mostrar[10];?>">
      	<input type="hidden" id="imagen2" name="imagen2" value="<?php echo $mostrar[9];?>">
		<input type="hidden" id="id_profesor" name="id_profesor" value="<?php echo $mostrar[8];?>">
    </div>
   
  </div>
  <button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
  </div>
  </form>

				
					<?php } ?>
</div>
						  </div>
					
					
				
			</div>
			<div id="#salir"></div>
		</div>
	</div>
</div>


	
</body>
</html>



<script type="text/javascript">
	$(document).ready(function(){
		

			$('#btnActualizar').click(function(){
			var formData = new FormData(document.getElementById("frmnuevo2"));

			$.ajax({
					url:"../procesos/Personal/actualizarPersonal.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
					
					if(r==1){
						
						alertify.success("Actualizado con éxito :D");
						location.href ="../index3.php";

					}else{
						alertify.error("Fallo al actualizar :(");
					}
				}
			});
		});
	});
</script>

