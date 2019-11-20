function GuardarBautismo() {

    var nombres = $("#nombres").val();
    var Edad = $("#Edad").val();
    var Direccion = $("#Direccion").val();
    var NombresPadrino = $("#NombresPadrino").val();
    var NombresMadrina = $("#NombresMadrina").val();
    var usuario = $("#usuario").val();
    var fechaRegistro = $("#fechaRegistro").val();

    var Partidanacimiento = $("#Partidanacimiento").prop("files")[0];
    var Cedulapadrino = $("#Cedulapadrino").prop("files")[0];
    var formData = new FormData();
    formData.append('Partidanacimiento', Partidanacimiento);
    formData.append('Cedulapadrino', Cedulapadrino);
    formData.append('nombres', nombres);
    formData.append('Edad', Edad);
    formData.append('Direccion', Direccion);
    formData.append('NombresPadrino', NombresPadrino);
    formData.append('NombresMadrina', NombresMadrina);
    formData.append('usuario', usuario);
    formData.append('fechaRegistro', fechaRegistro);
    
    
    $.ajax({
        data: formData,
        url: "../Models/ModeloGuardarDTBautismo.php",
        type: 'POST',
        contentType: false,

        processData: false,

        success: function (datos) {
            $("#Respuest").html(datos);
            LimpiarCampos();
            alert(datos);
        }
    });
}

function LimpiarCampos(){
    
    var nombres = $("#nombres").val("");
    var Edad = $("#Edad").val("");
    var Direccion = $("#Direccion").val("");
    var NombresPadrino = $("#NombresPadrino").val("");
    var NombresMadrina = $("#NombresMadrina").val("");
    var usuario = $("#usuario").val("");
    var fechaRegistro = $("#fechaRegistro").val("");
    var Partidanacimiento = $("#Partidanacimiento").val("");
    var Cedulapadrino = $("#Cedulapadrino").val("");
    
}
