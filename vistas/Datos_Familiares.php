<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

	<title></title>
	<?php require_once "dependencias.php"; 
	   	require_once "../clases/conexion.php"; 
		$c= new conectar();
		$conexion=$c->conexion();

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
<?php require_once "menu.php"; ?>
	<div class="container-fluid ">


 <div class="row">
 <div class="col-lg-12">
				<div class="card text-left ">
					<div class="card-header box ">
						<br>
						<h2>Datos Familiares del Estudiante</h2>
					</div>
					<div class="card-body text-right">
						<a href="Alumno.php" class="btn btn-warning ">
							Agregar nuevo Alumno <span class="fa fa-plus-circle"></span>
						</a>
						<a href="Datos_Representante.php" class="btn btn-danger ">
							Agregar Datos del Representante
						</a>
						
						<span class="btn btn-primary " data-toggle="modal" data-target="#agregarnuevosdatosmodal">
							Agregar datos Familiares <span class="fa fa-plus-circle"></span>
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
					<h5 class="modal-title" id="exampleModalLabel">Datos Familiares del Estudiante </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="container-fluid">
					<form id="frmnuevo">
					<div class="row">
						<label> DATOS DEL PADRE </label> <br>
					</div>
					<div class="row">
						<div class="form-group col-md-6"">
							<label>Estudiante</label>
      						<div id="tablaDatatable2">
												
											 </div>
									</div>

					<div class="col-md-4">
						<label>Apellidos y Nombre </label>
						<input type="text" class="form-control input-sm" id="npadre" name="npadre" onKeyPress="return sololetras(event)" onpaste="return false">
					</div>
				</div>
				<div class="row">
					
					<div class="col-md-3">
						<label>Cédula </label>
						<input type="text" class="form-control input-sm" id="cedulap" name="cedulap" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="10">
					</div>
					<div class="col-md-2">
						<br>
					<input class="btn btn-danger btn-xs" type="button" id="enviar" onKeyPress="return solonumero(event)" onpaste="return false" onclick="validarcedula()" value="validar" maxlength="13">
				</div>
					
					<div class="col-md-3">
						<label>Estado Civil</label>
						<select class="form-control form-control-sm" id="estadop" name="estadop"  >
							
							<option value="1">Casado </option>
							<option value="2">Divorciado</option>
							<option value="3">Soltero</option>						
					</select>
					</div>
					
					<div class="col-md-3">
						<label>Nivel de Educación </label>
						<select class="form-control form-control-sm" id="nivelp" name="nivelp"  >
							
							<option value="1">Primaria </option>
							<option value="2">Secundaria </option>
							<option value="3">Bachiller </option>
							<option value="4">Tercer Nivel </option>					
					</select>
					</div>

					<div class="col-md-3">
						<label>Vive con el estudiante</label>
						<select class="form-control form-control-sm" id="vivep" name="vivep"  >
							
							<option value="1">Si </option>
							<option value="2">No </option>
											
					</select>
					</div>
					
				</div>
					<div class="row">
					<div class="col-md-4">
						<label>Email</label>
						<input type="text" class="form-control input-sm" name="emailp" id="emailp">
					</div>
					<div class="col-md-4">
						<label>Celular</label>
							<input type="text" class="form-control input-sm" name="celularp" id="celularp" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="10">
					</div>
					<div class="col-md-4">
							<label>Ocupación </label>
							<input type="text" class="form-control input-sm" name="ocupacionp" id="ocupacionp" onKeyPress="return sololetras(event)" onpaste="return false">
					</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>Autorizo a retirar al estudiante</label>
							<input type="text" class="form-control input-sm" name="autorizop" id="autorizop" onKeyPress="return sololetras(event)" onpaste="return false">

					</div>
					<div class="col-md-4">
						<label>Nacionalidad </label>
						<input type="text" class="form-control input-sm" id="nacionalidadp" name="nacionalidadp" onKeyPress="return sololetras(event)" onpaste="return false">
					</div>
					<div class="col-md-4">
						<label>Fecha de Nacimiento </label>
						<input type="date" class="form-control input-sm" id="fechap" name="fechap">
					</div>
				</div>
					<br>
				<div class="row">
						<label> DATOS DE LA MADRE </label> <br>
					</div>
					<div class="row">
						
					<div class="col-md-6">
						<label>Apellidos y Nombre </label>
						<input type="text" class="form-control input-sm" id="nmadre" name="nmadre" onKeyPress="return sololetras(event)" onpaste="return false">
					</div>
					<div class="col-md-4">
						<label>Fecha de Nacimiento </label>
						<input type="date" class="form-control input-sm" id="fecham" name="fecham">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label>Estado Civil</label>
						<select class="form-control form-control-sm" id="estadom" name="estadom"  >
							
							<option value="1">Casado </option>
							<option value="2">Divorciado</option>
							<option value="3">Soltero</option>						
					</select>
					</div>
					
					<div class="col-md-4">
						<label>Nivel de Educación </label>
						<select class="form-control form-control-sm" id="nivelm" name="nivelm"  >
							<option value="1">Primaria </option>
							<option value="2">Secundaria </option>
							<option value="3">Bachiller </option>
							<option value="4">Tercer Nivel </option>					
					</select>
					</div>

					<div class="col-md-4">
						<label>Vive con el estudiante</label>
						<select class="form-control form-control-sm" id="vivem" name="vivem"  >
							
							<option value="1">Si </option>
							<option value="2">No </option>
											
					</select>
					</div>
					
				</div>
					<div class="row">		
						
					<div class="col-md-3">
						<label>Cédula </label>
						<input type="text" class="form-control input-sm" id="cedulam" name="cedulam" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="10">
					</div>
					<div class="col-md-3">
						<br>
						<input class="btn btn-danger btn-xs" type="button" id="enviar2"  onclick="validarcedula2()" value="validar" maxlength="13">

					</div>
			
					
					<div class="col-md-3">
						<label>Email</label>
						<input type="text" class="form-control input-sm" name="emailm" id="emailm">
					</div>
					<div class="col-md-3">
						<label>Celular</label>
							<input type="text" class="form-control input-sm" name="celularm" id="celularm" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="10">
					</div>
				

					</div>
			
					<div class="row">
						<div class="col-md-4">
							<label>Autorizo a retirar al estudiante</label>
							<input type="text" class="form-control input-sm" name="autorizom" id="autorizom" onKeyPress="return sololetras(event)" onpaste="return false">

					</div>
					<div class="col-md-4">
						<label>Nacionalidad </label>
						<input type="text" class="form-control input-sm" id="nacionalidadm" name="nacionalidadm" onKeyPress="return sololetras(event)" onpaste="return false">
					</div>
					<div class="col-md-4">
							<label>Ocupación </label>
							<input type="text" class="form-control input-sm" name="ocupacionm" id="ocupacionm" onKeyPress="return sololetras(event)" onpaste="return false">
					</div>
					<div class="col-md-4">
							<label>Representante</label>
						<select class="form-control form-control-sm" id="representante" name="representante"  >
							<option value="1">Padre </option>
							<option value="2">Madre </option>
							<option value="3">Otro </option>
											
					</select>
					</div>
				</div>
					<br>
				
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
					<h5 class="modal-title" id="exampleModalLabel">Editar Datos Familiares </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="container-fluid">
					<form id="frmnuevo2">
			
								<div class="row">
						<label> DATOS DEL PADRE </label> <br>
					</div>
					<div class="row">
						

     						
    					<div class="form-group col-md-6"">
      						<label >Estudiante</label>
     						<select class="form-control form-control-sm" id="alumno2" name="alumno2">
							
							<?php
							$sql2="SELECT id_alumno, nombre_alumno from alumno ";
							$result=mysqli_query($conexion,$sql2)
 
							?>
							<?php while($ver2=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $ver2[0] ?>"><?php echo $ver2[0]."-".$ver2[1]; ?></option>
							<?php endwhile; ?>
						</select>
    					</div>
					<div class="col-md-6">
						<label>Apellidos y Nombre </label>
						<input type="text" class="form-control input-sm" id="npadre2" name="npadre2" onKeyPress="return sololetras(event)" onpaste="return false">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label>Cédula </label>
						<input type="text" class="form-control input-sm" id="cedulap2" name="cedulap2" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="10" readonly>
					</div>
					<div class="col-md-3">
						<label>Estado Civil</label>
						<select class="form-control form-control-sm" id="estadop2" name="estadop2"  >
							
							<option value="1">Casado </option>
							<option value="2">Divorciado</option>
							<option value="3">Soltero</option>						
					</select> 
					</div>
					
					<div class="col-md-3">
						<label>Nivel de Educación </label>
						<select class="form-control form-control-sm" id="nivelp2" name="nivelp2"  >
							
							<option value="1">Primaria </option>
							<option value="2">Secundaria </option>
							<option value="3">Bachiller </option>
							<option value="3">Tercer Nivel </option>					
					</select>
					</div>

					<div class="col-md-3">
						<label>Vive con el estudiante</label>
						<select class="form-control form-control-sm" id="vivep2" name="vivep2"  >
							
							<option value="1">Si </option>
							<option value="2">No </option>
											
					</select>
					</div>
					
				</div>
					<div class="row">
					<div class="col-md-4">
						<label>Email</label>
						<input type="text" class="form-control input-sm" name="emailp2" id="emailp2">
					</div>
					<div class="col-md-4">
						<label>Celular</label>
							<input type="text" class="form-control input-sm" name="celularp2" id="celularp2" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="10">
					</div>
					<div class="col-md-4">
							<label>Ocupación </label>
							<input type="text" class="form-control input-sm" name="ocupacionp2" id="ocupacionp2" onKeyPress="return sololetras(event)" onpaste="return false">
					</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>Autorizo a retirar al estudiante</label>
							<input type="text" class="form-control input-sm" name="autorizop2" id="autorizop2" onKeyPress="return sololetras(event)" onpaste="return false">

					</div>
					<div class="col-md-4">
						<label>Nacionalidad </label>
						<input type="text" class="form-control input-sm" id="nacionalidadp2" name="nacionalidadp2" onKeyPress="return sololetras(event)" onpaste="return false">
					</div>
					<div class="col-md-4">
						<label>Fecha de Nacimiento </label>
						<input type="date" class="form-control input-sm" id="fechap2" name="fechap2">
					</div>
				</div>
					<br>
				<div class="row">
						<label> DATOS DE LA MADRE </label> <br>
					</div>
					<div class="row">
						
					<div class="col-md-6">
						<label>Apellidos y Nombre </label>
						<input type="text" class="form-control input-sm" id="nmadre2" name="nmadre2" onKeyPress="return sololetras(event)" onpaste="return false">
					</div>
					<div class="col-md-4">
						<label>Fecha de Nacimiento </label>
						<input type="date" class="form-control input-sm" id="fecham2" name="fecham2">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label>Estado Civil</label>
						<select class="form-control form-control-sm" id="estadom2" name="estadom2"  >
										
							<option value="1">Casado </option>
							<option value="2">Divorciado</option>
							<option value="3">Soltero</option>						
					</select>
					</div>
					
					<div class="col-md-4">
						<label>Nivel de Educación </label>
						<select class="form-control form-control-sm" id="nivelm2" name="nivelm2"  >
							
							<option value="1">Primaria </option>
							<option value="2">Secundaria </option>
							<option value="3">Bachiller </option>
							<option value="3">Tercer Nivel </option>					
					</select>
					</div>

					<div class="col-md-4">
						<label>Vive con el estudiante</label>
						<select class="form-control form-control-sm" id="vivem2" name="vivem2"  >
						
							<option value="1">Si </option>
							<option value="2">No </option>
											
					</select>
					</div>
					
				</div>
					<div class="row">
					<div class="col-md-4">
						<label>Email</label>
						<input type="text" class="form-control input-sm" name="emailm2" id="emailm2">
					</div>
					<div class="col-md-4">
						<label>Celular</label>
							<input type="text" class="form-control input-sm" name="celularm2" id="celularm2" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="10">
					</div>
					<div class="col-md-4">
							<label>Cédula </label>
							<input type="text" class="form-control input-sm" name="cedulam2" id="cedulam2" onKeyPress="return solonumero(event)" onpaste="return false" readonly>
					</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label>Autorizo a retirar al estudiante</label>
							<input type="text" class="form-control input-sm" name="autorizom2" id="autorizom2" onKeyPress="return sololetras(event)" onpaste="return false">

					</div>
					<div class="col-md-4">
						<label>Nacionalidad </label>
						<input type="text" class="form-control input-sm" id="nacionalidadm2" name="nacionalidadm2" onKeyPress="return sololetras(event)" onpaste="return false">
					</div>
					<div class="col-md-4">
							<label>Ocupación </label>
							<input type="text" class="form-control input-sm" name="ocupacionm2" id="ocupacionm2" onKeyPress="return sololetras(event)" onpaste="return false">
							<input type="hidden" class="form-control input-sm" name="id" id="id">
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



</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){
		

		$('#btnAgregarnuevo').click(function(){


				vacios=validarFormVacio('frmnuevo');

				if(vacios > 0){

					alertify.alert("Informaci?","Debes llenar todos los campos!!");
					return false;
				}
			var formData = new FormData(document.getElementById("frmnuevo"));

			$.ajax({
				url:"../procesos/Alumnos/agregarDatosFamiliares.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
				
					if(r){
				
						$('#frmnuevo')[0].reset();
						$('#agregarnuevosdatosmodal').modal('hide');
						
						$('#tablaDatatable').load('Alumno/tablaDatosFamiliares.php');
						$('#tablaDatatable2').load('Alumno/listadodeAlumno.php');

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
					url:"../procesos/Alumnos/actualizarDatosFamiliares.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

				success:function(r){
						if(r==1){
						$('#modalEditar').modal('hide');
						$('#tablaDatatable').load('Alumno/tablaDatosFamiliares.php');
						$('#tablaDatatable2').load('Alumno/listadodeAlumno.php');

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
		$('#tablaDatatable').load('Alumno/tablaDatosFamiliares.php');
		$('#tablaDatatable2').load('Alumno/listadodeAlumno.php');

	});
</script>


<script type="text/javascript">
	function agregaFrmActualizar(id){
		$.ajax({
			type:"POST",
			data:"id=" + id,
			url:"../procesos/Alumnos/obtenDatosFamiliares.php",
			success:function(r){
			
				datos=jQuery.parseJSON(r);
				$('#id').val(datos['id']);
				$('#alumno2').val(datos['alumno']);
				$('#npadre2').val(datos['npadre']);
				$('#cedulap2').val(datos['cedulap']);
				$('#fechap2').val(datos['fechap']);
				$('#nacionalidadp2').val(datos['nacionalidadp']);
				$('#estadop2').val(datos['estadop']);
				$('#emailp2').val(datos['emailp']);
				$('#nivelp2').val(datos['nivelp']);
				$('#ocupacionp2').val(datos['ocupacionp']);
				$('#vivep2').val(datos['vivep']);
				$('#autorizop2').val(datos['autorizop']);
				$('#celularp2').val(datos['celularp']);
				$('#nmadre2').val(datos['nmadre']);
				$('#cedulam2').val(datos['cedulam']);
				$('#fecham2').val(datos['fecham']);
				$('#nacionalidadm2').val(datos['nacionalidadm']);
				$('#estadom2').val(datos['estadom']);
				$('#emailm2').val(datos['emailm']);
				$('#nivelm2').val(datos['nivelm']);
				$('#ocupacionm2').val(datos['ocupacionm']);
				$('#vivem2').val(datos['vivem']);
				$('#autorizom2').val(datos['autorizom']);
				$('#celularm2').val(datos['celularm']);
			
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

     var cedula = document.getElementById("cedulap").value; 

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


<script type="text/javascript">
function validarcedula2(){
  
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

     var cedula = document.getElementById("cedulam").value; 

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