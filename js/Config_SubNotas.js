/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function (){
    
   configNotas(idseq_calif); 
});

function configNotas(idseq_calif){
    
    $("#listado").hide();
    $("#subtareas").show();
    
    var idseq_calif = idseq_calif;
    var parametros ={
        "idseq_calif": idseq_calif
    }
    
    $.ajax({
        data: parametros,
        url :'../Models/CargarId.php',
        type: 'POST',
   
        success: function (datos) {
            $("#input").html(datos);
        }
        
        
    });
    
    $.ajax({
        data: parametros,
        url :'../Models/Consulta_Sub_Tarea.php',
        type: 'POST',
   
        success: function (datos) {
            $("#tablaSubTarea").html(datos);
        }
        
        
    });
    
    
}