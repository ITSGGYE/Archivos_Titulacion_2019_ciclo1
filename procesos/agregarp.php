<?php 

     class conectar  {
        public function conexion(){
            $conexion = mysqli_connect('localhost', 'root', '', 'puntofrio');
            $conexion->set_charset('utf8');
            return $conexion;
        }
     }

     class crud{
        public function agregarp($datos){
            $obj = new conectar();
            $conexion = $obj->conexion();

            $sql = "INSERT INTO precio (descripcion,modelo,anio,precio,id_clientes)
                    VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]',1)";

            return mysqli_query($conexion, $sql);
        }
    

    public function obtenDatosp($idjuego){
        $obj = new conectar();
        $conexion = $obj->conexion();

        $sql="SELECT  id_precio, descripcion, modelo, anio, precio
                        from precio WHERE id_precio = '$idjuego'";
        $result = mysqli_query($conexion,$sql);
        $ver = mysqli_fetch_row($result);

        $datos = array(
            'id_precio'=> $ver[0] ,
            'descripcion'=> $ver[1] ,
            'modelo'=> $ver[2] ,
            'anio'=> $ver[3] ,
            'precio'=> $ver[4]
        );
        return $datos;
       }  

       public function actualizarp($datos){
        $obj= new conectar();
        $conexion = $obj->conexion();

        $sql="UPDATE precio set descripcion='$datos[0]', modelo='$datos[1]', anio='$datos[2]', precio='$datos[3]' 
              WHERE id_precio='$datos[4]'";
        return mysqli_query($conexion,$sql);      
       }
       public function eliminarp($idjuego){
        $obj= new conectar();
        $conexion = $obj->conexion();

        $sql="DELETE FROM precio WHERE id_precio='$idjuego'";
        return mysqli_query($conexion,$sql); 
       }
    }
    // require_once "../clases/conexion.php";
    // require_once "../clases/crud.php";
    $obj = new crud();

     $datos = array(
     $_POST['descripcion'],
      $_POST['modelo'],
      $_POST['anio'],
      $_POST['precio']
    );
     
    echo $obj->agregarp($datos);
    
    

 ?>