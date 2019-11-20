/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function (){
    
   
    listaPeriodos();
    
});

function listaPeriodos(){
    
      $.ajax({
        url: '../Models/Consultar_periodo.php',
        type: 'POST',
        dataType: 'json',

        beforeSend: function () {
            $("#td").html("Procesando, espere por favor...");
        },
        success: function (listado) {

            var tr = "";

            listado.forEach(function (listado) {

                tr += "<tr>";
                tr += "<td>" + listado.nombrePeriodo + "</td>";
                tr += "<td>" + listado.duracionPeriodo + "</td>";
                tr += "<td>" + listado.YearPeriodo + "</td>";
                tr += "<td>" + listado.descripcionPeriodo + "</td>";
                tr += "<td><a class='btn btn-success' href='EditarPeriodos.php?id="+listado.idPeriodo+" '><i class='fa fa-edit'></i></a>\n\
                         <a class='btn btn-danger' href='javascript:eliminarPeriodo("+listado.idPeriodo+")'><i class='fa fa-times'></i></a></td>";
                tr += "</tr>";
            });

            $("#tablaListadoPeriodos").html(tr);

        }

    });
}