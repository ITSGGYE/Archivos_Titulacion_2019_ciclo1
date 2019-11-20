
<?php
include('../conexion.php');

$id = $_POST['id-prod'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

switch($proceso){
	case 'Registro': mysqli_query($conexion,"INSERT INTO proveedor (nombre_proveedor, direccion, telefono, email) VALUES('$nombre','$direccion','$telefono','$email')");
	break;

	case 'Edicion': mysqli_query($conexion,"UPDATE proveedor SET nombre_proveedor = '$nombre', direccion = '$direccion', telefono ='$telefono', email = '$email' WHERE id_proveedor='$id'");

	break;
   }
    $registro = mysqli_query($conexion,"SELECT * FROM proveedor ORDER BY id_proveedor ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
              <th width="200">Nombre</th>
              <th width="200">Direccion</th>
              <th width="200">Telefono</th>
              <th width="200">Email</th>
              <th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
				         <td>'.$registro2['nombre_proveedor'].'</td>
                  <td>'.$registro2['direccion'].'</td>
                  <td>'.$registro2['telefono'].'</td>
                  <td>'.$registro2['email'].'</td>
                  <td> <a href="javascript:editarEmpleado('.$registro2['id_proveedor'].');" class="glyphicon glyphicon-edit eliminar"     title="Editar"></a>
                  <a href="javascript:eliminarEmpleado('.$registro2['id_proveedor'].');">
                  <img src="../images/delete.png" width="15" height="15" alt="delete" title="Eliminar" /></a>
                  </td>
				</tr>';
	}
   echo '</table>';
?>