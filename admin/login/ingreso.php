<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Acceso Biblioteca</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>

    <style type="text/css">
body
{
    background: #000; 
    padding-top: 50px;
}


.input-group-addon
{
    background-color: rgb(50, 118, 177);
    border-color: rgb(40, 94, 142);
    color: rgb(255, 255, 255);
}
.form-control:focus
{
    background-color: rgb(50, 118, 177);
    border-color: rgb(40, 94, 142);
    color: rgb(255, 255, 255);
}
.form-signup input[type="text"],.form-signup input[type="password"] { border: 1px solid rgb(50, 118, 177); }
.alert-danger-alt { border-color: #B63E5A;background: #E26868;color: #fff; }
    </style>
  </head>

  <body>
<div class="container">

    <div class="row" style="padding-top:0;">

        <div class="col-md-6" style="margin-left:25%; margin-top:1%;">

           <br>
           <br>
            <div class="panel panel-default" >
              <div style="margin:0;"><a href="../../index.php"><img src="../images/exit.png" width="" title="Salir" width="20" height="20"></a></div>
                <div class="panel-body">
                           <div style=""><img src="../images/banerLogo1.png" width=""></div>
                           <br>
                     <div align="center">
                      <h3><B> Formulario de Acceso</B></h3>

                     <img src="../images/pass.png" width="">
                   <br>
                       <br>
                     </div>
                    <form class="form form-signup" role="form" method="post" action="entrar.php">
                      <?php
            if(isset($errorLogin)){
                echo $errorLogin;
            }
        ?>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" name="username"  id="username" required= "required" placeholder="Usuario" />
                        </div>
                    </div>
              
                </div>
               <div align="center"><B><input type="submit" name="Submit" value="Ingresar"  class="btn btn-sm btn-primary"></B></div>
               <br>
               </form>
            </div>

        </div>
    </div>
</div>
</div> 


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php //include "../../visitas/log.php"; ?>
