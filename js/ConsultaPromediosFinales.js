/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function VerPromedio() {

    $("#listado").hide();
    $("#listadoPromedio").show();
    $("#tablaNotas").hide();

    var idcurso = $("#idcurso").val();
    var idmateria = $("#idmateria").val();
    var idseq_profesor = $("#idseq_profesor").val();
    var idRango = $("#idRango").val();
    var idPeriodo = $("#idPeriodo").val();


    if(idcurso === "" && idmateria === "" && idseq_profesor === "" && idRango === "" && idPeriodo === ""){
      
      alert("Todos los campos son obligatorios seleccione toda la información requerida");
      return false;
  }

    var parametros = {
        "idcurso": idcurso,
        "idseq_profesor": idseq_profesor,
        "idmateria": idmateria,
        "idRango": idRango,
        "idPeriodo": idPeriodo
    }

    $.ajax({
        data: parametros,
        url: "../Models/ConsultaAprobadoReprobados.php",
        type: 'POST',
        dataType: 'json',
        beforeSend: function () {
            $("#TablaPromedio").html("Procesando, espere por favor...");
        },
        success: function (listadoPromedio) {
            var tr = "";


            tr += "<table class='table table-bordered' style='margin-top:15px;' id='tabla'>";
            tr += "<thead>";
            tr += "<tr>";

            tr += "<th>Nombre Estudiante</th>";
            tr += "<th>Promedio Final</th>";
            tr += "<th>Resultado</th>";

            tr += "</tr>";
            tr += "</thead>";

            tr += "<tbody>";

            var contador = 0;
            var idestudiante;
            var idestudiante2 = "";
            var idseq = "";
            var promedio = parseFloat(0);
            var total = parseFloat(0);
            listadoPromedio.forEach(function (listadoPromedio) {
                idestudiante = listadoPromedio.idEstudiante;

                promedio = parseFloat(listadoPromedio.Promedio);
                if (idestudiante2 === "") {
                    idestudiante2 = idestudiante;
                } else {
                    idestudiante2 = idseq;
                }

                if (idestudiante === idestudiante2) {

                    if (contador === 0) {
                        tr += "<tr>";
                        tr += "<td>" + listadoPromedio.nombresEstudiante + "</td>";
                    }

                    total = total + promedio;
                    
                    contador++;
                } else {
                    if (idestudiante !== idestudiante2) {
                        tr += "<td>" + total / contador + "</td>";

                        if ((total / contador) >= 6.5 && (total / contador) <= 10) {
                            tr += "<td>Aprobado</td>";
                            total = 0;
                            contador = 0;
                            tr += "</tr>";
                        } else {
                            if ((total / contador) > 0 && (total / contador) < 6.5)
                                tr += "<td>Reprobado</td>";
                            total = 0;
                            contador = 0;
                            tr += "</tr>";
                        }

                        if (contador == 0) {
                            tr += "<tr>";

                            tr += "<td>" + listadoPromedio.nombresEstudiante + "</td>";
                        }

                        total = total + promedio;
                        contador++;

                    }

                }

                idseq = idestudiante;

            });

            tr += "<td>" + total / contador + "</td>";
            if ((total / contador) >= 6.5 && (total / contador) <= 10) {
                tr += "<td>Aprobado</td>";
                total = 0;
                contador = 0;
                tr += "</tr>";
            } else {
                if ((total / contador) > 0 && (total / contador) < 6.5)
                    tr += "<td>Reprobado</td>";
                total = 0;
                contador = 0;
                tr += "</tr>";
            }
            tr += "</tbody>";

            tr += "</table>";

            $("#TablaPromedio").html(tr);
        }
    });


}