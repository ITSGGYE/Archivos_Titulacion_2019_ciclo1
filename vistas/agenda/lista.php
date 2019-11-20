<?php include("vistas/incluir/autenticacion.php"); ?> 

<!doctype html>

<html lang="es">

<head>
	<?php 
		include('vistas/incluir/cabecera.php'); 
	?>
</head>

<body>

	<!--================ Encabezado - Menu =============-->
	<header class="header_area">
		<?php 
			include('vistas/incluir/menu.php'); 
		?>
	</header>

	<!--================Banner secundario=================-->
    <section class="banner_micro">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="banner_content">
                    <div class="page_link"> 
                        <a>Citas agendadas </a>
                        <button onclick="<?php echo "window.location.href = '" . $helper->url('agenda', 'nuevo') . "&origen=lista';" ?>" class="genric-btn success small">Registar nuevo</button>
                    </div>
                    <div class="text-right" style="margin-top: -26px">
		    			<a onclick="window.print(); return false;" class="genric-btn default small">Imprimir</a>
		    			<a href="<?php echo $helper->url('agenda', 'exportarCitas'); ?>" class="genric-btn default small">Exportar</a>
			        </div>
                </div>
            </div>            
        </div>
    </section>    
    <!--================Lista de citas=================-->
    <section style="margin-left: 10px; margin-right: 10px; margin-top: -40px">
        <div class="section-top-border"> 
            <div class="progress-table-wrap">
                <div class="progress-table"> 
                    <div class="table-head"> 
                        <div class="visit">Fecha / Hora</div>
                        <div class="visit">Cliente</div>
                        <div class="visit">Producto</div>
                        <div class="visit">Estilista</div>                        
                        <div class="serial">Precio</div>
                        <div class="visit">Acciones</div>
                    </div>
             
                    <?php foreach($citas as $cita) {?>
                        <div class="table-row">
                            <div class="visit"><?php echo $cita['fecha'] ?></div>
                            <div class="visit"><?php echo $cita['clienteNom'] ?></div>
                            <div class="visit"><?php echo $cita['productoNom'] ?></div>
                            <div class="visit"><?php echo $cita['estilistaNom'] ?></div>
                            <div class="serial"><?php echo $cita['precio'] ?></div>
                            <div class="visit">
                                <a href="<?php echo $helper->url('agenda', 'modificar'); ?>&id=<?php echo $cita["id"]; ?>" class="genric-btn info-border small">
                                    <span class="lnr lnr-pencil"></span>
                                </a>                                
                                <a style="margin-right: 6px">
                                <a onclick="<?php echo "if(confirm('Operacion irreversible: ¿Seguro de eliminar esta cita?')) window.location.href = '" . $helper->url('agenda', 'borrar') . "&id=" . $cita['id'] . "';" ?>" class="genric-btn danger-border small">
                                    <span class="lnr lnr-cross"></span>
                                </a>
                            </div> 
                        </div> 
                    <?php } ?>
                </div>
            </div>
        </div>    
    </section> 
	
	<!--================ Paginacion =================-->	
	<div class="row" style="margin-bottom: 30px">
		<nav class="cat_page mx-auto" aria-label="Paginas">
			<ul class="pagination">				
				<li class="page-item">
					<a class="page-link" href="<?php if($pags > 1) echo $helper->url('agenda', 'lista') . '&pag=1'; else echo '#'; ?>">
						<i class="fa fa-chevron-left" aria-hidden="true"></i>
					</a>
				</li>
				<?php $i = 1; while ($i <= $pags) { ?>
					<li class="<?php if($i == $pag) echo 'page-item active'; else echo 'page-item' ?>">
						<a class="page-link" href="<?php if($i == $pag) echo '#'; else echo $helper->url('agenda', 'lista') . '&pag=' . $i; ?>">
							<?php if($i > 9) echo $i; else echo "0" . $i; ?>								
						</a>
					</li>
				<?php $i++ ; } ?>				
				<li class="page-item">
					<a class="page-link" href="<?php if($pags > 1) echo $helper->url('agenda', 'lista') . '&pag=' . $pags; else echo '#'; ?>">
						<i class="fa fa-chevron-right" aria-hidden="true"></i>
					</a>
				</li>
			</ul>
		</nav>
	</div>

	<?php 
		include('vistas/incluir/jscripts.php');
	?>	
</body>	

</html>
