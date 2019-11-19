    <?php
 
	session_start();

	if (!isset($_SESSION['active']) AND $_SESSION['active'] != true) {
         include("is_logged.php"); 
		exit;
        }        
$Rol_Id=$_SESSION['rol'];

 $sucursal_cliente=$_SESSION['Sucur_Id'];
   
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if (isset($_GET['id'])){
		$numero_factura=intval($_GET['id']);
		$nu="2";
		$del1="UPDATE factura SET Fac_Estado='".$nu."'  WHERE Det_Numero='".$numero_factura."'"; 
		if ($delete1=mysqli_query($con,$del1) ){
			?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente
			</div>
			<?php 
		}else {
			?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se puedo eliminar los datos
			</div>
			<?php
			
		}
	}
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		  $sTable = "factura, clientes, usuarios";
		 $sWhere = "";

		
   if($_SESSION['rol'] == 2){
    
 		 $sWhere.=" WHERE factura.Cli_Id=clientes.Cli_Id and factura.User_Id=usuarios.User_Id and factura.Sucur_Id=$sucursal_cliente and factura.Fac_Estado=1";
		
   }  

   if($_SESSION['rol'] == 1){
    
 
       $sWhere.=" WHERE factura.Cli_Id=clientes.Cli_Id and factura.User_Id=usuarios.User_Id and factura.Fac_Estado=1";
   } 


		if ( $_GET['q'] != "" )
		{
	 $sWhere.= " and  (concat(clientes.Cli_Nombre,' ',clientes.Cli_Apellido) like '%$q%' or factura.Det_Numero like '%$q%')";
			
		}
		
		$sWhere.=" order by factura.Fac_Id desc";
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
		$reload = './facturas.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th>#</th> 
					<th>Fecha</th>
					<th>Hora</th>
					<th>Sucursal</th>
					<th>Cliente</th>
					<th>Digitador</th>
					<th>Estado</th>

					<th>Total</th>
						<th>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAcciones</th> 
					
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id_factura=$row['Fac_Id'];
						$numero_factura=$row['Det_Numero'];
						$fecha=date("d/m/Y", strtotime($row['Fac_Fecha']));
						$fecha1=date($row['Fac_Hora']);
						$nombre_cliente=$row['Cli_Nombre']." ".$row['Cli_Apellido'];
						$telefono_cliente=$row['Cli_Numero'];
						$email_cliente=$row['Cli_Correo'];
						$nombre_vendedor=$row['User_Nombre']." ".$row['User_Apellido'];
						$estado_factura=$row['Fac_Estado'];
						if ($estado_factura==1){$text_estado="Activa";$label_class='label-success';}
						else{$text_estado="Inactiva";$label_class='label-warning';}
						$total_venta=$row['Fac_Total'];



							$query_categoria=mysqli_query($con,"select * from factura where Det_Numero=$numero_factura");
							while($rw=mysqli_fetch_array($query_categoria))	{
			 
								 $sucursal=$rw['Sucur_Id']; 
				$qa=mysqli_query($con,"select * from sucursales where Sucur_Id=$sucursal ");
							while($rw=mysqli_fetch_array($qa))	{
						 
	                             $su=$rw['Sucur_Nombre'];
				 

							}	 
 

			  ?> 
					<tr>
				 
						<td><?php echo $id_factura; ?></td>
						<td><?php echo $fecha; ?></td>
						<td><?php echo $fecha1; ?></td>
						<td><?php echo $su; ?></td>
						<td><a href="#" data-toggle="tooltip" data-placement="top" title="<i class='glyphicon glyphicon-phone'></i> <?php echo $telefono_cliente;?><br><i class='glyphicon glyphicon-envelope'></i>  <?php echo $email_cliente;?>" ><?php echo $nombre_cliente;?></a></td>

						<td><?php echo $nombre_vendedor; ?></td>

						<td><span class="label <?php echo $label_class;?>"><?php echo $text_estado; ?></span></td>

						<td><?php echo ($total_venta); ?></td>					
	 	  <td class="">

							<form style=" " action="editar_factura.php" method="POST">	
						<input class='btn btn-info' style="width: 22px; border:1px solid white" type="hidden" name="a" value="<?php echo "$id_factura";?>">
						<input class='btn btn-info' type="submit" name="submit" value="Editar Factura">
					 <a href="#" class='btn btn-info' title='Borrar factura' onclick="eliminar('<?php echo $numero_factura; ?>')"><i class="glyphicon glyphicon-trash"></i> </a>
					</td>
         
						  	
					</tr></form>	 
					<?php
				}			}
				?>
				<tr>
					<td colspan=7><span class="pull-right"><?php
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>