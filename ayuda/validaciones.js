function validarFormVacio(formulario){
		datos=$('#' + formulario).serialize();
		d=datos.split('&');
		vacios=0;
		for(i=0;i< d.length;i++){
				controles=d[i].split("=");
				if(controles[1]=="A" || controles[1]==""){
					vacios++;
				}
		}
		return vacios;
	}

function sololetras(e){
	key=e.keyCode || e.which;
	teclado=String.fromCharCode(key).toLowerCase();
	nombre=" abcdefghijklmnñopqrstuvwxyz";
	especiales="8-37-38-46-164";
	teclado_especial=false;
	for (var i in especiales){
		if(key==especiales[i]){
			teclado_especial=true;  break;
		}
	}
	
	if(nombre.indexOf(teclado)==-1 &&!teclado_especial){
		return false;
	}
}

function sololetras2(e){
	key=e.keyCode || e.which;
	teclado=String.fromCharCode(key).toLowerCase();
	nombre=" abcdefghijklmnñopqrstuvwxyzÁÉÍÚÓáéíóú2";
	especiales="8-37-38-46-164";
	teclado_especial=false;
	for (var i in especiales){
		if(key==especiales[i]){
			teclado_especial=true;  break;
		}
	}
	
	if(nombre.indexOf(teclado)==-1 &&!teclado_especial){
		return false;
	}
}
function solonumero(e){
	key=e.keyCode || e.which;
	teclado=String.fromCharCode(key);
	numero="0123456789-";
	especiales="8-37-38-46";
	teclado_especial=false;
	for(var i in especiales){
		if(key==especiales[i]){
			teclado_especial=true;
		}
	}
	if(numero.indexOf(teclado)==-1 && !teclado_especial){
		
return false;
	}
}