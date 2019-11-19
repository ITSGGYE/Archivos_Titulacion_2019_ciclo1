<?php 
include '../../lib/config.php'; 
$titulo=$_POST['title'];
$contenido=$_POST['content'];
$categoria=$_POST['category_id'];
$image=$_FILES['image'];
$fecha = date("Y-m-d H:i:s"); 
 

             $type = 'jpg';
            $rfoto = $_FILES['image']['tmp_name'];
            $name = $titulo.'.'.$type;

            if(is_uploaded_file($rfoto))
            {
              $destino = '../../uploads/'.$name;
              $nombrea = $name;
              copy($rfoto, $destino);
            }
$sql="INSERT INTO post (titulo,content,image,fecha,estado,id_categoria,id_admin) VALUES ('$titulo','$contenido','$name','$fecha','1','$categoria','1')";
    $query_new_insert = mysqli_query($conection,$sql);
      if ($query_new_insert){ header("Location:../nuevoforo.php");
      } else{
        $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($connect);
      }
 



?>