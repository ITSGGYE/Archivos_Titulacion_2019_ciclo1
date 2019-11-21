
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1">
<link rel="stylesheet" href="css/form_recuperar.css" />

<!--<link rel="stylesheet" href="css/bootstrap.min.css" />-->
<link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/deber.js" type="application/javascript"></script>
<title>Registro de Compradores</title>
</head>

<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
					<a class='btn btn-primary' data-toggle='modal' data-target='#ingresousuario' href='#'>Ingreso</a> / <a class='btn btn-primary' data-toggle='modal' data-target='#registrousuario' href='#'>Registro</a>
                    
		</div>
	</div>
</div>
<!--Ingreso Usuario Modal -->
                    <div class="modal fade" id="ingresousuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="testbox_login">
       <h1>Login</h1>
            <form action="php/ingreso_user.php" method="post">
         
            	
                <label id="icon" for="cedula"><i class="icon-user"></i></label>
                	<input type="text" name="cedula" id="cedula" placeholder="Cedula" onKeyPress='return soloNumeros(event)' onblur="validar()" maxlength="10" required  />
                	<label id="icon" for="clave"><i class="fas fa-lock"></i></label>
                	<input type="password" name="clave" id="clave" placeholder="Contraseña" />
                <div class="form-group">
                	<div class="col-xs-12 text-right">
        			<input type="submit" name="ingresar" value="Ingresar" />
                    </div>
		        </div>
                
                
            </form>
           
      	</div>
        
      </div>
      
      <div class="modal-footer">
      	
         <div class="form-group">
             <div class="col-xs-6 text-center alert-success">
        		 
                     <a data-toggle='modal' data-target='#registrousuario' href="#" data-dismiss="modal" >Registro</a>
                 
             </div>
             <div class="col-xs-6 text-center alert-success">
        		 
                     <a href="recuperar_pas.php" >Olvido Contraseña ?</a>
                
             </div>
		 </div>
      </div>
    </div>
  </div>
</div>
<!--Fin Ingreso Usuario-->

<!--Regisgtro Usuario Modal -->
<div class="modal fade" id="registrousuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="testbox">
  <h1>Registro</h1>

  <form action="php/registrar_user.php" method="post">
      <hr>
   <label id="icon" for="cedula"><i class="icon-user"></i></label>
  <input type="text" name="cedula" id="cedula1" placeholder="Cedula" onKeyPress='return soloNumeros(event)' onblur='validar()' maxlength="10" required />
  <label id="icon" for="name"><i class="icon-user "></i></label>
  <input type="text" name="nombre" id="name" placeholder="Nombre" onKeyUp='mayus(this)'  onKeyPress='return soloLetras(event)'/>
  <label id="icon" for="apellidos"><i class="icon-user"></i></label>
  <input type="text" name="apellido" id="apellido" placeholder="Apellido" onKeyUp='mayus(this)'  onKeyPress='return soloLetras(event)' required/>
  <label id="icon" for="direccion"><i class="icon-globe"></i></label>
  <input type="text" name="direccion" id="direccion" placeholder="Direccion" onKeyUp='mayus(this)' required/>
  <label id="icon" for="telefcon"><i class="fa fa-phone" aria-hidden="true"></i></label>
  <input type="tel" name="telefono" id="telefcon" placeholder="Telefono"  required maxlength="9"/>
  <label id="icon" for="telefcel"><i class="fa fa-mobile" aria-hidden="true"></i></label>
  <input type="tel" name="celular" id="telefcel" placeholder="Celular" maxlength="10"  required/>
  <label id="icon" for="email"><i class="icon-envelope"></i></label>
  <input type="email" name="correo" id="correo" placeholder="E-Mail"  required/>
  <label id="icon" for="pass"><i class="icon-shield"></i></label>
  <input type="password" name="password" id="pass" placeholder="Contraseña"  required/>
  <input type="submit" class="btn btn-deep-orange" value="Ingresar" class="buttonp"> 
  <button type="button" class="btn btn-success buttonp" data-dismiss="modal">Cerrar</button>
  </form> 
</div>
      
      <div class="modal-footer d-flex">
        <br />
      </div>
    </div>
  </div>
</div>


<!--FIN Regisgtro Usuario Modal -->
</html>