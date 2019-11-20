/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    listadoRangos();


});

function listadoRangos(){
    $("#idPeriodo").change(function () {
        var idPeriodo = $(this).val();

        var parametros = {
            "idPeriodo": idPeriodo
        }


        $.ajax({
            data: parametros,
            url: '../Models/Consulta_Rangos.php',
            type: 'POST',
            dataType: 'json',

            beforeSend: function () {
                $("#tablaListadoRangos").html("Procesando, espere por favor...");
            },
            success: function (listado) {

                var tr = "";

                listado.forEach(function (listado) {

                    tr += "<tr>";
                    tr += "<td>" + listado.nombreRango + "</td>";
                    tr += "<td>" + listado.duracionRango + "</td>";
                    tr += "<td>" + listado.fechaInicioRango + "</td>";
                    tr += "<td>" + listado.fechaFinRango + "</td>";
                    tr += "<td>" + listado.nombrePeriodo + "</td>";
                    tr += "<td><a class='btn btn-success' href='../DOCENTE/EditarRango.php?id=" + listado.idRango + " '><i class='fa fa-edit'></i></a>\n\
                               <a class='btn btn-danger' href='javascript:eliminarRango(" + listado.idRango + ")'><i class='fa fa-times'></i> </a></td>";
                    tr += "</tr>";
                });

                $("#tablaListadoRangos").html(tr);

            }

        });

    });
    
}

