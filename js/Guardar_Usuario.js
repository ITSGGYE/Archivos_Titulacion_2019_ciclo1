/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function GuardarUsuario(){
    
    var usuario = $("#usuario").val();
    var rol_id = $("#rol_id").val();
    var password = $("#password").val();
    
    
    var parametros = {
        "usuario":usuario,
        "rol_id":rol_id,
        "password":password
    }
    
    $.ajax({
       data: parametros,
       url: "../Models/ModeloGuardarUsuario.php",
       type: 'POST',
        success: function (respuesta) {
            
            alert(respuesta);
            LimpiarCampos();
        }
       
    });
    
}
function LimpiarCampos(){
    $("#usuario").val("");
    $("#rol_id").val("");
    $("#password").val("");
    
}

