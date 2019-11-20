/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function GuardarMantenimiento(){
    
    var igle_codigo = $("#igle_codigo").val();
    var igle_nombre = $("#igle_nombre").val();
    var igle_direccion = $("#igle_direccion").val();
    var cura_id = $("#cura_id").val();
    var igle_usuario = $("#igle_usuario").val();
    var igle_fechaModificacion = $("#igle_fechaModificacion").val();
    
    var parametros = {
        "igle_codigo": igle_codigo,
        "igle_nombre": igle_nombre,
        "igle_direccion": igle_direccion,
        "cura_id": cura_id,
        "igle_usuario": igle_usuario,
        "igle_fechaModificacion": igle_fechaModificacion
    }
    
    $.ajax({
       data: parametros,
       url:'../Models/GuardarMantenimiento.php',
       type: 'POST',
       success: function (Response) {
            alert(Response);
            
       }
    });
    
}


