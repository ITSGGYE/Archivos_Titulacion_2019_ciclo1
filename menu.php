<?php
session_start();
include('php/conexion.php');
$conexion=conexion();
$usuario_mtos=$_SESSION['usuario_mto'];
//echo "user".$usuario_mtos;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/menuv.css" rel="stylesheet" />
<title>Documento sin título</title>
</head>

<body>
<div align="center">
<img src="images/logo.png" width="40%"  alt="langoquil" style=" margin-top:10px;"/> </div>
<div class="middle">
	<div class="menu">
    	<li class="item" id="producto">
        	<a href="#producto" class="btn"><i class="fa fa-product-hunt" aria-hidden="true"></i>
Producto</a>
            <div class="smenu">
            	<a href="ingreso_producto.php" target="mainFrame">Nuevo</a>
                <a href="lista_edicion_tprod.php" target="mainFrame">Editar</a>
            </div>
        </li>
        
        <li class="item" id="tprod">
        	<a href="#tprod" class="btn"><i class="fa fa-text-width" aria-hidden="true"></i>
Categoria</a>
            <div class="smenu">
            	
                <a href="lista_tipo_producto.php" target="mainFrame">Agregar/Editar</a>
            </div>
        </li>
        <li class="item" id="variedad">
        	<a href="#variedad" class="btn"><i class="fa fa-vimeo-square" aria-hidden="true"></i>
Variedad Camaron</a>
            <div class="smenu">
            	<a href="lista_edicion_tvaried.php" target="mainFrame">Agregar/Editar</a>
            </div>
        </li>
        <li class="item" id="stock">
        	<a href="#stock" class="btn"><i class="fa fa-stack-overflow" aria-hidden="true"></i>
Stock</a>
            <div class="smenu">
            	<a href="lista_edicion_stock.php" target="mainFrame">Actualizar</a>
             </div>
        </li>
        <li class="item" id="ventas">
        	<a href="#ventas" class="btn"><i class="fa fa-money" aria-hidden="true"></i>
Ventas</a>
            <div class="smenu">
            	<a href="lista_atencion_pedidos.php" target="mainFrame">Procesar</a>
             </div>
        </li>
        <li class="item" id="videos">
        	<a href="#videos" class="btn"><i class="fa fa-video-camera" aria-hidden="true"></i>
Videos</a>
            <div class="smenu">
            	<a href="lista_videos.php" target="mainFrame">Editar/Agregar</a>
                
            </div>
        </li>
        <?php
		
		if($usuario_mtos=='admin'){
			?>
      <li class="item" id="usuario">
        	<a href="#usuario" class="btn"><i class="fa fa-user-circle-o" aria-hidden="true"></i>
Usuario</a>
			<div class="smenu">
            	<a href="ingreso_usuario_mto.php" target="mainFrame">Nuevo</a>
                <a href="lista_edicion_user_mto.php" target="mainFrame">Editar</a>
            </div>
            
        </li>
        <?php
		}
		?>
        <li class="item">
        	<a href="php/cerrar_sesion.php" class="btn"><i class="fa fa-sign-out" aria-hidden="true"></i>
Cerrar Sesión</a>
            
        </li>
    </div>
</div>

</body>
</html>
