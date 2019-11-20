function GuardarGrupos() {

    var idGrupo_pastoral = $("#idGrupo_pastoral").val();
    var RolIntegrante = $("#RolIntegrante").val();
    var nombresIntegrante = $("#nombresIntegrante").val();
    var EdadIntegrante = $("#EdadIntegrante").val();
    var DireccionIntegrante = $("#DireccionIntegrante").val();
    var TelefonoIntegrante = $("#TelefonoIntegrante").val();
    var CorreoIntegrante = $("#CorreoIntegrante").val();
    var nombresPadreFamilia = $("#nombresPadreFamilia").val();
    var telefonoPadreFamilia = $("#telefonoPadreFamilia").val();
    var nombresMadreFamilia = $("#nombresMadreFamilia").val();
    var telefonoMadreFamilia = $("#telefonoMadreFamilia").val();
    var usuario = $("#usuario").val();
    var fechaRegistro = $("#fechaRegistro").val();


     var parametros = {
         "idGrupo_pastoral":idGrupo_pastoral,
         "RolIntegrante":RolIntegrante,
         "nombresIntegrante":nombresIntegrante,
         "EdadIntegrante":EdadIntegrante,
         "DireccionIntegrante":DireccionIntegrante,
         "TelefonoIntegrante":TelefonoIntegrante,
         "CorreoIntegrante":CorreoIntegrante,
         "nombresPadreFamilia":nombresPadreFamilia,
         "telefonoPadreFamilia":telefonoPadreFamilia,
         "nombresMadreFamilia": nombresMadreFamilia,
         "telefonoMadreFamilia": telefonoMadreFamilia,
         "usuario": usuario,
         "fechaRegistro": fechaRegistro
            
     }
     
     $.ajax({
        data: parametros,
        url: "../Models/ModeloGuardar_Grupos.php",
        type: 'POST',
               
        success: function (response) {
            $("#respuest").html(response);
            LimpiarCampos();
            alert(response);
            
        }
        
     });





}

function LimpiarCampos(){
    
    $("#idGrupo_pastoral").val("");
    $("#RolIntegrante").val("");
    $("#nombresIntegrante").val("");
    $("#EdadIntegrante").val("");
    $("#DireccionIntegrante").val("");
    $("#TelefonoIntegrante").val("");
    $("#CorreoIntegrante").val("");
    $("#nombresPadreFamilia").val("");
    $("#telefonoPadreFamilia").val("");
    $("#nombresMadreFamilia").val("");
    $("#telefonoMadreFamilia").val("");
    $("#usuario").val("");
    $("#fechaRegistro").val("");
    
    
}

