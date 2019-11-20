/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function ModificarPeriodo(){
    var idPeriodo = $("#idPeriodo").val();
    var nombrePeriodo = $("#nombrePeriodo").val();
    var duracionPeriodo = $("#duracionPeriodo").val();
    var añoPeriodo = $("#añoPeriodo").val();
    var descripcionPeriodo = $("#descripcionPeriodo").val();
    var usuario = $("#usuario").val();
    var fecharegistro = $("#fecharegistro").val();
    
    var parametros = {
        "idPeriodo": idPeriodo,
        "nombrePeriodo": nombrePeriodo,
        "duracionPeriodo": duracionPeriodo,
        "añoPeriodo": añoPeriodo,
        "descripcionPeriodo": descripcionPeriodo,
        "usuario": usuario,
        "fecharegistro": fecharegistro,
        
    }
    
    $.ajax({
       data: parametros,
       url:'../Models/ModificarPeriodo.php',
       type: 'POST',
       success: function (response) {
            $("#respuest").html(response);
            
            alert(response);
       }  
        
    });
    
}