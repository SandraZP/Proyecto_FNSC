<?= $this->extend('plantillas/panel_base') ?>

<!-- Sección de css -->
<?= $this->section('css') ?>

<?= $this->endSection() ?>
<!-- End sección de css -->

<!-- Sección de contenido -->
<?= $this->section('contenido') ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header pb-3 border-bottom">
                <h3 class="card-title">Formulario Nueva Materia <br>
                    <small>
                        Todos los campos marcados con (<font color="red">*</font>) son obligatorios
                    </small>
                </h3>
            </div>

            <?= form_open("editar_materia/". $materia->idAsignatura, ["id" => "form-nueva-materia"]) ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="asignatura">Asignatura *</label>
                                <?= form_input([
                                    "class" => "form-control",
                                    "type" => "text",
                                    "id" => "asignatura",
                                    "placeholder" => "Asignatura",
                                    "value" => $materia->asignatura,
                                    "name" => "asignatura",
                                    "required" => TRUE
                                ]) ?>
                            </div>
                        </div>
                    </div>

                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="acronimo">Acrónimo *</label>
                                <?= form_input([
                                    "class" => "form-control",
                                    "type" => "text",
                                    "id" => "acronimo",
                                    "placeholder" => "Acrónimo",
                                    "value" => $materia->acronimo,
                                    "name" => "acronimo",
                                    "required" => TRUE
                                ]) ?>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="creditos">Créditos *</label>
                                <?= form_input([
                                    "class" => "form-control",
                                    "type" => "number",
                                    "id" => "creditos",
                                    "placeholder" => "Créditos",
                                    "value" => $materia->creditos,
                                    "name" => "creditos",
                                    "required" => TRUE
                                ]) ?>
                            </div>
                        </div>
                    </div>

                   

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?= form_submit('btn-actualizar', 'Registrar', ["class" => "btn btn-primary"]) ?>
                    <a href="<?= route_to("administracion_materias") ?>" class="btn btn-danger">Regresar</a>
                </div>
            <?= form_close() ?>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
    </div>
    <!--/.col (right) -->
</div>
<?= $this->endSection() ?>
<!-- End sección de contenido -->

<?= $this->section('js') ?>
    <!-- jquery-validation -->
    <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<?= $this->endSection() ?>
<!-- End sección de js -->
