<?php include('estilos2.php'); 
if(isset($_SESSION['admin']))
{
$admin_obtenido = unserialize($_SESSION['admin']);
}
?>
<link rel="stylesheet" href="css/headeradmin.css">

<div class="navbar-wrapper">
    <div class="container2">
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                   
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="administracion2.php" class="">Home</a></li>
                        <li class=" dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Productos <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                    <li><a href="productos.php">Add Productos</a></li>
                                    <li><a href="Categoria.php">Add Categoria</a></li>
                                    <li><a href="SubCategoria.php">Add Subcategoria</a></li>
                                    <li><a href="Marca.php">Add Marcas</a></li>
                                
                                
                            </ul>
                        </li>
                            <li class=" dropdown"><a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Clientes<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="Usuarios.php">Add Clientes</a></li>
                                <li><a href="">Consultas</a></li>
                            </ul>
                        </li>
                        <li class=" "><a href="Pedidos.php" >Pedidos</a>
                            
                        </li>
                        <li class=" down"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="reporteProductos.php">Productos</a></li>
                                <li><a href="Reportes_Usuarios.php">Clientes</a></li>
                                 <li><a href="mensajes.php">Mensajes</a></li>
                            </ul>
                        </li>
                        <?php  
                        if(isset($admin_obtenido)) {
                            echo '<li class=" down"><a href="#" class="table-cell-td" data-toggle="modal" data-target=".modal-logout"> <img class="img-circle" src="upload/'.$admin_obtenido['foto'].'" width="30" height="30">'.$admin_obtenido['nombre'].'  '.$admin_obtenido['apellido'].'  </a></li>'; 
                        }
                        ?>



                    </ul>
                    
                </div>
            </div>
        </nav>
    </div>
</div>

 <!-- Modal logout -->
    <div class="modal fade modal-logout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="padding: 20px;">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <br>
            <p class="text-center">¿Quieres cerrar la sesión?</p>
            <?php if (isset($admin_obtenido['nombre'])) {
            echo ' <p class="text-center">'.$admin_obtenido['nombre'].' '.$admin_obtenido['apellido'].'</p>';
            echo '<center> <img class="img-circle" src="upload/'.$admin_obtenido['foto'].'" width="80" height="80"></center> <br>' ; }
            else
                if (isset($usuario_obtenido['nombre']))
                echo ' <p class="text-center">'.$usuario_obtenido['nombre'].'</p>';
             ?>
            
            <p class="text-center">
                <a href="logout.php" class="btn btn-primary btn-sm">Cerrar la sesión</a>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
            </p>
          </div>
      </div>
    </div>
    <!-- Fin Modal logout -->