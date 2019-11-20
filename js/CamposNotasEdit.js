/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    var idcurso = $("#idcurso").val();
    var idmateria = $("#idmateria").val();
    var idseq_profesor = $("#idseq_profesor").val();
    var idRango = $("#idRango").val();
    var idPeriodo = $("#idPeriodo").val();
    var idEstudiante = $("#idEstudiante").val();

    if (idcurso === "" && idmateria === "" && idseq_profesor === "" && idRango === "" && idPeriodo === "" && idEstudiante == "") {

        alert("todos los campos son obligatorios");
        return false;
    }

    var parametros = {
        "idcurso": idcurso,
        "idseq_profesor": idseq_profesor,
        "idmateria": idmateria,
        "idRango": idRango,
        "idPeriodo": idPeriodo,
        "idEstudiante": idEstudiante
    }

    $.ajax({
        data: parametros,
        url: "../Models/ModelEditNotas.php",
        type: 'POST',
        dataType: 'json',
        success: function (listaEdit) {
            var tr = "";


            listaEdit.forEach(function (listaEdit) {

                tr += "<tr>";
                tr += "<td style='display:none'><input type='hidden'  class='form-control' id='idEstudiante' value=" + idEstudiante + "></td>";
                tr += "<td style='display:none'><input type='hidden'  class='form-control' id='idPeriodo' value=" + idPeriodo + "></td>";
                tr += "<td style='display:none'><input type='hidden'  class='form-control' id='idRango' value=" + idRango + "></td>";
                tr += "<td style='display:none'><input type='hidden' class='form-control' id='idseq_profesor' value=" + idseq_profesor + "></td>";
                tr += "<td style='display:none'><input type='hidden' class='form-control' id='idmateria' value=" + idmateria + "></td>";
                tr += "<td style='display:none'><input type='hidden' class='form-control' id='idcurso' value=" + idcurso + "></td>";
                tr += "<td style='display:none'><input type='hidden' class='form-control' id='idseq_calif' value=" + listaEdit.idseq_calif + "></td>";
                tr += "<td style='display:none'><input type='hidden' class='form-control' id='idseqParcial' value=" + listaEdit.idseqParcial + "></td>";
                tr += "<td>" + listaEdit.nombrecalif + "</td>";
                tr += "<td><input type='text'  class='form-control' id='Nota' value=" + listaEdit.Nota + "></td>";
                tr += "</tr>";


            });


            $("#camposNotas").html(tr);
        }

    });


});