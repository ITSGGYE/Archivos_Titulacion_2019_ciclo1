
<div class="col-sm-3"> <!--/Inicio de barra lateral izquierda-->
					<div class="left-sidebar">
						<h2>Categorias</h2>
					   <?php
                       //include ('../admin/conexion.php');
//consulta para extraer la informacion de los libros en la base de datos
                  $consult=mysqli_query($conexion," SELECT  * from categorias ");
                  $consul=mysqli_query($conexion," SELECT  * from suscriptores ");
                  $consu=mysqli_query($conexion," SELECT  * from subcategorias ");
					?>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
								<?php
											while($filas=mysqli_fetch_array($consult)){
												echo '
												<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										
										<a data-toggle="collapse"  href="menu.php">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											'.$filas['nombre_categoria'].'
										</a>
                                        </h4>
								</div>	
							</div>
										';
										 } ?>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>TEMAS</h2>
							<div class="brands-name">
								<?php
											while($filase=mysqli_fetch_array($consu)){
												echo '
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right"></span>'.$filase['nombre_subcategoria'].'</a></li>
								
								</ul>
							';
										 } ?>
							
						 </div>
						</div><!--/brands_products-->

						<div class="brands_products"><!--Noticias-->
							<h2>SUSCRIPTORES</h2>
							<div class="brands-name">
								<?php
											while($filae=mysqli_fetch_array($consul)){
												echo '
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right"></span>'.$filae['nombre_completo'].'</a></li>
								</ul>';
										 } ?>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Visitas</h2>
							<div class="col-md-4">
							    <img src="images/home/visitas.png" width="60" height="60">
							</div>
							<div class="col-md-8">
							<h5><b><?php  echo $numero_visitas;?> Visitas Totales</b></h5>
							<h6><b><?php  echo $visitas_hoy;?> Visitas Hoy</b></h6>
						</div>
						</div><!--/price-range-->					
					</div>
				</div> <!--fin de barra lateral izquierda-->