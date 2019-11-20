/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function EnviarCorreo() {

    var fname = $("#fname").val();
    var femail = $("#femail").val();
    var fasunto = $("#fasunto").val();
    var fcomment = $("#fcomment").val();
    var emaildestino= $("#emaildestino").val();
   
   
    if(fname === "" || femail === "" || fasunto === "" || fcomment === "" || emaildestino === ""){
        alert("Campos Obligatorios");
        return false;
    }
    var parametros = {
        "fname": fname,
        "femail": femail,
        "fasunto": fasunto,
        "fcomment": fcomment,
        "emaildestino": emaildestino
    }

    $.ajax({
        data: parametros,
        url: '../Models/EnviarCorreo.php',
        type: 'POST',
        success: function (data) {

            alert(data);
            LimpiarCampos();
        }


    });


}
function LimpiarCampos(){
   $("#fname").val("");
   $("#femail").val("");
   $("#fasunto").val("");
   $("#fcomment").val(""); 
   $("#emaildestino").val(""); 
}