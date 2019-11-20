<?php session_start();?>
<?php
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
			 p.id_profesor				
			 FROM profesor p where p.id_profesor='$id' ";
$result=mysqli_query($conexion,$sql);
?>
<div class="container-fluid">


	
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {

        
				?>

				<form>
  <div class="form-row" >
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre y Apellido del Docente</label>
      <input type="Nombre" class="form-control" id="inputEmail4" placeholder="Nombre"  value="<?php echo $mostrar[0];?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Direccion</label>
      <input type="text" class="form-control  id="inputPassword4" placeholder="Password" value="<?php echo $mostrar[1];?>" readonly>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress">Email</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" value="<?php echo $mostrar[5];?>" readonly>
  </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputCity">Cedula</label>
      <input type="text" class="form-control" id="inputCity" value="<?php echo $mostrar[4];?>" readonly>
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">Telefono</label>
      <input type="text" class="form-control" id="inputCity" value="<?php echo $mostrar[2];?>" readonly>
    </div>
    <div class="form-group col-md-3">
      <label for="inputZip">Celular</label>
      <input type="text" class="form-control" id="inputZip" value="<?php echo $mostrar[3];?>" readonly>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputCity">Titulo</label>
      <input type="text" class="form-control" id="inputCity" value="<?php echo $mostrar[6];?>" readonly>
    </div>
    <div class="form-group col-md-3">
      <label for="inputState">Fecha de Nacimiento</label>
      <input type="text" class="form-control" id="inputCity" value="<?php echo $mostrar[7];?>" readonly>
    </div>
    
  </div>
  
  </div>
  
</form>
				
					<?php } ?>
</div>
