/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function GuardarDatos(){
    
    var nom1 = $("#nom1").val();
    var nom2 = $("#nom2").val();
    var nom3 = $("#nom3").val();
    var ap1 = $("#ap1").val();
    var ap2 = $("#ap2").val();
    var ap3 = $("#ap3").val();
    
    var parametros = {
        "nom1": nom1,
        "nom2": nom2,
        "nom3": nom3,
        "ap1": ap1,
        "ap2": ap2,
        "ap3": ap3
    }
    
    
    $.ajax({
       data: parametros,
       url: "Models/PruebasIvan.php",
       type: 'POST',
       
        success: function (Response) {
            $("#Respuesta").html(Response);
        }
       
    });
    
}