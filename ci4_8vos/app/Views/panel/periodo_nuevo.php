<?= $this->extend('plantillas/panel_base') ?>

<!-- Sección de css -->
<?= $this->section('css') ?>

<?= $this->endSection() ?>
<!-- End sección de css -->

<!-- Sección de contenido -->
<?= $this->section('contenido') ?>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header  pb-3 border-bottom">
                <h3 class="card-title">Formulario Periodo Nuevo <br>
                    <small>
                        Todos los campos marcados con (<font color="red">*</font>) son obligatorios
                    </small>
                </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            
            <?= form_open("registrar_periodo", ["id" => "form-nuevo-periodo"]) ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre del periodo</label>
                                <?= form_input(['class' => 'form-control', 'type' => 'text', 'id' => 'nombre', 'placeholder' => 'Nombre del periodo', 'value' => set_value('nombre'), 'name' => 'nombre', 'required' => TRUE]) ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Acrónimo</label>
                                <?= form_input(['class' => 'form-control', 'type' => 'text', 'id' => 'acronimo', 'placeholder' => 'Acrónimo', 'value' => set_value('acronimo'), 'name' => 'acronimo', 'required' => TRUE]) ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fecha de inicio</label>
                                <?= form_input(['class' => 'form-control', 'type' => 'date', 'id' => 'fecha_inicio', 'value' => set_value('fecha_inicio'), 'name' => 'fecha_inicio', 'required' => TRUE]) ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fecha de fin</label>
                                <?= form_input(['class' => 'form-control', 'type' => 'date', 'id' => 'fecha_fin', 'value' => set_value('fecha_fin'), 'name' => 'fecha_fin', 'required' => TRUE]) ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Estatus</label>
                                <?= form_dropdown('estatus', ['' => 'Seleccione un estatus...', '0' => 'Inactivo', '1' => 'Activo'], '', ['class' => 'form-control', 'id' => 'estatus', 'required' => TRUE]) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?= form_submit('btn-enviar', 'Registrar', ['class' => 'btn btn-primary']) ?>
                    <a href="<?= route_to('administracion_periodos') ?>" class="btn btn-danger">Regresar</a>
                </div>
            <?= form_close() ?>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">
        <!-- Aquí puedes añadir contenido adicional si es necesario -->
    </div>
    <!--/.col (right) -->
</div>
<?= $this->endSection() ?>
<!-- End sección de contenido -->

<!-- Sección de js -->
<?= $this->section('js') ?>
    <!-- jquery-validation -->
    <script src="<?= base_url('recursos_panel/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<?= $this->endSection() ?>
<!-- End sección de js -->
