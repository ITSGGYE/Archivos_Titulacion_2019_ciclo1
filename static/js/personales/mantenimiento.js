function GuardarCurso(){

    nombreCurso = $('#descripcion').val();
    var aniolectivo = document.getElementById('Lectivo');
    var idAnioLectivo= aniolectivo.options[aniolectivo.selectedIndex].value;
    var url = document.getElementById("pathGuardar").value; 
    $.ajax({
      url: url,
      type: 'post',      
      data: {'nombreCurso' : nombreCurso, 'idAnioLectivo' : idAnioLectivo},
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
var j = 0 ;
function ObtenerCurso(){
    var url = document.getElementById("pathCursos").value;  
    $.ajax({
        url: url,
        type: 'get',      
        data: {},
        success:function(response){
         //console.log(response)
            if ( j === 0 ){
                for (var i =0; i < response.length; i++){
                   // console.log(response[i].pk + ' ' + response[i].fields.descripcion)
                    document.getElementById('Lectivo').options[i] = new Option(response[i].fields.descripcion,
                        response[i].pk)
                }
             j = 1;
            }
           
        }
      });
}

function GuardarAsignatura(){

  nombreAsignatura = $('#descripcion').val();
  console.log(nombreAsignatura);
  var url = document.getElementById("pathAsignatura").value; 
  $.ajax({
    url: url,
    type: 'post',      
    data: {'nombreAsignatura' : nombreAsignatura},
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

function GuardarAnioLectivo(){

  descripcion = $('#descripcion').val();
  console.log(descripcion);
  var url = document.getElementById("pathAnioLectivo").value; 
  $.ajax({
    url: url,
    type: 'post',      
    data: {'descripcion' : descripcion},
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
