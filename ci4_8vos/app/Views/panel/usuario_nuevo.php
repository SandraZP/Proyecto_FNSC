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
                <h3 class="card-title">Formulario Usuario Nuevo <br>
                    <small>
                        Todos los campos marcados con (<font color="red">*</font>) son obligatorios
                    </small>
                </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            
            <?= form_open("registrar_usuario", ["id" => "form-nuevo-usuario"]) ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <?php
                                $imageProperties = [
                                    'src'    => base_url(RECURSOS_PANEL_IMG_PROFILES_USER."usuario.png"),
                                    'alt'    => 'imagen_perfil',
                                    'class'  => 'avatar-img rounded-circle',
                                    'width'  => '150px',
                                    'height' => '',
                                    'title'  => '',
                                    'style'  => 'margin-bottom: 15px;',
                                ];
                                
                                echo img($imageProperties);
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre(s)</label>
                                <?php
                                    $attributes = array(
                                                    "class" => "form-control",        
                                                    "type" => "text",        
                                                    "id" => "nombre",        
                                                    "placeholder" => "Nombre(s)",        
                                                    "value" => set_value("nombre"),        
                                                    "name" => "nombre",        
                                                    "required" => TRUE,        
                                                );
                                    echo form_input($attributes);
                                ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Apellido Paterno</label>
                                <?php
                                    $attributes = array(
                                                    "class" => "form-control",        
                                                    "type" => "text",        
                                                    "id" => "ap_paterno",        
                                                    "placeholder" => "Apellido Paterno",        
                                                    "value" => set_value("ap_paterno"),        
                                                    "name" => "ap_paterno",        
                                                    "required" => TRUE,        
                                                );
                                    echo form_input($attributes);
                                ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Apellido Materno</label>
                                <?php
                                    $attributes = array(
                                                    "class" => "form-control",        
                                                    "type" => "text",        
                                                    "id" => "ap_materno",        
                                                    "placeholder" => "Apellido Materno",        
                                                    "value" => set_value("ap_materno"),        
                                                    "name" => "ap_materno",        
                                                    "required" => TRUE,        
                                                );
                                    echo form_input($attributes);
                                ?>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo Electrónico</label>
                                <?php
                                    $attributes = array(
                                                    "class" => "form-control",        
                                                    "type" => "email",        
                                                    "id" => "correo_electronico",        
                                                    "placeholder" => "example@domain.com",        
                                                    "value" => set_value("correo_electronico"),        
                                                    "name" => "correo_electronico",        
                                                    "required" => TRUE,        
                                                );
                                    echo form_input($attributes);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Rol Usuario</label>
                                <?php
                                    $parametros = array('class' => 'form-control',
                                                        'id' => 'rol'
                                                        );
                                    echo form_dropdown('rol', [''=>'Seleccione un rol...']+ROLES, array(), $parametros);
                                ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sexo</label>
                                <div class="form-check mb-3">
                                    <?php
                                        $parametros = array('id' => 'masculino',
                                                            'name' => 'sexo',
                                                            'class' => 'form-check-input radio-item'
                                                            );
                                        echo form_radio($parametros, MASCULINO);
                                    ?>
                                    <label class="form-check-label" for="masculino">Masculino</label>
                                </div>
                                <div class="form-check mb-3">
                                    <?php
                                        $parametros = array('id' => 'femenino',
                                                            'name' => 'sexo',
                                                            'class' => 'form-check-input radio-item'
                                                            );
                                        echo form_radio($parametros, FEMENINO);
                                    ?>
                                    <label class="form-check-label" for="femenino"></i>Femenino</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Contraseña</label>
                                <?php
                                    $attributes = array(
                                                    "class" => "form-control",        
                                                    "type" => "password",        
                                                    "id" => "password",        
                                                    "placeholder" => "************",        
                                                    "value" => "",        
                                                    "name" => "password",        
                                                    "required" => TRUE,        
                                                );
                                    echo form_password($attributes);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Repetir Contraseña</label>
                                <?php
                                    $attributes = array(
                                                    "class" => "form-control",        
                                                    "type" => "repassword",        
                                                    "id" => "repassword",        
                                                    "placeholder" => "************",        
                                                    "value" => "",        
                                                    "name" => "repassword",        
                                                    "required" => TRUE,        
                                                );
                                    echo form_password($attributes);
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Foto perfil</label>
                                <?php
                                    $parametros = array('type' => 'file',
                                                        'class' => 'form-control',
                                                        'name' => 'imagen_perfil',
                                                        'id' => 'imagen_perfil',
                                                        'onchange' => "validate_image(this, 'img', 'btn-guardar', '../recursos_panel_monster/images/profile-images/no-image-m.png', 512, 512);",
                                                        'accept' => '.png, .jpeg, .jpg'
                                                       );
                                    echo form_input($parametros);
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?= form_submit('btn-enviar', 'Registrar', ["class" => "btn btn-primary"]);?>
                    <a href="<?= route_to("administracion_usuarios")?>" class="btn btn-danger">Regresar</a>
                </div>
            <?= form_close()?>
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

<!-- Sección de js -->
<?= $this->section('js') ?>
    <!-- jquery-validation -->
    <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<?= $this->endSection() ?>
<!-- End sección de js -->