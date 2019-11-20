/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function GuardarEstudianteNota() {

    var filas = new Array();
    var secuencia;
    var idEstudiante;
    var nombresEstudiante;
    var notaEstudiante;
    var idRango;
    var idProfesor;
    var idseqParcial;
    var idseq_calif;
    var idcurso;
    var idmateria;
    var idPeriodo;
    

    var contador = 0;
    $("#tablaEstudiantes tr").each(function() {

        secuencia = $(this).find('td').eq(0).text();
        idEstudiante = $(this).find('td').eq(1).text();
        nombresEstudiante = $(this).find('td').eq(2).text();
        notaEstudiante = $(this).find('td').eq(3).find('select').val(),
        idRango = $(this).find('td').eq(4).text();
        idProfesor = $(this).find('td').eq(5).text();
        idseqParcial = $(this).find('td').eq(6).text();
        idseq_calif = $(this).find('td').eq(7).text();
        idcurso = $(this).find('td').eq(8).text();
        idmateria = $(this).find('td').eq(9).text();
        idPeriodo = $(this).find('td').eq(10).text();

        var valor = new Array(secuencia,idEstudiante,nombresEstudiante,notaEstudiante,idRango,idProfesor,idseqParcial,idseq_calif,idcurso,idmateria,idPeriodo);
        filas.push(valor);
    });


    $.ajax({
        type: "POST",
        url: "../Models/Guardar_EstudianteNotas.php",
        data: {
            filas: filas
        },
        success: function (data) {
            $("#respuesta").html(data);
            alert(data);
        }
        
       });

}