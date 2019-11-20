<?php 

     class conectar  {
        public function conexion(){
            $conexion = mysqli_connect('localhost', 'root', '', 'puntofrio');
            $conexion->set_charset('utf8');
            return $conexion;
        }
     }

     class crud{
        public function agregarh($datos){
            $obj = new conectar();
            $conexion = $obj->conexion();

            $sql = "INSERT INTO historial (id_vehiculo,fecha,descripcion)
                    VALUES ('$datos[0]','$datos[1]','$datos[2]')";

            return mysqli_query($conexion, $sql);
        }
    

    public function obtenDatosh($idjuego){
        $obj = new conectar();
        $conexion = $obj->conexion();

        $sql="SELECT  id, id_vehiculo, fecha, descripcion
                        from historial WHERE id = '$idjuego'";
        $result = mysqli_query($conexion,$sql);
        $ver = mysqli_fetch_row($result);

        $datos = array(
            'id'=> $ver[0] ,
            'id_vehiculo'=> $ver[1] ,
            'fecha'=> $ver[2] ,
            'descripcion'=> $ver[3]
        );
        return $datos;
       }  

       public function actualizarh($datos){
        $obj= new conectar();
        $conexion = $obj->conexion();

        $sql="UPDATE historial set id_vehiculo='$datos[0]', fecha='$datos[1]', descripcion='$datos[2]' 
              WHERE ='$datos[3]'";
        return mysqli_query($conexion,$sql);      
       }
       public function eliminarh($idjuego){
        $obj= new conectar();
        $conexion = $obj->conexion();

        $sql="DELETE FROM historial WHERE id='$idjuego'";
        return mysqli_query($conexion,$sql); 
       }
    }
    // require_once "../clases/conexion.php";
    // require_once "../clases/crud.php";
    $obj = new crud();

    echo json_encode($obj->obtenDatosh($_POST['idjuego']));
    

 ?>