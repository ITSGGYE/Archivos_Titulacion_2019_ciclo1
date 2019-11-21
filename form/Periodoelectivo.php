<?php
require_once '../constantes.php';
require_once '../conexion.php';
iniciarPagina();
if(isset($_POST['create'])){
    $objConexion = new Conexion();
    $conexion = $objConexion::obtenerConexion();
    $newLectivo = $_POST['anio_inicial']."-".$_POST['anio_final'];
    $mes_inicio = $_POST['mes_inicio'];
    $mes_final = $_POST['mes_final'];
    $anio_inicial = $_POST['anio_inicial'];
    $anio_final = $_POST['anio_final'];
    $query = "SELECT MAX(id) AS id FROM lectivo";
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch();
    $lectivo_actual = $result['id'];
    $query = "SELECT cod_lectivo FROM lectivo WHERE id = :_id";
    $stmt = $conexion->prepare($query);
    $stmt->bindParam(':_id',$lectivo_actual,PDO::PARAM_INT,4000);
    $stmt->execute();
    $new_cod_lectivo = $stmt->fetch();
    $cod_lectivo_new = $new_cod_lectivo['cod_lectivo'];
    if($cod_lectivo_new == $newLectivo){
        echo $mensaje_lec = "<center><div style='background-color: orange; width:350px;margin-boottom:3%;border-radius: 15px 15px 15px 15px;font-size:1.5rem; color:white;'><b><span>EN CURSO EL AÑO LECTIVO</span></b></div></center><br><br>";
    }else{
    $query = "INSERT INTO lectivo (cod_lectivo,mes_inicio,mes_final,anio_inicio,anio_final) VALUES ('$newLectivo','$mes_inicio','$mes_final','$anio_inicial','$anio_final')";
    $stmt =$conexion->prepare($query);
    if($stmt->execute()){
              echo $mensaje_lec = "<center><div style='background-color: green; width:350px;margin-boottom:3%;border-radius: 15px 15px 15px 15px;font-size:1.5rem; color:white;'><b><span>PERIODO LECTIVO CREADO CON EXITO</span></b></div></center><br><br>";

    }else
    {
               echo $mensaje_lec = "<center><div style='background-color: red; width:350px;margin-boottom:3%;border-radius: 15px 15px 15px 15px;font-size:1.5rem; color:white;'><b><span>ERROR AL CREAR EL AÑO LECTIVO</span></b></div></center><br><br>";

    }
  }
}
?>
<form method="POST" action="">
<div class="container d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header h3">Periodo Electivo</div>
            <div class="card-body">
                <div class="">
                    <label class="font-weight-bold">Mes de Inicio</label>
                    <select  class="form-control select2" id="estudiante" name="mes_inicio">
                        <option disabled=""></option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4" selected>Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                       
                    </select>
                </div>
                <br>
                <div id="informacion">

                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Mes Final</label>
                    <select class="form-control" name="mes_final" id="mes_final">
                        <option value="1"></option>
                        <option value="1">Enero</option>
                        <option value="2" selected>Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Año de Inicio</label>
                    <select class="form-control" name="anio_inicial" id="anio_inicial">
                        <option selected value="<?php echo date("Y"); ?>"><?php echo date("Y"); ?></option>
                       
                    </select>
                </div>
                 <div class="form-group">
                    <label class="font-weight-bold">Año Final</label>
                    <select class="form-control" name="anio_final" id="anio_final">
                        <option selected value="<?php $anio_actual = date("Y"); echo date("Y",strtotime($anio_actual."+ 1 years")); ?>"><?php $anio_actual = date("Y"); echo date("Y",strtotime($anio_actual."+ 1 years")); ?></option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-success" name="create"> Crear Año Lectivo</button>
               </div>
        </div>
    </div>
</form>