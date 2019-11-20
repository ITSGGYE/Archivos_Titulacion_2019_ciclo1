<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../js/GuardarUsuario.js" type="text/javascript"></script>
        
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <script src="../js/login.js" type="text/javascript"></script>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../css/estilo.css" rel="stylesheet" type="text/css"/>
        <title>Formulario Registro</title>
    </head>
    <body class="bg-image">

        <div class="container">    

            <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 

                <div class="row">                
                    <center><img src="../img/imglogo.jpeg" style="width: 170px;height: 150px;"></center>
                </div>

                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title text-center">Formulario de Registro</div>
                    </div>     

                    <div class="panel-body" >


                        <div id="form">

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" class="form-control" id="usuario"  placeholder="User">                                        
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>                                                                  
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select class="form-control" id="tipo_usuario" >
                                    <option value="">Selecciona un privilegio</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="usuario">Profesor</option>
                                    <option value="representante">Familiar</option>
                                </select>
                            </div>
                           
                            <div class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls">
                                    <button type="button"  class="btn btn-primary pull-right" onclick="GuardarUsuario()"><i class="fa fa-save"></i> Registrarse</button>                          
                                </div>
                            </div>

                        </div>   
                    </div>                     
                </div>  
            </div>
        </div>

       
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>