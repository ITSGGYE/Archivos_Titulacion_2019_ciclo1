<!doctype html>

<?php include("vistas/incluir/autenticacion.php"); ?> 

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
                        <a>Mensajes de contacto </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<!--================Lista de clientes=================-->
    <section style="margin-left: 10px; margin-right: 10px; margin-top: -40px">
        <div class="section-top-border"> 
            <div class="progress-table-wrap"> 
                <div class="progress-table"> 
                    <div class="table-head"> 
                        <div class="country">Fecha</div>
                        <div class="country">Nombres</div>
                        <div class="country">Correo</div>
                        <div class="country">Telefonos</div>
                        <div class="visit">Acciones</div>
                    </div>
             
                    <?php foreach($mens as $men) {?>
                        <div class="table-row">
                            <div class="country"><?php echo $men['fecha'] ?></div>
                            <div class="country"><?php echo $men['nombres'] ?></div>
                            <div class="country"><?php echo $men['correo'] ?></div>
                            <div class="country"><?php echo $men['telefono'] ?></div>
                            <div class="visit">
                                <a href="<?php echo $helper->url('tienda', 'mensajever'); ?>&id=<?php echo $men["id"]; ?>" class="genric-btn info-border small">
                                    <span class="lnr lnr-eye"></span>
                                </a>                                
                                <a style="margin-right: 6px">
                                <a onclick="<?php echo "if(confirm('Operacion irreversible: ¿Seguro de eliminar este mensaje?')) window.location.href = '" . $helper->url('tienda', 'mensajeborrar') . "&id=" . $men['id'] . "';" ?>" class="genric-btn danger-border small">
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
					<a class="page-link" href="<?php if($pags > 1) echo $helper->url('tienda', 'mensajes') . '&pag=1'; else echo '#'; ?>">
						<i class="fa fa-chevron-left" aria-hidden="true"></i>
					</a>
				</li>
				<?php $i = 1; while ($i <= $pags) { ?>
					<li class="<?php if($i == $pag) echo 'page-item active'; else echo 'page-item' ?>">
						<a class="page-link" href="<?php if($i == $pag) echo '#'; else echo $helper->url('tienda', 'mensajes') . '&pag=' . $i; ?>">
							<?php if($i > 9) echo $i; else echo "0" . $i; ?>								
						</a>
					</li>
				<?php $i++ ; } ?>				
				<li class="page-item">
					<a class="page-link" href="<?php if($pags > 1) echo $helper->url('tienda', 'mensajes') . '&pag=' . $pags; else echo '#'; ?>">
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
