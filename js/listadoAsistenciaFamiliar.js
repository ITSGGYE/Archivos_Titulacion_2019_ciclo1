/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function BuscarEstudiante(){
    
    
    var idcurso= $("#idcurso").val();
    var Mes= $("#Mes").val();
    var idmateria= $("#idmateria").val();
    var nombreEstudiante= $("#nombreEstudiante").val();
    
    var parametros = {
        
        "idcurso":idcurso,
        "Mes":Mes,
        "idmateria":idmateria,
        "nombreEstudiante":nombreEstudiante
    }
    
    $.ajax({
       data:parametros,
       url:'../Models/ConsultaAsistenciaFamilia.php',
       type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
           $("#Listado_AsistenciaFamiliar").html("Procesando, espere por favor..."); 
        },
       success: function (listado) {
             var tr = "";
            var contador = 1;
            listado.forEach(function (listado) {

                tr += "<tr>";
                tr += "<td>" + contador + "</td>";
                tr += "<td>" + listado.nombresEstudiante + "</td>";
                tr += "<td>" + listado.Asistencia + "</td>";
                tr += "<td>" + listado.fechaRegistro + "</td>";
                tr += "</tr>";

                contador++;
            });

            $("#Listado_AsistenciaFamiliar").html(tr);
       }
       
        
    });
}