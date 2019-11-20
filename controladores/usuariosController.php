<?php

class UsuariosController extends Controlador {
    public $conector;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conector = new Conector();
        $this->adapter = $this->conector->conexion();
    }

    public function acceder()
    {
        $msj = "Bienvenido";
        $this->mostrarVista("usuarios/acceso",array(
            "msj" => $msj,
        ));
        echo "Acceder";
    }
    
    public function lista(){
        $usuario = new Usuario($this->adapter);
        $usrs = $usuario->traerTodosConPersona();		
        $titulo = "Usuarios del sistema";
        $this->mostrarVista("usuarios/lista",array(
            "usrs" => $usrs,
            "titulo" => $titulo
        ));
    }

    public function ver($id) {
        $titulo = "Ver ";
        $usuario = new Usuario($this->adapter);
        $usr = $usuario->traerConPersonaPorId($id);      
        $this->mostrarVista("usuarios/ver",array(
            "usr" => $usr,
            "titulo" => $titulo
        ));
    }

    public function nuevo(){
        $titulo = "Crear usuario";
        $this->mostrarVista("usuarios/crear",array(
            "titulo" => $titulo
        ));
    }

    public function modificar() {        
        if(isset($_GET["id"])) {
            $usuario = new Usuario($this->adapter);
            $res = $usuario->traerConPersonaPorId($_GET["id"]);
            if (count($res) > 0) {
            $usr = reset($res);
                if ($usr != false) {
                    $titulo = "Modificando: " . $usr["nombres"];
                    $this->mostrarVista("usuarios/modificar",array(
                        "usr" => $usr,
                        "titulo" => $titulo
                    )); 
                }
            }
        }
    }
    
    public function crear(){
        if(isset($_POST["correo"])){
            $usuario = new Usuario($this->adapter);
            $usuario->setCodigo($_POST["codigo"]);
            $usuario->setClave(password_hash($_POST["clave"], PASSWORD_DEFAULT));
            $usuario->setNombres($_POST["nombres"]);
            $usuario->setCorreo($_POST["correo"]);
            $usuario->setDireccion($_POST["direccion"]);
            $usuario->setTelefonos($_POST["telefonos"]);
            $usuario->setCedula($_POST["cedula"]);
            $usuario->guardar();
        }
        $this->redirect("usuarios", "lista");
    }

    public function actualizar(){
        if(isset($_POST["correo"])){
            $usuario = new Usuario($this->adapter);
            $usuario->setId($_POST["id"]);
            $usuario->setCodigo($_POST["codigo"]);
            $cve = $_POST["clave"];
            if (!empty($cve)) {
                $usuario->setClave(password_hash($cve, PASSWORD_DEFAULT));
            }
            $usuario->setNombres($_POST["nombres"]);
            $usuario->setCorreo($_POST["correo"]);
            $usuario->setDireccion($_POST["direccion"]);
            $usuario->setTelefonos($_POST["telefonos"]);
            $usuario->setCedula($_POST["cedula"]);
            $usuario->setPersona($_POST["persona"]);    
            $usuario->actualizar();
        }
        $this->redirect("usuarios", "lista");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id = (int)$_GET["id"];
            $usuario = new Usuario($this->adapter);
            $usuario->eliminarPorId($id); 
        }
        $this->redirect("usuarios", "lista");
    }

    public function acceso() {
        $ret = -1;
        if(isset($_GET["correo"])) { 
            $correo = $_GET["correo"];
            $clave = $_GET["clave"];
            $usrdb = new Usuario($this->adapter);
            $ret = $usrdb->validar($correo, $clave);
        }
        echo $ret;
    }

    public function salir()
    {
        @session_start(); 
        unset($_SESSION['usrNombre']);
        unset($_SESSION['usrId']);
        $this->redirect("usuarios", "acceder");
    }

}

?>
