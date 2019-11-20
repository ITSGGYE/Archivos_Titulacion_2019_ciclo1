<?php  
 session_start();  
 if(isset($_SESSION["user"]))  
 {  
      header("location:inicio.php");  
 }  
 
 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>MOTEL EL PARQUE ADMIN</title>
  
  
     
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div id="clouds">
	<div class="cloud x1"></div>
  
  <BR><BR><BR><BR>
 <div class="container">
<CENTER><img alt="" src="assets/img/hostal.png" width="420" height="420"></CENTER>




      <div id="login">
       

        <form method="post">

          <fieldset class="clearfix">

            <p><span class="fontawesome-user"></span><input type="text"  name="user" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required></p> <!-- JS debido al soporte de IE; mejor: marcador de posición = "Nombre de usuario" -->
            <p><span class="fontawesome-lock"></span><input type="password" name="pass"  value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p> 
            <!-- JS debido al soporte de IE; mejor: marcador de posición = "Contraseña"-->
            <p><input type="submit" name="sub"  value="Login"></p>

          </fieldset>

        </form>

  

      </div> <!-- fin de inicio de sesión -->

    </div>
<!-- Tiempo para que varias nubes bailen alrededor -->
	<div class="cloud x2"></div>
	<div class="cloud x3"></div>
	<div class="cloud x4"></div>
	<div class="cloud x5"></div>
</div>

    <div class="bottom">  <h3><a href="../index.php"></a></h3></div>
  
  
</body>
</html>

<?php
   include('db.php');
  
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
     
// nombre de usuario y contraseña enviados desde el formulario
      
      $myusername = mysqli_real_escape_string($con,$_POST['user']);
      $mypassword = mysqli_real_escape_string($con,$_POST['pass']); 
      
      $sql = "SELECT id FROM login WHERE usname = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
// Si el resultado coincide con $ myusername y $ mypassword, la fila de la tabla debe ser 1 fila
      
		
      if($count == 1) {
         
         $_SESSION['user'] = $myusername;
         
         header("location: inicio.php");
      }else {
         echo '<script>alert("
El nombre de usuario o la contraseña no son válidos") </script>' ;
      }
   }
?>
