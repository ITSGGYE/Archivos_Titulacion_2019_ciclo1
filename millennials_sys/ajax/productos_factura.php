 <?php

 
	require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../config/conexion.php");//Contiene funcion que  
	$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
	if($action == 'ajax'){
		// escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		 $aColumns = array('Servi_Nombre');//Columnas de busqueda
		 $sTable = "servicios";
		 $sWhere = "";
		if ( $_GET['q'] != "" )
		{
			$sWhere = "WHERE (";
			for ( $i=0 ; $i<count($aColumns) ; $i++ )
			{
				$sWhere .= $aColumns[$i]." LIKE '%".$q."%' and Servi_Estado=1 OR ";
			}
			$sWhere = substr_replace( $sWhere, "", -3 );
			$sWhere .= ')';
		}
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 5; //how much records you want to show
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './nueva_factura.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			
			?>
			<div class="table-responsive">
			 
			  <table class="table">

				<tr  class="warning">
			 
					<th class='text-center'>Servicio</th>			
					<th><span style="text-align: center;">Estilista</span></th>
					<th><span class='text-center'>Precio</span></th>
					 <th class='text-center' style="width: 36px;">Agregar</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
					$id_producto=$row['Servi_Id']; 
					$nombre_producto=$row['Servi_Nombre'];
					//$precio_venta=$row["precio_producto"];$precio_venta=number_format($precio_venta,2,'.','');
					?>
	   	<tr>
						 
						<td style="text-align: center;"><?php echo $nombre_producto; ?></td>
						<td class="col-sm-4">
						
           
			               <select class='form-control' name='cantidad' id="cantidad_<?php echo $id_producto; ?>"  required>
						<option value=""> </option>
							<?php 
								$query_categoria=mysqli_query($con,"select * from estilistas where Esti_Estado=1 order by Esti_Nombre  ");
							while($rw=mysqli_fetch_array($query_categoria))	{
								?>
							<option value="<?php echo $rw['Esti_Id'];?>"><?php echo $rw['Esti_Nombre'];?></option>			
								<?php
							}
							?>
					</select>			  
				 
		 

                                 </td>
						
						<td class='col-xs-2'><div class="pull-right">
						<input type="text" maxlength="7" class="form-control" style="text-align:right" id="precio_venta_<?php echo $id_producto; ?>"  value=" " required>
						</div></td>
						<td class='text-center'><a class='btn btn-info'href="#" onclick="agregar('<?php echo $id_producto ?>')"><i class="glyphicon glyphicon-plus"></i></a></td>
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=5><span class="pull-right">
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