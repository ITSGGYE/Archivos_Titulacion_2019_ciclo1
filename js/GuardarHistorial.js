/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function GuardarHistorial() {
  
    var cedulaCura = $("#cedulaCura").val();
    var nombresCura = $("#nombresCura").val();
    var fechaNacimiento = $("#fechaNacimiento").val();
    var fechainicio = $("#fechainicio").val();
    var usuario = $("#usuario").val();
    var fechaRegistro = $("#fechaRegistro").val();
    

    var parametros = {
        "cedulaCura": cedulaCura,
        "nombresCura": nombresCura,
        "fechaNacimiento": fechaNacimiento,
        "fechainicio": fechainicio,
        "usuario": usuario,
        "fechaRegistro": fechaRegistro

    }
    $.ajax({
        data: parametros,
        url: "../Models/ModeloGuardarHistorial.php",
        type: 'POST',
        
        beforeSend: function () {
            $("#resultado").html("Procesando, espere por favor...");
        },
        success: function (respuesta) {

            $("#resultado").html(respuesta);
            LimpiarCampos();
            alert(respuesta);

        }



    });


}
function LimpiarCampos(){
    $("#cedulaCura").val("");
    $("#nombresCura").val("");
    $("#fechaNacimiento").val("");
    $("#fechainicio").val("");
    $("#usuario").val("");
    $("#fechaRegistro").val("");
    
    
}

