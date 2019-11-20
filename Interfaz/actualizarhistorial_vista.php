<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Historial - CentroLogros</title>
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="icon" type="image/x-icon" href="img/logo.jpeg">
</head>
<body>
<?php include 'arriba/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'arriba/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>Historial Clínico</h2>
					</div>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
	<h2>EDITAR HISTORIAL</h2>
	<input type="hidden" name="id" value="<?php echo $historial['idPaciente'];?>" />
 
    	<h2> Formulario</h2>
						<input required type="numeric" name="identificacion" placeholder="identificación:" pattern="[0-9]{10}" value="<?php echo $historial['pacIdentificacion'];?>">
						<input required type="text" name="nombres" placeholder="Nombres:" value="<?php echo $historial['pacNombre'];?>">
						<input required type="text" name="apellidos" placeholder="Apellidos:" value="<?php echo $historial['pacApellidos'];?>">
						<input type="date" name="fechaNacimiento" placeholder="Fecha Nacimiento:" value="<?php echo $historial['pacFechaNacimiento'];?>">
					    <input type="text" name="sexo" placeholder="Sexo:" value="<?php echo $historial['pacSexo'];?>">
					
                        <h2>Antecedentes Familiares:</h2>
                        <h1>Datos del Padre:</h1>
                        <input required type="text" name="npadre" placeholder="Nombres del Padre:" value="<?php echo $historial['npadre'];?>">
                        <input type="date" name="nfechaNacimiento" placeholder="Fecha Nacimiento:" value="<?php echo $historial['nfechaNacimiento'];?>">    
                        	<input type="text" name="nsexo" placeholder="Estadocivil:" value="<?php echo $historial['nsexo'];?>">
                        <input required type="text" name="direccion" placeholder="Direccion:" value="<?php echo $historial['direccion'];?>">
                        <input required type="text" name="telefono" placeholder="Telefono:" pattern="[0-9]{10}" value="<?php echo $historial['telefono'];?>">
                        <input required type="text" name="trabajo" placeholder="Lugar de trabajo:" value="<?php echo $historial['trabajo'];?>">
                        <input required type="text" name="cargo" placeholder="Cargo que ocupa:" value="<?php echo $historial['cargo'];?>">
                          <br><br>
                          <h1>Datos de la Madre:</h1>
                        <input required type="text" name="anpadre" placeholder="Nombres de la Madre:" value="<?php echo $historial['anpadre'];?>">
                        <input type="date" name="anfechaNacimiento" placeholder="Fecha Nacimiento:" value="<?php echo $historial['anfechaNacimiento'];?>">
                        
                        <input type="text" name="ansexo" placeholder= "Estadocivil:" value="<?php echo $historial['ansexo'];?>">
                        <input required type="text" name="adireccion" placeholder="Direccion:" value="<?php echo $historial['adireccion'];?>">
                        <input required type="text" name="atelefono" placeholder="Telefono:" pattern="[0-9]{10}" value="<?php echo $historial['atelefono'];?>">
                        <input required type="text" name="atrabajo" placeholder="Lugar de trabajo:" value="<?php echo $historial['atrabajo'];?>">
                        <input required type="text" name="acargo" placeholder="Cargo que ocupa:" value="<?php echo $historial['acargo'];?>">

                        <h2>Descripción del niño:</h2>

                        <input type="textarea" name="descripcion" placeholder="Describa a su hijo(a)" value="<?php echo $historial['descripcion'];?>">
                        <input type="textarea" name="habitos" placeholder="Habitos en casa" value="<?php echo $historial['habitos'];?>">

                        <h2>Antecedentes Academicos:</h2>
                        <input required type="text" name="escuela" placeholder="Nombre de la escuela:" value="<?php echo $historial['escuela'];?>">
                        <input required type="text" name="nivel" placeholder="Nivel Escolar:" value="<?php echo $historial['nivel'];?>">
                        <input required type="text" name="profesor" placeholder="Nombre del Profesor:" value="<?php echo $historial['profesor'];?>">
                        <input required type="text" name="academico" placeholder="Rendimiento Academico:" value="<?php echo $historial['academico'];?>">  
			<input type="submit" name="enviar" value="Actualizar">	
			</form>
			<?php  if(!empty($errores)): ?>
			    <ul>
				 <?php echo $errores; ?>
				</ul>
				 <?php  endif; ?>
            <a class="btn-regresar" href="historial.php">Regresar</a>
		</article>
	</section>
</body>
</html>