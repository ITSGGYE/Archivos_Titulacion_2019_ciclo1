<?php 
     // require_once "../clases/conexion.php";
     // require_once "../clases/crud.php";
     /*class conectar  {
     	public function conexion(){
     		$conexion = mysqli_connect('localhost', 'root', '', 'juegos');
     		$conexion->set_charset('utf8');
     		return $conexion;
     	}
     }

     class crud{
        public function agregar($datos){
            $obj = new conectar();
            $conexion = $obj->conexion();

            $sql = "INSERT INTO t_juegos (nombre,anio,empresa)
                    VALUES ('$datos[0]','$datos[1]','$datos[2]')";

            return mysqli_query($conexion, $sql);
        }
    

    public function obtenDatos($idjuego){
        $obj = new conectar();
        $conexion = $obj->conexion();

        $sql="SELECT  id_juego, nombre, anio, empresa
                        from t_juegos WHERE id_juego = '$idjuego'";
        $result = mysqli_query($conexion,$sql);
        $ver = mysqli_fetch_row($result);

        $datos = array(
            'id_juego'=> $ver[0] ,
            'nombre'=> $ver[1] ,
            'anio'=> $ver[2] ,
            'empresa'=> $ver[3]
        );
        return $datos;
       }  

       public function actualizar($datos){
        $obj= new conectar();
        $conexion = $obj->conexion();

        $sql="UPDATE t_juegos set nombre='$datos[0]', anio='$datos[1]', empresa='$datos[2]' 
              WHERE id_juego='$datos[3]'";
        return mysqli_query($conexion,$sql);      
       }
       public function eliminar($idjuego){
        $obj= new conectar();
        $conexion = $obj->conexion();

        $sql="DELETE FROM t_juegos WHERE id_juego='$idjuego'";
        return mysqli_query($conexion,$sql); 
       }
    }
    
    $obj = new crud();

    echo json_encode($obj->obtenDatos($_POST['idjuego'])); */

     class conectar  {
        public function conexion(){
            $conexion = mysqli_connect('localhost', 'root', '', 'puntofrio');
            $conexion->set_charset('utf8');
            return $conexion;
        }
     }

     class crud{
        public function agregar($datos){
            $obj = new conectar();
            $conexion = $obj->conexion();

            $sql = "INSERT INTO repuestos (nombre,modelo,anio,cantidad)
                    VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]')";

            return mysqli_query($conexion, $sql);
        }
    

    public function obtenDatos($idjuego){
        $obj = new conectar();
        $conexion = $obj->conexion();

        $sql="SELECT  id_repuestos, nombre, modelo, anio, cantidad
                        from repuestos WHERE id_repuestos = '$idjuego'";
        $result = mysqli_query($conexion,$sql);
        $ver = mysqli_fetch_row($result);

        $datos = array(
            'id_repuestos'=> $ver[0] ,
            'nombre'=> $ver[1] ,
            'modelo'=> $ver[2] ,
            'anio'=> $ver[3] ,
            'cantidad'=> $ver[4]
        );
        return $datos;
       }  

       public function actualizar($datos){
        $obj= new conectar();
        $conexion = $obj->conexion();

        $sql="UPDATE repuestos set nombre='$datos[0]', modelo='$datos[1]', anio='$datos[2]', cantidad='$datos[3]' 
              WHERE id_repuestos='$datos[4]'";
        return mysqli_query($conexion,$sql);      
       }
       public function eliminar($idjuego){
        $obj= new conectar();
        $conexion = $obj->conexion();

        $sql="DELETE FROM repuestos WHERE id_repuestos='$idjuego'";
        return mysqli_query($conexion,$sql); 
       }
    }
    // require_once "../clases/conexion.php";
    // require_once "../clases/crud.php";
    $obj = new crud();

    echo json_encode($obj->obtenDatos($_POST['idjuego']));
    

 ?>