/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function GuardarAsignacionEstudiante(){
    
    var idEstudiante = $("#idEstudiante").val();
    var nombresEstudiante = $("#nombresEstudiante").val();
    var idcurso = $("#idcurso").val();
    var idmateria = $("#idmateria").val();
    var idseq_profesor = $("#idseq_profesor").val();
    var Nombre_usuario = $("#Nombre_usuario").val();
    var fechaRegistro_Asignacion = $("#fechaRegistro_Asignacion").val();
    
    
    var parametros = {
        "idEstudiante": idEstudiante,
        "nombresEstudiante": nombresEstudiante,
        "idcurso": idcurso,
        "idmateria": idmateria,
        "idseq_profesor": idseq_profesor,
        "Nombre_usuario": Nombre_usuario,
        "fechaRegistro_Asignacion": fechaRegistro_Asignacion,
        
        
    }
    $.ajax({
       data: parametros,
       url:'../Models/Guardar_Asignacion_Estudiante.php',
       type: 'POST',
       beforeSend: function () {
            $("#respuest").html("Procesando, espere por favor...");
        },
        success: function (response) {
            $("#respuest").html(response);
            LimpiarCampos();
            alert(response);

        }
        
    });
    
    
}

function LimpiarCampos(){
    $("#idEstudiante").val("");
    $("#nombresEstudiante").val("");
    $("#idcurso").val("");
    $("#idmateria").val("");
    $("#idseq_profesor").val("");
    
}

