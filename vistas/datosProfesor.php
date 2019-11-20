<?php session_start();?>
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
						
					</div>
					
						<div id="tablaDatatable" style="margin: 30px;">  </div>
					
					
				
			</div>
		</div>
	</div>
</div>


	
</body>
</html>



<script type="text/javascript">
	$(document).ready(function(){
		

		$('#btnAgregarnuevo').click(function(){


				vacios=validarFormVacio('frmnuevo');

				if(vacios > 0){

					alertify.alert("Información","Debes llenar todos los campos!!");
					return false;
				}
			var formData = new FormData(document.getElementById("frmnuevo"));

			$.ajax({
				url:"../procesos/Profesor/agregarProfesor.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
					
					if(r==1){
						$('#frmnuevo')[0].reset();
						$('#agregarnuevosdatosmodal').modal('hide');
						$('#agregarnuevosdatosmodal').modal('handleUpdate');
						$('#tablaDatatable').load('Profesor/tablaprofesor.php');
						alertify.success("agregado con exito :D");
					}else{
						alertify.error("Fallo al agregar :(");
					}
				}
			});
		});

		$('#btnActualizar').click(function(){
			var formData = new FormData(document.getElementById("frmnuevo2"));

			$.ajax({
					url:"../procesos/Profesor/actualizarProfesor.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
					
					if(r==1){
						$('#modalEditar').modal('hide');
						$('#tablaDatatable').load('Profesor/tablaprofesor.php');
						alertify.success("Actualizado con exito :D");
					}else{
						alertify.error("Fallo al actualizar :(");
					}
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('Personal/tabladatosprofesor.php');
	});
</script>

