<?php
session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';


$idPeriodo = $_POST["idPeriodo"];

if($idPeriodo == ""){
    echo "La tabla no contiene Datos";
}

if($idPeriodo != ""){
    
$conexion = conexion($bd_config);

 $statement = $conexion->prepare("SELECT X.idseq_calif, X.nombrecalif nombrecalif, X.descripcioncalif descripcioncalif,
                                  Y.nombrecurso nombrecurso, z.nombremateria nombremateria, PER.nombrePeriodo, 
                                  w.nombre nombreProfesor, RAN.nombreRango
                                  FROM modelocalificacion AS X
                                  INNER JOIN curso AS Y ON X.idcurso = Y.idcurso 
                                  INNER JOIN materia AS z ON X.idmateria = z.idmateria
                                  INNER JOIN profesor AS w ON X.idseq_profesor = w.idseq_profesor
                                  INNER JOIN periodos AS PER ON PER.idPeriodo = X.idPeriodo
                                  INNER JOIN rangos AS RAN ON RAN.idRango = X.idRango
                                  WHERE X.idPeriodo = '$idPeriodo' ORDER BY X.idseq_calif DESC");
$statement->execute();
while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>".$data['nombrecalif']."</td>";
    echo "<td>".$data["nombrecurso"]."</td>";
    echo "<td>".$data['nombremateria']."</td>";
    echo "<td>".$data['nombreProfesor']."</td>";
    echo "<td>".$data['nombreRango']."</td>";
    echo '<td>'
    . '<a class="btn btn-success" href="EditarModeloCalificacion.php?id='.$data['idseq_calif'].' "><i class="fa fa-pencil"></i> </a>'
    . '<a class="btn btn-primary" href="javascript:configNotas('.$data['idseq_calif'].')" style="margin-left:10px;"><i class="fa fa-cog"></i></a>`'
    . '<a class="btn btn-danger" href="javascript:EliminarModelo('.$data['idseq_calif'].')" style="margin-top:10px;"><i class="fa fa-trash-o"></i> </a>'
    . '</td>';
    echo "</tr>";
}
    
}

?>
   
