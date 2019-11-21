<?php
session_start();
require_once '../constantes.php';
require_once '../conexion.php';
iniciarPagina();
 ?>

 <!DOCTYPE html>
 <html lang="es" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>

     <form method="POST" action="form/view_report_pagos.php">
         <div class="container d-flex justify-content-center">
             <div class="card w-50">
                 <div class="card-header h3">Pagos Pendientes</div>
                 <div class="card-body">
                     <div class="">
                         <label class="font-weight-bold">Cedula del Estudiante</label><br>
                         <input type="txt" name="cedula" id="cedula" value="" onkeypress="return soloNumeros(event);" required="" maxlength="10" placeholder="Cedula" pattern="[0-9]+" autocomplete="off">
                     </div>
                     <br>
                     <button type="submit" name="g_reporte" class="btn btn-success">Generar Reporte</button>
                 </div>
             </div>
         </div>
     </form>

       <br>
       <form method="POST" action="form/view_report_pagosn.php">

         <div class="container d-flex justify-content-center">
             <div class="card w-50">
                 <div class="card-header h3">Pagos Pendientes</div>
                 <div class="card-body">
                     <div class="">
                         <label class="font-weight-bold">Nombre </label><br>
                         <input type="txt" name="nombre" value="" onkeypress="return soloLetras(event);"required="" maxlength="25" placeholder="Nombre"  autocomplete="off"><br><br>
                         <label class="font-weight-bold"> Apellidos</label><br>
                         <input type="txt" name="apellido" value="" onkeypress="return soloLetras(event);" required="" maxlength="25" placeholder="Apellido"  autocomplete="off">
                     </div>
                     <br>
                     <button type="submit" name="g_reporte" class="btn btn-success">Generar Reporte</button>
                 </div>
             </div>
         </div>
     </form>
   </body>
 </html>

 