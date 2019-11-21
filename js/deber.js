

function cambia(opcion)

{

	if(opcion=="x")
	{
		document.getElementById('cambio').innerHTML = "Gracias por Visitarnos";
		document.getElementById('cambio').style.color="#FB0F0F";
	}
	else
	{
		document.getElementById('cambio').innerHTML = "Contactenos";
		document.getElementById('cambio').style.color="#000000";
		
	}
	
}


function validarFormulario(){
 
		var txtNombre = document.getElementById('Nombre').value;
		var txtApellidos = document.getElementById('Apellidos').value;
		var txtCorreo = document.getElementById('email').value;
		var txtComentario = document.getElementById('Comentario').value;
		
		
		//Test campo obligatorio
		if(txtNombre == null || txtNombre.length == 0 || /^\s+$/.test(txtNombre)){
			alert('ERROR: El campo nombre no debe ir vacío o lleno de solamente espacios en blanco');
			return false;
		}
 
		//Test Apellidos
		if(txtApellidos == null || txtApellidos.length == 0  || /^\s+$/.test(txtApellidos)){
			alert('ERROR: Debe ingresar Apellidos');
			return false;
		}
 
		//Test correo
		if(!(/\S+@\S+\.\S+/.test(txtCorreo))){
			alert('ERROR: Debe escribir un correo válido');
			return false;
		}
 
		//Test Comentario
		if(!isNaN(txtComentario)){
			alert('ERROR: Debe escrbir un comentario');
			return false;
		}
 
		
		return true;
	}

var actual = 0;
			function puntos(n){
				var ptn = document.getElementsByClassName("punto");
				for(i = 0; i<ptn.length; i++){
					if(ptn[i].className.includes("activo")){
						ptn[i].className = ptn[i].className.replace("activo", "");
						break;
					}
				}
				ptn[n].className += " activo";
			}
			function mostrar(n){
				var imagenes = document.getElementsByClassName("imagen");
				for(i = 0; i< imagenes.length; i++){
					if(imagenes[i].className.includes("actual")){
						imagenes[i].className = imagenes[i].className.replace("actual", "");
						break;
					}
				}
				actual = n;
				imagenes[n].className += " actual";
				puntos(n);
			}
			
			function siguiente(){
				actual++;
				if(actual > 2){
					actual = 0;
				}
				mostrar(actual);
			}
			function anterior(){
				actual--;
				if(actual < 0){
					actual = 2;
				}
				mostrar(actual);
			}
			
			var velocidad = 2000;
			var play = setInterval("siguiente()", velocidad);
			
			function playpause(){
				var boton = document.getElementById("btn");
				if(play == null){
					boton.src = "imagen/pause.png";
					play = setInterval("siguiente()", velocidad);
				} else {
					clearInterval(play);
					play = null;
					boton.src = "imagen/play.png";
				}
			}
			
			function soloLetras(e)
{
key = e.keyCode || e.which;
	tecla = String.fromCharCode(key).toUpperCase();
	letras = ' ABCDEFGHIJKLMNOPQRSTUVWXYZÑ';
	especiales = '8-37-39-46';
	tecla_especial = false
	for(var i in especiales)
	{
		if(key == especiales[i])
		{
			tecla_especial = true;
			break;
		}
	}
	if(letras.indexOf(tecla)==-1 && !tecla_especial)
	{
		return false;
	}
}

function soloNumeros(e)
{
	
	
	//var key = window.Event ? e.which : e.keyCode
	var key;
	
	if(window.event) // IE
	{
		key = e.keyCode;
	}
	else if(e.which) // Netscape/Firefox/Opera
	{
		key = e.which;
	}
	
	especiales = '8-9-37-38-39-40-13-27';
	tecla_especial = false;
	
	for(var i in especiales)
	{
		if(key == especiales[i])
		{
			tecla_especial = true;
			break;
		}
	}
		return (key >= 48 && key <= 57 ||key==46 || tecla_especial);
}


	
function mayus(e)
{
	e.value = e.value.toUpperCase();
		
	}
function validar(){


var cedula=document.getElementById("cedula").value.trim();
	if(cedula==null || cedula=="")
		{
			var cedula=document.getElementById("cedula1").value.trim();
			var ban=1;
		}
		else{
			var cedula=document.getElementById("cedula").value.trim();
			var ban=0;
		}
		
  	
    //Preguntamos si la cedula consta de 10 digitos
     if(cedula.length == 10){
       // alert(cedula.length);
        //Obtenemos el digito de la region que sonlos dos primeros digitos
        var digito_region = cedula.substring(0,2);
       // alert(digito_region);
        //Pregunto si la region existe ecuador se divide en 24 regiones
        if( digito_region >= 1 && digito_region <=24 ){

          // Extraigo el ultimo digito
          var ultimo_digito   = cedula.substring(9,10);

          //Agrupo todos los pares y los sumo
          var pares = parseInt(cedula.substring(1,2)) + parseInt(cedula.substring(3,4)) + parseInt(cedula.substring(5,6)) + parseInt(cedula.substring(7,8));

          //Agrupo los impares, los multiplico por un factor de 2, si la resultante es > que 9 le restamos el 9 a la resultante
          var numero1 = cedula.substring(0,1);
          var numero1 = (numero1 * 2);
          if( numero1 > 9 ){ var numero1 = (numero1 - 9); }

          var numero3 = cedula.substring(2,3);
          var numero3 = (numero3 * 2);
          if( numero3 > 9 ){ var numero3 = (numero3 - 9); }

          var numero5 = cedula.substring(4,5);
          var numero5 = (numero5 * 2);
          if( numero5 > 9 ){ var numero5 = (numero5 - 9); }

          var numero7 = cedula.substring(6,7);
          var numero7 = (numero7 * 2);
          if( numero7 > 9 ){ var numero7 = (numero7 - 9); }

          var numero9 = cedula.substring(8,9);
          var numero9 = (numero9 * 2);
          if( numero9 > 9 ){ var numero9 = (numero9 - 9); }

          var impares = numero1 + numero3 + numero5 + numero7 + numero9;

          //Suma total
          var suma_total = (pares + impares);

          //extraemos el primero digito
          var primer_digito_suma = String(suma_total).substring(0,1);

          //Obtenemos la decena inmediata
          var decena = (parseInt(primer_digito_suma) + 1)  * 10;

          //Obtenemos la resta de la decena inmediata - la suma_total esto nos da el digito validador
          var digito_validador = decena - suma_total;

          //Si el digito validador es = a 10 toma el valor de 0
          if(digito_validador == 10)
            var digito_validador = 0;

          //Validamos que el digito validador sea igual al de la cedula
          if(digito_validador == ultimo_digito){
			  if(ban==0){
         document.getElementById("cedula").value=cedula; }
		 else{
			 document.getElementById("cedula1").value=cedula; 
		 }
            //alert('la cedula:' + cedula + ' es correcta');
          }else{
            
            alert('la cedula:' + cedula + ' es incorrecta');
			if(ban==0){
			document.getElementById("cedula").focus();
			document.getElementById("cedula").placeholder = ("Cedula Incorrecta")
			document.getElementById("cedula").value="";}
			else{
			document.getElementById("cedula1").focus();
			document.getElementById("cedula1").placeholder = ("Cedula Incorrecta")
			document.getElementById("cedula1").value="";
			}
		
          }

        }else{
          // imprimimos en consola si la region no pertenece
          
         // alert('Esta cedula no pertenece a ninguna region');
		 if(ban==0){
		  document.getElementById("cedula").focus();
			//document.getElementById("cedula").placeholder = ("Cedula Invalida")
			document.getElementById("cedula").placeholder = "Esta cedula es Incorrecta"; 
            document.getElementById("cedula").value="";}
			else{
				 document.getElementById("cedula1").focus();
			//document.getElementById("cedula").placeholder = ("Cedula Invalida")
			document.getElementById("cedula1").placeholder = "Esta cedula es Incorrecta"; 
            document.getElementById("cedula1").value="";}
        }
     }else{
        //imprimimos en consola si la cedula tiene mas o menos de 10 digitos
        
        //alert('El número de digitos es diferente de 10');
		if(ban==0){
		document.getElementById("cedula").focus();
			//document.getElementById("cedula").placeholder = ("Cedula Invalida")
			document.getElementById("cedula").placeholder = "El número de digitos es diferente de 10"; 
            document.getElementById("cedula").value="";}
			else{
			document.getElementById("cedula1").focus();
			//document.getElementById("cedula").placeholder = ("Cedula Invalida")
			document.getElementById("cedula1").placeholder = "El número de digitos es diferente de 10"; 
            document.getElementById("cedula1").value="";}
     }    
    
    
}
function NumCheck(e, field) {

 
 var n=Math.abs(field.value);
 var part_ent=Math.floor(parseFloat(field.value));
 
 if(part_ent<=999 && part_ent>=0){
	 var part_decimal=parseFloat(field.value).toFixed(2);
	 field.value=part_decimal;
	 
	 
 }
}
	
	function cerrarw(){
window.close()
}
