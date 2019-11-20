<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'config.inc.php';
        $db=new Conect_MySql();
           // $sql = "SELECT * from pdf where id_pdf=".$_GET['id'];
        $sql = "SELECT * from libros where id_libro=".$_GET['id'];
            $query = $db->execute($sql);
            if($datos=$db->fetch_row($query)){
                if($datos['url_descarga']==""){?>
        <p>NO tiene archivos</p>
                <?php }else{ ?>
                <div align="center">
       <!-- <iframe src="<?php// echo $datos['url_descarga']; ?>" width="100%" height="650"></iframe>-->
       <?php echo $datos['url_descarga']; ?>
                </div>
                <?php } } ?>

    </body>

</html>
