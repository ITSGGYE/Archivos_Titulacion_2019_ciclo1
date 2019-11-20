   <style type="text/css">
    p{
      font-size: 16px;
      }
    label{
      text-decoration: underline;
      color:black;
      padding: 2px;
    }
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
 
 $sql="SELECT a.id_alumno,a.institucion_Alumno, a.nombre_Alumno, a.sexo_Alumno, a.cedula_Alumno,a.ciudad_Alumno,a.provincia_Alumno,
              a.telefono_Alumno,a.celular_Alumno,a.direccion_Alumno, a.fechanac_Alumno, a.fecha_registro, r.fk_alumno, r.nombre_representante, r.direccion_representante,
              r.ocupacion_representante, r.lugar_trabajo_representante, r.cedula_representante, r.telefono_representante, 
              r.email_representante, 
              r.relacion_representante from alumno a, datos_representante r where  a.id_alumno=r.fk_alumno  and r.fk_alumno=$id" ;

 $result = mysqli_query($conexion,$sql);

 $output .= '  
      <div class="container" >
      <div class="row">  
      <div class="col-md-12">
      <h6> DATOS DEL ESTUDIANTE </h6>
      </div>
      </div>
                               ';
    while($values=mysqli_fetch_array($result)) 
    {
     $output .= '
         
                                    
                                        
                                       <div class="row">
                                       <div class="col-md-4">
                                        <p> Nombre y Apellido </p> 
                                        <label> '.$values["nombre_Alumno"].'</label>
                                       </div>
                                       <div class="col-md-4">
                                        <p> Direccion  del estudiante</p> 
                                         <label> '.$values["direccion_Alumno"].'</label>
                                       </div>
                                        <div class="col-md-4">
                                        <p> Matricula </p> 
                                         <label> '.$values["id_alumno"].'</label>
                                       </div>
                                       </div>

                                        <div class="row">
                                       <div class="col-md-3">
                                        <p> Cedula </p> 
                                        <label> '.$values["cedula_Alumno"].'</label>
                                       </div>
                                       <div class="col-md-3">
                                        <p> Telefono </p> 
                                         <label> '.$values["telefono_Alumno"].'</label>
                                       </div>
                                        <div class="col-md-3">
                                        <p> Ciudad </p> 
                                         <label> '.$values["ciudad_Alumno"].'</label>
                                       </div>
                                       <div class="col-md-3">
                                        <p> Fecha de registro </p> 
                                         <label> '.$values["fecha_registro"].'</label>
                                       </div>
                                       </div>
                                       <hr>
                                      <div class="row">  
                                      <div class="col-md-12">
                                      <h6> DATOS DEL REPRESENTANTE </h6>
                                      </div>
                                      </div>

                                        <div class="row">
                                       <div class="col-md-4">
                                        <p> Nombre y Apellido </p> 
                                        <label> '.$values["nombre_representante"].'</label>
                                       </div>
                                       <div class="col-md-4">
                                        <p> Direccion  del estudiante</p> 
                                         <label> '.$values["direccion_representante"].'</label>
                                       </div>
                                        <div class="col-md-4">
                                        <p> Telefono </p> 
                                         <label> '.$values["telefono_representante"].'</label>
                                       </div>
                                       </div>
                                        <div class="row">
                                       <div class="col-md-3">
                                        <p> Cedula </p> 
                                        <label> '.$values["cedula_representante"].'</label>
                                       </div>
                                       <div class="col-md-3">
                                        <p> Ocupacioj </p> 
                                         <label> '.$values["ocupacion_representante"].'</label>
                                       </div>
                                        <div class="col-md-3">
                                        <p> Trabajo </p> 
                                         <label> '.$values["lugar_trabajo_representante"].'</label>
                                       </div>
                                       <div class="col-md-3">
                                        <p> Relacion familiar </p> 
                                         <label> '.$values["relacion_representante"].'</label>
                                       </div>
                                       </div>
                                      


                                        
                                        
                                   ';  
}                                     
                                             
    $output .= '
                                    
                               
                          </div>  

                   
     ';

    
    echo $output;

}
?>