<?php class calendario {

  protected $db_query;
  protected $db_result;
  protected $db_row;

  // Listado de eventos
  public function listado($connection) {
    $this -> connection = $connection;
    $this -> db_query = "SELECT * FROM eventos";

    try {
      $db_result = $connection -> prepare($this -> db_query);
      $db_result -> execute();

      $db_array = array();
      $i = 0;

      while($db_row = $db_result -> fetch(PDO::FETCH_BOTH)) {
        $db_array[$i] = $db_row;
        $i++;
      }

      echo json_encode(array("success" => 1, "result" => $db_array));

      $db_result -> CloseCursor();

    } catch(Exception $e) {
      die ('Error' . $e -> GetMessage());
      echo "<div class='alert alert-danger' role='alert'>" . $e -> getLine() . "</div>";
    }
  }

  // Nuevo evento
  public function nuevo($connection) {
	  $this -> connection = $connection;
	  	//$db_result = $connection -> prepare($this -> db_query);
	  $inicio = strtotime(substr($_POST["start"], 6, 4) . "-" . substr($_POST["start"], 3, 2) . "-" . substr($_POST["start"], 0, 2) . " "  . substr($_POST["start"], 10, 6)) * 1000;

    $final  = strtotime(substr($_POST["end"], 6, 4)."-" . substr($_POST["end"], 3, 2) . "-" . substr($_POST["end"], 0, 2) . " " . substr($_POST["end"], 10, 6)) * 1000;
	  
	  $this->db_query ="SELECT * FROM eventos WHERE ((start <= $inicio AND end >= $final) OR end between $inicio and $final OR start between $inicio AND $final)";
  	//$db_result = $this->conexion->prepare($consulta);	 
	  
	 //echo($this->db_query);
	  
	$num_filas = 0;
	  try {
		  
		  $db_result = $connection -> prepare($this -> db_query);
		  $db_result -> execute();
		  
		$num_filas = $db_result -> rowCount();
      		//var_dump("<pre>",$num_filas,"</pre>");
		  
	  }catch(Exception $e) {
		  die ('Error' . $e -> GetMessage());
		  echo "<div class='alert alert-danger' role='alert'>" . $e -> getLine() . "</div>";
		}
	  
	  //La consulta se generó solo un campo, el Resultado de SELECT, en posición 0 de array
	  if($num_filas>0) { // Si no existe 
		  
		  echo '<script type="text/javascript">alert("Horario No Disponible ")</script>';
        
        }else {

    $this -> db_query = "INSERT INTO eventos (descripcion, precio, firstname, url,  class, start, end, start_normal, end_normal) VALUES (:descripcion, :precio, :user, :url, :class, :start, :end, :start_normal, :end_normal)";
 //echo($this->db_query);
    $link = __LOCALHOST__ . "/evento-detalles.php";
}
    try {
      $db_result = $connection -> prepare($this -> db_query);

      $db_result -> bindValue(":descripcion", $_POST['title']);
      $db_result -> bindValue(":precio", floatval($_POST["body"]));
	  $db_result -> bindValue(":user", $_POST["user"]);
      $db_result -> bindValue(":url", $link);
      $db_result -> bindValue(":class", $_POST["class"]);
      $db_result -> bindValue(":start", $inicio);
      $db_result -> bindValue(":end", $final);
      $db_result -> bindValue(":start_normal", $_POST["start"]);
      $db_result -> bindValue(":end_normal", $_POST["end"]);

      $db_result -> execute();

      $this -> db_query = "SELECT MAX(id) AS id FROM eventos";
      $db_result = $connection -> prepare($this -> db_query);
      $db_result -> execute();

      $db_file = $db_result -> fetch(PDO::FETCH_ASSOC);
      $id_event = $db_file['id'];

      $link = __LOCALHOST__ . "/evento-detalles.php?id=$id_event";

      $this -> db_query = "UPDATE eventos SET url = '$link' WHERE id = '$id_event'";
      $db_result = $connection -> prepare($this -> db_query);
      $db_result -> execute();

      $db_result -> CloseCursor();

      header("location:index2.php?nuevo=ok"); 

    } catch(Exception $e) {
      die ('Error' . $e -> GetMessage());
      echo "<div class='alert alert-danger' role='alert'>" . $e -> getLine() . "</div>";
    }
  }

  // Eliminar evento
  public function eliminar($connection) {
    $this -> connection = $connection;
    $this -> db_query ="DELETE FROM eventos WHERE id = :id";

    try {
      $db_result = $connection -> prepare($this -> db_query);
      $db_result -> bindValue(":id", $_GET["id"]);
      $db_result -> execute();

      $db_result -> CloseCursor();

      header("location:index2.php?eliminar=ok");

    } catch(Exception $e) {
      die ('Error' . $e -> GetMessage());
      echo "<div class='alert alert-danger' role='alert'>" . $e -> getLine() . "</div>";
    }
	  header("location:index2.php");
  }
}