<?php
$mensaje='';
try{
	$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
}catch(PDOException $e){
	echo "Error: ". $e->getMessage();
}
if(isset($_POST['enviar'])){
	$identificacion= $_POST['identificacion'];
	$apellidos = $_POST['apellidos'];
	$nombre =  $_POST['nombres'];
	$sexo =  $_POST['sexo'];
	$fechaNacimiento =  $_POST['fechaNacimiento'];
	$npadre =  $_POST['npadre'];
  $nfechaNacimiento =  $_POST['nfechaNacimiento'];
  $nsexo =  $_POST['nsexo'];
  $direccion =  $_POST['direccion'];
  $telefono =  $_POST['telefono'];
  $trabajo =  $_POST['trabajo'];
  $cargo =  $_POST['cargo'];
  $anpadre =  $_POST['anpadre'];
  $anfechaNacimiento =  $_POST['anfechaNacimiento'];
  $ansexo =  $_POST['ansexo'];
  $adireccion =  $_POST['adireccion'];
  $atelefono =  $_POST['atelefono'];
  $atrabajo =  $_POST['atrabajo'];
  $acargo =  $_POST['acargo'];
  $escuela =  $_POST['escuela'];
  $descripcion =  $_POST['descripcion'];
  $habitos =  $_POST['habitos'];
  $nivel =  $_POST['nivel'];
  $profesor =  $_POST['profesor'];
  $academico =  $_POST['academico'];
	$mensaje='';
	$alert='';
	$resultado=0;
	if(empty($nombre) or empty($apellidos)  or empty($identificacion)){
		$mensaje= 'Por favor rellena todos los datos correctamente'."<br/>";
	}
   $query = "SELECT pacIdentificacion FROM pacientes WHERE pacIdentificacion = :_CEDULA";
   $stmt = $conexion->prepare($query);
   $stmt->bindParam(':_CEDULA',$identificacion,PDO::PARAM_STR,4000);

   if($stmt->execute()){
   	$data = $stmt->fetch();
   	if($identificacion == $data['pacIdentificacion']){
   		echo "<script>alert('YA EXITE EL PACIENTES');</script>";
   	}else{
   		$query = "SELECT medidentificacion FROM medicos WHERE medidentificacion= :_CEDULA";
   		$stmt = $conexion->prepare($query);
   		$stmt->bindParam(':_CEDULA',$identificacion,PDO::PARAM_STR,4000);
   		if ($stmt->execute()) {
   			$data2 = $stmt->fetch();
   			if ($identificacion == $data2['medidentificacion']) {
   				echo "<script>alert('YA EXITE CEDULA EN MEDICOS');</script>";
   			}else{
   	$query = "INSERT INTO pacientes(pacIdentificacion,pacNombre,pacApellidos,pacFechaNacimiento,pacSexo,npadre,nfechaNacimiento,nsexo,direccion,telefono,trabajo,cargo,anpadre,anfechaNacimiento,ansexo,adireccion,atelefono,atrabajo,acargo,escuela,descripcion,habitos,nivel,profesor,academico) VALUES (:_cedula,:_nombres,:_apellidos,:_fechaNacimiento,:_sexo,:_npadre,:_nfechaNacimiento,:_nsexo,:_direccion,:_telefono,:_trabajo,:_cargo,:_anpadre,:_anfechaNacimiento,:_ansexo,:_adireccion,:_atelefono,:_atrabajo,:_acargo,:_escuela,:_descripcion,:_habitos,:_nivel,:_profesor,:_academico)";
   				$stmt = $conexion->prepare($query);
   				$stmt->bindParam(':_cedula',$identificacion,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_nombres',$nombre,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_apellidos',$apellidos,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_fechaNacimiento',$fechaNacimiento,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_sexo',$sexo,PDO::PARAM_STR,4000);
          $stmt->bindParam(':_npadre',$npadre,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_nfechaNacimiento',$nfechaNacimiento,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_nsexo',$nsexo,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_direccion',$direccion,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_telefono',$telefono,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_trabajo',$trabajo,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_cargo',$cargo,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_anpadre',$anpadre,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_anfechaNacimiento',$anfechaNacimiento,PDO::PARAM_STR,4000);
   			  $stmt->bindParam(':_ansexo',$ansexo,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_adireccion',$adireccion,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_atelefono',$atelefono,PDO::PARAM_STR,4000);
   			  $stmt->bindParam(':_atrabajo',$atrabajo,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_acargo',$acargo,PDO::PARAM_STR,4000);
   			  $stmt->bindParam(':_escuela',$escuela,PDO::PARAM_STR,4000);
   		    $stmt->bindParam(':_descripcion',$descripcion,PDO::PARAM_STR,4000);
   		    $stmt->bindParam(':_habitos',$habitos,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_nivel',$nivel,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_profesor',$profesor,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_academico',$academico,PDO::PARAM_STR,4000);
   	      if ($stmt->execute()) {
            echo "<script>alert('REGISTRADO CON EXITO');</script>";
          }else{
   					echo "<script>alert('ERROR');</script>";
   		    }
          }
            
      }
    }
   }
}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pacientes - CentroLogros</title>
	<link rel="stylesheet" href="../css/estilos.css">
	<link rel="icon" type="image/x-icon" href="../img/logo.jpeg">
 
</head>

<body>
<?php include 'arriba/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'arriba/nave.php'; ?>
				<article>
					<div class="mensaje">
						<h2>Datos de ingreso</h2>
					</div>
					<form action="" method="post">
						<h2> Formulario</h2>
             
						<input required type="numeric" name="identificacion" placeholder="Cédula:" pattern="[0-9]{10}" id="cedula">
						<input required type="text" name="nombres" placeholder="Nombres:">
						<input required type="text" name="apellidos" placeholder="Apellidos:">
						<input type="date" name="fechaNacimiento" placeholder="Fecha Nacimiento:">
						<select name="sexo" placeholder="Sexo:" required="">  
              <option value="" >Seleccione</option>  
              <option value="Masculino">Masculino</option>
							<option value="Femenino">Femenino</option> 
                        </select>
                        <h2>Antecedentes Familiares:</h2>
                          <h1>Datos del Padre:</h1>
                        <input required type="text" name="npadre" placeholder="Nombres del Padre:">
                         <input type="date" min="1960-01-01" max="1994-12-31" name="nfechaNacimiento" >    
                        <select name="nsexo" placeholder="Estadocivil:" required="">    
                          <option value="" >Seleccione</option>    	
              <option value="Soltero">Soltero</option>
							<option value="Casado">Casado</option> 
							<option value="Divorsiado">Divorsiado</option>
							<option value="Union Libre">Union Libre</option>
                        </select>
                        <input required type="text" name="direccion" placeholder="Direccion:">
                        <input required type="text" name="telefono" placeholder="Telefono:" pattern="[0-9]{10}">
                        <input required type="text" name="trabajo" placeholder="Lugar de trabajo:">
                        <input required type="text" name="cargo" placeholder="Cargo que ocupa:">
                          <br><br>
                            <h1>Datos de la Madre:</h1>
                        <input required type="text" name="anpadre" placeholder="Nombres de la Madre:">
                        <input type="date" min="1960-01-01" max="1994-01-01" name="anfechaNacimiento" >
                        <select name="ansexo" placeholder="Estadocivil:" required="">
                    <option value="" >Seleccione</option>
                            <option value="Soltera">Soltera</option>
							<option value="Casada">Casada</option> 
							<option value="Divorsiada">Divorsiada</option>
							<option value="Union Libre">Union Libre</option>
                        </select>
                        <input required type="text" name="adireccion" placeholder="Direccion:">
                        <input required type="text" name="atelefono" placeholder="Telefono:" pattern="[0-9]{10}">
                        <input required type="text" name="atrabajo" placeholder="Lugar de trabajo:">
                        <input required type="text" name="acargo" placeholder="Cargo que ocupa:">

                        <h2>Descripción del niño:</h2>

                        <input type="textarea" name="descripcion" placeholder="Describa a su hijo(a)">
                        <input type="textarea" name="habitos" placeholder="Habitos en casa">

                        <h2>Antecedentes Academicos:</h2>
                        <input required type="text" name="escuela" placeholder="Nombre de la escuela:">
                        <input required type="text" name="nivel" placeholder="Nivel Escolar:">
                        <input required type="text" name="profesor" placeholder="Nombre del Profesor:">
                        <input required type="text" name="academico" placeholder="Rendimiento Academico:">
						<input type="submit" name="enviar" value="Agregar Paciente" onclick="caray();">
						
					</form>
					<script type="text/javascript" src="js/cedula.js"></script>
				</article>
	</section>
</body>
</html>