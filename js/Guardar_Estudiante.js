/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function GuardarEstudiante(){
    
    var nombresEstudiante = $("#nombresEstudiante").val();
    var direccion = $("#direccion").val();
    var edad = $("#edad").val();
    var nombresRpte = $("#nombresRpte").val();
    var usuario = $("#usuario").val();
    var fecharegistro = $("#fecharegistro").val();
    
    if (edad <=0 || edad >=20 ){
        alert ("Edad incorrecta");
        return false;
    }
    
    var parametros ={
        "nombresEstudiante": nombresEstudiante,
        "direccion": direccion,
        "edad": edad,
        "nombresRpte": nombresRpte,
        "usuario": usuario,
        "fecharegistro": fecharegistro
        
    }
    $.ajax({
       data: parametros,
       url: "../Models/Guardar_Estudiante.php",
       type: 'POST',
       
        success: function (response) {
            alert(response);
            LimpiarCam();
            listaEstudiante();
        } 
        
    });
    
}
function LimpiarCam(){
   $("#nombresEstudiante").val("");
   $("#direccion").val("");
   $("#edad").val("");
   $("#nombresRpte").val("");
   
    
}