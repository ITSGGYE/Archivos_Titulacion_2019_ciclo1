/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function consultaNotas(idEstudiante) {
    $("#listado").hide();
    $("#tablaNotas").show();
    $("#listadoPromedio").hide();
    var idcurso = $("#idcurso").val();
    var idmateria = $("#idmateria").val();
    var idseq_profesor = $("#idseq_profesor").val();
    var idRango = $("#idRango").val();
    var idPeriodo = $("#idPeriodo").val();
    var idEstudiante = idEstudiante; 
  
  
  
  if(idcurso === "" && idmateria === "" && idseq_profesor === "" && idRango === "" && idPeriodo === ""){
      
      alert("todos los campos son obligatorios");
      return false;
  }
  
   var parametros = {
        "idcurso": idcurso,
        "idseq_profesor": idseq_profesor,
        "idmateria": idmateria,
        "idRango": idRango,
        "idPeriodo": idPeriodo,
        "idEstudiante": idEstudiante
    }
   
   $.ajax({
        data: parametros,
        url: "../Models/Consulta_notas_Estudiante.php",
        type: 'POST',
        dataType: 'json',
        beforeSend: function () {
            $("#tablaNotasEstudiante").html("Procesando, espere por favor...");
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
            tr += "<th>Opciones</th>";
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
                Parcial = parseFloat(listaNotas.Nota);
                      
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
               tr += "<td><a class='btn btn-success' style='color:white' href='EditarNota.php?id1="+idEstudiante+"&id2=" + idcurso + "&idN3=" + idPeriodo + "&idN4= " + idRango + "&idN5=" + idmateria + "&idN6=" + idseq_profesor + " ' ><i class='fa fa-edit'></i></a></td>";

            tr += "</tbody>";
            
            
           $("#tablaNotasEstudiante").html(tr);
           
           
        
        }
        
   });
   
   
    
  }

  