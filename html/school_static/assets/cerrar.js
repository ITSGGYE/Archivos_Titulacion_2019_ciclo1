  function cerrar() 
	{
	var ventana = window.self;
	ventana.opener = window.self;
	ventana.close();
   }

     function abrir()
  {
  //window.open("","https://affinity.compraneta.com/delivery/cerrar/");
  //window.location='https://affinity.compraneta.com/delivery/cerrar/'; 
  
  //open(location, '_self').close();
  //window.open("","_self"); /* url = "" or "about:blank"; target="_self" */

  //window.close();
  

  objWindow = window.open('https://affinity.compraneta.com/delivery/cerrar/', '_self');
  //
  }