/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function GuardarUsuario(){
    
    var usuario = $("#usuario").val();
    var password = $("#password").val();
    var tipo_usuario = $("#tipo_usuario").val();
    
    
    var parametros = {
        "usuario": usuario,
        "password": password,
        "tipo_usuario": tipo_usuario
    }
    
    $.ajax({
        data: parametros,
        url: "../Models/GuardarUsuario.php",
        type: 'POST',
        success: function (respuesta) {
            
            alert(respuesta);
        }
        
    });
    
}
function LimpiarCampos(){
    $("#usuario").val("");
    $("#password").val("");
    
}