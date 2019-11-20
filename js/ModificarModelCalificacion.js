/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function ModificarDatos(){
    
    var idseq_calif = $("#idseq_calif").val();  
    var nombrecalif = $("#nombrecalif").val();
    var descripcioncalif = $("#descripcioncalif").val();
    
    var parametro = {
         "idseq_calif":idseq_calif,
         "nombrecalif":nombrecalif,
         "descripcioncalif":descripcioncalif   
    }
    
    $.ajax({
       data:parametro,
       url:'../Models/ModificarModelCalificacion.php',
        type: 'POST',
        success: function (respuesta) {
            alert(respuesta);
        }
        
    });
    
}