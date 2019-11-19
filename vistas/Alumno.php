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
	 	 	input[type="text"], input[type="date"] {
	 		font-size: 14px;

}
	 </style>
</head>
<body class="fondo">
<?php require_once "menu.php"; 
require_once '../clases/conexion.php';
$c= new conectar();
$conexion=$c->conexion();?>
	<div class="container-fluid ">


 <div class="row">
 <div class="col-lg-12">
				<div class="card text-left ">
					<div class="card-header box ">

							<br>
						<h2>Módulo Ingreso de Estudiantes</h2>
						
					</div>
					<div class="card-body text-right">
						<a href="Datos_Familiares.php" class="btn btn-warning ">
							Agregar Datos Familiares <span class="fa fa-plus-circle"></span>
						</a>
						<a href="Datos_Representante.php" class="btn btn-danger ">
							Agregar Datos Representante <span class="fa fa-plus-circle"></span>
						</a>
												
						<span class="btn btn-primary " data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar nuevo Alumno <span class="fa fa-plus-circle"></span>
						</span>
						<hr>
					</div>
						<div id="tablaDatatable">  </div>
					
					<div class="card-footer text-muted">
						
					</div>
				
			</div>
		</div>
	</div>
</div>

	<!-- Modal -->
	<div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
		<div class="modal-dialog  modal-lg" role="document" >
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Información del Estudiante </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="container-fluid">
					<form id="frmnuevo">
					<div class="row">
						<label> DATOS DEL ESTUDIANTE </label> <br>
					</div>
					<div class="row">
					<div class="col-md-8">
						<label>Apellidos y Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="nombre" onKeyPress="return sololetras(event)" onpaste="return false">
					</div>
					
					<div class="col-md-4">
						<label>Fecha de nacimiento</label>
						<input type="date" class="form-control input-sm" name="fecha" id="fecha">
					</div>
					
					</div>
					<div class="row">
					<div class="col-md-3">
						<label>Nacionalidad</label>
						<input type="text" class="form-control input-sm" name="nacionalidad" id="nacionalidad" onKeyPress="return sololetras(event)" onpaste="return false">
					</div>
					<div class="col-md-3">
						<label>Teléfono</label>
							<input type="text" class="form-control input-sm" name="telefono" id="telefono" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="7">
					</div>
					
					<div class="col-md-3">
							<label>Cédula </label>
							<input type="text" class="form-control input-sm" name="cedula" id="cedula" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="10">
					</div>
					<div class="col-md-3">
						<br>
					<input class="btn btn-danger btn-xs" type="button" id="enviar" onKeyPress="return solonumero(event)" onpaste="return false" onclick="validarcedula()" value="validar" maxlength="13">
				</div>
						
					
					</div>
					<div class="row">
						<div class="col-md-8">
							<label>Dirección</label>
							<input type="text" class="form-control input-sm" name="direccion" id="direccion">

					</div>
				</div>
					<br>
					<div class="row">
						<div class="col-md-8">
							<label>Foto del Alumno</label>
						<div class="custom-file">
							<label class="custom-file-label" for="imagen">Seleccionar Archivo</label>
  							<input type="file" class="custom-file-input"  id="imagen" name="imagen" lang="es">
 							 
							</div>
					</div>
					</div>
					<br>
					<div class="row">
					<div class="col-md-6">
						<label>Jardín de Procedencia</label>
						<input type="text" class="form-control input-sm" name="nescuela" id="nescuela">
					</div>
					<div class="col-md-6">
						<label> En caso de emegercia llamar a: </label>
							<select class="form-control form-control-sm" id="emergencia" name="emergencia"  >
							
							<option value="1">Padre </option>
							<option value="2">Madre </option>
							<option value="3">Representante </option>						
					</select>
					</div>
					</div>
					<hr>
					<label><b>ADICIONALES</b></label>
						<br>
							<div class="row">
							<div class="col-md-6">
							<label>Entrega de documentación</label>
							<select class="form-control form-control-sm" id="documento" name="documento"  >
							
							<option value="1">Si </option>
							<option value="2">No </option>						
					</select>
							</div>
							<div class="col-md-6">
							<label>El alumno usa pañal</label>
							<select class="form-control form-control-sm" id="condicion" name="condicion"  >
							
							<option value="1">Si </option>
							<option value="2">No </option>						
					</select>
							</div>
							</div>
							<div class="row">
							<div class="col-md-8 form-group green-border-focus">
							<label>Observación</label>
							<textarea class="form-control" id="observacion" name="observacion" rows="3"></textarea>
							</div>
							
							
							</div>
				
			</div>
		</form>
	</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" id="btnAgregarnuevo" class="btn btn-primary">Agregar nuevo</button>
				</div>
			</div>
		</div>
	</div>



	<!-- Modal -->
	<!-- Modal -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
		<div class="modal-dialog  modal-lg" role="document" >
			<div class="modal-content modal-lg">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ingreso de Matricula </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="container-fluid">
					<form id="frmnuevo2">
						<div class="row">
						<label> DATOS DEL ESTUDIANTE </label> <br>
					</div>
					<div class="row">
					<div class="col-md-5">
						<label>Apellidos y Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre2" name="nombre2" onKeyPress="return sololetras(event)" onpaste="return false">
					</div>
					
					<div class="col-md-4">
						<label>Fecha de nacimiento</label>
						<input type="date" class="form-control input-sm" name="fecha2" id="fecha2">
					</div>
					
					</div>
					<div class="row">
					<div class="col-md-4">
						<label>Nacionalidad</label>
						<input type="text" class="form-control input-sm" name="nacionalidad2" id="nacionalidad2" onKeyPress="return sololetras(event)" onpaste="return false">
					</div>
					<div class="col-md-4">
						<label>Teléfono</label>
							<input type="text" class="form-control input-sm" name="telefono2" id="telefono2" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="7">
					</div>
					<div class="col-md-4">
							<label>Cédula </label>
							<input type="text" class="form-control input-sm" name="cedula2" id="cedula2" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="10" readonly>
					</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<label>Dirección</label>
							<input type="text" class="form-control input-sm" name="direccion2" id="direccion2">

					</div>
				</div>
					<br>
					<div class="row">
						<div class="col-md-8">
						
  							<input type="file" id="imagennueva" name="imagennueva">
							<input type="hidden" id="imagen2" name="imagen2">
							<input type="hidden" id="id" name="id">
					</div>
					</div>
					<br>
					<div class="row">
						<label> PLANTEL DONDE PROCEDE </label>
					</div>
				
					<div class="row">
					<div class="col-md-6">
						<label>Nombre de la Escuela</label>
						<input type="text" class="form-control input-sm" name="nescuela2" id="nescuela2">
					</div>
					<div class="col-md-6">
						<label> En caso de emegercia llamar a: </label>
							<select class="form-control form-control-sm" id="emergencia2" name="emergencia2"  >
							
							<option value="1">Padre </option>
							<option value="2">Madre </option>
							<option value="3">Representante </option>						
					</select>
					</div>
					</div>
					<hr>
					<label><b>DATOS FAMILIARES DEL ESTUDIANTE</b></label>
						<br>
							<div class="row">
							<div class="col-md-6">
							<label>Entrega de documentación</label>
							<select class="form-control form-control-sm" id="documento2" name="documento2"  >
							
							<option value="1">Si </option>
							<option value="2">No </option>						
					</select>
							</div>
							<div class="col-md-6">
							<label>El alumno usa pañal</label>
							<select class="form-control form-control-sm" id="condicion2" name="condicion2"  >
							
							<option value="1">Si </option>
							<option value="2">No </option>						
					</select>
				</div>
			</div>
						<hr>
						<div class="row">
							<div class="col-md-8 form-group green-border-focus">
							<label>Observación</label>
							<textarea class="form-control" id="observacion2" name="observacion2" rows="3"></textarea>
							</div>
							
							
							</div>
							
						
							
							
						</div>
						</div>
						
					</form>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar">Actualizar</button>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade" id="modalEditar2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
		<div class="modal-dialog  modal-md" role="document" >
			<div class="modal-content modal-lg">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Cobro de Matricula </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="container-fluid">
					<form id="frmnuevo22">
				
					
				
					<div class="row">
						<div class="col-md-10">
							<label >Estudiante</label>
     						<select class="form-control form-control-sm" id="alumno3" name="alumno3" readonly>
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT id_alumno, nombre_alumno from alumno ";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[0]."-".$ver2[1]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
					<div class="col-md-10">
							<label >Elija el cobro a realizar</label>
     						<select class="form-control form-control-sm" id="cobro" name="cobro">
							<option value="A">Selecciona ...</option>
							<?php
							$sql2="SELECT id_cobro, cobro, valor  from cobro_valores  limit 2";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[1]."-".$ver2[2]; ?></option>
							<?php endwhile; ?>
						</select>
					</div>
					
				</div>
					
					<br>

					
							<div class="row">
							<div class="col-md-10 form-group green-border-focus">
							<label>Detalle</label>
							<textarea class="form-control" id="detalle" name="detalle" rows="3"></textarea>
							<input type="hidden" class="form-control input-sm" name="id3" id="id3">

							</div>
							
							
							</div>
						
							
							
						</div>
						</div>
						
					</form>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-warning" id="btnActualizar2">Guardar</button>
				</div>
			</div>
		</div>
	</div>



</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('Alumno/tablaAlumno.php');
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		

		$('#btnAgregarnuevo').click(function(){


				vacios=validarFormVacio('frmnuevo');

				if(vacios > 0){

					alertify.alert("Por favor!","Debes llenar todos los campos!!");
					return false;
				}
			var formData = new FormData(document.getElementById("frmnuevo"));

			$.ajax({
				url:"../procesos/Alumnos/agregarAlumno.php",
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
						
						$('#tablaDatatable').load('Alumno/tablaAlumno.php');
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
					url:"../procesos/Alumnos/actualizarAlumno.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
						if(r==1){
						$('#modalEditar').modal('hide');
						$('#tablaDatatable').load('Alumno/tablaAlumno.php');
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
	function agregaFrmActualizar(id){
		$.ajax({
			type:"POST",
			data:"id=" + id,
			url:"../procesos/Alumnos/obtenDatosAlumno.php",
			success:function(r){
			
				datos=jQuery.parseJSON(r);
			$('#id').val(datos['idalumno']);
				$('#nombre2').val(datos['nombre']);
				$('#fecha2').val(datos['fecha']);
				$('#nacionalidad2').val(datos['nacionalidad']);
				$('#cedula2').val(datos['cedula']);
				$('#nescuela2').val(datos['nescuela']);
				$('#imagen2').val(datos['imagen']);
				$('#emergencia2').val(datos['emergencia']);
				$('#telefono2').val(datos['telefono']);
				$('#direccion2').val(datos['direccion']);
				$('#documento2').val(datos['documento']);
				$('#condicion2').val(datos['condicion']);
				$('#observacion2').val(datos['observacion']);
				}
		});
	}
</script>

<script type="text/javascript">
	function agregaFrmActualizar2(id){
		$.ajax({
			type:"POST",
			data:"id=" + id,
			url:"../procesos/Pago/obtenDatosAlumno.php",
			success:function(r){
			
				datos=jQuery.parseJSON(r);
			$('#alumno3').val(datos['idalumno']);
			$('#id3').val(datos['idalumno']);
				
				}
		});
	}

  	function eliminarDatos(id){
		alertify.confirm('Eliminar datos familiares', '¿Seguro de eliminar este registro :(?', function(){ 

			$.ajax({
				type:"POST",
				data:"id=" + id,
				url:"../procesos/Alumnos/eliminarDatosFamiliares.php",
				success:function(r){
					if(r==1){
						$('#tablaDatatable').load('Alumno/tablaDatosFamiliares.php');
						alertify.success("Eliminado con exito !");
					}else{
						alertify.error("No se pudo eliminar...");
					}
				}
			});

		}
		, function(){

		});
	}

	
</script>

<script type="text/javascript">
	$('#btnActualizar2').click(function(){
			var formData = new FormData(document.getElementById("frmnuevo22"));

			$.ajax({
					url:"../procesos/Pago/agregaCobroMatricula.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
					alert(r);
						if(r==1){
						$('#frmnuevo22')[0].reset();
						$('#modalEditar2').modal('hide');
						$('#tablaDatatable').load('Alumno/tablaAlumno.php');
						alertify.success("Actualizado con exito :D");
					}else{
						alertify.error("Fallo al actualizar :(");
					}
				}
			});
		});
</script>

<script type="text/javascript">
function validarcedula(){
  
  /**
     
     * 1.- Se debe validar que tenga 10 numeros
     * 2.- Se extrae los dos primero digitos de la izquierda y compruebo que existan las regiones
     * 3.- Extraigo el ultimo digito de la cedula
     * 4.- Extraigo Todos los pares y los sumo
     * 5.- Extraigo Los impares los multiplico x 2 si el numero resultante es mayor a 9 le restamos 9 al resultante
     * 6.- Extraigo el primer Digito de la suma (sumaPares + sumaImpares)
     * 7.- Conseguimos la decena inmediata del digito extraido del paso 6 (digito + 1) * 10
     * 8.- restamos la decena inmediata - suma / si la suma nos resulta 10, el decimo digito es cero
     * 9.- Paso 9 Comparamos el digito resultante con el ultimo digito de la cedula si son iguales todo OK sino existe error.     
     */

     var cedula = document.getElementById("cedula").value; 

     //Preguntamos si la cedula consta de 10 digitos
     if(cedula.length == 10){
        
        //Obtenemos el digito de la region que sonlos dos primeros digitos
        var digito_region = cedula.substring(0,2);
        
        //Pregunto si la region existe ecuador se divide en 24 regiones
        if( digito_region >= 1 && digito_region <=24 ){
          
          // Extraigo el ultimo digito
          var ultimo_digito   = cedula.substring(9,10);

          //Agrupo todos los pares y los sumo
          var pares = parseInt(cedula.substring(1,2)) + parseInt(cedula.substring(3,4)) + parseInt(cedula.substring(5,6)) + parseInt(cedula.substring(7,8));

          //Agrupo los impares, los multiplico por un factor de 2, si la resultante es > que 9 le restamos el 9 a la resultante
          var numero1 = cedula.substring(0,1);
          var numero1 = (numero1 * 2);
          if( numero1 > 9 ){ var numero1 = (numero1 - 9); }

          var numero3 = cedula.substring(2,3);
          var numero3 = (numero3 * 2);
          if( numero3 > 9 ){ var numero3 = (numero3 - 9); }

          var numero5 = cedula.substring(4,5);
          var numero5 = (numero5 * 2);
          if( numero5 > 9 ){ var numero5 = (numero5 - 9); }

          var numero7 = cedula.substring(6,7);
          var numero7 = (numero7 * 2);
          if( numero7 > 9 ){ var numero7 = (numero7 - 9); }

          var numero9 = cedula.substring(8,9);
          var numero9 = (numero9 * 2);
          if( numero9 > 9 ){ var numero9 = (numero9 - 9); }

          var impares = numero1 + numero3 + numero5 + numero7 + numero9;

          //Suma total
          var suma_total = (pares + impares);

          //extraemos el primero digito
          var primer_digito_suma = String(suma_total).substring(0,1);

          //Obtenemos la decena inmediata
          var decena = (parseInt(primer_digito_suma) + 1)  * 10;

          //Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
          var digito_validador = decena - suma_total;

          //Si el digito validador es = a 10 toma el valor de 0
          if(digito_validador == 10)
            var digito_validador = 0;

          //Validamos que el digito validador sea igual al de la cedula
          if(digito_validador == ultimo_digito){
            alertify.success('la cedula:  ' + cedula + ' es correcta');
          }else{
            alertify.error('la cedula:' + cedula + ' es incorrecta'); return;
          }
          
        }else{
          // imprimimos en consola si la region no pertenece
         alertify.success('Esta cedula no pertenece a ninguna region'); return;
        }
     }else{
        //imprimimos en consola si la cedula tiene mas o menos de 10 digitos
       alertify.error('Esta cedula tiene menos de 10 Digitos');
     }    
  
};
</script>