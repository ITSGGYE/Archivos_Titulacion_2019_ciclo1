/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function (){
    
   ListadoHistorialCuras();
    
});

function ListadoHistorialCuras(){
   
    $.ajax({
       url: '../Models/Modelo_Consulta_Historial_curas.php',
       type: 'POST',
       dataType: 'json',
       beforeSend: function () {
            $("#tablaHistorialCuras").html("Procesando, espere por favor...");
        },
        success: function (list) {

            var tr = "";

            list.forEach(function (list) {

                tr += "<tr>";
                tr += "<td>" + list.cura_cedula + "</td>";
                tr += "<td>" + list.cura_nombres + "</td>";
                tr += "<td>" + list.cura_fecha_nac + "</td>";
                tr += "<td><button class='btn btn-success' onclick='EditarDatosHistorial(" +list.cura_id+ ")' data-toggle='modal' data-target='#myModal'><i class='fa fa-edit'></i> Editar</button>\n\
                         <a class='btn btn-danger' href='javascript:eliminarDatosHistorial(" + list.cura_id + ")'><i class='fa fa-times'></i> Eliminar</a></td>";
                tr += "</tr>";
            });

            $("#tablaHistorialCuras").html(tr);

        }
       
    });
    
    
}


