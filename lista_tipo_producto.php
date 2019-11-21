<?php
session_start();
//include("php/inicio_sesion.php");
include("php/conexion.php");
$conexion=conexion();




//informacion de los productos
$cadena="SELECT tipo_pro_id,
    tipo_pro_nombre,
	tipo_status
FROM tipo_producto
WHERE tipo_status='1';";

$result=mysqli_query($conexion,$cadena);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Tipo de Producto</title>
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
    <script src="js/funciones.js"></script>
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
        <h4 class="titulo_h1">Editar Tipo de Producto</h4>
        
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
                       <th>Borrar</th>
                   </tr></thead>
    <tbody>
   	<?php
    while($data=mysqli_fetch_assoc($result))
			{
				$datos=$data['tipo_pro_id']."||".$data['tipo_pro_nombre'];
				
	?>		
    <tr>
    <td><input type="checkbox" class="checkthis"></td>
    <td><?php echo $data['tipo_pro_id'];
			
			?></td>
    <td><?php echo $data['tipo_pro_nombre'];
			?></td>
    <td>
    
    <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#modaledicion" onclick="agregaform('<?php echo $datos ?>')"><span class="glyphicon glyphicon-pencil" ></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="preguntarsinop('<?php echo $data['tipo_pro_id'];?>')"><span class="glyphicon glyphicon-trash"></span></button></p></td>
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
      <form enctype="multipart/form-data">
        <label>Nombre Variedad</label>
        <input type="text" name="nombren" id="nvariedad" class="form-control input-sm"/>
        <label>Imagen</label>
        <input type="file" name="imagenn" id="imagenn" accept="image/*"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="nuevo">Agregar</button>
        
      </div>
      </form>
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
      <form enctype="multipart/form-data" id="formulario">
       <label>Id</label>
        <input type="text" name="id" id="id_var" class="form-control input-sm" disabled="disabled"/>
        <label>Nombre Variedad</label>
        <input type="text" name="nombre" id="nvariedadu" class="form-control input-sm"/>
        <label>Imagen</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" />
        
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="envio">Actualizar</button>
        
      </div>
       </form>
    </div>
  </div>
</div>

    
      	

<script type="text/javascript">
$(document).ready(function() {
    $('#guardarnuevo').click(function() {
		nombre=$('#nvariedad').val();
	
       agregardatosP(nombre,'e',imagenn); 
	   
    });
		
});

</script>  
<script language='javascript'>
			$(function(){
				$('#envio').on('click', function (e){
					e.preventDefault(); // Evitamos que salte el enlace.
					/* Creamos un nuevo objeto FormData. Este sustituye al 
					atributo enctype = "multipart/form-data" que, tradicionalmente, se 
					incluía en los formularios (y que aún se incluye, cuando son enviados 
					desde HTML. */
					var paqueteDeDatos = new FormData();
					/* Todos los campos deben ser añadidos al objeto FormData. Para ello 
					usamos el método append. Los argumentos son el nombre con el que se mandará el 
					dato al script que lo reciba, y el valor del dato.
					Presta especial atención a la forma en que agregamos el contenido 
					del campo de fichero, con el nombre 'archivo'. */
					paqueteDeDatos.append('imagen', $('#imagen')[0].files[0]);
					paqueteDeDatos.append('id', $('#id_var').prop('value'));
					paqueteDeDatos.append('nombre', $('#nvariedadu').prop('value'));
					var destino = "php/guardar_tipo_producto.php"; // El script que va a recibir los campos de formulario.
					/* Se envia el paquete de datos por ajax. */
					$.ajax({
						url: destino,
						type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
						contentType: false,
						data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
						processData: false,
						cache: false, 
						success: function(r){
							//document.write(r);
							if(r==1){
								var notification = alertify.notify('Grabacion Exitosa.Presione para continuar', 'success', 5, function(){  location.reload(); });
								
							}else{
								
								alertify.success("Ingreso Incorrecto");
							}
						
						}
					});
				});
			});
		</script>
 
 <!--Ingreso de nuevo producto -->
 <script language='javascript'>
 $(function(){
				$('#nuevo').on('click', function (e){
					e.preventDefault(); // Evitamos que salte el enlace.
					/* Creamos un nuevo objeto FormData. Este sustituye al 
					atributo enctype = "multipart/form-data" que, tradicionalmente, se 
					incluía en los formularios (y que aún se incluye, cuando son enviados 
					desde HTML. */
					var paqueteDeDatos = new FormData();
					/* Todos los campos deben ser añadidos al objeto FormData. Para ello 
					usamos el método append. Los argumentos son el nombre con el que se mandará el 
					dato al script que lo reciba, y el valor del dato.
					Presta especial atención a la forma en que agregamos el contenido 
					del campo de fichero, con el nombre 'archivo'. */
					paqueteDeDatos.append('imagen', $('#imagenn')[0].files[0]);
					paqueteDeDatos.append('nombre', $('#nvariedad').prop('value'));
					var destino = "php/guardar_tipo_producto.php"; // El script que va a recibir los campos de formulario.
					/* Se envia el paquete de datos por ajax. */
					$.ajax({
						url: destino,
						type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
						contentType: false,
						data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
						processData: false,
						cache: false, 
						success: function(r){
							//document.write(r);
							if(r==1){
								var notification = alertify.notify('Grabacion Exitosa.Presione para continuar', 'success', 5, function(){  location.reload(); });
								
							}else{
								
								alertify.success("Ingreso Incorrecto");
							}
						
						}
					});
				});
			});
</script>
 <!-- fin ingreso nuevo producto -->
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