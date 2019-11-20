/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {

    $("#add").click(function () {
        // Obtenemos el numero de filas (td) que tiene la primera columna
        // (tr) del id "tabla"
        var tds = $("#tabla tr:first td").length;
        // Obtenemos el total de columnas (tr) del id "tabla"
        var trs = $("#tabla tr").length;
        var nuevaFila = "<tr>";
        for (var i = 0; i < tds; i++) {
            // añadimos las columnas
            nuevaFila += "<td>columna " + (i + 1) + " Añadida con jquery</td>";
        }
        // Añadimos una columna con el numero total de filas.
        // Añadimos uno al total, ya que cuando cargamos los valores para la
        // columna, todavia no esta añadida
        nuevaFila += "<td>" + (trs + 1) + " filas";
        nuevaFila += "</tr>";
        $("#tabla").append(nuevaFila);
    });

    /**
     * Funcion para eliminar la ultima columna de la tabla.
     * Si unicamente queda una columna, esta no sera eliminada
     */
    $("#del").click(function () {
        // Obtenemos el total de columnas (tr) del id "tabla"
        var trs = $("#tabla tr").length;
        if (trs > 1)
        {
            // Eliminamos la ultima columna
            $("#tabla tr:last").remove();
        }
    });
});