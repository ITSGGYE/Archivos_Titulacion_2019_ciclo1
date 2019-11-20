<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Matriculación</title>

	
</head>
<body>
	<style type="text/css">
	 	label{
	 		font-size: 14px;
	 		font-weight: bold;
	 		text-align: center;
	 		color:black;
	 	 	}
	 	 	

}
	 </style>

<body class="fondo">
<?php require_once "dependencias.php"; ?>


<?php require_once "menu.php"; ?>
		<?php require_once "../clases/conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();


		
		
		?>


	
	<div class="container-fluid col-md-10" style="background-color: white;">
		
		<div class="row">
		<div class="col-md-12 box ">
						<h1>Registro de Matricula</h1>
						<h2>Ingreso, Actualizar, Eliminar </h2>
					</div>
		</div>
				<div class="card" style="margin-top: 30px; margin-bottom: 30px;">
  					<h5 class="card-header">FICHA DE MATRICULACION</h5>
  						<div class="card-body">
  							<form id="frmingreso" onclick="return valida(this)">
  								<div class="row col-md-4">
  								<label>Año Lectivo</label>
							<select class="form-control form-control-sm" id="anio" name="anio">
							<?php
							$sql2="SELECT a.id_aniolectivo, a.anio_lectivo  from aniolectivo a where 
							 a.estado_aniolectivo=1";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>

   					 			<h5 class="card-title">Datos del estudiante</h5>
   					 			<div class="row col-md-12">
   					 				<div class="col-md-3">
									<label> Apellidos</label>
									<input type="text" class="form-control form-control-sm" id="apellido" name="apellido" onKeyPress="return sololetras(event)" onpaste="return false" >
									</div>
									<div class="col-md-3">
									<label> Nombres</label>
									<input type="text" class="form-control form-control-sm" id="nombre" name="nombre" onKeyPress="return sololetras(event)" onpaste="return false">
									</div>
									<div class="col-md-3">
									<label> Cédula</label>
									<input type="text" class="form-control form-control-sm" id="cedula" name="cedula" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="10">
									</div>
									<div class="col-md-3">
									<label>Sexo</label>
										<select class="form-control form-control-sm" id="genero" name="genero"  >
											
											<option value="M">Masculino </option>
											<option value="F">Femenino </option>
										</select>
									</div>
								</div>

								<div class="row col-md-12">
									<div class="col-md-3">
									<label> Lugar de nacimiento</label>
									<input type="text" class="form-control form-control-sm" id="lugar" name="lugar" onKeyPress="return sololetras(event)" onpaste="return false">
									</div>
   					 				<div class="col-md-3">
									<label> Fecha de Nacimineto</label>
									<input type="date" class="form-control form-control-sm" id="fecha" name="fecha">
									</div>
									<div class="col-md-3">
									<label> Nacionalidad</label>
									<input type="text" class="form-control form-control-sm" id="nacionalidad" name="nacionalidad" onKeyPress="return sololetras(event)" onpaste="return false">
									</div>
									<div class="col-md-3">
									<label>Etnia</label>
										<select class="form-control form-control-sm" id="etnia" name="etnia"  >
											
											<option value="1">Indigena </option>
											<option value="2">Mestiza </option>
											<option value="3">Negra </option>
											<option value="4">Blanca </option>
											
										</select>
									</div>
								</div>
								<div class="row col-md-12">
   					 				<div class="col-md-4">
									<label> Dirección del aspirante</label>
									<input type="text" class="form-control form-control-sm" id="direccion" name="direccion">
									</div>
									<div class="col-md-4">
									<label>Parroquia</label>
									<input type="text" class="form-control form-control-sm" id="parroquia" name="parroquia" onKeyPress="return sololetras(event)" onpaste="return false">
									</div>
									<div class="col-md-3">
									<label>Usa Expreso</label>
									<select class="form-control form-control-sm" id="expreso" name="expreso" >
											
											<option value="1">Si </option>
											<option value="2">No </option>
									</select>
									</div>
									
								</div>


								<div class="row col-md-10">
									<div class="col-md-3">
									<label>Tipo de alumno</label>
									<select class="form-control form-control-sm" id="talumno" name="talumno" >
											
											<option value="1">Nuevo </option>
											<option value="2">Antiguo </option>
											
									</select>
									</div>
								</div>

								<div class="row col-md-10">
									<div class="col-md-4">
										
										<label>Curso a matricularse:</label>
						<select class="form-control form-control-sm" id="curso" name="curso">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT cp.id_cursoparalelo, c.nombre_curso, p.nombre_paralelo ,cp.estado, c.id_curso, p.id_paralelo  FROM curso c , paralelo p, curso_paralelo cp where  cp.fk_curso=c.id_curso and cp.fk_paralelo=p.id_paralelo";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): 
							?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1].'-'.$ver2[2]; ?></option>
								
								
							<?php endwhile; ?>
						</select>
					
									</div>
							<div class="col-md-4">
								<label>Estado</label>
						<select class="form-control form-control-sm" id="estado2" name="estado2"  >
							
							<option value="1">Habilitado </option>
							<option value="2">Desabilitado </option>
							<option value="3">Retirado </option>
						</select>
							</div>
								</div>

								<div class="row col-md-12">
   					 				<div class="col-md-8">
									<label> Observaciones</label>
									 <textarea class="form-control" rows="4" id="observacion" name="observacion"></textarea>
									</div>
									
								</div>

								<div class="row col-md-12">
   					 				<div class="col-md-4">
									<label>Llamar en caso de emergencia</label>
									<select class="form-control form-control-sm" id="emergencia" name="emergencia" >
											
											<option value="1">Padre </option>
											<option value="2">Madre </option>
											<option value="3">Representante </option>
											
									</select>
									</div>
									<div class="col-md-4">
									<label>Celular </label>
									<input type="text" class="form-control form-control-sm" id="telefono1" name="telefono1" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="10">
									</div>
									<div class="col-md-4">
									<label>Teléfono convencional </label>
									<input type="text" class="form-control form-control-sm" id="telefono2" name="telefono2" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="7">
									<input type="hidden" class="form-control form-control-sm" id="estado" name="estado"  value="1">
									</div>
									
									
								</div>
								<br>
								
							
			<br>

				<h5 class="card-title">Datos de Padres y Representante</h5>
   					 			<div class="row col-md-12">
   					 				<div class="col-md-6">
									<label> Nombre del Padre</label>
									<input type="text" class="form-control form-control-sm" id="npadre" name="npadre" onKeyPress="return sololetras(event)" onpaste="return false">
									</div>
									<div class="col-md-3">
									<label> Cédula del Padre</label>
									<input type="text" class="form-control form-control-sm" id="cpadre" name="cpadre" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="10" >
									</div>
									<div class="col-md-3">
									<label> Nivel de Instrucción</label>
									<select class="form-control form-control-sm" id="nivelp" name="nivelp"  >
											
											<option value="1">Primaria </option>
											<option value="2">Secundaria </option>
											<option value="3">Bachillerato </option>
											<option value="4">Tecnológico </option>
											<option value="5">Tercer Nivel </option>
											<option value="6">Otro </option>
									</select>
									</div>
									
								</div>

								<div class="row col-md-12">
   					 				<div class="col-md-3">
									<label> Estado Civil</label>
									<select class="form-control form-control-sm" id="estadop" name="estadop"  >
											
											<option value="1">Casado </option>
											<option value="2">Divorciado </option>
											<option value="3">Soltero </option>
											<option value="4">Unión libre </option>
											<option value="5">Unión de hecho </option>
											
											

									</select>
									</div>
									<div class="col-md-4">
									<label> Ocupación</label>
									<select class="form-control form-control-sm" id="ocupacionp" name="ocupacionp"  >
											
											<option value="1">Laboral con relación de dependencia </option>
											<option value="2">Negocio Propio </option>
											<option value="3">Estudiante </option>
											<option value="4">No especifica </option>
											
									</select>
									</div>
									<div class="col-md-4">
									<label>Empresa</label>
									<input type="text" class="form-control form-control-sm" id="empresap" name="empresap">
										
									</div>
								</div>
								<div class="row col-md-12">
   					 				<div class="col-md-6">
									<label> Nombre de la Madre</label>
									<input type="text" class="form-control form-control-sm" id="nmadre" name="nmadre" onKeyPress="return sololetras(event)" onpaste="return false">
									</div>
									<div class="col-md-3">
									<label> Cédula de la Madre</label>
									<input type="text" class="form-control form-control-sm" id="cmadre" name="cmadre" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="10">
									</div>
									<div class="col-md-3">
									<label> Nivel de Instrucción</label>
									<select class="form-control form-control-sm" id="nivelm" name="nivelm"  >
											
											<option value="1">Primaria </option>
											<option value="2">Secundaria </option>
											<option value="3">Bachillerato </option>
											<option value="4">Tecnológico </option>
											<option value="5">Tercer Nivel </option>
											<option value="6">Otro </option>
									</select>
									</div>
									
								</div>

								<div class="row col-md-12">
   					 				<div class="col-md-3">
									<label> Estado Civil</label>
									<select class="form-control form-control-sm" id="estadom" name="estadom"  >
											
											<option value="1">Casado </option>
											<option value="2">Divorciado </option>
											<option value="3">Soltero </option>
											<option value="4">Unión libre </option>
											<option value="5">Unión de hecho </option>
									</select>
									</div>
									<div class="col-md-4">
									<label> Ocupación</label>
									<select class="form-control form-control-sm" id="ocupacionm" name="ocupacionm"  >
											
											<option value="1">Laboral con relación de dependencia </option>
											<option value="2">Negocio Propio </option>
											<option value="3">Estudiante </option>
											<option value="4">No especifica </option>
											
									</select>

									</div>
									<div class="col-md-4">
									<label>Empresa</label>
									<input type="text" class="form-control form-control-sm" id="empresam" name="empresam">
										
									</div>
								</div>
								<div class="row col-md-12">
   					 				<div class="col-md-6">
									<label> Email</label>
									<input type="text" class="form-control form-control-sm" id="email" name="email">
									<span id="emailOK"></span>
									</div>
									
									
								</div>


								<div class="row col-md-12">
   					 				<div class="col-md-4">
									<label>Padres separados</label>
									<select class="form-control form-control-sm" id="separados" name="separados" >
											
											<option value="1">Si </option>
											<option value="2">No </option>
									</select>
									</div>
									<div class="col-md-4">
									<label>Nombre del cónyugue actual</label>
									<input type="text" class="form-control form-control-sm" id="conyugue" name="conyugue" onKeyPress="return sololetras(event)" onpaste="return false">
									</div>
																
								</div>

								<div class="row col-md-12">
   					 				<div class="col-md-4">
									<label>Representante</label>
									<input type="text" class="form-control form-control-sm" id="representante" name="representante" onKeyPress="return sololetras(event)" onpaste="return false" >
									</div>
									<div class="col-md-4">
									<label>Cédula</label>
									<input type="text" class="form-control form-control-sm" id="cedularepre" name="cedularepre" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="10">
									</div>
									<div class="col-md-3">
									<label>Parentezco</label>
									<select class="form-control form-control-sm" id="relacionf" name="relacionf" >
											
											<option value="1">Padre </option>
											<option value="2">Madre </option>
											<option value="3"> Tios </option>
											<option value="4">Abuelos </option>
											<option value="5">Otros </option>
											
									</select>
									</div>
									
								</div>
								<div class="row col-md-12">
   					 				<div class="col-md-8">
									<label>Autorizo a retirar el estudiante</label>
									<input type="text" class="form-control form-control-sm" id="autorizo" name="autorizo" onKeyPress="return sololetras(event)" onpaste="return false">
									</div>
								<br>
								
					</div>

					<div class="row">
						<div class="col-md-8">
							<label>Foto del Alumno</label>
						<div class="custom-file">
  							<input type="file" class="custom-file-input"  id="imagen" name="imagen" lang="es">
 							 <label class="custom-file-label" for="imagen">Seleccionar Archivo</label>
							</div>
					</div>
					</div>

							
			<br>

				<h5 class="card-title">Procedencia</h5>
   					 			<div class="row col-md-12">
   					 				<div class="col-md-6">
									<label> Nombre del Plantel</label>
									<input type="text" class="form-control form-control-sm" id="nplantel" name="nplantel">
									</div>
									<div class="col-md-3">
									<label> Plantel</label>
									<select class="form-control form-control-sm" id="tplantel" name="tplantel" >
											<option value="A"> ...</option>
											<option value="1">Particular </option>
											<option value="2">Fiscal </option>
											<option value="3">otro </option>
									</select>
									</div>									
								</div>

								<div class="row col-md-12">
   					 				<div class="col-md-3">
									<label> Comportamineto</label>
									<input type="text" class="form-control form-control-sm" id="comportamiento" name="comportamiento" >
									</div>
									<div class="col-md-3">
									<label> Promedio</label>
									<input type="text" class="form-control form-control-sm" id="promedio" name="promedio">
									</div>
									<div class="col-md-3">
									<label>Escala cualitativa</label>
									<select class="form-control form-control-sm" id="escala" name="escala"  >
											<option value="A"> ...</option>
											<option value="1">D.A.R </option>
											<option value="2">A.A.R </option>
											<option value="3">E.P.A.A.R</option>
											
									</select>
									</div>

									<div class="col-md-3">
									<label>Examen de admisión</label>
									<select class="form-control form-control-sm" id="examen" name="examen"  >
											<option value="A"> ...</option>
											<option value="1">Si </option>
											<option value="2">No </option>
											
									</select>
									</div>
								</div>
							
<br>
								<div class="row">
									<div class="col-md-2">
										<span class="btn btn-primary" id="btnAgregasistema" style="margin-bottom: 10px;">Guardar</span>
								</div>
							</div>
   					 				<div> 

   					 			</div>

</form>
  </div>
</div>


			
				
			
				
			
			
			
			
				
					
		
			
			
		
		</div>
	
			<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Actualizar Pensum Académico</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body ">
					<form id="frmnuevo2">
					<div class="row">
					<div class="col-md-12">
						 <label >Año Lectivo</label>
     <select class="form-control form-control-sm" id="anio2" name="anio2">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT id_aniolectivo, anio_lectivo   from aniolectivo a where estado_aniolectivo=1";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
					 <label >Curso</label>

    <select class="form-control form-control-sm" id="curso2" name="curso2">
							<option value="A">Selecciona ...</option>
							<?php
							$sql="SELECT cp.id_cursoparalelo, c.nombre_curso, p.nombre_paralelo  FROM curso c , paralelo p, curso_paralelo cp where  cp.fk_curso=c.id_curso and cp.fk_paralelo=p.id_paralelo and cp.estado=1";
	
		$result=mysqli_query($conexion,$sql);
							 while($ver=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver[0] ?>"><?php echo $ver[1].'-'.$ver[2]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
	</div>
			 <div class="row">
  	<div class="form-group col-md-10">
      <label >Docente</label>
     <select class="form-control form-control-sm" id="profesor2" name="profesor2">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT id_profesor, nombre_profesor from profesor ";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[0]."-".$ver2[1]; ?></option>
							<?php endwhile; ?>
						</select>
    </div>
  </div>
				<div class="row">	
				<div class="col-md-6">
					<label>Estado</label>
						<select class="form-control form-control-sm" id="estado2" name="estado2"  >
							<option value="A"> ...</option>
							<option value="1">Activo </option>
							<option value="2">Inactivo </option>
							<option value="3">Espera </option>
						</select>
					</div>
				</div>
					 <input type="hidden" name="idpensum" id="idpensum">

					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){

		

		$('#btnAgregasistema').click(function(){

			vacios=validarFormVacio('frmingreso');

			if(vacios > 6){
				alertify.alert("Debes llenar todos los campos!!");
				return false;
			}
			/*var nombre=$('#nombre').val();
			var apellido=$('#apellido').val();*/

		var formData = new FormData(document.getElementById("frmingreso"));

		/*if(nombre!=''&&apellido!=''){*/
				
		$.ajax({
			
			url:"../procesos/Alumnos/agregarDatosAlumno.php",
			type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

			success:function(r){
			
				if(r){
					//alert(r);
					$("#frmingreso")[0].reset();
					
					alertify.success("Se guardado corectamentos los datos :D");
					location.href ="Ver_Ficha_Matricula.php";
				}else{
					alertify.error("No se pudo agregar ");
				}
			}
		});
		/*} else {
		alertify.success("Debes ingresar el nombre del alumno");*/
			
	
	});

	});
</script>







<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizar').click(function(){
				

				datos=$('#frmnuevo2').serialize();
				if(nombre!='') {
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/PensumAcademico/actualizapensumacademico.php",
					success:function(r){
						
						if(r==1){
							$('#modalEditar').modal('hide');
							$('#tabladatatable').load("PensumAcademico/tablaPensumAcademico.php");
							alertify.success("Actualizado con exito :)");
						}else{
							alertify.error("no se pudo actualizar :(");
						}
					}
				});
				} else {
			alert("Both Fields are Required");
		}
			});

		});
	</script>
	<script type="text/javascript">
		function agregaFrmActualizar(idpensum){
		$.ajax({
			type:"POST",
			data:"idpensum=" + idpensum,
			url:"../procesos/PensumAcademico/Obtendatospensumacademico.php",
			success:function(r){
								datos=jQuery.parseJSON(r);
				
				$('#curso2').val(datos['curso']);
				$('#profesor2').val(datos['profesor']);
				$('#anio2').val(datos['anio']);
				$('#estado2').val(datos['estado']);
				$('#idpensum').val(datos['idpensum']);
				
			}
		});
	}
		function eliminar(idpensum){
			alertify.confirm('Eliminar El PensumAcademico','¿Desea eliminar el item seleccionado?', function(){ 
				$.ajax({
					type:"POST",
					data:"idpensum=" + idpensum,
					url:"../procesos/PensumAcademico/eliminapensumacademico.php",
					success:function(r){
						
							if(r==1){
							$('#tabladatatable').load("PensumAcademico/tablaPensumAcademico.php");
							alertify.success("Eliminado con exito!!");
						}else{
							alertify.error("No se pudo eliminar :(");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelo !')
			});
		}
	</script>
<script type="text/javascript">
function valida(f) {
  var ok = true;
  
  if(f.elements["apellido"].value == "")
  {
    
    ok = false;
    alertify.error("Falta ingresar el campo apellido");
   
  }

  if(f.elements["nombre"].value == "")
  {
    
    ok = false;
    alertify.error("Falta ingresar el campo nombre");

   
  }

  if(f.elements["lugar"].value == "") 
  {
   ;
    ok = false;
    alertify.error("Falta ingresar el campo lugar de nacimiento");
  } 

 if(f.elements["cedula"].value.length!=10)  
  {
  
    ok = false;
    alertify.error("El campo cédula debe contener 10 dígitos");
  }

   if(f.elements["fecha"].value == "") 
  {
   
    ok = false;
    alertify.error("Falta ingresar el campo fecha de nacimiento");
  }  

   if(f.elements["nacionalidad"].value == "") 
  {
   
    ok = false;
    alertify.error("Falta ingresar el campo nacionalidad");
  }  

   if(f.elements["direccion"].value == "") 
  {
   
    ok = false;
    alertify.error("Falta ingresar el campo direccion");
  }  

     if(f.elements["parroquia"].value == "") 
  {
   
    ok = false;
    alertify.error("Falta ingresar el campo parroquia");
  }  

   if(f.elements["observacion"].value == "") 
  {
   
    ok = false;
    alertify.error("Falta ingresar el campo observacion");
  }  

     if(f.elements["telefono1"].value.length!=10) 
  {
   
    ok = false;
    alertify.error("El campo celular debe contener 10 digitos");
  }  

     if(f.elements["telefono2"].value.length!=7) 
  {
   
    ok = false;
    alertify.error("El campo teléfono debe contener 7 digitos");
  }  

  
  if(f.elements["npadre"].value == "") 
  {
   
    ok = false;
    alertify.error("Falta ingresar el campo nombre del padre");
  }  

   if(f.elements["nmadre"].value == "") 
  {
   
    ok = false;
    alertify.error("Falta ingresar el campo nombre de la madre");
  }  

  if(f.elements["cpadre"].value.length!=10) 
  {
   
    ok = false;
    alertify.error("El campo cédula padre debe contener 10 dígitos");
  }  

  if(f.elements["cmadre"].value.length!=10) 
  {
   
    ok = false;
    alertify.error("El campo cédula madre debe contener 10 dígitos");
  }  

  if(f.elements["cedularepre"].value.length!=10) 
  {
   
    ok = false;
    alertify.error("El campo cédula del representante debe contener 10 dígitos");
  }  

   if(f.elements["empresap"].value == "") 
  {
   
    ok = false;
    alertify.error("Falta ingresar el campo empresa 1");
  }  
  if(f.elements["empresam"].value == "") 
  {
   
    ok = false;
    alertify.error("Falta ingresar el campo empresa 2");
  }  

  

  if(f.elements["conyugue"].value == "") 
  {
   
    ok = false;
    alertify.error("Falta ingresar el campo conyugue");
  } 

  if(f.elements["representante"].value == "") 
  {
   
    ok = false;
    alertify.error("Falta ingresar el campo nombre del representante");
  }  

  if(f.elements["autorizo"].value == "") 
  {
   
    ok = false;
    alertify.error("Falta ingresar el campo autorizo");
  }   















  if(ok == false)
  
  return ok;
}
</script>
<script type="text/javascript">
function validar(frm) {
  if (frm.cedula.value.length!=9) {
    alert('error');
    frm.txt.focus();
  }
}
</script>

<script type="text/javascript">
	document.getElementById('email').addEventListener('input', function() {
    campo = event.target;
    valido = document.getElementById('emailOK');
        
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo.value)) {
      /*valido.innerText = "válido";*/
     alertify.success("Email correcto");
    } else {
     alertify.error("Email incorrecto");
    }
});
</script>



<?php /*
	}else{
		header("location:../index.php");
	}*/
 ?>
 
 </body>