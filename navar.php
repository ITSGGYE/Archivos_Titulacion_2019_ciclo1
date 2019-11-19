<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Navegando</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style="color: white;     font-weight: bold;"  class="navbar-brand" href="./"><b>COLGYE</b></a>
  
  

    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <ul class="nav navbar-nav">
<li><a style="color: white;     font-weight: bold;" href="index.php">Inicio</a></li>
        <li><a  style="color: white;     font-weight: bold;"  href="foro.php">Materias</a></li>
              
     <li><a style="color: white;     font-weight: bold;" href="noticias.php">Noticias</a></li>
          <li><a  style="color: white;     font-weight: bold;"  href="simulador.php">Simulador Ser Bachiller</a></li>
   </ul>
     
<ul class="nav navbar-nav navbar-right"> 
 <li class="dropdown">
        
           <a style="color: white;     font-weight: bold;"  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?>  </a></li>
         
            
          
   <li><a style="color: white;     font-weight: bold;"  href="logout.php">Salir</a>
      </ul> </li> 
          </ul>    
 

    </div>
  </div>
</nav>