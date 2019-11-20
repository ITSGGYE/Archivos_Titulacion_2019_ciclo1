<!--<style type="text/css">
    p{
      font-size: 16px;
      }
    label{
      text-decoration: underline;
      color:black;
      padding: 2px;
    }-->
   </style>
<?php 
require_once "../../clases/conexion.php";
require_once "../../vistas/dependencias.php";

$obj= new conectar();
$conexion=$obj->conexion();
/*$conexion = mysqli_connect("localhost", "root", "", "sistemaacademico");*/
$id=$_POST['user_id'];

if(isset($_POST["user_id"]))
{
 $output = '';
 
 $sql="SELECT          p.nombre_profesor,        
                       p.direccion_profesor,      
                       p.telefono_profesor,       
                       p.celular_profesor,        
                       p.cedula_profesor,     
                       p.email_profesor,      
                       p.fechanac_profesor,     
                       p.titulo_profesor,     
                       p.genero_profesor,       
                       p.imagen_profesor,       
                       p.fechareg_profesor,img.ruta from profesor p, img_profesor img where  p.imagen_profesor=img.id_imagen  and p.id_profesor=$id" ;

 $result = mysqli_query($conexion,$sql);

 $output .= '  
      <div class="container" >
      <div class="row">  
      <div class="col-md-12">
      <h6> DATOS DEL PERSONAL </h6>
      </div>
      </div>
                               ';
    while($values=mysqli_fetch_array($result)) 
    {

      $imgVer=explode("/", $values["ruta"]) ; 
      $imgruta=$imgVer[1]."/".$imgVer[2]."/".$imgVer[3]."/".$imgVer[4];
     
     $output .= '
         
                                    
                                        <center>
                                       <img width="80" height="80" src="'.$imgruta.'">
                                      </center>

                                       <form id="frmnuevo2">
          <div class="row">
          <div class="col-md-12">
            <label>Nombres y Apellidos</label>
            <input type="text" class="form-control input-sm" id="nombre2" name="nombre2" value="'.$values["nombre_profesor"].'" readonly>
          </div>
          <div class="col-md-12">
          <label>Direccion</label>
            <input type="text" class="form-control input-sm" id="direccion2" name="direccion2" value="'.$values["direccion_profesor"].'" readonly>
          </div>
          
          </div>
          <div class="row">
          <div class="col-md-4">
            <label>Telefono</label>
            <input type="text" class="form-control input-sm" name="telefono2" id="telefono2"  value="'.$values["telefono_profesor"].'" readonly>
            
          </div>
          <div class="col-md-4">
            <label>Celular</label>
              <input type="text" class="form-control input-sm" name="celular2" id="celular2" value="'.$values["celular_profesor"].'" readonly >
          </div>
          <div class="col-md-4">
              <label>Profesion</label>
              <input type="text" class="form-control input-sm" name="titulo2" id="titulo2" value="'.$values["titulo_profesor"].'" readonly>
              </div>
              
          </div>
          
          <div class="row">
          <div class="col-md-2">
              <label>Genero </label>
              <input type="text" class="form-control input-sm"  value="'.$values["genero_profesor"].'" readonly>
          </div>
          
          
  
              <div class="col-md-5">
              <label>Cedula</label>
              <input type="text" class="form-control input-sm" name="cedula2" id="cedula2" value="'.$values["cedula_profesor"].'" readonly>
              </div>
              <div class="col-md-5">
              <label>Fecha Nac.</label>
              <input type="date" class="form-control input-sm" name="fecha2" id="fecha2" value="'.$values["fechanac_profesor"].'"readonly>
              </div>
              </div>
          
              <div class="row">
              
              <div class="col-md-8">
              <label>Email</label>
              <input type="email" class="form-control input-sm" name="email2" id="email2"value="'.$values["email_profesor"].'"readonly>
              </div>
              </div>
            
          </form>

                                        
                                        
                                   ';  
}                                     
                                             
    $output .= '
                                    
                               
                          </div>  

                   
     ';

    
    echo $output;

}
?>