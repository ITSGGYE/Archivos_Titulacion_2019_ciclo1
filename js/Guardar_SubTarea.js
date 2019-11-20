/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function GuardarSubNotas(){
    
    var idcalificacion = $("#idcalificacion").val();
    var nombreParcial = $("#nombreParcial").val();
    
    var parametros = {
        "idcalificacion": idcalificacion,
        "nombreParcial": nombreParcial,
    }
    
    $.ajax({
       data:parametros,
       url:"../Models/GuardarSubtarea.php",
       type: 'POST',
       success: function (data) {
            $("#respuesta").html(data);
            limpiarcampos();
            configNotas(idcalificacion);
            alert(data);
            
       }
        
    });
    
}

function limpiarcampos(){
    $("#nombreParcial").val('');
    $("#duracionParcial").val('');
    
}

