<?php
session_start();
include 'lib/config.php';
include 'lib/socialnetwork-lib.php';

 

if(!isset($_SESSION['usuario']))
{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html class="no-js">
<head>
<?php 
include 'head.php';

 ?>
 
  </head>
 
<?php include 'navar.php'; ?>
 

<div class="container">
<div class="row">
<div class="col-md-12">

   <nav class="nav-inner transparent">

 <div style="float: center; " class="col-md-4">
        <figure class="effect-marley">
          <img   src="images/f.jpeg" alt="" class="img-responsive" />
 
        </figure>
      </div>
      <div style="float: center; " class="col-md-4">
   
        	<style type="text/css">
        		.a{

        	 color: blue;
        	 text-align: center; 
        	 font-size: 30px;
        	 text-transform: capitalize;
        	}.s{

        	 color: blue;
        	 text-align: center; 
        	 font-size: 40px;
        	 text-transform: capitalize;
        	}

        	</style>
      <p class="a">UNIDAD EDUCATIVA FISCAL</p>
      <p class="s">GUAYAQUIL</p>
  
      </div>
     
 
        <div class="col-md-4">
        <figure class="effect-marley">
          <img style="  margin-left: all;   max-width: 55%;" src="images/g.jpeg" alt="" class="img-responsive" />
        
        </figure><br><br><br><br>
      </div>  </nav>
 
   <nav class="nav-inner transparent">
 
   <div style="float: center; " class="col-md-4">
        <figure class="effect-marley">
          <img   src="images/e.jpeg" alt="" class="img-responsive" />
 
        </figure>
      </div>
       <div style="float: center; " class="col-md-4">
        <figure class="effect-marley">
          <img   src="images/a.jpeg" alt="" class="img-responsive" />
 
        </figure>
      </div>
     
 
        <div class="col-md-4">
        <figure class="effect-marley">
          <img style="  margin-left: all;   max-width: 105%;" src="images/d.jpeg" alt="" class="img-responsive" />
        
        </figure>
      </div>  </nav>
<br>
<hr>
<?php 
include 'header.php';

 ?>
</div>
</div>
</div> 
  </body>
</html>
