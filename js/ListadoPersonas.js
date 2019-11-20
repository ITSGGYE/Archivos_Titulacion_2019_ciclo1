/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
    
   ListPersona();
    
});

function ListPersona(){
     $.ajax({
       
       url:'../Models/ListadoPersonas.php',
       type: 'POST',
        dataType: 'json',
       success: function (listado) {
       
         var tr = "";

            listado.forEach(function (listado) {
                tr += "<tr>";
                tr += "<td>" + listado.per_cedula + "</td>";
                tr += "<td>" + listado.per_nombre + "</td>";
                tr += "<td>" + listado.per_direccion + "</td>";
                tr += "<td>" + listado.per_fecha_nac + "</td>";
                tr += "<td>" + listado.per_lugarNacimiento + "</td>";
                tr += "<td>";
                tr += "<a class='btn btn-success' href='EditarPersona.php?id=" + listado.per_cedula + " ' '><i class='fa fa-edit'></i></a>";
                tr += "<br><br>";
                tr += "<button class='btn btn-danger' onclick='EliminarPersona("+listado.per_cedula+")' ><i class='fa fa-trash-o'></i></button>";
                tr += "</td>";
                tr += "</tr>";
            });

            $("#ListPersonas").html(tr);
           
       }
       
   });
    
}
