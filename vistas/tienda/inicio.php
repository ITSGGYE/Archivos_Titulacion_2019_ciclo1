<!doctype html>
<html lang="es">

<head>
    <?php 
        include('vistas/incluir/cabecera.php'); 
    ?>  
    <style >
        .texto-promo {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background-color: black;
            color: white;
            padding-left: 20px;
            padding-right: 20px;
            opacity: 0.75;
        }
        .texto-promo h4 {
            color: white;
        }
        .texto-promo p {
            color: gray;
        }
    </style>
</head>

<body>

    <!--================ Encabezado - Menu =============-->
    <header class="header_area">
        <?php 
            include('vistas/incluir/p_menu.php'); 
        ?>
    </header>
    
    <!--================ Area de Banner =================-->
    <section class="home_banner_area">
        <div class="overlay"></div>
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="offset-lg-2 col-lg-8">
                        <h3>D'Kristel
                            <br />Peluqueria y est&eacute;tica</h3>
                        <p>Peluqueria - Uñas - Maquillje.</p>
                        <a class="btn btn-light" href="#productosCaja">Ver promociones</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================ Categorias =================-->
    <section class="hot_deals_area section_gap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hot_deal_box">
                        <img class="img-fluid" src="otros/img/product/hot_deals/peluqueria.jpg" alt="">
                        <div class="content">
                            <h2>Peluqueria</h2>
                            <p>Ver productos</p>
                        </div>
                        <a class="hot_deal_link" href="<?php echo $helper->url('tienda','peluqueria'); ?>"></a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hot_deal_box">
                        <img class="img-fluid" src="otros/img/product/hot_deals/maquillaje.jpg" alt="">
                        <div class="content">
                            <h2>Maquillaje</h2>
                            <p>Ver productos</p>
                        </div>
                        <a class="hot_deal_link" href="<?php echo $helper->url('tienda','spa'); ?>"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>  

    <!--================ Productos en promocion =================-->
    <section id="productosCaja" class="feature_product_area section_gap">
        <div class="main_box">
            <div class="container-fluid">
                <div class="row">
                    <div class="main_title">
                        <h2>Ahora en promociones</h2>
                        <p>Lo mejor de la belleza al mejor precio</p>
                    </div>
                </div>
                <div class="row">
                    <?php foreach($pros as $pro) {?>
                        <div class="col-lg-3">
                            <div class="f_p_item">
                                <div class="f_p_img">
                                    <img class="img-fluid" src="<?php echo RUTAIMGPRODUCTOS ?>/<?php echo $pro['imagen']; ?>" alt="">
                                    <!--div class="p_icon">
                                        <a href="#">
                                            <i class="lnr lnr-heart"></i>
                                        </a>                                    
                                    </div-->
                                    <div class="texto-promo">
                                        <h4><?php echo $pro["porcentaje"] . "% Desc."; ?></h4>
                                        <p><?php echo "Antes: $ " . $pro["anterior"]; ?></p>
                                    </div>
                                </div>
                                <h5><?php echo $pro["nombre"] ; ?></h5>
                                <a href="<?php echo $helper->url('tienda', 'agendar'); ?>&id=<?php echo $pro["producto"]; ?>">
                                    <h4>Agendar por $<?php echo intval($pro["precio"]) ; ?></h4>    
                                </a>
                            </div>
                        </div>
                    <?php } ?>                    
                </div>
            </div>
        </div>
    </section>

    <!--================ Pie de pagina =================-->
    <footer class="subscription-area section_gap"> 
        <?php 
            include('vistas/incluir/p_pie.php');           
        ?>
    </footer>

    <?php 
        include('vistas/incluir/jscripts.php');
    ?>  
</body> 

</html>