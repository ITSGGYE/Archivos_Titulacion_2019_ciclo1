    <?php
 
	 
 
	session_start();

	if (!isset($_SESSION['active']) AND $_SESSION['active'] != true) {
        include("loguot.php"); 
		exit; $_SESSION['variable']="";
        }        
 
 
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$id_cliente=intval($_GET['id']);
		$query=mysqli_query($con, "select * from factura where Cli_Id='".$id_cliente."'");
		$count=mysqli_num_rows($query);
		if ($count==0){
			if ($delete1=mysqli_query($con,"DELETE FROM clientes WHERE Cli_Id='".$id_cliente."'")){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
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
			  <strong>Error!</strong> No se pudo eliminar éste  cliente. Existen facturas vinculadas a éste producto. 
			</div>
			<?php
		}
		
		
		
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('Cli_Apellido','Cli_Nombre');//Columnas de busqueda

		 $sTable = "clientes";
		 $sWhere = "concat(Cli_Nombre,' ',Cli_Apellido) like '%" .$q. "%' LIMIT 0 ,10";
	 
		$sWhere.=" order by Cli_Id";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 10; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable where concat(Cli_Nombre,' ',Cli_Apellido) like '%" .$q. "%' LIMIT 0 ,10");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './clientes.php';
		//main query to fetch the data
	$sql="SELECT * FROM  $sTable where concat(Cli_Nombre,' ',Cli_Apellido) like '%" .$q. "%' LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Teléfono</th>
					<th>Email</th>
			 
					<th>Estado</th>
					<th>Agregado</th> 
					<th  class='text-center'>Facturas</th> 
					<th>Acciones</th>
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_cliente=$row['Cli_Id'];
						$nombre_cliente=$row['Cli_Nombre'];
						$apellido_cliente=$row['Cli_Apellido'];
						$telefono_cliente=$row['Cli_Numero'];
						$email_cliente=$row['Cli_Correo']; 
							$edad=$row['Cli_Edad']; 
						$status_cliente=$row['Cli_Estado'];
						if ($status_cliente==1){$estado="Activo";}
						else {$estado="Inactivo";}
						$date_added= date('d/m/Y', strtotime($row['Cli_Fecha_Ingreso']));
						
					?>
					
					<input type="hidden" value="<?php echo $nombre_cliente;?>" id="nombre_cliente<?php echo $id_cliente;?>">
					<input type="hidden" value="<?php echo $telefono_cliente;?>" id="telefono_cliente<?php echo $id_cliente;?>">
					<input type="hidden" value="<?php echo $email_cliente;?>" id="email_cliente<?php echo $id_cliente;?>"> 
					<input type="hidden" value="<?php echo $status_cliente;?>" id="status_cliente<?php echo $id_cliente;?>">
              
			        <input type="hidden" value="<?php echo $apellido_cliente;?>" id="apellido_cliente<?php echo $id_cliente;?>">
					<input type="hidden" value="<?php echo $edad;?>" id="edad_cliente<?php echo $id_cliente;?>"> 
					
					<tr>
						
						<td><?php echo $nombre_cliente; ?></td>
						<td><?php echo $apellido_cliente; ?></td>
						<td ><?php echo $telefono_cliente; ?></td>
						<td><?php echo $email_cliente;?></td>
						 
						<td><?php echo $estado;?></td>
						<td><?php echo $date_added;?></td>
						
				<td>
					<div class="btn-group pull-right">
					<script type="text/javascript">
 
function procesar(xform){
window.open(xform, 'nventana', 'width=800,height=250,top=250,left=250,status=yes,resizable=yes,scrollbars=yes');
}
 
</script>
					    	<form action="./modal/vi_facturas.php" method="post" target="nventana" onsubmit="procesar(this.action);"> 
					    		<input type="hidden" name="a"value="<?php echo $id_cliente;?>">
					    		    <input type="submit" class="btn btn-info" value="Factura">  
					    	</form>
			
			</div>

				</td> 
					    
       <td >
					<a href="#" class="btn btn-info" title='Editar cliente' onclick="obtener_datos('<?php echo $id_cliente;?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
					<a href="#" class="btn btn-info" title='Borrar cliente' onclick="eliminar('<?php echo $id_cliente; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span></td>
						
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right">
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