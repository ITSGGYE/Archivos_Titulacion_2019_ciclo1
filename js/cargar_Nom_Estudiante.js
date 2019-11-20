/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function cargarEstudiante(idEstudiante){
    
    var parametros = {
        "idEstudiante": idEstudiante
    }
    
    $.ajax({
       data: parametros,
       url:'../Models/Cargar_nom_Estudiante.php',
       type: 'POST',
        
        beforeSend: function () {
            $("#inputs").html("Procesando, espere por favor...");
        },
        success: function (listado) {
            $("#inputs").html(listado);
            $("#btnCancelar").click();
        }
    });
    
    
}