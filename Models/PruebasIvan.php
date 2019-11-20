<?php



$cantidad = 3;

for ($i=1; $i <= $cantidad;){
           $datos[$i] = array ("Nombre"=>$_POST["nom$i"], "Apellidos"=>$_POST["ap$i"]);
           
           $i ++;
}

    
foreach ($datos as $dato)
{
	echo "Nombre: ".$dato["Nombre"];
        echo "<br>";
	echo "Apellidos: ".$dato["Apellidos"];
	echo "<br>";
}

?>
   