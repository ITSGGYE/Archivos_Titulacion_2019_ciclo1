 <?php
		if (isset($title))
		{
	?>
<nav class="navbar navbar-default ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Millennials Sistema</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav">

      <li style="color: white;" class="<?php echo $active_inicio;?>"><h4>Millennials Centro Estético</h4>   <span class="sr-only">(current)</span> </li>

       </ul>





      <ul class="nav navbar-nav navbar-right">


 <li class="<?php echo $active_inicio;?>"><a href="inicio.php"><i ><img width="20px" src="img/home.png"></i> Inicio <span class="sr-only">(current)</span></a></li>
  <?php 
        if($_SESSION['rol'] == 1){
    
 
      
       ?>
  
          <li class="<?php echo $active_sucursales;?>"><a href="sucursales.php"><i ><img width="20px" src="img/sucursales.png"></i> Sucursales</a></li>
          <li class="<?php echo $active_productos;?>"><a href="productos.php"><i ><img width="20px" src="img/servicios.png"></i>Servicios</a></li>
          <li class="<?php echo $active_usuarios;?>"><a href="usuarios.php"><i ><img width="20px" src="img/usuarios.png"></i> Usuarios</a></li> 
          <li class="<?php echo $active_facturas;?>"><a href="facturas.php"><i ><img width="20px" src="img/factura.png"></i> Facturas <span class="sr-only">(current)</span></a></li>
          <li class="<?php echo $active_clientes;?>"><a href="clientes.php"><i ><img width="20px" src="img/cliente.png"></i> Clientes</a></li>
          <li class="<?php echo $active_Frecuentes;?>"><a href="frecuentes.php" ><i ><img width="20px" src="img/tijeras.jpg"></i> Estilistas</a></li>
          <li class="<?php echo $active_configuracion;?>"><a href="reportes.php"><i ><img width="20px" src="img/reporte.png"></i> Reportes</a></li>
  

  <?php } ?>




   <?php 
 
         if($_SESSION['rol'] == 2){
      
       ?>   
          <li class="<?php echo $active_facturas;?>"><a href="facturas.php"><i ><img width="20px" src="img/factura.png"></i> Facturas <span class="sr-only">(current)</span></a></li>
          <li class="<?php echo $active_clientes;?>"><a href="clientes.php"><i ><img width="20px" src="img/cliente.png"></i> Clientes</a></li>
                <li class="<?php echo $active_configuracion;?>"><a href="reportes.php"><i ><img width="20px" src="img/reporte.png"></i> Reportes</a></li>
    


        <?php } ?>
        <?php 
 
         if($_SESSION['rol'] == 3){
      
       ?>

    


        <?php } ?>
		<li><a href="loguot.php"><i ><img width="20px" src="img/exit.png"></i> Salir</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>  
	<?php
		}
	?>