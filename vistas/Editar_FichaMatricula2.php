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
		$cedula=$_GET['cedula'];
		$cursoactual=$_GET['curso'];
		$id=$cursoactual=$_GET['curso'];
		$cursoactual=$cursoactual+2;
		
		$sql="SELECT 					apellido_alumno,
										cedula_alumno,
										nombre_alumno,
										sexo_alumno,
										etnia_alumno,
										lugarnac_alumno,
										fechanac_alumno,
										nacionalidad_alumno,
										direccion_alumno,
										expreso_alumno,
										emerg_alumno,
										telefono_alumno,
										parroquia_alumno,
										telefono2_alumno,
										tipo_alumno,
										imagen_alumno,
										observa_alumno, 
										estado_alumno			
			 							FROM datos_alumno  where cedula_alumno='$cedula'   ";
					$result=mysqli_query($conexion,$sql);
					while ($mostrar=mysqli_fetch_row($result)) {
						$apellido_alumno=$mostrar[0];
						$cedula_alumno=$mostrar[1];
						$nombre_alumno=$mostrar[2];
						$sexo_alumno=$mostrar[3];
						$etnia_alumno=$mostrar[4];
						$lugarnac_alumno=$mostrar[5];
						$fechanac_alumno=$mostrar[6];
						$nacionalidad_alumno=$mostrar[7];
						$direccion_alumno=$mostrar[8];
						$expreso_alumno=$mostrar[9];
						$emerg_alumno=$mostrar[10];
						$telefono_alumno=$mostrar[11];
						$parroquia_alumno=$mostrar[12];
						$telefono2_alumno=$mostrar[13];
						$tipo_alumno=$mostrar[14];
						$imagen_alumno=$mostrar[15];
						$observa_alumno=$mostrar[16];
						$estado_alumno=$mostrar[17];



					}

						$sql="SELECT 	fk_cursoparalelo,
										fk_anio,
										estado	
			 							FROM curso_alumno  where fk_alumno='$cedula'    ";
					$result=mysqli_query($conexion,$sql);
					while ($mostrar=mysqli_fetch_row($result)) {
						$curso=$mostrar[0];
						$anio=$mostrar[1];
						$estado=$mostrar[2];					


					}

					$sql="SELECT 		nombre_padre,
										cedula_padre,
										nivel_padre,
										estado_padre,
										ocupacion_padre,
										empresa_padre,
										nombre_madre,
										cedula_madre,
										nivel_madre,
										estado_madre,
										ocupacion_madre,
										empresa_madre,
										email,
										separados,
										nombre_conyugue,
										nombre_representante,
										cedula_representante,
										relacionf,
										autorizo,
										id_datosrepre	
			 							FROM datos_representante  where fk_cedulaalumno='$cedula'   ";
					$result=mysqli_query($conexion,$sql);
					while ($mostrar=mysqli_fetch_row($result)) {
						$nombre_padre=$mostrar[0];
						$cedula_padre=$mostrar[1];
						$nivel_padre=$mostrar[2];
						$estado_padre=$mostrar[3];
						$ocupacion_padre=$mostrar[4];
						$empresa_padre=$mostrar[5];
						$nombre_madre=$mostrar[6];
						$cedula_madre=$mostrar[7];
						$nivel_madre=$mostrar[8];
						$estado_madre=$mostrar[9];
						$ocupacion_madre=$mostrar[10];
						$empresa_madre=$mostrar[11];
						$email=$mostrar[12];
						$separados=$mostrar[13];
						$nombre_conyugue=$mostrar[14];
						$nombre_representante=$mostrar[15];
						$cedula_representante=$mostrar[16];
						$relacionf=$mostrar[17];
						$autorizo=$mostrar[18];
						$idrepre=$mostrar[19];
					}

					$sql="SELECT 		nombre_plantel,
										tipo_plantel,
										comportamiento,
										promedio,
										examen,
										escala,
										id_otrosdatos
			 							FROM otros_datos  where fk_cedulaalumno='$cedula'   ";
					$result=mysqli_query($conexion,$sql);
					while ($mostrar=mysqli_fetch_row($result)) {
						$nombre_plantel=$mostrar[0];
						$tipo_plantel=$mostrar[1];
						$comportamiento=$mostrar[2];
						$promedio=$mostrar[3];
						$examen=$mostrar[4];
						$escala=$mostrar[5];
						
						
					}


		?>



	
	<div class="container-fluid col-md-10" style="background-color: white; margin-bottom: ">
		
		<div class="row">
		<div class="col-md-12 box ">
						<h1>Registro de Matricula</h1>
						<h2>Ingreso, Actualizar, Eliminar </h2>
					</div>
		<div class="card-body text-right">
						
						<a href="Ver_Ficha_Matricula.php"><span class="btn btn-primary "><span class="fa fa-plus-circle"></span>
							Ver Ficha </a>
						</span>
					</div>
		</div>
				<div class="card" style="margin-top: 30px; margin-bottom: 30px;">
  					<h5 class="card-header">FICHA DE MATRICULACION</h5>
  						<div class="card-body">
  							<form id="frmingreso" onclick="return valida(this)">
  							<div class="row">
  									<div class="col-md-4">
  								<label>Año Lectivo</label>
							<?php
							$sql2="SELECT id_aniolectivo, anio_lectivo  from aniolectivo where estado_aniolectivo=2";
							$result=mysqli_query($conexion,$sql2);
 							while($ver2=mysqli_fetch_row($result)):
 								$idanio=$ver2[0];
 								$aniolectivo=$ver2[1];
							endwhile; ?>
							<input type="text" class="form-control form-control-sm" id="anio" name="anio" 
									value="<?php echo $aniolectivo ; ?>" readonly>
							<input type="hidden" class="form-control form-control-sm" id="idanio" name="idanio" 
									value="<?php echo $idanio ; ?>" readonly>
						
					</div>
					<div class="col-md-4">
  								<label>Estado del Alumno</label>
							<?php
							if($estado_alumno==2) {
								$estadoa='Aprobado';
							}
							else {
								if($estado_alumno==3) {
								$estadoa='Reprobado';
							}
							else{
								if($estado_alumno==3) {
								$estadoa='Supletorio';
							}
							else {
								if($estado_alumno==1) {
								$estadoa='Matriculado';
							}
							}
							}
							}
							?>
							<input type="text" class="form-control form-control-sm" id="estadoa" name="estadoa" 
									value="<?php echo $estadoa ; ?>" readonly>
						
					</div>
				</div>
   					 			<h5 class="card-title">Datos del estudiante</h5>
   					 			<div class="row col-md-12">
   					 				<div class="col-md-3">
									<label> Apellidos</label>
									<input type="text" class="form-control form-control-sm" id="apellido" name="apellido" 
									value="<?php echo $apellido_alumno ; ?>"  onKeyPress="return sololetras(event)" onpaste="return false" >
									</div>
									<div class="col-md-3">
									<label> Nombres</label>
									<input type="text" class="form-control form-control-sm" id="nombre" name="nombre"
									value="<?php echo $nombre_alumno ; ?>"  onKeyPress="return sololetras(event)" onpaste="return false">
									</div>
									<div class="col-md-3">
									<label> Cédula</label>
									<input type="text" class="form-control form-control-sm" id="cedula" name="cedula"
									value="<?php echo $cedula_alumno ; ?>" readonly>
									</div>
									<div class="col-md-3">
									<label>Sexo</label>
										<select class="form-control form-control-sm" id="genero" name="genero" readonly >
											<option value="A"> ...</option>
											<?php if ($sexo_alumno=='M'){
												echo '<option selected="selected" value="M">Masculino </option>';
											} else { 
												if($sexo_alumno=='F'){
												echo '<option selected="selected" value="F">Femenino </option>';
											}
										}
											
											?>
										</select>
									</div>
								</div>

								<div class="row col-md-12">
									<div class="col-md-3">
									<label> Lugar de nacimiento</label>
									<input type="text" class="form-control form-control-sm" id="lugar" name="lugar" value="<?php echo $lugarnac_alumno ; ?>"  onKeyPress="return sololetras(event)" onpaste="return false"  readonly>
									</div>
   					 				<div class="col-md-3">
   									<label> Fecha de Nacimiento</label>
									<input type="date" class="form-control form-control-sm" id="fecha" name="fecha"
									value="<?php echo $fechanac_alumno ; ?>" readonly>
									</div>
									<div class="col-md-3">
									<label> Nacionalidad</label>
									<input type="text" class="form-control form-control-sm" id="nacionalidad" name="nacionalidad" value="<?php echo $nacionalidad_alumno ; ?>"  onKeyPress="return sololetras(event)" onpaste="return false"  readonly >
									</div>
									<div class="col-md-3">
									<label>Etnia</label>
										<select class="form-control form-control-sm" id="etnia" name="etnia" readonly>
											<option value="A"> ...</option>
											<?php 
												if($etnia_alumno==1){
													echo '<option selected="selected" value="1">Indigena </option>';
												} else {
												if($etnia_alumno==2){
													echo '<option selected="selected" value="2">Metiza </option>';
												} else {
												if($etnia_alumno==3){
													echo '<option selected="selected" value="3">Negra </option>';
												} else {
												if($etnia_alumno==4){
													echo '<option selected="selected" value="4">Blanco</option>';
												} 
												}
											}
										}
										?>
											
										</select>
									</div>
								</div>
								<div class="row col-md-12">
   					 				<div class="col-md-5">
									<label> Dirección del aspirante</label>
									<input type="text" class="form-control form-control-sm" id="direccion" name="direccion"
									value="<?php echo $direccion_alumno ; ?>">
									</div>
									<div class="col-md-4">
									<label>Parroquia</label>
									<input type="text" class="form-control form-control-sm" id="parroquia" name="parroquia"
									value="<?php echo $parroquia_alumno ; ?>">
									</div>

									<div class="col-md-3">
									<label>Usa Expreso</label>
									<select class="form-control form-control-sm" id="expreso" name="expreso" >
											<option value="A"> ...</option>
											<?php 
											if($expreso_alumno==1){
												echo '<option selected="selected" value="1">Si </option>';
											} else {
											if($expreso_alumno==2){
												echo '<option selected="selected" value="2">No </option>';
											}
											}
										?>
									</select>
									</div>
									
									
								</div>


								

								<div class="row col-md-12">
   					 				
									<div class="col-md-3">
									<label>Tipo de alumno</label>
									<select class="form-control form-control-sm" id="talumno" name="talumno" >
											<option value="A"> ...</option>
										<?php  if ($tipo_alumno==1){
											echo '<option selected="selected" value="1">Nuevo </option>';
										}
											else {
												if ($tipo_alumno==2) {
													echo '<option selected="selected" value="2">Antiguo </option>';
												}
											}
													
										?>
											
									</select>
									</div>
									
								</div>
								<div class="row col-md-10">
									<div class="col-md-4">
										
						<label>Curso a matricularse:</label>
		
							<?php
							$sql2="SELECT cp.id_cursoparalelo, c.nombre_curso, p.nombre_paralelo ,cp.estado, c.id_curso, p.id_paralelo  FROM curso c , paralelo p, curso_paralelo cp where  cp.fk_curso=c.id_curso and cp.fk_paralelo=p.id_paralelo and cp.id_cursoparalelo='$cursoactual'	";
							$result=mysqli_query($conexion,$sql2);
							while($ver2=mysqli_fetch_row($result)): 
								$nombre_curso=$ver2[1].' '.$ver2[2];
								 endwhile;
							?>
								<input type="text" class="form-control form-control-sm" id="curso" name="curso" 
									value="<?php echo $nombre_curso; ?>" readonly>
								<input type="hidden" class="form-control form-control-sm" id="curson" name="curson" 
									value="<?php echo $cursoactual; ?>" readonly>
						
									</div>
							<div class="col-md-4">
								<label>Estado</label>
								<?php
								if($estado==1){
									$nombre_estado='Habilitado';

								} else {
									if($estado==2){
										$nombre_estado='Desabilitado';
									}
								else {
									if($estado==3){
										$nombre_estado='Retirado';
									}
								}
								}


								?>
								<input type="text" class="form-control form-control-sm" id="estado2" name="estado2" 
									value="<?php echo $nombre_estado; ?>" readonly>
								<input type="hidden" class="form-control form-control-sm" id="estadoc" name="estadoc" 
									value="<?php echo $estado; ?>" readonly>
								


						
							</div>
								</div>

							<div class="row col-md-12">
   					 				<div class="col-md-8">
									<label> Observaciones</label>
									 <textarea class="form-control" rows="4" id="observacion" name="observacion" value="<?php echo $observa_alumno; ?>"><?php echo $observa_alumno;?></textarea>
									</div>
									
								</div>
								<div class="row col-md-12">
   					 				<div class="col-md-4">
									<label>Llamar en caso de emergencia</label>
									<select class="form-control form-control-sm" id="emergencia" name="emergencia" >

											<option value="A"> ...</option>

										<?php  if ($emerg_alumno==1){
											echo '<option selected="selected" value="1">Padre</option>';
										}
											else {
												if ($emerg_alumno==2) {
													echo '<option selected="selected" value="2">Madre </option>';
												}
											else {
												if($emerg_alumno==3){
													echo '<option selected="selected" value="3">Representante </option>';
												}
											}
											}
													
										?>
											
									</select>
											
									</div>
									<div class="col-md-4">
									<label>Celular </label>
									<input type="text" class="form-control form-control-sm" id="telefono1" name="telefono1" value="<?php echo $telefono_alumno; ?>" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="10">
									</div>
									<div class="col-md-4">
									<label>Teléfono convencional </label>
									<input type="text" class="form-control form-control-sm" id="telefono2" name="telefono2"
									value="<?php echo $telefono2_alumno; ?>" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="7">
									
									</div>
									
									
								</div>

<input type="hidden"   id="imagen" name="imagen"  value="<?php echo $imagen_alumno ; ?>">

								
								<br>
							
							
			<br>
		
				<h5 class="card-title">Datos de Padres y Representante</h5>
   					 			<div class="row col-md-12">
   					 				<div class="col-md-6">
									<label> Nombre del Padre</label>
									<input type="text" class="form-control form-control-sm" id="npadre" name="npadre"
									value="<?php echo $nombre_padre ; ?>"  onKeyPress="return sololetras(event)" onpaste="return false">
									</div>
									<div class="col-md-3">
									<label> Cédula del Padre</label>
									<input type="text" class="form-control form-control-sm" id="cpadre" name="cpadre"
									value="<?php echo $cedula_padre ; ?>" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="10">
									</div>
									<div class="col-md-3">
									<label> Nivel de Instrucción</label>
									<select class="form-control form-control-sm" id="nivelp" name="nivelp"  >
											<option value="A"> ...</option>
									<?php switch ($nivel_padre) {
										case '1':
											echo '<option selected="selected" value="1">Primaria </option>
											<option value="2">Secundaria </option>
											<option value="3">Bachillerato </option>
											<option value="4">Tecnológico </option>
											<option value="5">Tercer Nivel </option>
											<option value="6">Otro </option>';
											break;
										case '2':
											echo '<option value="1">Primaria </option>
											<option selected="selected" value="2">Secundaria </option>
											<option value="3">Bachillerato </option>
											<option value="4">Tecnológico </option>
											<option value="5">Tercer Nivel </option>
											<option value="6">Otro </option>';
											break;
										case '3':
											echo '
											<option value="1">Primaria </option>
											<option value="2">Secundaria </option>
											<option selected="selected" value="3">Bachillerato </option>
											<option value="4">Tecnológico </option>
											<option value="5">Tercer Nivel </option>
											<option value="6">Otro </option>
											';
											break;
										case '4':
											echo '<option value="1">Primaria </option>
											<option value="2">Secundaria </option>
											<option  value="3">Bachillerato </option>
											<option  selected="selected" value="4">Tecnológico </option>
											<option value="5">Tercer Nivel </option>
											<option value="6">Otro </option>';
											break;
										case '5':
											echo '<option value="1">Primaria </option>
											<option value="2">Secundaria </option>
											<option  value="3">Bachillerato </option>
											<option   value="4">Tecnológico </option>
											<option selected="selected" value="5">Tercer Nivel </option>
											<option value="6">Otro </option>';
											break;
										case '6':
											echo '<option value="1">Primaria </option>
											<option value="2">Secundaria </option>
											<option  value="3">Bachillerato </option>
											<option   value="4">Tecnológico </option>
											<option  value="5">Tercer Nivel </option>
											<option selected="selected" value="6">Otro </option>';
											break;
																				
										default:
											# code...
											break;
									}
											?>
									</select>
									
									</div>
									
								</div>

								<div class="row col-md-12">
   					 				<div class="col-md-3">
									<label> Estado Civil</label>
									<select class="form-control form-control-sm" id="estadop" name="estadop"  >
											<option value="A"> ...</option>
									<?php 
									if($estado_padre==1){
										echo '<option  selected="selected" value="1">Casado </option>';
										echo '<option   value="2">Divorciado </option>';
										echo '<option   value="3">Soltero </option>';
										echo '<option   value="4">Unión Libre </option>';
										echo '<option   value="5">Unión de Hecho </option>';
										

									} else {
										if($estado_padre==2){
										echo '<option   value="1">Casado </option>';
										echo '<option  selected="selected"  value="2">Divorciado </option>';
										echo '<option   value="3">Soltero </option>';
										echo '<option   value="4">Unión Libre </option>';
										echo '<option   value="5">Unión de Hecho </option>';
									} else {
										if($estado_padre==3){
										echo '<option   value="1">Casado </option>
										<option    value="2">Divorciado </option>
										<option  selected="selected" value="3">Soltero </option>
										<option   value="4">Unión Libre </option>
										<option   value="5">Unión de Hecho </option>';
									} 
									else {
										if($estado_padre==4){
										echo '<option   value="1">Casado </option>';
										echo '<option    value="2">Divorciado </option>';
										echo '<option   value="3">Soltero </option>';
										echo '<option  selected="selected"  value="4">Unión Libre </option>';
										echo '<option   value="5">Unión de Hecho </option>';
									} else {
										if($estado_padre==5){
										echo '<option   value="1">Casado </option>';
										echo '<option    value="2">Divorciado </option>';
										echo '<option   value="3">Soltero </option>';
										echo '<option   value="4">Unión Libre </option>';
										echo '<option  selected="selected"   value="5">Unión de Hecho </option>';
									}

									} 

									}
									}
								}

							?>		</select>
									</div>
									<div class="col-md-4">
									<label> Ocupación</label>
									<select class="form-control form-control-sm" id="ocupacionp" name="ocupacionp"  >
											<option value="A"> ...</option>
									<?php switch ($ocupacion_padre) {
										case '1':
											echo '	<option selected="selected" value="1">Laboral con relación de dependencia </option>
											<option value="2">Negocio Propio </option>
											<option value="3">Estudiante </option>
											<option value="4">No especifica </option>';
											break;
										case '2':
											echo '	<option value="1">Laboral con relación de dependencia </option>
											<option  selected="selected" value="2">Negocio Propio </option>
											<option value="3">Estudiante </option>
											<option value="4">No especifica </option>';
											break;
										case '3':
											echo '	<option value="1">Laboral con relación de dependencia </option>
											<option value="2">Negocio Propio </option>
											<option selected="selected" value="3">Estudiante </option>
											<option value="4">No especifica </option>';
											break;
										case '4':
											echo '	<option value="1">Laboral con relación de dependencia </option>
											<option value="2">Negocio Propio </option>
											<option value="3">Estudiante </option>
											<option selected="selected" value="4">No especifica </option>';
											break;

										
										default:
											# code...
											break;
									}
									?>
								</select>
									</div>
									<div class="col-md-4">
									<label>Empresa</label>
									<input type="text" class="form-control form-control-sm" id="empresap" name="empresap"
									value="<?php echo $empresa_padre ; ?>">
										
									</div>
								</div>
								<div class="row col-md-12">
   					 				<div class="col-md-6">
									<label> Nombre de la Madre</label>
									<input type="text" class="form-control form-control-sm" id="nmadre" name="nmadre"
									value="<?php echo $nombre_madre ; ?>"  onKeyPress="return sololetras(event)" onpaste="return false">
									</div>
									<div class="col-md-3">
									<label> Cédula de la Madre</label>
									<input type="text" class="form-control form-control-sm" id="cmadre" name="cmadre"
									value="<?php echo $cedula_madre ; ?>" maxlength="10">
									</div>
									<div class="col-md-3">
									<label> Nivel de Instrucción</label>
									<select class="form-control form-control-sm" id="nivelm" name="nivelm"  >
											<option value="A"> ...</option>
									<?php switch ($nivel_madre) {
										case '1':
											echo '<option selected="selected" value="1">Primaria </option>
											<option value="2">Secundaria </option>
											<option value="3">Bachillerato </option>
											<option value="4">Tecnológico </option>
											<option value="5">Tercer Nivel </option>
											<option value="6">Otro </option>';
											break;
										case '2':
											echo '<option value="1">Primaria </option>
											<option selected="selected" value="2">Secundaria </option>
											<option value="3">Bachillerato </option>
											<option value="4">Tecnológico </option>
											<option value="5">Tercer Nivel </option>
											<option value="6">Otro </option>';
											break;
										case '3':
											echo '
											<option value="1">Primaria </option>
											<option value="2">Secundaria </option>
											<option selected="selected" value="3">Bachillerato </option>
											<option value="4">Tecnológico </option>
											<option value="5">Tercer Nivel </option>
											<option value="6">Otro </option>
											';
											break;
										case '4':
											echo '<option value="1">Primaria </option>
											<option value="2">Secundaria </option>
											<option  value="3">Bachillerato </option>
											<option  selected="selected" value="4">Tecnológico </option>
											<option value="5">Tercer Nivel </option>
											<option value="6">Otro </option>';
											break;
										case '5':
											echo '<option value="1">Primaria </option>
											<option value="2">Secundaria </option>
											<option  value="3">Bachillerato </option>
											<option   value="4">Tecnológico </option>
											<option selected="selected" value="5">Tercer Nivel </option>
											<option value="6">Otro </option>';
											break;
										case '6':
											echo '<option value="1">Primaria </option>
											<option value="2">Secundaria </option>
											<option  value="3">Bachillerato </option>
											<option   value="4">Tecnológico </option>
											<option  value="5">Tercer Nivel </option>
											<option selected="selected" value="6">Otro </option>';
											break;
																				
										default:
											# code...
											break;
									}
											?>
									</select>
									
									</div>
									
								</div>

								<div class="row col-md-12">
   					 				<div class="col-md-3">
									<label> Estado Civil</label>
									<select class="form-control form-control-sm" id="estadom" name="estadom"  >
										<?php 
									switch ($estado_madre) {
										case '1':
											echo '<option  selected="selected" value="1">Casado </option>
											<option value="2">Divorciado </option>
											<option value="3">Soltero </option>
											<option value="4">Unión libre </option>
											<option value="5">Unión de hecho </option>
											';
											break;
										case '2':
											echo '<option value="1">Casado </option>
											<option selected="selected" value="2">Divorciado </option>
											<option value="3">Soltero </option>
											<option value="4">Unión libre </option>
											<option value="5">Unión de hecho </option>
											';
											break;
										case '3':
											echo '<option value="1">Casado </option>
											<option value="2">Divorciado </option>
											<option selected="selected" value="3">Soltero </option>
											<option value="4">Unión libre </option>
											<option value="5">Unión de hecho </option>
											';
											break;
										case '4':
											echo '<option value="1">Casado </option>
											<option value="2">Divorciado </option>
											<option value="3">Soltero </option>
											<option selected="selected" value="4">Unión libre </option>
											<option value="5">Unión de hecho </option>
											';
											break;
										case '5':
											echo '<option value="1">Casado </option>
											<option value="2">Divorciado </option>
											<option value="3">Soltero </option>
											<option value="4">Unión libre </option>
											<option selected="selected" value="5">Unión de hecho </option>
											';
											break;
										
										
										default:
											# code...
											break;
									}

							?>	
									</select>
									</div>
									<div class="col-md-4">
									<label> Ocupación</label>
									<select class="form-control form-control-sm" id="ocupacionm" name="ocupacionm"  >
											<option value="A"> ...</option>
									<?php switch ($ocupacion_madre) {
										case '1':
											echo '	<option selected="selected" value="1">Laboral con relación de dependencia </option>
											<option value="2">Negocio Propio </option>
											<option value="3">Estudiante </option>
											<option value="4">No especifica </option>';
											break;
										case '2':
											echo '	<option value="1">Laboral con relación de dependencia </option>
											<option  selected="selected" value="2">Negocio Propio </option>
											<option value="3">Estudiante </option>
											<option value="4">No especifica </option>';
											break;
										case '3':
											echo '	<option value="1">Laboral con relación de dependencia </option>
											<option value="2">Negocio Propio </option>
											<option selected="selected" value="3">Estudiante </option>
											<option value="4">No especifica </option>';
											break;
										case '4':
											echo '	<option value="1">Laboral con relación de dependencia </option>
											<option value="2">Negocio Propio </option>
											<option value="3">Estudiante </option>
											<option selected="selected" value="4">No especifica </option>';
											break;

										
										default:
											# code...
											break;
									}
									?>
								</select>
									</div>
									<div class="col-md-4">
									<label>Empresa</label>
									<input type="text" class="form-control form-control-sm" id="empresam" name="empresam"
									value="<?php echo $empresa_madre ; ?>">
										
									</div>
								</div>
								<div class="row col-md-12">
   					 				<div class="col-md-6">
									<label> Email</label>
									<input type="text" class="form-control form-control-sm" id="email" name="email"
									value="<?php echo $email ; ?>">
									<span id="emailOK"></span>
									</div>
									
									
								</div>


								<div class="row col-md-12">
   					 				<div class="col-md-4">
									<label>Padres separados</label>
									<select class="form-control form-control-sm" id="separados" name="separados" >
											<option value="A"> ...</option>
											<?php 
											if($separados==1){
												echo '<option selected="selected" value="1">Si </option>
												<option  value="2">No </option>';
											} else {
											if($separados==2){
												echo '<option  value="1">Si </option>
												<option selected="selected" value="2">No </option>
												';
											}
											}
										?>
									</select>
									</div>
									<div class="col-md-4">
									<label>Nombre del cónyugue actual</label>
									<input type="text" class="form-control form-control-sm" id="conyugue" name="conyugue"
									value="<?php echo $nombre_conyugue ; ?>"  onKeyPress="return sololetras(event)" onpaste="return false">
									</div>
																
								</div>

								<div class="row col-md-12">
   					 				<div class="col-md-4">
									<label>Representante</label>
									<input type="text" class="form-control form-control-sm" id="representante" name="representante" value="<?php echo $nombre_representante ; ?>"  onKeyPress="return sololetras(event)" onpaste="return false">
									</div>
									<div class="col-md-4">
									<label>Cédula</label>
									<input type="text" class="form-control form-control-sm" id="cedularepre" name="cedularepre" value="<?php echo $cedula_representante ; ?>" onKeyPress="return solonumero(event)" onpaste="return false" maxlength="10">
									</div>
									<div class="col-md-3">
									<label>Parentezco</label>
									<select class="form-control form-control-sm" id="relacionf" name="relacionf" >
											<option value="A"> ...</option>
									<?php  
										switch ($relacionf) {
											case '1':
												echo '	<option selected="selected"  value="1">Padre </option>
											<option value="2">Madre </option>
											<option value="3"> Tios </option>
											<option value="4">Abuelos </option>
											<option value="5">Otros </option>';
												break;
											case '2':
												echo '	<option   value="1">Padre </option>
											<option  selected="selected" value="2">Madre </option>
											<option value="3"> Tios </option>
											<option value="4">Abuelos </option>
											<option value="5">Otros </option>';

												
												break;
											case '3':
												echo '	<option   value="1">Padre </option>
											<option value="2">Madre </option>
											<option selected="selected" value="3"> Tios </option>
											<option value="4">Abuelos </option>
											<option value="5">Otros </option>';

												
												break;
											case '4':
												echo '	<option   value="1">Padre </option>
											<option value="2">Madre </option>
											<option value="3"> Tios </option>
											<option selected="selected" value="4">Abuelos </option>
											<option value="5">Otros </option>';

												
												break;
											case '5':
												echo '	<option   value="1">Padre </option>
											<option value="2">Madre </option>
											<option value="3"> Tios </option>
											<option value="4">Abuelos </option>
											<option selected="selected" value="5">Otros </option>';

												
												break;
											
											default:
												# code...
												break;
										}
									?>	
									</select>
									</div>
									
								</div>
								<div class="row col-md-12">
   					 				<div class="col-md-8">
									<label>Autorizo a retirar el estudiante</label>
									<input type="text" class="form-control form-control-sm" id="autorizo" name="autorizo"
									value="<?php echo $autorizo ; ?>"  onKeyPress="return sololetras(event)" onpaste="return false">
									<input type="hidden" name="idrepre" id="idrepre" value="<?php echo $idrepre; ?>">

									</div>
								<br>
								
					</div>
							
			<br>

				<h5 class="card-title">Procedencia</h5>
   					 			<div class="row col-md-12">
   					 				<div class="col-md-6">
									<label> Nombre del Plantel</label>
									<?php if(isset($nombre_plantel)) {

									?>
									<input type="text" class="form-control form-control-sm" id="nplantel" name="nplantel"
									value="<?php echo $nombre_plantel ; ?>" >
									<?php } else 
									{
										?>
									<input type="text" class="form-control form-control-sm" id="nplantel" name="nplantel"
									value="" >
									<?php 
									}
									?>
									</div>
									<div class="col-md-3">
									<label> Plantel</label>
									<select class="form-control form-control-sm" id="tplantel" name="tplantel" >
											<option value="A"> ...</option>
									<?php 
									switch ($tipo_plantel) {
										case '1':
											echo '
											<option selected="selected" value="1">Particular </option>
											<option value="2">Fiscal </option>
											<option value="3">otro </option>
											';
											break;
										case '2':
											echo '
											<option value="1">Particular </option>
											<option selected="selected" value="2">Fiscal </option>
											<option value="3">otro </option>
											';
											break;
										case '3':
											echo '
											<option value="1">Particular </option>
											<option value="2">Fiscal </option>
											<option selected="selected" value="3">otro </option>
											';
											break;
										
										default:
											{
												echo '
											<option value="1">Particular </option>
											<option value="2">Fiscal </option>
											<option  value="3">otro </option>
											';}
											break;
									}
									?>
									</select>
									</div>									
								</div>

								<div class="row col-md-12">
   					 				<div class="col-md-3">
									<label> Comportamiento</label>

										<?php if(isset($comportamiento)) {

									?>
									<input type="text" class="form-control form-control-sm" id="comportamiento" name="comportamiento"
									value="<?php echo $comportamiento ; ?>" >
									<?php } else 
									{
										?>
									<input type="text" class="form-control form-control-sm" id="comportamiento" name="comportamiento"
									value="" >
									<?php 
									}
									?>
									
									</select>
									</div>
									<div class="col-md-4">
									<label> Promedio</label>
									
										<?php if(isset($promedio)) {

									?>
									<input type="text" class="form-control form-control-sm" id="promedio" name="promedio"
									value="<?php echo $promedio ; ?>" >
									<?php } else 
									{
										?>
									<input type="text" class="form-control form-control-sm" id="promedio" name="promedio"
									value="" >
									<?php 
									}
									?>
									
									</div>
									<div class="col-md-4">
									<label> Escala Cualitativa</label>
									<select class="form-control form-control-sm" id="escala" name="escala"  >
											<option value="A"> ...</option>
											<?php 
											switch ($escala) {
											case '1':
											echo '<option  selected="selected" value="1">D.A.R </option>
											<option  value="2">A.A.R </option>
											<option value="3">E.P.A.A.R</option>';
													# code...
													break;
											case '2':
											echo '<option value="1">D.A.R </option>
											<option selected="selected" value="2">A.A.R </option>
											<option value="3">E.P.A.A.R</option>';
													# code...
													break;
												
												
											case '3':
											echo '<option value="1">D.A.R </option>
											<option value="2">A.A.R </option>
											<option selected="selected" value="3">E.P.A.A.R</option>';
													# code...
													break;
											default:
													{
														echo '<option value="1">D.A.R </option>
											<option value="2">A.A.R </option>
											<option  value="3">E.P.A.A.R</option>';
										}
													break;
											}
											?>
										</select>
									
									</div>
									<div class="col-md-4">
									<label>Examen de admisión</label>
									<select class="form-control form-control-sm" id="examen" name="examen"  >
											<option value="A"> ...</option>
									<?php 
									switch ($examen) {
										case '1':
										echo '<option selected="selected" value="1">Si </option>
											<option value="2">No </option>';

											break;
										case '2':
										echo '<option value="1">Si </option>
											<option selected="selected" value="2">No </option>';

											break;
										
										default: {
												echo '<option value="1">Si </option>
											<option  value="2">No </option>';

											break;
										}
									}
								?>
									</select>
									</div>
								</div>
								
<br>
<?php if ($estado_alumno==2){

	?>
								<div class="row">
									<div class="col-md-5">
									</div>
									<div class="col-md-2">
										<span class="btn btn-warning" id="btnAgregasistema" style="margin-bottom: 10px;">Actualizar</span>
								</div>
							</div>
	<?php } 


		?>
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
var formData = new FormData(document.getElementById("frmingreso"));

				
		
		$.ajax({
				
			url:"../procesos/Alumnos/actualizarDatosAlumnoCurso.php",
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
					location.href ="Listado_Alumno.php?id=<?php echo $id;?>";
				}else{
					alertify.error("No se pudo agregar ");
				}
			}
		});
	});
	});
</script>












<script type="text/javascript">
		$(document).ready(function(){
			$('#btnActualizar').click(function(){

				datos=$('#frmnuevo2').serialize();
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

<?php /*
	}else{
		header("location:../index.php");
	}*/
 ?>
 
 </body>