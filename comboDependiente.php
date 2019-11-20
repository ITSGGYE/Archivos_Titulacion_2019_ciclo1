<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Select</title>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/combosDependientes.js" type="text/javascript"></script>
        <script src="js/comboselect.js" type="text/javascript"></script>
        
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <div class="container">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control" id="Departamentos" onchange="Cargar()">

                        </select>
                        <br><br>

                    </div>
                    <div class="form-group">
                        <select class="form-control" id="Empleados">

                        </select>
                    </div>
                </div>
            </div>
        </div>

        
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
