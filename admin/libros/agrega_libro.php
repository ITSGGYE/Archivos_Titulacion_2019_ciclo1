
<?php
include('../conexion.php');

$id = $_POST['id-prod'];
$proceso = $_POST['pro'];
$foto = $_POST['foto'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$disponible = $_POST['disponible'];
$categoria = $_POST['categoria'];
$subcategoria = $_POST['subcategoria'];
$proveedor = $_POST['proveedor'];
$fecha = $_POST['fecha'];
$descarga = $_POST['descarga'];
$curso=$_POST['anio'];

switch($proceso){
	case 'Registro': mysqli_query($conexion,"INSERT INTO libros (foto, nombre, descripcion, disponible, id_categoria, id_subcategoria, id_proveedor, fecha_ingreso, url_descarga,curso) 
		                          VALUES('$foto','$nombre','$descripcion','$disponible','$categoria','$subcategoria','$proveedor','$fecha','$descarga','$curso')");
	break;

	case 'Edicion': mysqli_query($conexion,"UPDATE libros SET foto = '$foto', nombre = '$nombre', descripcion = '$descripcion', disponible = '$disponible',
		                         id_categoria = '$categoria', id_subcategoria = '$subcategoria','id_proveedor = '$proveedor', fecha_ingreso = '$fecha',
		                          url_descarga = '$descarga' ,curso='$curso' where id_libro = '$id'");
	break;
   }
    $registro = mysqli_query($conexion,"SELECT * FROM libros ORDER BY id_libro ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
            	<th width="200">Foto</th>
            	<th width="300">Nombre</th>
            	<th width="300">Descripcion</th>
            	<th width="100">Disponible</th>
            	<th width="100">Categoria</th>
            	<th width="100">Subcategoria</th>
            	<th width="100">Proveedor</th>
            	<th width="100">Fecha Ingreso</th>
            	<th width="300">URL Descarga</th>
				<th width="50">Opciones</th>
            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
				<td>'.$registro2['foto'].'</td>
				<td>'.$registro2['nombre'].'</td>
				<td>'.$registro2['descripcion'].'</td>
				<td>'.$registro2['disponible'].'</td>
				<td>'.$registro2['id_categoria'].'</td>
				<td>'.$registro2['id_subcategoria'].'</td>
				<td>'.$registro2['id_proveedor'].'</td>
				<td>'.$registro2['fecha_ingreso'].'</td>
				<td>'.$registro2['url_descarga'].'</td>
				<td> <a href="javascript:editarLibro('.$registro2['id_libro'].');" class="glyphicon glyphicon-edit eliminar" title="Editar"></a>
				     <a href="javascript:eliminarLibro('.$registro2['id_libro'].');">
				    <img src="../images/delete.png" width="15" height="15" alt="delete" title="Eliminar" /></a>
				 </td>
				</tr>';
	}
   echo '</table>';
?>