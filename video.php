<?php

include("php/conexion.php");
$conexion=conexion();

//informacion de los productos
$cadena="SELECT video_id,
    video_titulo,
    video_url
FROM video";


$result=mysqli_query($conexion,$cadena);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Variedad de Producto</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css">
    <link rel="stylesheet" href="alertifyjs/css/alertify.css" />
    <link rel="stylesheet" href="alertifyjs/css/themes/default.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <!--<link rel="stylesheet" href="css/bootstrap.min.css" />-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    
	<link rel="stylesheet" href="css/medium-editor.css">
    <link rel="stylesheet" href="css/themes/bootstrap.css" id="medium-editor-theme">
    <script src="js/carrito.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="alertifyjs/alertify.js"></script>
 	<script src="js/parser_rules/advanced.js" ></script>
 	<script src="js/dist/wysihtml5-0.3.0.js" ></script>
   <script src="js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    
    

   
</head>
<body>
    
 
<div class="container">
    <div class="row">
		
 
        
        <div class="col-md-12">
        <br />
        <h4 class="titulo_h1">Editar Tipo de Variedad</h4>
        
        <div class="table-responsive">
              
              <table id="mytable" class="table table-bordred table-striped">
                 
                   <thead>
                   <button type="button" class="btn btn-primary btn-md" col data-toggle="modal" data-target="#modalnuevo">
 <span class="glyphicon glyphicon-plus" style="margin-bottom::-10px;"></span> Agregar Registro
</button>
                   <tr><th><input type="checkbox" id="checkall"></th>
                  
                   <th>ID Variedad</th>
                    <th>Nombre</th>
                    
                                         
                      <th>Editar</th>
                      <!-- <th>Borrar</th>-->
                   </tr></thead>
    <tbody>
   	<?php
    while($data=mysqli_fetch_assoc($result))
			{
				$datos=$data['video_url'];
				
	?>		
    <tr>
    <td><input type="checkbox" class="checkthis"></td>
    <td><?php echo $data['video_id'];
			
			?></td>
    <td><?php echo $data['video_titulo'];
			;?></td>
    <td>
    <a href="javascript:void(0);" data-toggle="modal" data-target="#modaledicion" onclick="carga_ajax('<?php echo $data['video_id'];
			
			?>','modal','modal_video.php');">Con Ajax</a>
    </td>
    </tr>
   
 <?php
			}?>
   
    
   
    
    </tbody>
          
</table>


  <!-- modal registro nuevo -->

<div class="modal fade" id="modalnuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Variedad de Productos</h4>
      </div>
      <div class="modal-body">
        <label>Nombre Variedad</label>
        <input type="text" name="nombre" id="nvariedad" class="form-control input-sm"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">Agregar</button>
        
      </div>
    </div>
  </div>
</div>

 <!-- modal edicion  datos-->

<div class="modal fade" id="modaledicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Datos</h4>
      </div>
      <div class="modal-body">
       <label>Id</label>
        <input type="text" name="id" id="id_var" class="form-control input-sm" disabled="disabled"/>
        <label>Nombre Variedad</label>
        <input type="text" name="nombre" id="nvariedadu" class="form-control input-sm"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizadatos">Actualizar</button>
        
      </div>
    </div>
  </div>
</div>

    
      	

<script type="text/javascript">
$(document).ready(function() {
    $('#guardarnuevo').click(function() {
		nombre=$('#nvariedad').val();
	
       agregardatos(nombre,'e'); 
	   
    });
	$('#actualizadatos').click(function() {
        actualizadatos();
    });
	
});

</script>  
 
 <script type="text/javascript">
$(document).ready(function() {
    $('#mytable').DataTable({
		language:{
   				 "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
}
	});
} );
</script>

   </body>
</html>