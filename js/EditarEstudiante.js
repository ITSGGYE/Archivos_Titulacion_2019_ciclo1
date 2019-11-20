/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function ModificarEstudiante(){
    
    var idEstudiante = $("#idEstudiante").val();
    var nombresEstudiante = $("#nombresEstudiante").val();
    var direccion = $("#direccion").val();
    var edad = $("#edad").val();
    var nombresRpte = $("#nombresRpte").val();
    var usuario = $("#usuario").val();
    var fecharegistro = $("#fecharegistro").val();
    
    var parametros ={
        "idEstudiante": idEstudiante,
        "nombresEstudiante": nombresEstudiante,
        "direccion": direccion,
        "edad": edad,
        "nombresRpte": nombresRpte,
        "usuario": usuario,
        "fecharegistro": fecharegistro
        
    }
    $.ajax({
       data: parametros,
       url: "../Models/Modificar_Estudiante.php",
       type: 'POST',
       
        success: function (response) {
            alert(response);
            listaEstudiante();
        } 
        
    });
}