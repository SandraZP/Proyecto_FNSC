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
                <h3 class="card-title">Formulario Nuevo Docente <br>
                    <small>
                        Todos los campos marcados con (<font color="red">*</font>) son obligatorios
                    </small>
                </h3>
            </div>

            <?= form_open("registrar_docente", ["id" => "form-nuevo-docente"]) ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <?= img([
                                'src'    => base_url(RECURSOS_PANEL_IMG_PROFILES_USER."usuario.png"),
                                'alt'    => 'imagen_perfil',
                                'class'  => 'avatar-img rounded-circle',
                                'width'  => '150px',
                                'style'  => 'margin-bottom: 15px;',
                            ]) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="numero_empleado">Numero de empleado *</label>
                                <?= form_input([
                                    "class" => "form-control",
                                    "type" => "text",
                                    "id" => "numero_empleado",
                                    "placeholder" => "numero_empleado",
                                    "value" => set_value("numero_empleado"),
                                    "name" => "numero_empleado",
                                    "required" => TRUE
                                ]) ?>
                            </div>
                        </div>
                    </div>

                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gardo_estudios">Grado de estudios *</label>
                                <?= form_input([
                                    "class" => "form-control",
                                    "type" => "text",
                                    "id" => "gardo_estudios",
                                    "placeholder" => "gardo_estudios",
                                    "value" => set_value("gardo_estudios"),
                                    "name" => "gardo_estudios",
                                    "required" => TRUE
                                ]) ?>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_usuario">ID de Usuario *</label>
                                <?= form_input([
                                    "class" => "form-control",
                                    "type" => "number",
                                    "id" => "id_usuario",
                                    "placeholder" => "id_usuario",
                                    "value" => set_value("id_usuario"),
                                    "name" => "id_usuario",
                                    "required" => TRUE
                                ]) ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                            <div class="form-group">
                                <label for="idpe">ID del Progrma Educativo *</label>
                                <?= form_input([
                                    "class" => "form-control",
                                    "type" => "number",
                                    "id" => "idpe",
                                    "placeholder" => "idpe",
                                    "value" => set_value("idpe"),
                                    "name" => "idpe",
                                    "required" => TRUE
                                ]) ?>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?= form_submit('btn-enviar', 'Registrar', ["class" => "btn btn-primary"]) ?>
                    <a href="<?= route_to("administracion_docentes") ?>" class="btn btn-danger">Regresar</a>
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
