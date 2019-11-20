<?php

class ClientesController extends Controlador {
    public $conector;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conector = new Conector();
        $this->adapter = $this->conector->conexion();
    }
    
    public function lista() { 
        $pag = 1;
        if (isset($_GET["pag"]))
        {
            $pag = $_GET["pag"];
        }
        
        $cli = new Cliente($this->adapter); 
        $pags = $cli->traerPaginas(ITEMS_PAGINACION);
        $ini = ($pag-1) * ITEMS_PAGINACION;
        $clis = $cli->traerPaginadoClis($ini, ITEMS_PAGINACION); 
        $titulo = "Administrar directorio de clientes"; 

        $this->mostrarVista("clientes/lista",array( 
            "clis" => $clis, 
            "pags" => $pags, 
            "pag" => $pag,
            "titulo" => $titulo 
        ));
    } 

    public function nuevo(){
        $titulo = "Crear Cliente";
        $this->mostrarVista("clientes/crear",array(
            "titulo" => $titulo
        ));
    }

    public function modificar() {
        if(isset($_GET["id"])) {
            $cliente = new Cliente($this->adapter);
            $res = $cliente->traerConPersonaPorId($_GET["id"]);
            if (count($res) > 0) {
                $cli = reset($res);
                if ($cli != false) {
                    $titulo = "Modificando: " . $cli["nombres"];
                    $this->mostrarVista("clientes/modificar",array(
                        "cli" => $cli,
                        "titulo" => $titulo
                    )); 
                }
            }
        }
    }
    
    public function crear(){
        if(isset($_POST["nombres"])){
            $cliente = new Cliente($this->adapter);
            $cliente->setNombres($_POST["nombres"]); 
            $cliente->setCorreo($_POST["correo"]); 
            $cliente->setTelefonos($_POST["telefonos"]); 
            $cliente->setCedula($_POST["cedula"]); 
            $cliente->setDireccion($_POST["direccion"]); 
            $save=$cliente->guardar();
        }
        return $this->redirect("clientes", "lista");
    }

    public function actualizar(){
        if(isset($_POST["correo"])){
            $cliente = new Cliente($this->adapter);
            $cliente->setId($_POST["id"]);
            $cliente->setNombres($_POST["nombres"]); 
            $cliente->setCorreo($_POST["correo"]); 
            $cliente->setTelefonos($_POST["telefonos"]); 
            $cliente->setCedula($_POST["cedula"]); 
            $cliente->setDireccion($_POST["direccion"]); 
            $cliente->setPersona($_POST["persona"]); 
            $cliente->actualizar();
        }
        return $this->redirect("clientes", "lista");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id = (int)$_GET["id"];
            $cliente = new Cliente($this->adapter);
            $cliente->eliminarPorId($id); 
        }
        $this->redirect("clientes", "lista");
    }
    
}    