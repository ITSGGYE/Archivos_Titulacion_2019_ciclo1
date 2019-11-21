<?php
//include("php/inicio_sesion.php");
include("php/inicio_sesion.php");
include("php/conexion.php");
$conexion=conexion();

usuario_adm();
//informacion de los productos
$consulta="SELECT id_ingreso,
    pass_ingreso,
    user_ingreso,
    nombre_ingreso,
    apellido_ingreso,
    cedula_ingreso,
    email_ingreso,
   status_ingreso
FROM ingreso_adm;";

$result=mysqli_query($conexion,$consulta);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>Editar Producto</title>
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
     <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
   <script type="text/javascript" src=" https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
 <script type="text/javascript">
 function copiarDatos(){

 var desc_actualziada = document.getElementById("descripcion").value;
 window.parent.document.getElementById('desc_act').value = desc_actualziada;

}
 function copiarDatosID(){

 var desc_actualziada =<?php echo $data['prod_id']?>;
 window.parent.document.getElementById('id_temp').value = desc_actualziada;

}
 </script>  
    
   
</head>
<body>
   

<div class="container">
    <div class="row">
		
        
        <div class="col-md-12">
        <h4 class="titulo_h1">Editar Usuario</h4>
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <tr>
                   <th>Cedula</th>
                    <th>Nombre</th>
                     <th>Apellido</th>
                     <th>E-mail</th>
                     <th>Activo</th>
                      
                      <th>Edit</th>
                       <th>Delete</th>
                   </tr></thead>
    <tbody>
   	<?php
    while($data=mysqli_fetch_assoc($result))
			{
	?>		
    <tr>
    
    <td><?php echo $data['cedula_ingreso']?></td>
    <td><?php echo $data['nombre_ingreso']?></td>
    <td><?php echo $data['apellido_ingreso']?></td>
    <td><?php echo $data['email_ingreso']?></td>
    <td>
	<?php echo $data['status_ingreso']?>
    		</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="editar_usuario_mto.php?id='<?php echo $data['cedula_ingreso']?>'"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil" ></span></button></a></p></td>
    <td>
    
    <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="preguntarsinopr('<?php echo $data['cedula_ingreso'];?>')"><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
   
     
   <?php
			}
			?>
    
   
    
    </tbody>
        
</table>


   
	


    
    
    
    
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