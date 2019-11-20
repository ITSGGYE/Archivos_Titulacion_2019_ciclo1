<?php 

     class conectar  {
        public function conexion(){
            $conexion = mysqli_connect('localhost', 'root', '', 'puntofrio');
            $conexion->set_charset('utf8');
            return $conexion;
        }
     }

    $elido = $_POST['elid'];

    $poster= ($elido);

    $obj = new conectar();
    $conexion = $obj->conexion();

    $sql="SELECT * from historial ";
    $result = mysqli_query($conexion,$sql);
    // $ver = mysqli_fetch_row($result);

    while ($ver = mysqli_fetch_row($result)) {

    $precio = $ver[3];
    $sqlPrecio="SELECT descripcion from precio where id_precio = $precio";
    $descPrecio = mysqli_query($conexion, $sqlPrecio);
    $precios="";
    while ($row = $descPrecio ->fetch_array(MYSQLI_ASSOC)) {   $precios .=$row['descripcion'];  }
        if(($ver[1]) == trim($elido) ){
            echo "<tr>";
             echo "<td>".$ver[0]."</td>";
             echo "<td>".$ver[2]."</td>";
             echo "<td>".$precios."</td>"; 
            echo "</tr>";           
        }else{
        }
    
    }
    // echo ($_POST['elid']);
        // return $datos;  
      // echo json_encode($obj->obtenDatosv($_POST['elid']));
 ?>