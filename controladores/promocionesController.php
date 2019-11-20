<?php

class PromocionesController extends Controlador {
    public $conector;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conector = new Conector();
        $this->adapter = $this->conector->conexion();
    }
    
    public function lista() { 
        $pro = new Promocion($this->adapter); 
        $pros = $pro->todos(); 
        $titulo = "Administrar promociones"; 

        $this->mostrarVista("productos/promos",array( 
            "pros" => $pros, 
            "titulo" => $titulo 
        ));
    }

    public function nuevo(){
        $titulo = "Crear Promocion";
        $this->mostrarVista("productos/promocrear",array(
            "titulo" => $titulo
        ));
    }

    public function modificar() {
        if(isset($_GET["id"])) {
            $prod = new Promocion($this->adapter);
            $res = $prod->traerConProductoPorId($_GET["id"]);
            if (count($res) > 0) {
            $pro = reset($res);
                if ($pro != false) {
                    $titulo = "Modificando promocion de: " . $pro["nombre"];
                    $this->mostrarVista("productos/promomod",array(
                        "pro" => $pro,
                        "titulo" => $titulo
                    )); 
                }
            }
        }
    }
    
    public function crear(){
        if(isset($_POST["producto"])){
            $prod = new Promocion($this->adapter);
            $prod->setProducto($_POST["producto"]); 
            $prod->setPorcentaje($_POST["porcentaje"]); 
            $prod->guardar();
        }
        return $this->redirect("promociones", "lista");
    }

    public function actualizar(){
        if(isset($_POST["producto"])){ 
            $prod = new Promocion($this->adapter); 
            $prod->setId($_POST["id"]); 
            $prod->setProducto($_POST["producto"]); 
            $prod->setPorcentaje($_POST["porcentaje"]);  
            $prod->actualizar(); 
        }
        $this->redirect("promociones", "lista");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id = (int)$_GET["id"];
            $prod = new Promocion($this->adapter);
            $prod->eliminarPorId($id); 
        }
        $this->redirect("promociones", "lista");
    }
    
}    