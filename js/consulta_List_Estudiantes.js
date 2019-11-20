/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function ConsultarDatos(idseqParcial){
    
    var idseqParcial = idseqParcial;
    var idseq_calif = $("#idseq_calif").val();
    var idcurso = $("#idcurso").val();
    var idmateria = $("#idmateria").val();
    var idRango = $("#idRango").val();
    var idProfesor = $("#idProfesor").val();
    var idPeriodo = $("#idPeriodo").val();
    
    var parametros1 ={
         "idmateria": idmateria,
         "idcurso": idcurso
     }
     $.ajax({
        data: parametros1,
        url: '../Models/Consulta_Estudiantes_Curso.php',
        type: 'POST',
        dataType: 'json',

        beforeSend: function () {
            $("#tablaEstudiantes").html("Procesando, espere por favor...");
        },
        success: function (listado) {

            var tr = "";
            var contador= 1 ;
            listado.forEach(function (listado) {

                tr += "<tr>";
                tr += "<td>" + contador + "</td>";
                tr += "<td style='display:none;'>" + listado.idEstudiante + "</td>";
                tr += "<td>" + listado.nombresEstudiante + "</td>";
                tr += "<td>";
                tr += "<select class='form-control' id='notaEstudiante' >";
                tr += "<option value=''>Seleccione nota</option>";
                tr += "<option value='0'>0</option>";
                tr += "<option value='1'>1</option>";
                tr += "<option value='2'>2</option>";
                tr += "<option value='3'>3</option>";
                tr += "<option value='4'>4</option>";
                tr += "<option value='5'>5</option>";
                tr += "<option value='6'>6</option>";
                tr += "<option value='7'>7</option>";
                tr += "<option value='8'>8</option>";
                tr += "<option value='9'>9</option>";
                tr += "<option value='10'>10</option>";
                tr += "</select>";
                tr += "</td>";
                tr += "<td style='display:none;'>" + idRango + "</td>";
                tr += "<td style='display:none;'>" + idProfesor + "</td>";
                tr += "<td style='display:none;'>" + idseqParcial + "</td>";
                tr += "<td style='display:none;'>" + idseq_calif + "</td>";
                tr += "<td style='display:none;'>" + idcurso + "</td>";
                tr += "<td style='display:none;'>" + idmateria + "</td>";
                tr += "<td style='display:none;'>" + idPeriodo + "</td>";
                tr += "</tr>";
                
                contador = contador + 1;
            });

            $("#tablaEstudiantes").html(tr);

        }

    });
    
}