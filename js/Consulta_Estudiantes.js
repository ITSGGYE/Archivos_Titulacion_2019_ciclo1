/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function (){
    
   
    listaEstudiante();
    
});

function listaEstudiante(){
    
      $.ajax({
        url: '../Models/Consulta_Estudiantes.php',
        type: 'POST',
        dataType: 'json',

        beforeSend: function () {
            $("#tablaListadoEstudiantes").html("Procesando, espere por favor...");
        },
        success: function (listado) {

            var tr = "";

            listado.forEach(function (listado) {

                tr += "<tr>";
                tr += "<td>" + listado.nombresEstudiante + "</td>";
                tr += "<td>" + listado.edad + "</td>";
                tr += "<td>" + listado.direccion + "</td>";
                tr += "<td><a class='btn btn-success' href='../DOCENTE/EditarEstudiante.php?id=" + listado.idEstudiante + " '><i class='fa fa-edit'></i></a>\n\
                         <a class='btn btn-danger' href='javascript:eliminarEstudiante(" + listado.idEstudiante + ")'><i class='fa fa-times'></i></a></td>";
                tr += "</tr>";
            });

            $("#tablaListadoEstudiantes").html(tr);

        }

    });
}