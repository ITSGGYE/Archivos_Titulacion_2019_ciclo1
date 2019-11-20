/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function BuscarEstudiantes(){ 
   
    var idcurso = $("#idcurso").val();
    var idmateria = $("#idmateria").val();
    var idseq_profesor = $("#idseq_profesor").val();
    var idRango = $("#idRango").val();
    var idPeriodo = $("#idPeriodo").val();
    var nombreEstudiante = $("#nombreEstudiante").val();
    
    
    if(idcurso === "" && idmateria === "" && idseq_profesor === "" && idRango === "" && idPeriodo === "" && nombreEstudiante === ""){
        alert("Todos los campos son obligatorios seleccione toda la información requerida");
        return false;
    }
    
    var parametros = {
        "idcurso": idcurso,
        "idseq_profesor": idseq_profesor,
        "idmateria": idmateria,
        "idRango": idRango,
        "idPeriodo": idPeriodo,
        "nombreEstudiante": nombreEstudiante
    }
    
    $.ajax({
        data: parametros,
        url: "../Models/Consulta_ListadoEstudiantesNotasfamiliar.php",
        type: 'POST',
        dataType: 'json',
        beforeSend: function () {
            $("#ListadoEstudianteNotas").html("Procesando, espere por favor...");
        },
        success: function (listaNotas) {
            //Variables para la cabecera
            var tr = "";
            var contahead = 1;
            var nombreEstudi = "";
            var nombreEstudi2 = "";
            var nomEs = "";
            
            var nombrecalif2 = "";
            var nombrecalif = "";
            var nom = "";

      
           
            //Armamos la cabecera de la tabla
            tr += "<thead>";
            tr += "<tr>";
            listaNotas.forEach(function (listaNotas) {
                
                nombrecalif = listaNotas.nombrecalif;
                
                if (nombrecalif2 === "") {
                    nombrecalif2 = nombrecalif;
                } else {
                    nombrecalif2 = nom;
                }
                
                
                if (contahead === 1) {
                    tr += "<th>Nombre Estudiantes</th>";
                    tr += "<th>" + listaNotas.nombreParcial + "</th>";

                } else {

                    if (nombrecalif === nombrecalif2) {
                        
                        tr += "<th>" + listaNotas.nombreParcial + "</th>";
                    }else{
                        
                        if(nombrecalif !== nombrecalif2){
                            tr += "<th>Total Parcial</th>";
                            tr += "<th>" + listaNotas.nombreParcial + "</th>";
                        }
                        
                    }

                }
                contahead++;

                nom = nombrecalif;
            });
            tr += "<th>Total Parcial</th>";
            tr += "<th>Total Parciales</th>";
            tr += "</tr>";
            tr += "</thead>";
            
            
                   
            //variables que se usan en el body
            var contador = 0;
            
            var nomcal = "";
            var nombreCalificacion2 = "";
            var nombrecalificacion = "";
            var Parcial = parseInt(0);
            var Parcial2= parseInt(0);
            var totalParcial = parseFloat(0);
            var totalParciales = parseFloat(0);
            var contaParciales =0;
            
            //Armamos como se presentara el contenido de la tabla
            tr += "<tbody>";
             tr += "<tr>";
             listaNotas.forEach(function (listaNotas) {

                //nombreEstudiante = listaNotas.nombresEstudiante;
                nombrecalificacion = listaNotas.nombrecalif;
                Parcial = parseInt(listaNotas.Nota);
                      
                if (nombreCalificacion2 === "") {
                    nombreCalificacion2 = nombrecalificacion;
                    
                }else{
                    nombreCalificacion2 = nomcal;
                }
                
                
                if (contador === 0) {
                    
                    tr += "<td>" + listaNotas.nombresEstudiante + "</td>";
                    tr += "<td style='text-align:center;'>" + listaNotas.Nota + "</td>";
                    
                   contador++;
                }else{
                    if(nombrecalificacion === nombreCalificacion2){
                        tr += "<td style='text-align:center;'>" + listaNotas.Nota + "</td>";
                        contador++;
                    }else{
                        if(nombrecalificacion !== nombreCalificacion2){
                            tr += "<td style='text-align:center;'>" + (Parcial2/(contador)) + "</td>";
                            totalParcial = totalParcial + (Parcial2/(contador));
                            contaParciales ++;
                            tr += "<td style='text-align:center;'>" + listaNotas.Nota + "</td>";
                            Parcial2 = 0;
                            contador=1;
                        }
                    }
                    
                }
                 
                
                nomcal = nombrecalificacion;
                Parcial2 = Parcial2 + Parcial; 
                
               });
               //var notas = contador -1;
               
               tr += "<td style='text-align:center;'>" + Parcial2/(contador) + "</td>";
               tr += "<td style='text-align:center;'>" + (totalParcial+(Parcial2/(contador)))/(contaParciales+1) + "</td>";
               
            tr += "</tbody>";
            
            
           $("#ListadoEstudianteNotas").html(tr);
           
           
        
        }
        
    });
    
    
}