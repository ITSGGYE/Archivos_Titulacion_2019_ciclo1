<?php

class EstilistasController extends Controlador {
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
        
        $eli = new Estilista($this->adapter); 
        $pags = $eli->traerPaginas(ITEMS_PAGINACION);
        $ini = ($pag-1) * ITEMS_PAGINACION;
        $elis = $eli->traerPaginadoElis($ini, ITEMS_PAGINACION); 
        $titulo = "Administrar estilistas"; 

        $this->mostrarVista("estilistas/lista",array( 
            "elis" => $elis, 
            "pags" => $pags, 
            "pag" => $pag,
            "titulo" => $titulo 
        ));
    } 

    public function nuevo(){
        $titulo = "Crear Estilista";
        $this->mostrarVista("estilistas/crear",array(
            "titulo" => $titulo
        ));
    }

    public function modificar() {
        if(isset($_GET["id"])) {
            $estil = new Estilista($this->adapter);
            $res = $estil->traerConPersonaPorId($_GET["id"]);
            if (count($res) > 0) {
                $eli = reset($res);
                if ($eli != false) {
                    $titulo = "Modificando: " . $eli["nombres"];
                    $this->mostrarVista("estilistas/modificar",array(
                        "eli" => $eli,
                        "titulo" => $titulo
                    )); 
                }
            }
        }
    }
    
    public function crear(){
        if(isset($_POST["nombres"])){
            $estil = new Estilista($this->adapter);
            $estil->setNombres($_POST["nombres"]); 
            $estil->setCorreo($_POST["correo"]); 
            $estil->setTelefonos($_POST["telefonos"]); 
            $estil->setCedula($_POST["cedula"]); 
            $estil->setDireccion($_POST["direccion"]); 
            $save=$estil->guardar();
        }
        return $this->redirect("estilistas", "lista");
    }

    public function actualizar(){
        if(isset($_POST["correo"])){
            $estil = new Estilista($this->adapter);
            $estil->setId($_POST["id"]);
            $estil->setNombres($_POST["nombres"]); 
            $estil->setCorreo($_POST["correo"]); 
            $estil->setTelefonos($_POST["telefonos"]); 
            $estil->setCedula($_POST["cedula"]); 
            $estil->setDireccion($_POST["direccion"]); 
            $estil->setPersona($_POST["persona"]); 
            $estil->actualizar();
        }
        return $this->redirect("estilistas", "lista");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id = (int)$_GET["id"];
            $estil = new Estilista($this->adapter);
            $estil->eliminarPorId($id); 
        }
        $this->redirect("estilistas", "lista");
    }
    
}    