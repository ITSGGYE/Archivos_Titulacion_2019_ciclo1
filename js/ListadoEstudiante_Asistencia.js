/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function BuscarEstudiante() {
    
    var idcurso = $("#idcurso").val();
    var idseq_profesor = $("#idseq_profesor").val();
    var idmateria = $("#idmateria").val();
    
    var parametros ={
       "idcurso":idcurso,
       "idseq_profesor":idseq_profesor,
       "idmateria":idmateria
    }
    $.ajax({
        data: parametros,
        url: '../Models/Consulta_Estudiantes_Asistencia.php',
        type: 'POST',
        dataType: 'json',

        beforeSend: function () {
            $("#tablaAsistencia").html("Procesando, espere por favor...");
        },
        success: function (listado) {

            var tr = "";
            var contador = 1;
            listado.forEach(function (listado) {

                tr += "<tr>";
                tr += "<td>" + contador + "</td>";
                tr += "<td style='display:none;'>" + listado.idEstudiante + "</td>";
                tr += "<td style='display:none;'>" + listado.idcurso + "</td>";
                tr += "<td style='display:none;'>" + listado.idmateria + "</td>";
                tr += "<td style='display:none;'>" + listado.idseq_profesor + "</td>";
                tr += "<td>" + listado.nombresEstudiante + "</td>";
                tr += "<td>";
                tr += "<select class='form-control'>";
                tr += "<option value=''>Seleccione</option>";
                tr += "<option value='SI'>Si</option>";
                tr += "<option value='NO'>No</option>";
                tr += "<option value='ATRASADO'>ATRASADO</option>";
                tr += "</select>";
                tr += "</td>";
                tr += "</tr>";

                contador++;
            });

            $("#tablaAsistencia").html(tr);

        }

    });
}


