/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
   // $("#BuscarMateria").click(function () {
        var materia = $("#materia").val();
        var parametros = {
            "materia": materia
        }

       // if (materia != "") {

            $("#CalendarioWEB").fullCalendar({//creo calendario
                header: {
                    left: 'today,prev,next,Miboton', //poner hoy, ayer y mañana
                    center: 'title', //centro el titulo
                    right: 'month,basicWeek,basicDay,agendaWeek,agendaDay'

                },
                customButtons: {
                    Miboton: {
                        text: "Boton 1",
                        click: function () {
                            alert("Accion del boton");
                        }
                    }
                },
                dayClick: function (date, jsEvent, view) {//con el date obtengo la fecha seleccionada, jsevent -- un evento sobre el elemento dia, que contiene elementos java scritps.
                    $("#txtFecha").val(date.format());
                    $("#ModalEventos").modal();
                },

                events: 'Models/modeloConsulta.php',

                /*events: {
                    data: parametros,
                    url: 'Models/modeloConsulta.php',
                    type: 'post'

                },*/
                eventClick: function (calEvent, jsEvent, view) {
                    $("#TituloEvento").html(calEvent.title);
                    $("#DescripcionEvento").html(calEvent.descripcion);
                    $("#materia").html(calEvent.materia);
                    $("#exampleModal").modal();
                }

            });
       /* } else {
            alert("Debe seleccionar una materia")
        }*/

  ///  });


});