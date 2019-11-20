<%-- 
    Document   : index
    Created on : 21-dic-2018, 14:34:07
    Author     : Ivan Mata
--%>

<%@page import="Models.Conexion"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
        <link href="imagenes/logo.png" rel="shortcut icon" type="images/x-icon"/>
        <title>Iniciar Sesion</title>
    </head>
    <body>
       <div class="container">
            <div class="login-logo off-canvas">
                <center><img src="imagenes/logo_paisa.png"  style="width: 200px;border-radius:150px;"></center>
            </div>
            <div class="form-container off-canvas">

                <form  class="form-signin" action="ServletLogin" method="post">
                    <h2>Iniciar Sesión</h2>
                    
                    <div class="form-group">
                        <label for="EmailAddress"><span>*</span> Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="EmailAddress" aria-required="true"  required>
                    </div>

                    <div class="form-group">
                        <label for="contraseña"><span>*</span> Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" id="contraseña" aria-required="true"  required>
                    </div>
                    
                    
                    

                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="btingreso">Ingresar</button>

                </form>
              <% 
             HttpSession sesion=request.getSession();
         Conexion co= new Conexion();
         if(request.getParameter("cerrar")!=null){
            sesion.invalidate();
        }
         %>
                
            </div> <!-- /container -->

        </div>
         <script src="js/jquery.js" type="text/javascript"></script>
         <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
