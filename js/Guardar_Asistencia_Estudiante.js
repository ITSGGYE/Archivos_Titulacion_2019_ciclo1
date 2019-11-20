/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function GuardarAsistencia(){
    
    var listadoFilas = new Array();
    
    var idEstudiante ;
    var idcurso ;
    var idmateria ;
    var idseq_profesor ;
    var Asistencia;
    
    $("#tablaAsistencia tr").each(function() {
      idEstudiante = $(this).find('td').eq(1).text();
      idcurso = $(this).find('td').eq(2).text();
      idmateria = $(this).find('td').eq(3).text();
      idseq_profesor = $(this).find('td').eq(4).text();
      Asistencia = $(this).find('td').eq(6).find('select').val();
      
      var lista = new Array(idEstudiante,idcurso,idmateria,idseq_profesor,Asistencia);
      listadoFilas.push(lista);
    });
    
    
    
    $.ajax({
        type: "POST",
        url: "../Models/Guardar_Asistencia_Estudiante.php",
        data: {
            listadoFilas: listadoFilas
        },
        success: function (response) {
           
            alert(response);
        } 
        
    });
    
}