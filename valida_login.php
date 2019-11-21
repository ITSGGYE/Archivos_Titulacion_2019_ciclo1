 <?php 

$usuario = $_POST['usu'];
$clave = $_POST['pass'];
$conexion=mysqli_connect("localhost","root","","multimedia");
 $consulta="SELECT * FROM registro WHERE usu='$usuario' and pass='$pass'";
             $resulta = mysqli_query($conexion,$consulta);
             $filas=mysqli_num_rows($resulta);
             if($filas>0){
                header("location:casa.php");
             }else{
                echo " <p class='error'> Error en la autenticacion</p> ";
             }
             mysqli_free_result($resulta);
             mysqli_close($conexion);



 ?>