<?php
//include("php/inicio_sesion.php");
include("php/conexion.php");
$conexion=conexion();
//informacion de los productos
$cadena="SELECT variedad_id,
    variedad_nombre,
    variedad_creado,
    variedad_actualizado,
    variedad_status
FROM variedad
WHERE variedad_status='1';";

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
    <link rel="stylesheet" href="http://yui.yahooapis.com/2.9.0/build/reset/reset-min.css">
	<link rel="stylesheet" href="css/stylesheet.css">
    
	<link rel="stylesheet" href="css/medium-editor.css">
    <link rel="stylesheet" href="css/themes/bootstrap.css" id="medium-editor-theme">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="alertifyjs/alertify.js"></script>
 	<script src="js/parser_rules/advanced.js" ></script>
 	<script src="js/dist/wysihtml5-0.3.0.js" ></script>
    

   
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>

<div class="container">
    <div class="row">
		
        
        <div class="col-md-12">
        <h4 class="titulo_h1">Editar Tipo de Variedad</h4>
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <tr><th><input type="checkbox" id="checkall"></th>
                   <th>ID Variedad</th>
                    <th>Nombre</th>
                    
                                         
                      <th>Edit</th>
                       <th>Delete</th>
                   </tr></thead>
    <tbody>
   	<?php
    while($data=mysqli_fetch_assoc($result))
			{
	?>		
    <tr>
    <td><input type="checkbox" class="checkthis"></td>
    <td><?php echo $data['variedad_id'];
			$x_id_var=$data['variedad_id'];
			?></td>
    <td><?php echo $data['variedad_nombre'];
			$x_name_var=$data['variedad_nombre'];?></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil" ></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="copiarDatosID()"><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
   
 <?php
			}?>
   
    
   
    
    </tbody>
        
</table>

<!--Pantalla de Edicion-->

  


    
 <!-- Pantalla de Eliminacion -->   
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Borrar Registro</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Seguro quiere borrar este registro?</div>
       
      </div>
        <div class="modal-footer ">
        <form action="php/eliminar_producto.php" method="get">
<input type="text" name="id" id="id_temp" value="<?php echo $x_id_var?>" />
        <span class="glyphicon glyphicon-ok-sign" ><input type="submit" class="btn btn-success"value="Si" onclick="copiarDatosID()" /></span>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
        </form>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
     
      <!-- /.modal-dialog --> 
      	

<script>
$(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
});

</script>    

   </body>
</html>