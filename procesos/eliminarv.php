<?php 

     class conectar  {
        public function conexion(){
            $conexion = mysqli_connect('localhost', 'root', '', 'puntofrio');
            $conexion->set_charset('utf8');
            return $conexion;
        }
     }

     class crud{
        public function agregarv($datos){
            $obj = new conectar();
            $conexion = $obj->conexion();

            $sql = "INSERT INTO vehiculo (placa,marca,modelo,color,motor,anio,propietario)
                    VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]')";

            return mysqli_query($conexion, $sql);
        }
    

    public function obtenDatosv($idjuego){
        $obj = new conectar();
        $conexion = $obj->conexion();

        $sql="SELECT  id_vehiculo, placa, marca, modelo, color, motor, anio, propietario
                        from vehiculo WHERE id_vehiculo = '$idjuego'";
        $result = mysqli_query($conexion,$sql);
        $ver = mysqli_fetch_row($result);

        $datos = array(
            'id_vehiculo'=> $ver[0] ,
            'placa'=> $ver[1] ,
            'marca'=> $ver[2] ,
            'modelo'=> $ver[3] ,
            'color'=> $ver[4],
            'motor'=> $ver[5],
            'anio'=> $ver[6],
            'propietario'=> $ver[7]
        );
        return $datos;
       }  

       public function actualizarv($datos){
        $obj= new conectar();
        $conexion = $obj->conexion();

        $sql="UPDATE vehiculo set placa='$datos[0]', marca='$datos[1]', modelo='$datos[2]', color='$datos[3]', motor='$datos[4]', anio='$datos[5]', propietario='$datos[6]' 
              WHERE id_vehiculo='$datos[7]'";
        return mysqli_query($conexion,$sql);      
       }
       public function eliminarv($idjuego){
        $obj= new conectar();
        $conexion = $obj->conexion();

        $sql="DELETE FROM vehiculo WHERE id_vehiculo='$idjuego'";
        return mysqli_query($conexion,$sql); 
       }
    }
    // require_once "../clases/conexion.php";
    // require_once "../clases/crud.php";
    $obj = new crud();

    echo $obj->eliminarv($_POST['idjuego']); 
    

 ?>