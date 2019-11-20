function caray(){
	var cedula;
	cedula=document.getElementById('cedula').value;
    var c, suma=0,acum,resta=0;
for (i = 0; i < cedula.length()-1; i++) {
		c=Interger.parseInt(cedula.charAt(i)+"");
		if(i%2==0){
			c=c*2;
			if(c>9){
				c=c-9;
			}
		}
		suma=suma+c;
	}
	if(suma%10  !=0){
		acum=((suma/10)+1)*10;
		resta=acum-suma;
	}
	int ultima=Interger.parseInt(cedula.charAt(9)+"");
	if (ultima==resta) {
	alert("numero de cedula incorrecto");
	return false;
	}
}