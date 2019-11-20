/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function (){
    
   BuscarGrupo(); 
});

function BuscarGrupo() {

    var idGrupo_pastoral = $("#idGrupo_pastoral").val();

    var parametros = {
        "idGrupo_pastoral": idGrupo_pastoral

    }
    $.ajax({
        data: parametros,
        url: '../Models/ModeloConsulta_Grupos.php',
        type: 'POST',
        dataType: 'json',

        beforeSend: function () {
            $("#td").html("Procesando, espere por favor...");
        },
        success: function (list) {

            var tr = "";

            list.forEach(function (list) {

                tr += "<tr>";
                tr += "<td>" + list.nombresIntegrante + "</td>";
                tr += "<td>" + list.EdadIntegrante + "</td>";
                tr += "<td>" + list.DireccionIntegrante + "</td>";
                tr += "<td>" + list.nombresGrupo + "</td>";
                tr += "<td>" + list.RolIntegrante + "</td>";
                tr += "<td><a class='btn btn-success' href='../Administrador/Form_Edit_ListGrupo.php?id=" + list.idseq_Contenedor + " '><i class='fa fa-edit'></i> Editar</a>\n\
                         <a class='btn btn-danger' href='javascript:eliminarDatos(" + list.idseq_Contenedor + ")'><i class='fa fa-times'></i> Eliminar</a></td>";
                tr += "</tr>";
            });

            $("#tablaListadoGrupos").html(tr);

        }

    });

}

