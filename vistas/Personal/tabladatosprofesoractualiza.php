<?php 
session_start();
$id=$_SESSION['profesor']['id'];
require_once "../../clases/conexion.php";
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
<div class="container-fluid">


	
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>

				
  <div class="form-row" >
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre y Apellido del Docente</label>
      <input type="text" class="form-control" id="nombre2" name="nombre2" placeholder="Nombre"  value="<?php echo $mostrar[0];?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Direccion</label>
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
      <label for="inputCity">Cedula</label>
      <input type="text" class="form-control" id="cedula2" name="cedula2" value="<?php echo $mostrar[4];?>">
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">Telefono</label>
      <input type="text" class="form-control" id="telefono2" name="telefono2" value="<?php echo $mostrar[2];?>">
    </div>
    <div class="form-group col-md-3">
      <label for="inputZip">Celular</label>
      <input type="text" class="form-control" id="celular2" name="celular2" value="<?php echo $mostrar[3];?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputCity">Titulo</label>
      <input type="text" class="form-control" id="titulo2"  name="titulo2" value="<?php echo $mostrar[6];?>">
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
  

				
					<?php } ?>
</div>
