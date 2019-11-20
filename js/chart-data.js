
function Cargar() {
    var Enero = "";
    var Febrero = "";
    var Marzo = "";
    var Abril = "";
    var Mayo = "";
    var Junio = "";
    var Julio = "";
    var Agosto = "";
    var Septiembre = "";
    var Octubre = "";
    var Noviembre = "";
    var Diciembre = "";
    
    var Year =$("#Year").val();
    var parametro = {
        "Year": Year
    }

    $.ajax({
        data: parametro,
        url: 'TotalSacramentosMes.php',
        type: 'POST',
        dataType: 'json',
        success: function (Mes) {
            
            var contador = 1;
            Mes.forEach(function (Mes) {

                if (contador === 1) {
                    Enero = Mes.Total;
                    if (Enero === undefined) {
                        Enero = 0;
                    }
                }
                if (contador === 2) {
                    Febrero = Mes.Total;
                    if (Febrero === undefined) {
                        Febrero = 0;
                    }
                }
                if (contador === 3) {
                    Marzo = Mes.Total;
                    if (Marzo === undefined) {
                        Marzo = 0;
                    }
                }
                if (contador === 4) {
                    Abril = Mes.Total;
                    if (Abril === undefined) {
                        Abril = 0;
                    }
                }
                if (contador === 5) {
                    Mayo = Mes.Total;
                    if (Mayo === undefined) {
                        Mayo = 0;
                    }
                }
                if (contador === 6) {
                    Junio = Mes.Total;
                    if (Junio === undefined) {
                        Junio = 0;
                    }
                }
                if (contador === 7) {
                    Julio = Mes.Total;
                    if (Julio === undefined) {
                        Julio = 0;
                    }
                }
                if (contador === 8) {
                    Agosto = Mes.Total;
                    if (Agosto === undefined) {
                        Agosto = 0;
                    }
                }
                if (contador === 9) {
                    Septiembre = Mes.Total;
                    if (Septiembre === undefined) {
                        Septiembre = 0;
                    }
                }
                if (Octubre === 10) {
                    Octubre = Mes.Total;
                    if (Octubre === undefined) {
                        Octubre = 0;
                    }
                }
                if (contador === 11) {
                    Noviembre = Mes.Total;
                    if (Noviembre === undefined) {
                        Noviembre = 0;
                    }
                }
                if (contador === 12) {
                    Diciembre = Mes.Total;
                    if (Diciembre === undefined) {
                        Diciembre = 0;
                    }
                }
                contador++;

            });


            var randomScalingFactor = function () {
                return Math.round(Math.random() * 10)
            };

            var lineChartData = {
                labels: ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"],
                datasets: [
                    {
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: []
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(48, 164, 255, 0.2)",
                        strokeColor: "rgba(48, 164, 255, 1)",
                        pointColor: "rgba(48, 164, 255, 1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(48, 164, 255, 1)",
                        data: [Enero, Febrero, Marzo, Abril, Mayo, Junio, Julio, Agosto, Septiembre, Octubre, Noviembre, Diciembre]
                    }
                ]

            }
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
                responsive: true,
                scaleLineColor: "rgba(0,0,0,.2)",
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleFontColor: "#c5c7cc"
            });


        }

    });
}


/*
 var barChartData = {
 labels: ["January", "February", "March", "April", "May", "June", "July"],
 datasets: [
 {
 fillColor: "rgba(220,220,220,0.5)",
 strokeColor: "rgba(220,220,220,0.8)",
 highlightFill: "rgba(220,220,220,0.75)",
 highlightStroke: "rgba(220,220,220,1)",
 data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
 },
 {
 fillColor: "rgba(48, 164, 255, 0.2)",
 strokeColor: "rgba(48, 164, 255, 0.8)",
 highlightFill: "rgba(48, 164, 255, 0.75)",
 highlightStroke: "rgba(48, 164, 255, 1)",
 data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
 }
 ]
 
 }
 
 var pieData = [
 {
 value: 300,
 color: "#30a5ff",
 highlight: "#62b9fb",
 label: "Blue"
 },
 {
 value: 50,
 color: "#ffb53e",
 highlight: "#fac878",
 label: "Orange"
 },
 {
 value: 100,
 color: "#1ebfae",
 highlight: "#3cdfce",
 label: "Teal"
 },
 {
 value: 120,
 color: "#f9243f",
 highlight: "#f6495f",
 label: "Red"
 }
 
 ];
 
 var doughnutData = [
 {
 value: 300,
 color: "#30a5ff",
 highlight: "#62b9fb",
 label: "Blue"
 },
 {
 value: 50,
 color: "#ffb53e",
 highlight: "#fac878",
 label: "Orange"
 },
 {
 value: 100,
 color: "#1ebfae",
 highlight: "#3cdfce",
 label: "Teal"
 },
 {
 value: 120,
 color: "#f9243f",
 highlight: "#f6495f",
 label: "Red"
 }
 
 ];
 
 var radarData = {
 labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
 datasets: [
 {
 label: "My First dataset",
 fillColor: "rgba(220,220,220,0.2)",
 strokeColor: "rgba(220,220,220,1)",
 pointColor: "rgba(220,220,220,1)",
 pointStrokeColor: "#fff",
 pointHighlightFill: "#fff",
 pointHighlightStroke: "rgba(220,220,220,1)",
 data: [65, 59, 90, 81, 56, 55, 40]
 },
 {
 label: "My Second dataset",
 fillColor: "rgba(48, 164, 255, 0.2)",
 strokeColor: "rgba(48, 164, 255, 0.8)",
 pointColor: "rgba(48, 164, 255, 1)",
 pointStrokeColor: "#fff",
 pointHighlightFill: "#fff",
 pointHighlightStroke: "rgba(48, 164, 255, 1)",
 data: [28, 48, 40, 19, 96, 27, 100]
 }
 ]
 };
 
 var polarData = [
 {
 value: 300,
 color: "#1ebfae",
 highlight: "#38cabe",
 label: "Teal"
 },
 {
 value: 140,
 color: "#ffb53e",
 highlight: "#fac878",
 label: "Orange"
 },
 {
 value: 220,
 color: "#30a5ff",
 highlight: "#62b9fb",
 label: "Blue"
 },
 {
 value: 250,
 color: "#f9243f",
 highlight: "#f6495f",
 label: "Red"
 }
 
 ];
 
 
 */
