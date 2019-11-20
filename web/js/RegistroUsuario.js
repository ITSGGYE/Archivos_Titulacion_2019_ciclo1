/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function GuardarUsuario(){
    
    var usuario = $("#usuario").val();
    var contrasena = $("#contrasena").val();
    var nivel = $("#nivel").val();
    
    var parametros ={
        "usuario":usuario,
        "contrasena":contrasena,
        "nivel":nivel
        
    }
    $.ajax({
        data: parametros,
        url:'../ServletGuardarUsuario',
        type: 'POST',
        success: function (respuest) {
            alert(respuest);
            LimpiarCampos();
        }
        
    })
    
}

function LimpiarCampos(){
    
     $("#usuario").val("");
     $("#contrasena").val("");
     $("#nivel").val("");
}