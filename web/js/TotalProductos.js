/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
    total();

});

function total(){
    var filasP = new Array();
    var total= parseFloat(0);
    var ValorTotal=parseFloat(0);
    $("#tablaProductos tr").each(function() {
        
        total = parseFloat($(this).find('td').eq(5).text());
        
        ValorTotal = ValorTotal + total;
    });
    
    var parametros = {
        "ValorTotal":ValorTotal
    }
    
    $.ajax({
        type: "POST",
        url: "SERVLETOTAL",
        data: parametros,
        success: function (data) {
            $("#tt-subtotal").html(data);
            $("#tt-total").html(data);
        }
        
       });
    
}