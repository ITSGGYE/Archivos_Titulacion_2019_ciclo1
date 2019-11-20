<?php
session_start();
require '../Conexion/config.php';
require '../Conexion/functions.php';


$idcurso = $_POST['idcurso'];
$idseq_profesor = $_POST['idseq_profesor'];

$conexion =  conexion($bd_config);

$statement = $conexion->prepare("SELECT Mt.idmateria,Mt.nombremateria FROM estudiante_materia_curso as EM inner join materia Mt on EM.idmateria = Mt.idmateria"
        . " where EM.idcurso= '$idcurso' and EM.idseq_profesor= '$idseq_profesor' ");
$statement->execute();
$contador = 1;
$nomMat1 = "";
while($data = $statement->fetch(PDO::FETCH_ASSOC)){
      
      $nombremateria = $data["nombremateria"];
      
      
      if($nomMat1 == ""){
      
      $nomMat1 =  $nombremateria; 
       
      }else{
          $nomMat1 = $nomMat2;
      }
      
      if($nombremateria === $nomMat1){
         
      }else{
          $contador = 1;
      }
      
      if($contador <=1){
              echo "<th Style='height:50px;width: 200px;background:#169b6b;border: 1px solid #000;text-align:center;padding: 10px;'>";
              echo "<button class='btn' style='color:white;' onclick='CargarMateria(".$data["idmateria"].")' data-toggle='modal' data-target='#myModal'>".$data['nombremateria']."</button>";
              echo "</th>";
              echo "<th style='with:15px;visibility:hidden;'>---</th>";
          }
      $contador = $contador +1;
      
      $nomMat2 = $nombremateria;
}

?>
    
