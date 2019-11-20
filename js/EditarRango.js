/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function ModificarRangos(){
    
     var idRango           = $("#idRango").val();
    var nombreRango        = $("#nombreRango").val();
    var duracionRango      = $("#duracionRango").val();
    var fechaInicioRango   = $("#fechaInicioRango").val();
    var fechaFinRango      = $("#fechaFinRango").val();
    var usuarioRango       = $("#usuarioRango").val();
    var fecharegistroRango = $("#fecharegistroRango").val();
    var idPeriodo          = $("#idPeriodo").val();
    
    if((nombreRango === "")||(duracionRango === "")||(fechaInicioRango === "") || (fechaFinRango === "") || (usuarioRango === "")
            || (fecharegistroRango === "")||(idPeriodo === "")){
        
        alert("Todos los campos son obligatorios");
        return false;
    }
    
    var parametros = {
        "idRango": idRango,
        "nombreRango": nombreRango,
        "duracionRango": duracionRango,
        "fechaInicioRango": fechaInicioRango,
        "fechaFinRango": fechaFinRango,
        "usuarioRango": usuarioRango,
        "fecharegistroRango": fecharegistroRango,
        "idPeriodo": idPeriodo
        
    }
    
    $.ajax({
        data: parametros,
        url: '../Models/Modificar_Rango.php',
        type: 'POST',
        success: function (response) {
            alert(response);
            $("#idRango").change();
        }
        
        
    });
    
}