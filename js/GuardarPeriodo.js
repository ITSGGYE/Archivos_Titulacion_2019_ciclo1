/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function GuardarPeriodo(){
    
    var nombrePeriodo = $("#nombrePeriodo").val();
    var duracionPeriodo = $("#duracionPeriodo").val();
    var añoPeriodo = $("#añoPeriodo").val();
    var descripcionPeriodo = $("#descripcionPeriodo").val();
    var usuario = $("#usuario").val();
    var fecharegistro = $("#fecharegistro").val();
    
    var parametros = {
        "nombrePeriodo": nombrePeriodo,
        "duracionPeriodo": duracionPeriodo,
        "añoPeriodo": añoPeriodo,
        "descripcionPeriodo": descripcionPeriodo,
        "usuario": usuario,
        "fecharegistro": fecharegistro,
        
    }
    $.ajax({
       data: parametros,
       url:'../Models/Guardar_Periodo.php',
       type: 'POST',
       success: function (response) {
            $("#respuest").html(response);
            limpiarCampos();
            listaPeriodos();
            cargarCombo();
            alert(response);
       } 
       
       
    });
            
    
}
function limpiarCampos(){
  $("#nombrePeriodo").val('');
  $("#duracionPeriodo").val('');
  $("#añoPeriodo").val('');
  $("#descripcionPeriodo").val('');
}
