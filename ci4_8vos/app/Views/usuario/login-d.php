<!doctype html>
<html lang="en">

<head>
    <title>Login 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo base_url('recursos_login/login-v2/css/style.css'); ?>">

    <!-- Toastr -->
    <link rel="stylesheet" href="<?= base_url(RECURSOS_PANEL_PLUGINS.'toastr/toastr.min.css') ?>">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url('<?php echo base_url("images/fondo.jpg")?>');">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Iniciar Sesión</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-facebook"></span></a>
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>

                            <?= form_open('validar_usuario', ["class" => ""]); ?>
                                <div class="form-group mt-3">
                                    <?php
                                        $attibutes = [
                                                        "type" => "email",
                                                        "class" => "form-control",
                                                        "value" => "",
                                                        "placeholder" => "",
                                                        "name" => "correo_electronico",
                                                        "required" => true
                                                    ];
                                        echo form_input($attibutes);
                                    ?>
                                    <label class="form-control-placeholder" for="username">Username</label>
                                </div>
                                <div class="form-group">
                                    <?php
                                        $attibutes = [
                                                        "type" => "password",
                                                        "class" => "form-control",
                                                        "value" => "",
                                                        "placeholder" => "",
                                                        "id" => "password-field",
                                                        "name" => "password",
                                                        "required" => true
                                                    ];
                                        echo form_input($attibutes);
                                    ?>

                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">

                                    <?php
                                        $attibutes = [
                                                        "type" => "submit",
                                                        "class" => "form-control btn btn-primary rounded submit px-3"
                                                    ];
                                        echo form_submit('btn-submit', 'Ingresar', $attibutes);
                                    ?>

                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <?php
                                                $data = [
                                                    'name'    => '',
                                                    'id'      => '',
                                                    'value'   => 'accept',
                                                    'checked' => false
                                                ];

                                                echo form_checkbox($data);
                                            ?>
                                            <!-- <input type="checkbox" checked> -->
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>
                                </div>
                            <? form_close() ?>


                            <p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?php echo base_url('recursos_login/login-v2/js/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('recursos_login/login-v2/js/popper.js');?>"></script>
    <script src="<?php echo base_url('recursos_login/login-v2/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('recursos_login/login-v2/js/main.js');?>"></script>
    <!-- Toastr -->
    <!-- recursos_panel/plugns/ -->
    <script src="<?= base_url(RECURSOS_PANEL_PLUGINS.'toastr/toastr.min.js')?>"></script>
    <script>
        /**
         * info: hace referencia a una alerta en color azul
         * success: verde
         * error: rojo
         * warning: amarillo
         */
        // toastr.info('', '');
        <?= mostrar_mensaje() ?>
    </script>

</body>

</html>