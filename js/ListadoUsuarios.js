/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function () {

    ListadoUsuario();

});
function ListadoUsuario(){
    
    $.ajax({
        url: '../Models/Consulta_ListUsuarios.php',
        type: 'POST',
        dataType: 'json',
        success: function (lista) {

            var tr = "";

            lista.forEach(function (lista) {
                tr += "<tr>";
                tr += "<td>" + lista.usuario + "</td>";
                tr += "<td>" + lista.password + "</td>";
                tr += "<td>" + lista.rol_descripcion + "</td>";
                tr += "<td>" + lista.rol_estado + "</td>";
                tr += "<td>";
                tr += "<a class='btn btn-success' href='EditarUsuarios.php?id=" + lista.idusuario + " ' '><i class='fa fa-edit'></i></a>";
                tr += "<button class='btn btn-danger' style='margin-left:10px;' onclick='EliminarUsuario("+lista.idusuario+")' ><i class='fa fa-trash-o'></i></button>";
                tr += "</td>";
                tr += "</tr>";
            });
            $("#tablaUsuario").html(tr);
        }

    });
    
}