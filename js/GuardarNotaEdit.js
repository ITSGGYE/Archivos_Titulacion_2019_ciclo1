/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function GuardarModNotas(){
    var filas = new Array();
    var idcurso;
    var idmateria;
    var idseq_profesor ;
    var idRango;
    var idPeriodo;
    var idEstudiante;
    var idseq_calif;
    var idseqParcial;
    var Nota;
    
    var contador = 1;
   $("#camposNotas tr").each(function() {

        idEstudiante = $(this).find('td').eq(0).find('input').val();
        idPeriodo = $(this).find('td').eq(1).find('input').val();
        idRango = $(this).find('td').eq(2).find('input').val();
        idseq_profesor = $(this).find('td').eq(3).find('input').val();
        idmateria = $(this).find('td').eq(4).find('input').val();
        idcurso = $(this).find('td').eq(5).find('input').val();
        idseq_calif = $(this).find('td').eq(6).find('input').val();
        idseqParcial = $(this).find('td').eq(7).find('input').val();
        Nota = $(this).find('td').eq(9).find('input').val();
        

        var valor = new Array(idEstudiante,idPeriodo,idRango,idseq_profesor,idmateria,idcurso,idseq_calif,idseqParcial,Nota);
        filas.push(valor);
    });
    
    $.ajax({
        type: "POST",
        url: "../Models/ModelGuardarEditNotas.php",
        data: {
            filas: filas
        },
        success: function (data) {
            alert(data);
        }
        
       });

    
}