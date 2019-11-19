    <?php
 
include('is_logged.php');//
?><?php
 
 
		if (empty($_POST['firstname'])){
			$errors[] = "Nombres vacíos";
		} elseif (empty($_POST['lastname'])){
			$errors[] = "Apellidos vacíos";
		}  elseif (empty($_POST['user_name'])) {
            $errors[] = "Nombre de usuario vacío";
        } elseif (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
            $errors[] = "Contraseña vacía";
        } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
            $errors[] = "la contraseña y la repetición de la contraseña no son lo mismo";
        } elseif (strlen($_POST['user_password_new']) < 6) {
            $errors[] = "La contraseña debe tener como mínimo 6 caracteres";
        } elseif (strlen($_POST['user_name']) > 64 || strlen($_POST['user_name']) < 2) {
            $errors[] = "Nombre de usuario no puede ser inferior a 2 o más de 64 caracteres";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])) {
            $errors[] = "Nombre de usuario no encaja en el esquema de nombre: Sólo aZ y los números están permitidos , de 2 a 64 caracteres";
        }    elseif (
			!empty($_POST['user_name'])
			&& !empty($_POST['firstname'])
			&& !empty($_POST['lastname'])
            && strlen($_POST['user_name']) <= 64
            && strlen($_POST['user_name']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['user_name'])
            && !empty($_POST['user_password_new'])
            && !empty($_POST['user_password_repeat'])
            && ($_POST['user_password_new'] === $_POST['user_password_repeat'])
        ) {
            require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
			require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
			
				// escaping, additionally removing everything that could be (html/javascript-) code
                $firstname = mysqli_real_escape_string($con,(strip_tags($_POST["firstname"],ENT_QUOTES)));
				$lastname = mysqli_real_escape_string($con,(strip_tags($_POST["lastname"],ENT_QUOTES)));
				$user_name = mysqli_real_escape_string($con,(strip_tags($_POST["user_name"],ENT_QUOTES))); 
                $mod_estado = mysqli_real_escape_string($con,(strip_tags($_POST["mod_estado"],ENT_QUOTES))); 
                $mod_rol = mysqli_real_escape_string($con,(strip_tags($_POST["rol"],ENT_QUOTES))); 
                 $sucursal_cliente = mysqli_real_escape_string($con,(strip_tags($_POST["sucursal_cliente"],ENT_QUOTES))); 
				$user_password = $_POST['user_password_new'];
 
                // crypt the user's password with PHP 5.5's password_hash() function, results in a 60 character
                // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
                // PHP 5.3/5.4, by the password hashing compatibility library
				$user_password_hash =md5('$user_password'); 
                // check if user or email address already exists
                $sql = "SELECT * FROM usuarios  WHERE User_Nombre = '" . $user_name . "'  ;";
                $query_check_user_name = mysqli_query($con,$sql);
				$query_check_user=mysqli_num_rows($query_check_user_name);
                if ($query_check_user == 1) {
                    $errors[] = "Lo sentimos , el nombre de usuario ya está en uso.";
                } else {
					// write new user's data into database
                    $sql = "INSERT INTO usuarios (User_Nombre, User_Apellido, User_Nam, User_Pass,User_Estado,Rol_Id,Sucur_Id)
                            VALUES('".$firstname."','".$lastname."','" . $user_name . "', '" . $user_password_hash . "','".$mod_estado."','".$mod_rol."','".$sucursal_cliente."');";
                    $query_new_user_insert = mysqli_query($con,$sql);

                    // if user has been added successfully
                    if ($query_new_user_insert) {
                        $messages[] = "La cuenta ha sido creada con éxito.";
                    } else {
                        $errors[] = "Lo sentimos , el registro falló. Por favor, regrese y vuelva a intentarlo.";
                    }
                }
            
        } else {
            $errors[] = "Un error desconocido ocurrió.";
        }
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>