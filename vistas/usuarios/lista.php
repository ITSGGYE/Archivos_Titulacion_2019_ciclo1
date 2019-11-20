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
                        <a>Lista de Usuarios </a>
                        <button onclick="<?php echo "window.location.href = '" . $helper->url('usuarios', 'nuevo') . "';" ?>" class="genric-btn success small">Registar nuevo</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================Lista de usuarios=================-->
    <section style="margin-left: 10px; margin-right: 10px; margin-top: -40px">
        <div class="section-top-border">
            <div class="progress-table-wrap">
                <div class="progress-table">
                    <div class="table-head">
                    <div class="country">Codigo</div>
                        <div class="country">Nombres</div>
                        <div class="country">Correo</div>
                        <div class="country">Direccion</div>
                        <div class="visit">Acciones</div>
                    </div>
             
                    <?php foreach($usrs as $user) {?>
                        <div class="table-row">
                            <div class="country"><?php echo $user['codigo'] ?></div>
                            <div class="country"><?php echo $user['nombres'] ?></div>
                            <div class="country"><?php echo $user['correo'] ?></div>
                            <div class="country"><?php echo $user['direccion'] ?></div>
                            <div class="visit">
                                <a href="<?php echo $helper->url('usuarios', 'modificar'); ?>&id=<?php echo $user["id"]; ?>" class="genric-btn info-border small">
                                    <span class="lnr lnr-pencil"></span>
                                </a>
                                <?php if ($user['id'] > 1) {?>
                                    <a style="margin-right: 6px">
                                    <a onclick="<?php echo "if(confirm('Operacion irreversible: ¿Seguro de eliminar este usuario?')) window.location.href = '" . $helper->url('usuarios', 'borrar') . "&id=" . $user['id'] . "';" ?>" class="genric-btn danger-border small">
                                        <span class="lnr lnr-cross"></span>
                                    </a>
                                <?php } ?> 
                            </div> 
                        </div> 
                    <?php } ?>
                </div>
            </div>
        </div>    
    </section>    
    
    <?php 
        include('vistas/incluir/jscripts.php');
    ?>
    
</body> 

</html>