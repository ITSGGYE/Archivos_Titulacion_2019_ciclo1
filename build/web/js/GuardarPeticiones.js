/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function GuardarPeticion(){
    
    var usuario = $("#usuario").val();
    var mensaje = $("#mensaje").val();
    var fechaActual = $("#fechaActual").val();
    
    var parametro = {
        "usuario": usuario,
        "mensaje": mensaje,
        "fechaActual": fechaActual  
        
    }
    
    $.ajax({
        data:parametro,
        url:'ServletGuardarPeticion',
        type: 'POST',
        success: function (respuesta) {
            
            alert(respuesta);
            $("#cerrarModal").click();
        }
        
        
    })
    
    
}


