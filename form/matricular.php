<?php
require_once '../constantes.php';
require_once '../conexion.php';
require_once '../modelos/Cursos.php';

$estudiantes = Conexion::buscarVariosRegistro("select * from estudiantes where estado='1'");
iniciarPagina();
$objConexion = new Conexion();
$conexion = $objConexion::obtenerConexion();
$query = "SELECT MAX(cod_lectivo)AS lectivo FROM lectivo";
$stmt = $conexion->prepare($query);
$stmt->execute();
$periodo_lectivo = $stmt->fetch();
$mensaje = "Periodo lectivo en curso"." ".$periodo_lectivo['lectivo'];
?>

<form method="POST">
      <center><h3> <?php echo $mensaje; ?></h3></center>
    <div class="text-right"><button formtarget="" formaction="form/estudiantes.php" class="btn btn-primary">Estudiante Nuevo</button></div>
    <div class="container d-flex justify-content-center">
        <div class="card w-50">
            
            <div class="card-header h3">Matriculacíon Estudiantes</div>
          
            <div class="card-body">
                <div class="">
                    <label class="font-weight-bold">Estudiante</label>
                    <select onchange="verInfo(this)" class="form-control select2" id="estudiante" name="estudiante">
                        <option></option>
                        <?php
                        if ($estudiantes) {
                            foreach ($estudiantes as $e) {
                                echo "<option value='{$e['id']}'>{$e['apellidos']} {$e['nombres']}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <br>
                <div id="informacion">

                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Curso</label>
                    <select class="form-control" name="anio_curso" id="anio_curso">
                        <option/>
                        <?php
                        foreach (Años::listar() as $a) {
                            echo "<option value='$a'>$a</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Paralelo</label>
                    <select class="form-control" name="curso" id="curso">
                        <option/>
                        <?php
                        foreach (Cursos::listar() as $c) {
                            echo "<option value='$c'>$c</option>";
                        }
                        ?>
                    </select>
                </div><br>
                <div class="form-check">
                    <input  class="form-check-input" type="checkbox" value="1" id="documento">
                    <label class="form-check-label font-weight-bold" for="documento">
                        Documentos completos
                    </label>
                </div><br>
                <div class="form-check">
                    <input  class="form-check-input" type="checkbox" value="1" id="foto">
                    <label class="form-check-label font-weight-bold" for="foto">
                        Entrego fotos
                    </label>
                </div>
                <input id="lectivo" type="hidden" value="<?php $objConexion = new Conexion();
                $conexion = $objConexion::obtenerConexion();
                $query = "SELECT MAX(cod_lectivo) AS lectivo FROM lectivo";
                $stmt = $conexion->prepare($query);
                $stmt->execute();
                $fetch = $stmt->fetch();
                echo $lectivo = $fetch['lectivo'];
                ?>">
                
                <br>
                <button type="button" onclick="matricular()" class="btn btn-success">Matricular</button>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
    function verInfo(sender) {
        $("#informacion").html("");
        var id = $(sender).val();
        if (id > 0) {
            $.ajax({
                url: "dist/ajax/a_matricula.php",
                type: 'POST',
                data: {
                    infoestudiante: id
                },
                success: function (data, textStatus, jqXHR) {
                    $("#informacion").html(data);
                }
            });
        }
    }
    function matricular() {
        var anio = $("#anio_curso").val();
        var curso = $("#curso").val();
        var estudiante = $("#estudiante").val();
        var documento = $("#documento").prop('checked') ? 1 : 0;
        var foto = $("#foto").prop('checked') ? 1 : 0;
        var lectivo = $("#lectivo").val();

        if (anio && curso && estudiante) {
            $.ajax({
                url: "dist/ajax/a_matricula.php",
                data: {
                    matricular: 1,
                    anio: anio,
                    curso: curso,
                    estudiante: estudiante,
                    documento: documento,
                    foto: foto,
                    lectivo: lectivo
                },
                type: 'POST',
                dataType: 'json',
                success: function (data, textStatus, jqXHR) {
                    if (data.status === "correcto") {
                        swal(data.mensaje, {
                            icon: 'success'
                        }).then((res) => {
                            location.reload();
                        });

                    } else {
                        swal(data.mensaje, {
                            icon: 'error'
                        });
                    }
                }
            });
        } else {
            swal("Complete los campos necesarios", {
                icon: 'warning'
            });
        }
    }
</script>
