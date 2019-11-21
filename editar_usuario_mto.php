<?php
session_start();
//include("php/inicio_sesion.php");
include("php/conexion.php");
$conexion=conexion();

$x_cedula=$_REQUEST['id'];
$consulta="SELECT id_ingreso,
    pass_ingreso,
    user_ingreso,
    nombre_ingreso,
    apellido_ingreso,
    cedula_ingreso,
    email_ingreso,
   status_ingreso
FROM ingreso_adm
WHERE cedula_ingreso=$x_cedula;";
//echo $consulta;
$resultado=mysqli_query($conexion,$consulta);
$filas_usuario=mysqli_num_rows($resultado);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" href="css/style.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="http://yui.yahooapis.com/2.9.0/build/reset/reset-min.css">
 <link rel="stylesheet" href="css/stylesheet.css">
 <script src="js/parser_rules/advanced.js" ></script>
 <script src="js/dist/wysihtml5-0.3.0.js" ></script>
 <script language='javascript' src='js/deber.js'></script>

<title>Ingreso Producto</title>
</head>

<body>


<section>
	<div class="container-fluid">
    	<div class="container">
        	<div class="col-sm-12">
                        	<h1 class="titulo_h1">Editar Usuario</h1>
            </div>
        	<div class="form-box" style="margin-top:140px;">
            	<?php
					if($filas_usuario>0){
				?>
            	
            	<form action="php/editar_usuario_mto.php" method="post" enctype="multipart/form-data">
                	<?PHP
						
						while($row = mysqli_fetch_assoc($resultado))
						{
					?>
            		<div class="row">
                    	<div class="col-sm-8" >
                            	<div class="inputbox">
                                	
                                	<div class="InputText ">Cedula</div>
                                    	
                                        <input type="text" name="cedula" autofocus id="cedula" class="input" onKeyPress='return soloNumeros(event)' onblur="validar()" maxlength="10" required value="<?php echo $row['cedula_ingreso'];?>" readonly="readonly"/>
                                       
                                </div>
                                	
                            </div>
                       
                      </div> 
                      <div class="row">
                      	<div class="col-sm-6">
                            	<div class="inputbox" >
                                <div class="InputText focus">Nombres</div>
                                    	<input type="text" name="nombre" id="nombre"  class="input"  onkeypress="return soloLetras(event)" required="required" value="<?php echo $row['nombre_ingreso'];?>"/>
                                	
                                </div>
                            </div>
                             <div class="col-sm-6">
                            	<div class="inputbox">
                                	<div class="InputText focus">Apellidos</div>
                                   
                                    <input type="text" name="apellido" id="apellido"  class="input" onkeypress="return soloLetras(event)" required="required" value="<?php echo $row['apellido_ingreso'];?>"/>
                                            
                                	
                                 </div>
                               </div>
                      </div>  
                      <div class="row">
                      <div class="col-sm-4">
                            	<div class="inputbox">
                                	<div class="InputText focus">E-mail</div>
                                    
                                         <input type="email" name="email" id="email"  class="input" placeholder="alguien@correo.com" required="required" value="<?php echo $row['email_ingreso'];?>"/> 
                                       
                                    
                                 </div>
                               </div>
                               <div class="col-sm-4">
                            	<div class="inputbox">
                                	<div class="InputText focus">Usuario</div>
                                    <input type="text" name="usuario" id="usuario" maxlength="8" class="input"  value="<?php echo $row['user_ingreso'];?>" required="required" readonly="readonly"/>
                                 </div>
                               </div>
                             <div class="col-sm-4">
                            	<div class="inputbox">
                                	<div class="InputText focus" >Password</div>
                                    	
                                        <input type="password" name="password" id="password" maxlength="10" class="input" placeholder="Maximo 10 caracteres" required="required"/>
                                        
                                        
                                </div>
                            </div> 
                      </div>
                      <div class="row">
                         	
                         	<div class="col-sm-6" align="center">
                            	<input type="submit" value="&nbsp; Grabar &nbsp;" class="btn-lg text-center btton" />
                            </div>
                            <div class="col-sm-6 " align="center">
                            	<input type="reset" value="Cancelar" class="btn-lg text-center btton" onclick="location.href = 'lista_edicion_user_mto.php'"  />
                            </div> 
                            
                         </div>
					<?php
						}
						?>
                       	
               </form>
               <?php
					}else{?>
						<br />
		<div class="alert alert-danger">
        	No existen Registros
        </div>
					<?php
					}
					?>
                    
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript">
	$(".input").focus(function(){
		$(this).parent().addClass("focus");
	}).blur(function(){
		if($(this).val()===''){
		$(this).parent().removeClass("focus");		
		}
		else
		{
			$(this).parent().addClass("focus");}
		})
</script>
</body>
</html>