/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function GuardarEditor(){
    
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
    var idseq_Contenedor = $("#idseq_Contenedor").val();
    var usuario = $("#usuario").val();
    var fechaRegistro = $("#fechaRegistro").val();
    
    
    if(idGrupo_pastoral === ""){
        
        alert("Debe Seleccionar un Grupo para esta persona");
        return false;
        
    }
    
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
         "idseq_Contenedor": idseq_Contenedor,
         "usuario": usuario,
         "fechaRegistro": fechaRegistro
            
     }
     
     $.ajax({
        data: parametros,
        url: "../Models/ModeloEditarLista_Cursos.php",
        type: 'POST',
        
        beforeSend: function () {
            $("#resultadoEdit").html("Procesando, espere por favor...");
        },     
        success: function (datoseditados) {
            $("#resultadoEdit").html(datoseditados);
              alert(datoseditados);
              var url = "../Administrador/Consulta_Grupos.php"; 
              $(location).attr('href',url);
            
        }
        
     });
    
    
    
}
