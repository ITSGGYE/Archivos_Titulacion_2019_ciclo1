/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function CargarMateria(idmateria) {

    var idmateria = idmateria;
    var idRango = $("#idRango").val();
    var idseq_profesor = $("#idseq_profesor").val();
    var idcurso = $("#idcurso").val();
    
    

    var parametro = {
        "idmateria": idmateria,
        "idRango": idRango,
        "idseq_profesor": idseq_profesor,
        "idcurso": idcurso
    }
    $.ajax({
        data: parametro,
        url: '../Models/Consulta_Modelo_Calificaciones.php',
        type: 'POST',
        dataType: 'JSON',
        beforeSend: function () {
            $("#tablaModeloCalificacion").html("Procesando, espere por favor...");
        },
        success: function (datos) {

            var tr = "";
            var contador = 1;
            var cali;
            var calificacion1;
            var calificacion2 = "";

            if (idRango == "") {
                tr += "<div style='border: 1px solid #000;border-radius:7px; background:tomato;cursor:pointer;'>";
                tr += "<h5 style='text-align:left;color:white'>Error</h5>";
                tr += "<h6 style='text-align:left;color:white'>Debe seleccionar un rango campo obligatorio..!</h6>";
                tr += "</div>";
            } else {
                tr += "<div style='border: 1px solid #000;border-radius:7px; background:gold;cursor:pointer;'>";
                tr += "<h5 style='text-align:left;color:white'>Advertencia</h5>";
                tr += "<h6 style='text-align:left;color:white'>Esta Subiendo Notas</h6>";
                tr += "</div>";
                datos.forEach(function (datos) {
                    calificacion1 = datos.nombrecalif;

                    if (calificacion2 == "") {
                        calificacion2 = calificacion1;

                    } else {
                        calificacion2 = cali;
                    }

                    if (calificacion1 == calificacion2) {

                    } else {
                        contador = 1;
                    }


                    if (contador <= 1) {
                        if (calificacion1 == calificacion2) {

                        } else {
                            tr += "</table>";
                        }

                        tr += "<table class='table table-bordered' style='margin-top:15px;'>";
                        tr += "<tr>";
                        tr += "<th Style='text-align: left;cursor:pointer; background:#007bff;color:white;'>" + datos.nombrecalif + "</th>";
                        tr += "</tr>";

                        contador = contador + 1;
                    }


                    tr += "<tr>";
                    tr += "<td style='text-align:left;'>";
                    tr += "<a style='cursor:pointer;text-decoration:none;color:#000' href='../PROFESOR/IngreseNotasEstudiantes.php?id1=" + datos.idseq_calif + "&id2=" + datos.idcurso + "&id3=" + datos.idmateria + "&id4="+idRango+"&id5="+idseq_profesor+"&nom="+datos.nombrecurso+"&id6="+datos.idPeriodo+" '>" + datos.nombreParcial + "</a>";
                    tr += "</td>";
                    tr += "</tr>";


                    cali = calificacion1

                });

            }


            $("#tablaModeloCalificacion").html(tr);
        }

    });

}