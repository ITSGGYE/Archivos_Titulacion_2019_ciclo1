<?php
require_once '../constantes.php';
require_once '../conexion.php';

require_once '../dist/fine-uploader/templates/gallery.html';
$docentes = Conexion::buscarVariosRegistro("select * from docentes where estado='1'", []);
$identificador = date('Y-m-d H:i:s');
iniciarPagina();
?>
<link href="dist/fine-uploader/fine-uploader-gallery.css" rel="stylesheet">
        
<script src="dist/fine-uploader/fine-uploader.min.js"></script>
<div class="h4 titulo p-2">Envio de Archivos</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="card">
            <form method="POST" id="qq-form" action="dist/ajax/a_envio.php">
                <input type="hidden" name="identificador" value="<?php echo $identificador; ?>">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-md-3">Para: </label>
                        <select class="form-control col-md-5" name="docente" id="docente">
                            <option></option>
                            <?php
                            if ($docentes) {
                                foreach ($docentes as $d) {
                                    echo "<option value='{$d['id']}'>{$d['usuario']} - {$d['nombres']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Fecha: </label>
                        <input class="form-control col-md-5" type="date" name="fecha" id="fecha">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Asunto: </label>
                        <input class="col-md-5 form-control" type="text" name="asunto" id="asunto">
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Mensaje: </label>
                        <textarea name="mensaje" id="mensaje" class="col-md-5 form-control"></textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3">Archivos: </label>
                        <div class="col-md-5 pl-0 pr-0" id="file-drop-area"></div>
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-primary">Enviar</button></div>
                </div>
            </form>
        </div>
    </div>

</div>
<script>
    var n = 1;
    var multiFileUploader = new qq.FineUploader({
        element: document.getElementById("file-drop-area"),
        
        text: {
            uploadButton: 'Subir'
        },
        callbacks: {
            onComplete: function (id, fileName, responseJSON) {
                if (n === 1) {
                    swal('Envio correcto', {
                        icon: 'success'

                    }).then((as) => {
                        if (as) {
                            location.reload();
                        } else {
                            location.reload();
                        }
                    });
                } else {

                }
                n++;
            }
        }

    });
</script> 