<?php 

     class conectar  {
        public function conexion(){
            $conexion = mysqli_connect('localhost', 'root', '', 'puntofrio');
            $conexion->set_charset('utf8');
            return $conexion;
        }
     }

     class crud{
        public function agregarc($datos){
            $obj = new conectar();
            $conexion = $obj->conexion();

            $sql = "INSERT INTO clientes (nombre,email,telefono,direccion)
                    VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]')";

            return mysqli_query($conexion, $sql);
        }
    

    public function obtenDatosc($idjuego){
        $obj = new conectar();
        $conexion = $obj->conexion();

        $sql="SELECT  id_clientes, nombre, email, telefono, direccion
                        from clientes WHERE id_clientes = '$idjuego'";
        $result = mysqli_query($conexion,$sql);
        $ver = mysqli_fetch_row($result);

        $datos = array(
            'id_clientes'=> $ver[0] ,
            'nombre'=> $ver[1] ,
            'email'=> $ver[2] ,
            'telefono'=> $ver[3] ,
            'direccion'=> $ver[4]
        );
        return $datos;
       }  

       public function actualizarc($datos){
        $obj= new conectar();
        $conexion = $obj->conexion();

        $sql="UPDATE clientes set nombre='$datos[0]', email='$datos[1]', telefono='$datos[2]', direccion='$datos[3]' 
              WHERE id_clientes='$datos[4]'";
        return mysqli_query($conexion,$sql);      
       }
       public function eliminarc($idjuego){
        $obj= new conectar();
        $conexion = $obj->conexion();

        $sql="DELETE FROM clientes WHERE id_clientes='$idjuego'";
        return mysqli_query($conexion,$sql); 
       }
    }
    // require_once "../clases/conexion.php";
    // require_once "../clases/crud.php";
    $obj = new crud();

    echo $obj->eliminarc($_POST['idjuego']); 
    

 ?>