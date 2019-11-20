<?php
$mensaje='';
try{
$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
}catch(PDOException $e){
	echo "Error: ". $e->getMessage();
}
if(isset($_POST['enviar'])){
	$identificacion =$_POST['identificacion'];
	$apellidos = $_POST['apellidos'];
	$nombre =  $_POST['nombres'];
	$correo =  $_POST['correo'];
	$telefono =  $_POST['telefono'];
	$mensaje='';
	$alert='';
	$resultado=0;
	if(empty($nombre) or empty($apellidos)  or empty($identificacion)){
		$mensaje= 'Por favor rellena todos los datos correctamente'."<br/>";
	}
   $query = "SELECT medidentificacion FROM medicos WHERE medidentificacion = :_CEDULA";
   $stmt = $conexion->prepare($query);
   $stmt->bindParam(':_CEDULA',$identificacion,PDO::PARAM_STR,4000);

   if($stmt->execute()){
   	$data = $stmt->fetch();
   	if($identificacion == $data['medidentificacion']){
   		echo "<script>alert('YA EXITE EL MEDICO');</script>";
   	}else{
   		$query = "SELECT pacIdentificacion FROM pacientes WHERE pacIdentificacion = :_CEDULA";
   		$stmt = $conexion->prepare($query);
   		$stmt->bindParam(':_CEDULA',$identificacion,PDO::PARAM_STR,4000);
   		if ($stmt->execute()) {
   			$data2 = $stmt->fetch();
   			if ($identificacion == $data2['pacIdentificacion']) {
   				echo "<script>alert('YA EXITE CEDULA EN PACIENTE');</script>";
   			}else{
   				$query = "INSERT INTO medicos(medidentificacion,mednombres,medapellidos,medtelefono,medcorreo) VALUES (:_cedula,:_nombres,:_apellidos,:_telefono,:_correo)";
   				$stmt = $conexion->prepare($query);
   				$stmt->bindParam(':_cedula',$identificacion,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_nombres',$nombre,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_apellidos',$apellidos,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_telefono',$telefono,PDO::PARAM_STR,4000);
   				$stmt->bindParam(':_correo',$correo,PDO::PARAM_STR,4000);
   				if ($stmt->execute()) {
   					echo "<script>alert('Registro Realizado');</script>";
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
	<title>Medicos - CentroLogros</title>
	<link rel="stylesheet" href="../css/estilos.css">
	<link rel="icon" type="image/x-icon" href="../img/logo.jpeg">
	<script type="text/javascript" src="js/cedula.js"></script>
</head>
<body>
<?php include 'arriba/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'arriba/nave.php';?>
				<article>
					<div class="mensaje">
						<h2>MEDICOS</h2>
					</div>
					<form action="" method="post" onsubmit="return caray();">
						<h2>Agregar Medico</h2>
						<input required type="numeric" name="identificacion" placeholder="Cédula:" id="cedula" pattern="[0-9]{10}" required>
						<input required type="text" name="nombres" placeholder="Nombres:">
						<input required type="text" name="apellidos" placeholder="Apellidos:">
						<input type="email" name="correo" placeholder="Correo:">
						<input type="numeric" name="telefono" placeholder="Telefono:" pattern="[0-9]{10}">
						<input type="submit" name="enviar" value="Agregar Medico">
					</form>	
					
			</article>
	</section>
</body>
</html>