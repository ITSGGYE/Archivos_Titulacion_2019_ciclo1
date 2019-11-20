/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function BuscarEstudiantes(){
    
    
    var idcurso = $("#idcurso").val();
    var idmateria = $("#idmateria").val();
    var idseq_profesor = $("#idseq_profesor").val();
    var idRango = $("#idRango").val();
    var idPeriodo = $("#idPeriodo").val();
    
    if(idcurso === "" && idmateria === "" && idseq_profesor === "" && idRango === "" && idPeriodo === ""){
        alert("Todos los campos son obligatorios seleccione toda la información requerida");
        return false;
    }
    
    var parametros = {
        "idcurso": idcurso,
        "idseq_profesor": idseq_profesor,
        "idmateria": idmateria,
        "idRango": idRango,
        "idPeriodo": idPeriodo
    }
    
    $.ajax({
        data: parametros,
        url: "../Models/Consulta_ListadoEstudiantesNotas.php",
        type: 'POST',
        dataType: 'json',
        beforeSend: function () {
            $("#ListadoEstudianteNotas").html("Procesando, espere por favor...");
        },
        success: function (listado) {
            
            var tr="";
            var contador =1;
            
            tr += "<thead>";
            tr += "<tr>";
            tr += "<th>N°</th>";
            tr += "<th>Nombre Estudiantes</th>";
            tr += "<th style='text-align:center;'>Ver Notas</th>";
            tr += "</tr>";
            tr += "</thead>";
            
            listado.forEach(function (listado) {

                tr += "<tr>";
                tr += "<td>" + contador + "</td>";
                
                tr += "<td style='display:none;'>" + listado.idEstudiante + "</td>";
                tr += "<td>" + listado.nombresEstudiante + "</td>";
               
                tr += "<td style='text-align:center;'><input type='radio' name='idEstudiante' onclick='consultaNotas("+listado.idEstudiante+")'></td>";
                
                tr += "</tr>";
                
                contador ++;
            });

            $("#ListadoEstudianteNotas").html(tr);
            
        }
        
    });
    
    
}