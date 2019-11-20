<?php

class AgendaController extends Controlador {
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
        $ag = new Agenda($this->adapter);
        $pags = $ag->traerPaginas(ITEMS_PAGINACION);
        $ini = ($pag-1) * ITEMS_PAGINACION;
        $citas = $ag->citasPaginado($ini, ITEMS_PAGINACION);
        $titulo = "Administrar agendamiento";
        $this->mostrarVista("agenda/lista",array(
            "citas" => $citas,
            "pags" => $pags, 
            "pag" => $pag,
            "titulo" => $titulo
        ));
    }

    public function calendario() {
        $ag = new Agenda($this->adapter);
        $citas = $ag->citasAgendadas();
        $titulo = "Administrar agendamiento";
        $this->mostrarVista("agenda/calendario",array(
            "citas" => $citas,
            "titulo" => $titulo
        ));
    }

    public function nuevo() {
        $titulo = "Registrar nueva cita";
        $origen = "lista";
        if (isset($_GET["origen"]))
            $origen = $_GET["origen"];
        $this->mostrarVista("agenda/crear",array(
            "titulo" => $titulo,
            "origen" => $origen
        ));
    }

    public function modificar() {
        if(isset($_GET["id"])) {
            $citadb = new Agenda($this->adapter);
            $cita = $citadb->traerPorId($_GET["id"]);
            $cita = reset($cita); 
            if ($cita != false) { 
                $titulo = "Modificando cita"; 
                $cid = $cita["cliente"]; 
                $clidb = new Cliente($this->adapter); 
                $prodb = new Producto($this->adapter); 
                $estdb = new Estilista($this->adapter);
                $cli = $clidb->traerConPersonaPorId($cita["cliente"]); 
                $cli = reset($cli);
                if ($cli == false) 
                    $cli = array('nombres' => '');
                $pro = $prodb->traerPorId($cita["producto"]); 
                $pro = reset($pro); 
                if ($pro == false) 
                    $pro = array('nombre' => ''); 
                $eli = $estdb->traerConPersonaPorId($cita["estilista"]); 
                $eli = reset($eli);
                if ($eli == false) 
                    $eli = array('nombres' => '');    
                $divfh = explode(" ", $cita["fecha"]); 
                $hms = explode(":", $divfh[1]); 
                $hora = $hms[0]; 
                $minutos = $hms[1]; 
                $origen = "lista"; 
                if (isset($_GET["origen"])) 
                    $origen = $_GET["origen"]; 
                $this->mostrarVista("agenda/modificar",array( 
                    "titulo" => $titulo, 
                    "cli" => $cli, 
                    "pro" => $pro,
                    "hora" => $hora,
                    "minutos" => $minutos,
                    "cita" => $cita,
                    "origen" => $origen,
                    "eli" => $eli 
                ));
            }
        }
    } 

    public function crear(){ 
        if(isset($_POST["cliente"])){ 
            $h = $_POST["hora"]; 
            $m = $_POST["minutos"]; 
            $hora = $h . ":" . $m . ":00"; 
            $ag = new Agenda($this->adapter); 
            $ag->setFecha($_POST["fecha"]); 
            $ag->setHora($hora); 
            $ag->setCliente($_POST["cliente"]); 
            $ag->setProducto($_POST["producto"]); 
            $ag->setPrecio($_POST["precio"]); 
            $ag->setEstilista($_POST["estilista"]);
            $res = $ag->guardar();  
        }
        return $this->redirect("agenda", "lista");
    }

    public function actualizar(){
        if(isset($_POST["cliente"])){
            $h = $_POST["hora"]; 
            $m = $_POST["minutos"]; 
            $hora = $h . ":" . $m . ":00"; 
            $ag = new Agenda($this->adapter); 
            $ag->setId($_POST["id"]);
            $ag->setFecha($_POST["fecha"]); 
            $ag->setHora($hora); 
            $ag->setCliente($_POST["cliente"]); 
            $ag->setProducto($_POST["producto"]); 
            $ag->setPrecio($_POST["precio"]);
            $ag->setEstilista($_POST["estilista"]);
            $res = $ag->actualizar();
        }
        return $this->redirect("agenda", "lista");
    }

    public function borrar(){
        if(isset($_GET["id"])){ 
            $id = (int)$_GET["id"];
            $cita = new Agenda($this->adapter);
            $cita->eliminarPorId($id); 
        }
        $this->redirect("agenda", "lista");
    }

    public function clientesBuscar()
    {
        $res = [];
        $clidb = new Cliente($this->adapter);
        $clis = $clidb->traerConPersonas();
        foreach ($clis as $cli)
        {
            $res[] = ['id' => $cli["id"], 'value' => $cli["nombres"], 'cedula' => $cli["cedula"]];
        }        
        echo json_encode($res);
    }

    public function productosBuscar()
    {
        $res = [];
        $prodb = new Producto($this->adapter);
        $pros = $prodb->traerTodos();
        foreach ($pros as $pro)
        {
            $res[] = ['id' => $pro["id"], 'value' => $pro["nombre"], 'precio' => $pro["precio"], 'imagen' => $pro["imagen"]];
        }        
        echo json_encode($res);
    }

    public function estilistasBuscar()
    {
        $res = [];
        $esdb = new Estilista($this->adapter);
        $es = $esdb->traerConPersonas();
        foreach ($es as $eli)
        {
            $res[] = ['id' => $eli["id"], 'value' => $eli["nombres"], 'cedula' => $eli["cedula"]];
        }
        echo json_encode($res);
    }

    public function exportarCitas() {
        $res = []; 
        $ag = new Agenda($this->adapter); 
        $citas = $ag->citasAgendadas(); 
        $fp = fopen('php://memory', 'w'); 
        $res[0]['fecha'] = "Fecha";
        $res[0]['clienteNom'] = "Cliente"; 
        $res[0]['productoNom'] = "Producto"; 
        $res[0]['precio'] = "Precio"; 
        foreach ($citas as $c) { 
            $res[$c['id']]['fecha'] = $c["fecha"]; 
            $res[$c['id']]['clienteNom'] = $c["clienteNom"]; 
            $res[$c['id']]['productoNom'] = $c["productoNom"]; 
            $res[$c['id']]['precio'] = $c["precio"]; 
        }
        foreach ($res as $r) {
            fputcsv($fp, $r);
        }
        fseek($fp, 0);
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="citas.csv";');
        fpassthru($fp);
    }

    public function validarCita() {
        $hora = $_GET['hora'] . ":" . $_GET['minutos'] . ":00"; 
        $sd = substr($_GET['fecha'], 0, 10);
        $dt = trim($sd) . " " . $hora;
        $ag = new Agenda($this->adapter); 
        $res = $ag->validarCita($_GET['estilista'], $dt); 
        echo json_encode($res);
    }
    
}    