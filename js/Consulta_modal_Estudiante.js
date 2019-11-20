/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function btnCargarDatos(){
    
    $.ajax({
        
        url :'../Models/Consulta_Estudiante_modal.php',
        type: 'POST',
        dataType: 'json',
        beforeSend: function () {
            $("#tablaLista").html("Procesando, espere por favor...");
        },
        success: function (listado) {
            
            var tr = "";
            
            listado.forEach(function (listado) {

                tr += "<tr>";
                tr += "<td>" + listado.nombresEstudiante + "</td>";
                tr += "<td>" + listado.edad + "</td>";
                tr += "<td><button class='btn btn-success' onclick='cargarEstudiante("+listado.idEstudiante+")' ><i class=''></i> Cargar</button></td>";
                tr += "</tr>";
            });

            $("#tablaLista").html(tr);
            
        }
        
        
    });
    
}