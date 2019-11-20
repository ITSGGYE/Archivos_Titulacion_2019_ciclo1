/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function EditarPersona() {

    var mensagge = confirm("¿Esta seguro que desea Modificar la persona ?");

    if (mensagge == true) {

        var per_cedula = $("#per_cedula").val();
        var per_nombre = $("#per_nombre").val();
        var per_direccion = $("#per_direccion").val();
        var per_fecha_nac = $("#per_fecha_nac").val();
        var per_lugarNacimiento = $("#per_lugarNacimiento").val();
        var per_correo = $("#per_correo").val();
        var per_telefono = $("#per_telefono").val();
        var per_nombresPadre = $("#per_nombresPadre").val();
        var per_nombresMadre = $("#per_nombresMadre").val();
        var per_observacion = $("#per_observacion").val();
        var per_usuario = $("#per_usuario").val();
        var per_fechaRegistro = $("#per_fechaRegistro").val();

        if ($("#per_correo").val().indexOf('@', 0) == -1 || $("#per_correo").val().indexOf('.', 0) == -1) {
            alert('El correo electrónico introducido no es correcto.');
            return false;
        }

        var parametros = {
            "per_cedula": per_cedula,
            "per_nombre": per_nombre,
            "per_direccion": per_direccion,
            "per_fecha_nac": per_fecha_nac,
            "per_lugarNacimiento": per_lugarNacimiento,
            "per_correo": per_correo,
            "per_telefono": per_telefono,
            "per_nombresPadre": per_nombresPadre,
            "per_nombresMadre": per_nombresMadre,
            "per_observacion": per_observacion,
            "per_usuario": per_usuario,
            "per_fechaRegistro": per_fechaRegistro
        }

        $.ajax({
            data: parametros,
            url: '../Models/ModeloEditar_Persona.php',
            type: 'POST',
            success: function (request) {

                $("respuest").html(request)
                alert(request);
            }

        });

    }



}
