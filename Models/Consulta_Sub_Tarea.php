
<?php
session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';

$idseq_calif =$_POST["idseq_calif"];

if($idseq_calif == ""){
    echo "Error al consultar Datos de la tabla sub Tarea";
}



if($idseq_calif != ""){
    
    $conexion = conexion($bd_config);
    
    $statement = $conexion->prepare("SELECT * from parcial where idseq_calif ='$idseq_calif' order by idseqParcial desc");
    $statement->execute();
    
    
    while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>".$data['nombreParcial']."</td>";
        echo '<td>'
        . '<a class="btn btn-danger" href="javascript:EliminarParcial('.$data['idseqParcial'].')" style="margin-left:10px;"><i class="fa fa-trash-o"></i> </a>'
        . '</td>';
        echo "</tr>";
        
    }
}


?>
   