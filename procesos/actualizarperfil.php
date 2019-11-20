<?php 

        $nombre = $_POST['nombreU']; 
        $correo = $_POST['correoU'];
        $telf = $_POST['telefonoU'];
        $dir = $_POST['direccionU'];
        $aidi = $_POST['idjuego'];

     class conectar  {
        public function conexion(){
            $conexion = mysqli_connect('localhost', 'root', '', 'puntofrio');
            $conexion->set_charset('utf8');
            return $conexion;
        }
     }

        $obj= new conectar();
        $conexion = $obj->conexion();

        $sql="UPDATE clientes set nombre='$nombre', email='$correo', telefono='$telf', direccion='$dir' 
              WHERE id_clientes='$aidi'";

        // return mysqli_query($conexion,$sql);

        if (mysqli_query($conexion,$sql)){
            echo("Datos actualizados");
        }else{echo "bien mal";}
        

 ?>