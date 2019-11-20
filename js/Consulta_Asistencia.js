/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function consultaAsistencia(){
    
    var idcurso = $("#idcurso").val();
    var idseq_profesor = $("#idseq_profesor").val();
    var fechaRegistro = $("#fechaRegistro").val();
    
    
    var parametros = {
        "idcurso": idcurso,
        "idseq_profesor": idseq_profesor,
        "fechaRegistro": fechaRegistro   
    }
    
    $.ajax({
       data: parametros,
       url:'../Models/Consulta_Asistencia.php',
       type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
           $("#Listado_Asistencia").html("Procesando, espere por favor..."); 
        },
       success: function (listado) {
             var tr = "";
            var contador = 1;
            listado.forEach(function (listado) {

                tr += "<tr>";
                tr += "<td>" + contador + "</td>";
                tr += "<td>" + listado.nombresEstudiante + "</td>";
                tr += "<td>" + listado.Asistencia + "</td>";
                tr += "</tr>";

                contador++;
            });

            $("#Listado_Asistencia").html(tr);
       }
       
        
    });
    
}