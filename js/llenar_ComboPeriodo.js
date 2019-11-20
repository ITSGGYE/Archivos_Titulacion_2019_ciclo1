/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    
cargarCombo();
});

function cargarCombo(){
    
    $.ajax({
        url: "../Models/llenarComboPeriodo.php",
        type: 'POST',
        
        success: function (response) {
            $('#idPeriodo').html(response);
            $("#buscarDatos").click();
        }
    });
}