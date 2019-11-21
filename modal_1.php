<?php
session_start();
include("php/conexion.php");
include("php/encripdecrip.php");
$conexion=conexion();

//informacion de los productos
$cadena="SELECT video_id,
    video_titulo,
    video_url
FROM video";


$result=mysqli_query($conexion,$cadena);

?>
<!DOCTYPE html>
<html lang="es">
<head>
        <meta charset="utf-8" />
        <title>Videos Recetarios</title>
         <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/templatemo_misc.css">
<link rel="stylesheet" href="css/templatemo_style.css">
<link rel="stylesheet" href="css/styleProducto.css" />
<link rel="stylesheet" href="alertifyjs/css/alertify.css" />
<link rel="stylesheet" href="alertifyjs/css/themes/default.css" />
<link href="css/all.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="alertifyjs/alertify.js"></script>
<link rel="shortcut icon" href="favicon.ico" />
<script src="js/jquery-1.11.1.min.js"></script>  <!-- lightbox -->
	<!--<script src="js/templatemo_custom.js"></script>
    
      lightbox -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.lightbox.js"></script>
    <script src="js/bootstrap-collapse.js"></script> 
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/carrito.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
   <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
   <script type="text/javascript" src=" https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

        
    </head>
    <body>
    <?php include("menu_catalogo.php");?>
<?php include("php/presentar_sesion.php");?>

    <div class="table-responsive">
              
             
    <!--modal-->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ventana normal</h4>
      </div>
      <div class="modal-body">
        <h1>Texto #manosenelcódigo</h1>
      </div>
      <div class="modal-footer">
            <h4>pie de página</h4>
      </div>
    </div>
  </div>
</div>
<!--/modal-->
        <div class="container">
            <div class="row">
              <div class="templatemo_homewrapper_carrito">
                <h1 >RECETARIO</h1>
              
              <div class="panel-body">
                <ul>
                    
                    <li>
                    <div class="panel panel-primary">
                     <table id="mytable" class="table table-bordred table-striped">
                 
                   <thead>
                  
                   <tr><th><input type="checkbox" id="checkall"></th>
                  
                   <th>ID </th>
                    <th>Titulo</th>
                    
                                         
                      <th>Ver</th>
                      <!-- <th>Borrar</th>-->
                   </tr></thead>
    <tbody>
   	<?php
	$num=0;
    while($data=mysqli_fetch_assoc($result))
			{
				$datos=$data['video_url'];
				$num=$num+1;	
	?>		
    <tr>
    <td></td>
    <td><?php echo $data['video_id'];
			
			?></td>
    <td><?php echo $data['video_titulo'];
			;?></td>
    <td>
   <a href="javascript:void(0);" data-toggle="modal" data-target="#modal" onclick="carga_ajax('<?php echo $data['video_id'];?>','modal','ajax_1.php');"><span class="glyphicon glyphicon-search" style="margin-bottom::-10px;"></span></a>
    </td>
    </tr>
   
 <?php
			}?>
   
    
   
    
    </tbody>
          
</table>
					</div>
                    </li>
                </ul>
              </div>
              </div>
            </div>
        </div>
  <!-- footer start -->
       <?php include("foot_catalogo.php");?>
        <!-- footer end -->      
        
    <script src="talle/public/js/jquery-1.10.2.js"></script>
    <script src="talle/public/js/bootstrap.min.js"></script>
    <script src="js/funciones1.js"></script>
    </body>
</html>
