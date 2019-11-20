<?php
include('../conexion.php');
	$paginaActual = $_POST['partida'];

    $nroProductos = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM proveedor"));
    $nroLotes = 8;
    $nroPaginas = ceil($nroProductos/$nroLotes);
    $lista = '';
    $tabla = '';

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';
    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}
  	$registro = mysqli_query($conexion,"SELECT * FROM proveedor LIMIT $limit, $nroLotes ");
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-responsive">
			                <tr>
                           <th width="200">Nombre</th>
                           <th width="200">Direccion</th>
                           <th width="200">Telefono</th>
                           <th width="200">Email</th>
                           <th width="50">Opciones</th>
                     </tr>';
				
	while($registro2 = mysqli_fetch_array($registro)){
		$tabla = $tabla.'<tr>
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
        
    $tabla = $tabla.'</table>';
    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>