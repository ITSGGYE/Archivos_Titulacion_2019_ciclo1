       <?php
 
	include('is_logged.php');//
?><?php

 
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	 
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$user_id=intval($_GET['id']);
		$query=mysqli_query($con, "select * from usuarios where User_Id='".$user_id."'");
		$count=mysqli_num_rows($query);
		if ($count!=0){
			if ($delete1=mysqli_query($con,"DELETE FROM usuarios WHERE User_Id='".$user_id."'")){
			?>			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
			</div>
			<?php
			
		}
			
		} else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se puede borrar el usuario administrador. 
			</div>
			<?php
		}
		
		
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('User_Nombre', 'User_Apellido');//Columnas de busqueda
		 $sTable = "usuarios";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		$sWhere.=" order by User_Id desc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './usuarios.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>ID</th>
					<th>Nombres</th>
					<th>Usuario</th>
					<th>Estado</th>
					<th>Rol</th>
					<th>Sucursal</th>
					<th><span class="pull-right">Acciones</span></th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$user_id=$row['User_Id']; 
						$fullname=$row['User_Nombre']." ".$row["User_Apellido"];
						$user_name=$row['User_Nam'];
					 $status_cliente=$row['User_Estado'];
						if ($status_cliente==1){$estado="Activo";}
						if ($status_cliente==0){$estado="Inactivo";}
					 $rol=$row['Rol_Id']; 
					 if ($rol==1){$r="Gerente";}
					  if ($rol==2){$r="Administrador";}
						if ($rol==3){$r="secretario(a)";}
				 
					 
	 
					 $sucursal_cliente=$row['Sucur_Id']; 
			 if ($sucursal_cliente>=1) {
					 	# code...
		
		$qa=mysqli_query($con,"select * from sucursales where Sucur_Id=$sucursal_cliente ");
							while($rw=mysqli_fetch_array($qa))	{
						 
	                             $su=$rw['Sucur_Nombre'];
				 

							}	 			 } 
 

			  ?> 
					
					<input type="hidden" value="<?php echo $row['User_Nombre'];?>" id="nombres<?php echo $user_id;?>">
					<input type="hidden" value="<?php echo $row['User_Apellido'];?>" id="apellidos<?php echo $user_id;?>">
					<input type="hidden" value="<?php echo $user_name;?>" id="usuario<?php echo $user_id;?>">
					<input type="hidden" value="<?php echo $rol;?>" id="rol<?php echo $user_id;?>">
				<input type="hidden" value="<?php echo $status_cliente;?>" id="status_cliente<?php echo $user_id;?>">
				<input type="hidden" value="<?php echo $sucursal_cliente;?>" id="sucursal_cliente<?php echo $user_id;?>">
					<tr>
						<td><?php echo $user_id; ?></td>
						<td><?php echo $fullname; ?></td>
						<td ><?php echo $user_name; ?></td>
 <td><?php echo $estado;?></td>
						<td><?php echo $r;?></td>
									<td><?php  if ($sucursal_cliente>=1) {echo $su; } if ($sucursal_cliente==0) {echo "Todas"; }?></td>
						
					<td ><span class="pull-right">
					<a href="#" class='btn btn-info' title='Editar usuario' onclick="obtener_datos('<?php echo $user_id;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 

 <?php 
      if($_SESSION['idUser'] == $user_id){
    
 
      
       ?>
					<a href="#" class='btn btn-info' title='No se puede cambiar al gerente' onclick=" " data-toggle="modal" data-target="#"><i class="glyphicon glyphicon-cog"></i></a>
					  <?php } else {
    
 
      
       ?>
					<a href="#" class='btn btn-info' title='Cambiar contraseña' onclick="get_user_id('<?php echo $user_id;?>');" data-toggle="modal" data-target="#myModal3"><i class="glyphicon glyphicon-cog"></i></a>
					  <?php } ?>


					<a href="#" class='btn btn-info' title='Borrar usuario' onclick="eliminar('<? echo $user_id; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=9><span class="pull-right">
					<?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>