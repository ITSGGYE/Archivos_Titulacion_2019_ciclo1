/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function GuardarDatos(){
    
    var idPeriodo = $("#idPeriodo").val();
    var idRango = $("#idRango").val();
    var idcurso = $("#idcurso").val();
    var idmateria = $("#idmateria").val();
    var idseq_profesor = $("#idseq_profesor").val();
    var nombrecalif = $("#nombrecalif").val();
    var descripcioncalif = $("#descripcioncalif").val();
    
    var parametros = {
        "idPeriodo": idPeriodo,
        "idRango": idRango,
        "idcurso":idcurso,
        "idmateria":idmateria,
        "idseq_profesor":idseq_profesor,
        "nombrecalif":nombrecalif,
        "descripcioncalif":descripcioncalif
    }
    $.ajax({
       data:  parametros,
       url: "../Models/Guardar_Config_Curso.php",
       type: 'POST',
       
        success: function (respuesta) {
            $('#respuest').html(respuesta);
            
             LimpiarCampos(); 
             alert("Mensaje:"+respuesta);
             $("#idPeriodo").change();
        }
        
    });
    
}


function LimpiarCampos(){ 
    $("#idRango").val("");
    $("#idcurso").val("");
    $("#idmateria").val("");
    $("#nombrecalif").val("");
    $("#descripcioncalif").val("");
}


