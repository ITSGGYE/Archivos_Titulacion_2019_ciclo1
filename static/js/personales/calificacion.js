function GuardarCalificacion(){

     count = 0
     var vals = 0.0;
     var pregunta = document.getElementById("myVar").value;
     var calificado = document.getElementById("calificado").value;
     var calificador = document.getElementById("calificador").value;    
     var url = document.getElementById("myVar4").value;  
     var idMateria = document.getElementById("materiaId").value;
     $('#tblCalificacion tbody  tr input').each(function (index, element) {  
         
        count = count + 1;
         var name = $(element).attr('name');
       var valor = $('input:radio[name='+name+']:checked').val();
       vals = parseFloat(vals) + parseFloat(valor);       
     });
     console.log('Sumatorio : ' + vals/5)
     var tmp2 = vals/5
     count = count / 5
     console.log('Cantidad de Registros '+ count)
     console.log('Promedio' + tmp2/count)
     
     var calificacion = {'calificador' : calificador,'calificado':calificado,
     'pregunta':pregunta,'promedio' : tmp2/count,'idtmp': idMateria}
     console.log(calificacion)
     $.ajax({
       url: url,
       type: 'post',      
       data: {'calificador':calificador,'calificado':calificado,
       'pregunta':pregunta,'promedio':tmp2/count, 'idtmp' : idMateria},
       success:function(response){
         console.log(response)
          if(response.content.message === 'ok'){
          window.location.href = '/home'
            alert('se ha guardado con existo')
          }
          else{
            alert(response.content.message)
            console.log(response.content.message)
          }
       }
     });
}

function GuardarAutoEvaluacion(){

  count = 0
  var vals = 0.0;
  var pregunta = document.getElementById("autoevaluacionid").value;
  var calificado = document.getElementById("calificadoa").value;
  var calificador = document.getElementById("calificadora").value;    
  var url = document.getElementById("path").value;  
  $('#tblCalificacion tbody  tr input').each(function (index, element) {  
      
     count = count + 1;
      var name = $(element).attr('name');
    var valor = $('input:radio[name='+name+']:checked').val();
    vals = parseFloat(vals) + parseFloat(valor);       
  });
  console.log('Sumatorio : ' + vals/5)
  var tmp2 = vals/5
  count = count / 5
  console.log('Cantidad de Registros '+ count)
  console.log('Promedio' + tmp2/count)
  
  var calificacion = {'calificador' : calificador,'calificado':calificado,
  'pregunta':pregunta,'promedio' : tmp2/count}
  console.log(calificacion)
  $.ajax({
    url: url,
    type: 'post',      
    data: {'calificador':calificador,'calificado':calificado,
    'pregunta':pregunta,'promedio':tmp2/count, 'idtmp': 100},
    success:function(response){
       if(response.content.message === 'ok'){
         window.location.href = '/home'
         alert('se ha guardado con existo')
       }
       else{
         alert(response.content.message)
         console.log(response.content.message)
       }
    }
  });
}

function GuardarCalificacionEPP(){
  count = 0
  var vals = 0.0;
  var pregunta = document.getElementById("evaluacionepp").value;
  var calificado = document.getElementById("calificadoepp").value;
  var calificador = document.getElementById("calificadorepp").value;    
  var url = document.getElementById("pathepp").value;  
  $('#tblCalificacion tbody  tr input').each(function (index, element) {  
      
     count = count + 1;
      var name = $(element).attr('name');
    var valor = $('input:radio[name='+name+']:checked').val();
    vals = parseFloat(vals) + parseFloat(valor);       
  });
  console.log('Sumatorio : ' + vals/5)
  var tmp2 = vals/5
  count = count / 5
  console.log('Cantidad de Registros '+ count)
  console.log('Promedio' + tmp2/count)
  
  var calificacion = {'calificador' : calificador,'calificado':calificado,
  'pregunta':pregunta,'promedio' : tmp2/count}
  console.log(calificacion)
  $.ajax({
    url: url,
    type: 'post',      
    data: {'calificador':calificador,'calificado':calificado,
    'pregunta':pregunta,'promedio':tmp2/count ,'idtmp':3},
    success:function(response){
       if(response.content.message === 'ok'){
         window.location.href = '/home'
         alert('se ha guardado con existo')
       }
       else{
         alert(response.content.message)
         console.log(response.content.message)
       }
    }
  });
}

function GuardarCalificacionEDD(){
  count = 0
  var vals = 0.0;
  var pregunta = document.getElementById("evaluacionedd").value;
  var calificado = document.getElementById("calificadoedd").value;
  var calificador = document.getElementById("calificadoredd").value;    
  var url = document.getElementById("pathedd").value;  
  $('#tblCalificacionedd tbody  tr input').each(function (index, element) {  
      
     count = count + 1;
      var name = $(element).attr('name');
    var valor = $('input:radio[name='+name+']:checked').val();
    vals = parseFloat(vals) + parseFloat(valor);       
  });
  console.log('Sumatorio : ' + vals/5)
  var tmp2 = vals/5
  count = count / 5
  console.log('Cantidad de Registros '+ count)
  console.log('Promedio' + tmp2/count)
  
  var calificacion = {'calificador' : calificador,'calificado':calificado,
  'pregunta':pregunta,'promedio' : tmp2/count, 'idtmp':3}
  console.log(calificacion)
  $.ajax({
    url: url,
    type: 'post',      
    data: {'calificador':calificador,'calificado':calificado,
    'pregunta':pregunta,'promedio':tmp2/count,'idtmp':3},
    success:function(response){
       if(response.content.message === 'ok'){
         window.location.href = '/home'
         alert('se ha guardado con existo')
       }
       else{
         alert(response.content.message)
         console.log(response.content.message)
       }
    }
  });
}