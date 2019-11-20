<?php

class ProductosController extends Controlador {
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
        
        $pro = new Producto($this->adapter); 
        $pags = $pro->traerPaginas(ITEMS_PAGINACION);
        $ini = ($pag-1) * ITEMS_PAGINACION;
        $pros = $pro->traerPaginado($ini, ITEMS_PAGINACION); 
        $titulo = "Administrar directorio de productos"; 

        $this->mostrarVista("productos/lista",array( 
            "pros" => $pros, 
            "pags" => $pags, 
            "pag" => $pag,
            "titulo" => $titulo 
        ));
    }

    public function nuevo(){
        $titulo = "Crear Producto";
        $this->mostrarVista("productos/crear",array(
            "titulo" => $titulo
        ));
    }

    public function modificar() {
        if(isset($_GET["id"])) {
            $prod = new Producto($this->adapter);
            $res = $prod->traerPorId($_GET["id"]);
            if (count($res) > 0) {
            $pro = reset($res);
                if ($pro != false) {
                    $titulo = "Modificando: " . $pro["nombre"];
                    $this->mostrarVista("productos/modificar",array(
                        "pro" => $pro,
                        "titulo" => $titulo
                    )); 
                }
            }
        }
    }
    
    public function crear(){
        if(isset($_POST["nombre"])){
            $prod = new Producto($this->adapter);
            $imgid = $prod->traerUltimoId();
            $imgid = $imgid + 1;
            $imgn = 'ps' . $imgid . '.jpg';
            $imgd = $_SERVER["DOCUMENT_ROOT"] . RUTAIMGPRODUCTOS . DIRECTORY_SEPARATOR . $imgn; 
            $imgo = $_FILES["imagen"];
            $imgres = "";
            $val = getimagesize($imgo["tmp_name"]);
            if ($val !== false) {
                if (!file_exists($imgd)) {
                    if (move_uploaded_file($imgo["tmp_name"], $imgd)) {
                        $imgres = $imgn;
                    }
                }
            }
            $prod->setNombre($_POST["nombre"]); 
            $prod->setPrecio($_POST["precio"]); 
            $prod->setCategoria($_POST["categoria"]); 
            $prod->setDuracion($_POST["duracion"]); 
            $prod->setImagen($imgres); 
            $prod->setDescripcion($_POST["descripcion"]); 
            $prod->setActivo(1);
            $prod->guardar();
        }
        return $this->redirect("productos", "lista");
    }

    public function actualizar(){
        if(isset($_POST["nombre"])){ 
            $prod = new Producto($this->adapter); 
            $imgn = 'ps' . $_POST["id"] . '.jpg'; 
            $imgd = $_SERVER["DOCUMENT_ROOT"] . RUTAIMGPRODUCTOS . DIRECTORY_SEPARATOR . $imgn; 
            $imgt = $_FILES["imagen"]["tmp_name"];
            if($imgt != "") {
                $val = getimagesize($imgt); 
                if ($val !== false) { 
                    if (file_exists($imgd)) { 
                        unlink($imgd); 
                    } 
                    if (move_uploaded_file($imgt, $imgd)) { 
                        $prod->setImagen($imgn); 
                    } 
                } 
                $prod->setImagen($imgn); 
            }
            
            $prod->setId($_POST["id"]); 
            $prod->setNombre($_POST["nombre"]); 
            $prod->setPrecio($_POST["precio"]); 
            $prod->setCategoria($_POST["categoria"]); 
            $prod->setDuracion($_POST["duracion"]); 
            $prod->setDescripcion($_POST["descripcion"]); 
            $prod->actualizar(); 
        }
        return $this->redirect("productos", "lista");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id = (int)$_GET["id"];
            $prod = new Producto($this->adapter);
            $prod->eliminarPorId($id); 
        }
        $this->redirect("productos", "lista");
    }
    
}    