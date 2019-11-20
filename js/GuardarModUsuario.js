/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function EditarUsuario(){
    
    var idusuario = $("#idusuario").val();
    var usuario = $("#usuario").val();
    var rol_id = $("#rol_id").val();
    var password = $("#password").val();
    
    
    var parametros = {
        "idusuario":idusuario,
        "usuario":usuario,
        "rol_id":rol_id,
        "password":password
    }
    
    $.ajax({
       data: parametros,
       url: "../Models/ModeloGuardarModUsuario.php",
       type: 'POST',
        success: function (respuesta) {
            
            alert(respuesta);
        }
       
    });
    
    
    
}