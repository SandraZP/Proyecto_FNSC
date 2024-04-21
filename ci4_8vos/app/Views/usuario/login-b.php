<?php
    //http://localhost:8080
    // dd(base_url(""));

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('recursos_login/login-v4/fonts/icomoon/style.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('recursos_login/login-v4/css/owl.carousel.min.css')?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('recursos_login/login-v4/css/bootstrap.min.css')?>">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url('recursos_login/login-v4/css/style.css')?>">

    <title>Login #6</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('<?php echo base_url("images/bg__1.jpg")?>   ');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <div class="mb-4">
              <h3>Sign In</h3>
              <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
            </div>
            <?= form_open("validar_usuario", ["class" => "", "id" => ""]) ?>
              <div class="form-group first">
                <label for="username">Username</label>
                <!-- <input type="text" class="form-control" id="username" required> -->
                <?php
                  $attributes = array(
                                  'type' => 'email',
                                  'class' => 'form-control',
                                  'id' => 'username',
                                  'name' => 'correo_electronico',
                                  // 'placeholder' => 'email@domain.com',
                                  'required' => true
                                );

                  echo form_input($attributes);
                ?>
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <!-- <input type="password" class="form-control" id="password"> -->
                <?php
                  $attributes = array(
                                  'type' => 'password',
                                  'class' => 'form-control',
                                  'id' => 'password',
                                  'name' => 'password',
                                  // 'placeholder' => 'email@domain.com',
                                  'required' => true
                                );

                  echo form_password($attributes);
                ?>
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>
              
              <?= form_submit('btn-submit', 'Iniciar Sesión', ["class" => "btn btn-block btn-primary"]); ?>
              <!-- <input type="submit" value="Log In" class="btn btn-block btn-primary"> -->

            <?= form_close() ?>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="<?php echo base_url('recursos_login/login-v4/js/jquery-3.3.1.min.js');?>"></script>
    <script src="<?php echo base_url('recursos_login/login-v4/js/popper.min.js');?>"></script>
    <script src="<?php echo base_url('recursos_login/login-v4/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('recursos_login/login-v4/js/main.js');?>"></script>
  </body>
</html>


