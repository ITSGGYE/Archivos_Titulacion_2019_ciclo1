<?php
include('../conexion.php');

$id = $_POST['id'];

mysqli_query($conexion,"DELETE FROM proveedor WHERE id_proveedor = '$id'");

$registro = mysqli_query($conexion,"SELECT * FROM proveedor ORDER BY id_proveedor ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
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