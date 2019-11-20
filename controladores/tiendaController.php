<?php

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class TiendaController extends Controlador {
    public $conector;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conector = new Conector();
        $this->adapter = $this->conector->conexion();
    }

    private function vistaProductos($cat, $titulo, $pag) {
        $pro = new Producto($this->adapter); 
        $pags = $pro->traerPaginasCategoria(ITEMS_TARJETAS, $cat); 
        $ini = ($pag-1) * ITEMS_TARJETAS; 
        $pros = $pro->traerPorCategoriaPaginado($ini, ITEMS_TARJETAS, $cat); 

        $this->mostrarVista("tienda/productos",array( 
            "pros" => $pros, 
            "pags" => $pags, 
            "pag" => $pag,
            "cat" => $cat,
            "titulo" => $titulo 
        )); 
    } 
    
    public function inicio() { 
        $prodb = new Producto($this->adapter); 
        $pros = $prodb->traerDestacados(); 
        $this->mostrarVista("tienda/inicio",array( 
            "pros" => $pros 
        )); 
    }

    public function inicioMensaje($msj) { 
        $prodb = new Producto($this->adapter); 
        $pros = $prodb->traerDestacados(); 
        $this->mostrarVista("tienda/inicio",array( 
            "pros" => $pros, "msj" => $msj 
        )); 
    } 

    public function productos() {
        $pag = 1;
        if (isset($_GET["pag"]))
        {
            $pag = $_GET["pag"];
        }
        $cat = $_GET["cat"];
        $titulo = "Servicios de Peluqueria";
        if ($cat == 1)
            $titulo = "Servicios de Spa";
        return $this->vistaProductos($cat, $titulo, $pag);
    }

    public function contacto() {
        $this->mostrarVista("tienda/contacto",array(
            "titulo" => "Contacto"
        ));
    }

    public function spa() {
        $pag = 1;
        if (isset($_GET["pag"]))
        {
            $pag = $_GET["pag"];
        }
        return $this->vistaProductos(1, "Servicios de Maquillaje", $pag);
    }

    public function peluqueria() {
        $pag = 1;
        if (isset($_GET["pag"]))
        {
            $pag = $_GET["pag"];
        }
        return $this->vistaProductos(2, "Servicios de Peluqueria", $pag);
    }

    public function guardarContacto() {
        if(isset($_POST["mensaje"])){ 
            $con = new Contacto($this->adapter); 
            $con->setNombres($_POST["nombres"]); 
            $con->setCorreo($_POST["correo"]); 
            $con->setTelefono($_POST["telefono"]); 
            $con->setMensaje($_POST["mensaje"]); 
            $res = $con->guardar(); 
        }
        $this->inicioMensaje("Hemos recibido tu mensaje. Tambien puedes llamar al: " . TELEFONONUMERO);
    }

    public function guardarCita() {
        $h = $_POST["hora"]; 
        $m = $_POST["minutos"]; 
        $hora = $h . ":" . $m . ":00"; 

        $clidb = new Cliente($this->adapter); 
        $cli = $clidb->traerCrear($_POST["nombres"], $_POST["cedula"], $_POST["telefonos"], $_POST["direccion"], $_POST["correo"]); 
        $cid = (int)$cli;
        if ($cid > 0)
        {
            $ag = new Agenda($this->adapter); 
            $ag->setFecha($_POST["fecha"]); 
            $ag->setHora($hora); 
            $ag->setCliente($cli); 
            $ag->setProducto($_POST["producto"]); 
            $ag->setEstilista($_POST["estilista"]);
            $ag->setPrecio($_POST["precio"]); 
            $res = $ag->guardar(); 
            
            $clidb = new Cliente($this->adapter); 
            $clis = $clidb->traerPorId($_POST["producto"]);
            $correo = $_POST["correo"];
            if($correo) { 
                $prodb = new Producto($this->adapter); 
                $res = $prodb->traerPorId($_POST["producto"]);
                if(count($res) > 0) { 
                    $pro = reset($res);
                }
                
                $elidb = new Estilista($this->adapter); 
                $elis = $elidb->traerConPersonaPorId($_POST["estilista"]);
                if(count($elis) > 0) { 
                    $eli = reset($elis);
                }
    
                $mail = new PHPMailer;
                $mail->isSMTP();
                //$mail->SMTPDebug = 2;
                $mail->Host = 'mx1.hostinger.com';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->Username = 'reservaciones@dkristel.site';
                $mail->Password = 'iL*]2@th_#';
                $mail->setFrom('reservaciones@dkristel.site', 'DKristel peluqueria');
                $mail->addAddress($correo, 'Cliente DKristel');
                $mail->Subject = 'Confirmacion de agendamiento';
                $mail->msgHTML('
                    <html> 
                    <head> 
                        <title>Bienvenido a D Kristel peluqueria</title> 
                    </head> 
                    <body> 
                        <h1>Gracias por su reservacion!</h1> 
                        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
                            <tr> 
                                <th>Fecha y hora:</th><td>'. $_POST["fecha"] . ' ' . $hora . '</td> 
                            </tr> 
                            <tr style="background-color: #e0e0e0;"> 
                                <th>Producto:</th><td>' . $pro['nombre'] . '</td> 
                            </tr> 
                            <tr style="background-color: #e0e0e0;"> 
                                <th>Estilista:</th><td>' . $eli['nombres'] . '</td> 
                            </tr> 
                            <tr> 
                                <th>Visitenos:</th><td><a href="https://dkristel.site">dkristel.site</a></td> 
                            </tr> 
                        </table> 
                    </body> 
                    </html>'
                );
                $mail->AltBody = 'Este correo confirma el agendamiento de su cita';
                //$mail->addAttachment('test.txt');
                if (!$mail->send()) {
                    $this->inicioMensaje("Tu cita fue agendada exitosamente. Para mas informacion llamar al: " . TELEFONONUMERO);
                } else {
                    $this->inicioMensaje("Tu cita fue agendada exitosamente. Para referencia se ha enviado un correo de confirmacion");
                }
            }
            return false;
        }
        return false;
    }

    public function agendar() {
        if(isset($_GET["id"])) { 
            $id = (int)$_GET["id"]; 
            $prodb = new Producto($this->adapter); 
            $res = $prodb->traerPorId($id); 
            $elidb = new Estilista($this->adapter); 
            $elis = $elidb->traerConPersonas(); 
            $citaDb = new Agenda($this->adapter);
            $citas = $citaDb->citasAgendadasProducto($id);
            if(count($res) > 0) { 
                $pro = array_values($res)[0]; 
                $this->mostrarVista("tienda/cita",array( 
                    "titulo" => "Agendar cita", 
                    "pro" => $pro,
                    "elis" => $elis,
                    "citas" => $citas
                )); 
            } 
        } 
    }

    public function mensajes() {
        $pag = 1;
        if (isset($_GET["pag"]))
        {
            $pag = $_GET["pag"];
        }
        
        $mdb = new Contacto($this->adapter); 
        $pags = $mdb->traerPaginas(ITEMS_PAGINACION);
        $ini = ($pag-1) * ITEMS_PAGINACION;
        $mens = $mdb->traerPaginado($ini, ITEMS_PAGINACION); 
        $titulo = "Gestor de mensajes de contacto"; 

        $this->mostrarVista("tienda/mensajeslista",array( 
            "mens" => $mens, 
            "pags" => $pags, 
            "pag" => $pag,
            "titulo" => $titulo 
        ));
    } 

    public function mensajever () {
        if(isset($_GET["id"])) {
            $cdb = new Contacto($this->adapter);
            $res = $cdb->traerPorId($_GET["id"]);
            if (count($res) > 0) {
            $men = reset($res);
                if ($men != false) {
                    $titulo = "Modificando mensaje de contacto";
                    $this->mostrarVista("tienda/mensajesver",array(
                        "men" => $men,
                        "titulo" => $titulo
                    )); 
                }
            }
        }
    }

    public function mensajeborrar() {
        if(isset($_GET["id"])){ 
            $id = (int)$_GET["id"];
            $mdb = new Contacto($this->adapter);
            $mdb->eliminarPorId($id); 
        }
        $this->redirect("tienda", "mensajes");
    }
}

?>