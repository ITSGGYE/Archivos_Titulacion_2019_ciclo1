/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function btnGuardarDatosGenerales() {

    //Formulario General Sacramento
    var tipoSacramento = $("#tipoSacramento").val();
    var acta = $("#acta").val();
    var Pagina = $("#Pagina").val();
    var Fecha_sacramento = $("#Fecha_sacramento").val();
    var sac_iglesia = $("#sac_iglesia").val();
    
    var Toma = $("#Toma").val();
    var cura = $("#cura_id").val();
    var sac_usuario = $("#sac_usuario").val();
    var sac_fechaRegistro = $("#sac_fechaRegistro").val();
    //Formulario General
    var cedula1 = $("#cedula1").val();
    var cedula2 = $("#cedula2").val();
    var cedula3 = $("#cedula3").val();
    var cedula4 = $("#cedula4").val();
    var cedula5 = $("#cedula5").val();
    var cedula6 = $("#cedula6").val();
    
    var par_tipo_persona1 = $("#par_tipo_persona1").val();
    var par_tipo_persona2 = $("#par_tipo_persona2").val();
    var par_tipo_persona3 = $("#par_tipo_persona3").val();
    var par_tipo_persona4 = $("#par_tipo_persona4").val();
    var par_tipo_persona5 = $("#par_tipo_persona5").val();
    var par_tipo_persona6 = $("#par_tipo_persona6").val();

    if (tipoSacramento === "1" || tipoSacramento === "2" || tipoSacramento === "3") {
        
        var Sacramentos = {
            "tipoSacramento": tipoSacramento,
            "acta": acta,
            "Pagina": Pagina,
            "Fecha_sacramento": Fecha_sacramento,
            "sac_iglesia": sac_iglesia,
            "Toma": Toma,
            "cura": cura,
            "sac_usuario": sac_usuario,
            "sac_fechaRegistro": sac_fechaRegistro
        }


        $.ajax({
            data: Sacramentos,
            url: "../Models/ModeloGuardar_Datos_Sacramento.php",
            type: 'POST',

            success: function (Response) {
                $("#Respuesta").html(Response);
            }

        });
       
        
        var Participantes = {
            "tipoSacramento": tipoSacramento,
            "cedula1": cedula1,
            "cedula2": cedula2,
            "cedula3": cedula3,
            "par_tipo_persona1":par_tipo_persona1,
            "par_tipo_persona2":par_tipo_persona2,
            "par_tipo_persona3":par_tipo_persona3
        }

        $.ajax({
            data: Participantes,
            url: "../Models/Guardar_Datos_Participantes.php",
            type: 'POST',

            success: function (Response) {
                $("#Respuesta").html(Response);
                alert(Response);
                LimpiarCamposform1();
            }

        });
    }else{
        
        if(cedula3 === "" || cedula4 === ""){
            alert("Los campos cedula son obligatorios");
            return false;
        }
        
        var Sacramentos1 = {
            "tipoSacramento": tipoSacramento,
            "acta": acta,
            "Pagina": Pagina,
            "Fecha_sacramento": Fecha_sacramento,
            "sac_iglesia": sac_iglesia,
            "Toma": Toma,
            "cura": cura,
            "sac_usuario": sac_usuario,
            "sac_fechaRegistro": sac_fechaRegistro
        }
        $.ajax({
            data: Sacramentos1,
            url: "../Models/ModeloGuardar_Datos_Sacramento.php",
            type: 'POST',

            success: function (Response) {
                $("#Respuesta").html(Response);
            }

        });
        var Participantes1 = {
            "tipoSacramento": tipoSacramento,
            "cedula3": cedula3,
            "cedula4": cedula4,
            "cedula5": cedula5,
            "cedula6": cedula6,
            "par_tipo_persona3":par_tipo_persona3,
            "par_tipo_persona4":par_tipo_persona4,
            "par_tipo_persona5":par_tipo_persona5,
            "par_tipo_persona6":par_tipo_persona6
        }
        $.ajax({
            data: Participantes1,
            url: "../Models/Guardar_Datos_Participantes.php",
            type: 'POST',

            success: function (Response) {
                $("#Respuesta").html(Response);
                LimpiarCamposform1();
                alert(Response);
                
            }

        });
        
    }

}

function LimpiarCamposform1(){
    //Formulario General Sacramento
    $("#acta").val("");
    $("#Pagina").val("");
    $("#Fecha_sacramento").val("");
    
    $("#Toma").val("");
    $("#cura").val("");
    
    //Formulario General
    $("#cedula1").val("");
    $("#cedula2").val("");
    $("#cedula3").val("");
    $("#cedula4").val("");
    $("#cedula5").val("");
    $("#cedula6").val("");
    
    $("#inputs1").val("");
    $("#inputs2").val("");
    $("#inputs3").val("");
    $("#inputs4").val("");
    $("#inputs5").val("");
    $("#inputs6").val("");
    
    $("#par_tipo_persona1").val("");
    $("#par_tipo_persona2").val("");
    $("#par_tipo_persona3").val("");
    $("#par_tipo_persona4").val("");
    $("#par_tipo_persona5").val("");
    $("#par_tipo_persona6").val("");
    
    
}