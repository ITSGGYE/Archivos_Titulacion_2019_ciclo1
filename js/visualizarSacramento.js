/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function VisualizarSacramento(sac_codigo, tip_codigo, Cedula) {


    var sac_codigo = sac_codigo;
    var tip_codigo = tip_codigo;
    var Cedula = "0" + Cedula;

    var parametro = {
        "sac_codigo": sac_codigo,
        "tip_codigo": tip_codigo,
        "Cedula": Cedula
    }

    $.ajax({
        data: parametro,
        url: '../Models/visualizarSacramento.php',
        type: 'POST',
        dataType: 'JSON',
        success: function (lista) {

            var tr = "";
            var Estado = "";
            var Cedula2 = "";
            var contador = 1;
            var valNombre = "";
            var valconta = 0;
            lista.forEach(function (lista) {
                Estado = lista.par_tipo_persona;
                Cedula2 = lista.Cedula;
                if (Estado === "S" && Cedula2 === Cedula) {
                    tr += "<tr>";
                    tr += "<th>Cedula</th>";
                    tr += "<td>" + lista.Cedula + "</td>";
                    tr += "</tr>";

                    tr += "<tr>";
                    tr += "<th>Nombre</th>";
                    tr += "<td>" + lista.Nombre + "</td>";
                    tr += "</tr>";

                    tr += "<tr>";
                    tr += "<th>Dirección</th>";
                    tr += "<td>" + lista.Direccion + "</td>";
                    tr += "</tr>";

                    tr += "<tr>";
                    tr += "<th>Telefono</th>";
                    tr += "<td>" + lista.Telefono + "</td>";
                    tr += "</tr>";

                    tr += "<tr>";
                    tr += "<th>Fecha Nacimiento</th>";
                    tr += "<td>" + lista.FechaNacimiento + "</td>";
                    tr += "</tr>";

                    tr += "<tr>";
                    tr += "<th>Lugar Nacimiento</th>";
                    tr += "<td>" + lista.LugarNacimiento + "</td>";
                    tr += "</tr>";

                    tr += "<tr>";
                    tr += "<th>Correo</th>";
                    tr += "<td>" + lista.Correo + "</td>";
                    tr += "</tr>";

                    tr += "<tr>";
                    tr += "<th>Nombre Sacramento</th>";
                    tr += "<td>" + lista.nombreSacramento + "</td>";
                    tr += "</tr>";

                    tr += "<tr>";
                    tr += "<th>Nombre Cura</th>";
                    tr += "<td>" + lista.nombreCura + "</td>";
                    tr += "</tr>";

                    tr += "<tr>";
                    tr += "<th>Nombre Iglesia</th>";
                    tr += "<td>" + lista.nombreIglesia + "</td>";
                    tr += "</tr>";

                    tr += "<tr>";
                    tr += "<th>Direccion Iglesia</th>";
                    tr += "<td>" + lista.DireccionIglesia + "</td>";
                    tr += "</tr>";
                    
                    tr += "<tr>";
                    tr += "<th>Fecha del sacramento</th>";
                    tr += "<td>" + lista.fechaSacramento + "</td>";
                    tr += "</tr>";
                    
                    tr += "<tr>";
                    tr += "<th>Nota Marginal</th>";
                    tr += "<td>" + lista.Observacion + "</td>";
                    tr += "</tr>";
                    
                    

                } else {
                    
                    if(valconta === 1){
                        tr += "<tr>";
                        tr += "<th>Novi(@)</th>";
                        tr += "<td>" + valNombre + "</td>";
                        tr += "</tr>";
                      valconta++;
                    }
                    if (Estado !== "S") {
                        
                        tr += "<tr>";

                        if (Estado == "T") {
                            tr += "<th>Testigo " + contador + "</th>";
                        } else {
                            tr += "<th>Padrino " + contador + "</th>";
                        }

                        tr += "<td>" + lista.Nombre + "</td>";
                        tr += "</tr>";

                        contador++;
                    }

                }
                if(Estado === "S" && Cedula2 !== Cedula) {
                       valNombre = lista.Nombre;
                       valconta = 1;
                 }

            });

            $("#VisualizarSac").html(tr);
        }


    });


}