<?php

session_start();
session_destroy();

echo "<html><head><script language='JavaScript'>
  		function cargar(){
			
        if(typeof(parent) != 'undefined'){
            parent.window.location.href='../index.html'
        }else{
            window.location.href='../index.html'
        }}
    </script></head>
	<body onload='javascript:cargar()'></body></html>";


?>