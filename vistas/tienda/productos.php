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
			include('vistas/incluir/p_menu.php'); 
		?>
	</header>

	<!--================Banner secundario=================-->
    <section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2><?php echo $titulo ?></h2>
					<div class="page_link">
						<a href="<?php echo $helper->url('tienda','inicio'); ?>">Inicio </a>
						<a >Lista de productos</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--================ Lista de productos =================-->
    <section id="productosCaja" class="feature_product_area">
        <div class="main_box">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach($pros as $pro) {?>
                        <div class="col-lg-3">
                            <div class="f_p_item">
                                <div class="f_p_img">
                                    <img class="img-fluid" src="<?php echo RUTAIMGPRODUCTOS ?>/<?php echo $pro['imagen']; ?>" alt="">
                                    <div class="p_icon">
                                        <a href="#">
                                            <i class="lnr lnr-heart"></i>
                                        </a>                                    
                                    </div>
                                </div>
                                <h5 style="padding-top: 10px"><?php echo $pro["nombre"]; ?></h5>
                                <a href="<?php echo $helper->url('tienda', 'agendar'); ?>&id=<?php echo $pro["id"]; ?>">
                                    <h4>Agendar por $<?php echo $pro["precio"]; ?></h4>
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
					<a class="page-link" href="<?php if($pags > 1) echo $helper->url('tienda', 'productos') . '&pag=1&cat=' . $cat ; else echo '#'; ?>">
						<i class="fa fa-chevron-left" aria-hidden="true"></i>
					</a>
				</li>
				<?php $i = 1; while ($i <= $pags) { ?>
					<li class="<?php if($i == $pag) echo 'page-item active'; else echo 'page-item' ?>">
						<a class="page-link" href="<?php if($i == $pag) echo '#'; else echo $helper->url('tienda', 'productos') . '&pag=' . $i . '&cat=' . $cat; ?>">
							<?php if($i > 9) echo $i; else echo "0" . $i; ?>								
						</a>
					</li>
				<?php $i++ ; } ?>				
				<li class="page-item">
					<a class="page-link" href="<?php if($pags > 1) echo $helper->url('tienda', 'productos') . '&pag=' . $pags . '&cat=' . $cat; else echo '#'; ?>">
						<i class="fa fa-chevron-right" aria-hidden="true"></i>
					</a>
				</li>
			</ul>
		</nav>
	</div>

	<!--================ Pie de pagina =================-->
	<footer class="subscription-area section_gap"> 
		<?php 
			include('vistas/incluir/p_pie.php');			
		?>
	</footer>

	<?php 
		include('vistas/incluir/jscripts.php');
	?>
	<script type="text/javascript">        
        $(".agendarLink").on('click', function(event) {             
             $("#formaCita").submit();
        });
    </script>	
</body>	

</html>