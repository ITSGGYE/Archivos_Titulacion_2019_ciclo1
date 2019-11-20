/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function verPdf(){
    
    
    var idcurso = $("#idcurso").val();
    var idmateria = $("#idmateria").val();
    var idseq_profesor = $("#idseq_profesor").val();
    var idRango = $("#idRango").val();
    var idPeriodo = $("#idPeriodo").val();
    
    
    var parametros = {
        "idcurso": idcurso,
        "idseq_profesor": idseq_profesor,
        "idmateria": idmateria,
        "idRango": idRango,
        "idPeriodo": idPeriodo
    }
    
    
    $.post("../PDF-HTML/Certificado.php");
    
}