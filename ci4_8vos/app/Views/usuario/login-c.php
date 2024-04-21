<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V4</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(RECURSOS_LOGIN_VENDOR.'bootstrap/css/bootstrap.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(RECURSOS_LOGIN_FONTS.'font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(RECURSOS_LOGIN_FONTS.'iconic/css/material-design-iconic-font.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(RECURSOS_LOGIN_VENDOR.'animate/animate.css'); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(RECURSOS_LOGIN_VENDOR.'css-hamburgers/hamburgers.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(RECURSOS_LOGIN_VENDOR.'animsition/css/animsition.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(RECURSOS_LOGIN_VENDOR.'select2/select2.min.css'); ?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(RECURSOS_LOGIN_VENDOR.'daterangepicker/daterangepicker.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(RECURSOS_LOGIN_CSS.'util.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(RECURSOS_LOGIN_CSS.'main.css')?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url(DIR_IMG."bg-01.jpg")?>');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<?=  form_open('validar_usuario', ["class" => 'login100-form validate-form'])  ?>
					<span class="login100-form-title p-b-49">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Username</span>
						<!-- <input class="input100" type="text" name="username" placeholder="Type your username" required> -->
						<?php
							$attributes = array(
								'class' => 'input100',
								'type' => 'text',
								'name' => '',
								'placeholder' => 'Ingresa tu correo',
								'required' => true
							);
							echo form_input($attributes);
						?>
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<!-- <input class="input100" type="password" name="pass" placeholder="Type your password"> -->
						<?php
							$attributes = array(
								'class' => 'input100',
								'name' => '',
								'placeholder' => '************',
								'required' => TRUE
							);
							echo form_password($attributes);
						?>
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<!-- <button class="login100-form-btn">
								Login
							</button> -->

							<?php
								echo form_submit('iniciar', 'Iniciar Sesión', ['class' => 'login100-form-btn']);
							?>
						</div>
					</div>
<!-- 
					<div class="txt1 text-center p-t-54 p-b-20">
						<span>
							Or Sign Up Using
						</span>
					</div>

					<div class="flex-c-m">
						<a href="#" class="login100-social-item bg1">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="login100-social-item bg2">
							<i class="fa fa-twitter"></i>
						</a>

						<a href="#" class="login100-social-item bg3">
							<i class="fa fa-google"></i>
						</a>
					</div>

					<div class="flex-col-c p-t-155">
						<span class="txt1 p-b-17">
							Or Sign Up Using
						</span>
						
						
						<a href="#" class="txt2">
							Sign Up
						</a>
					</div> -->
					<!-- </form> -->
				<?= form_close() ?>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url(RECURSOS_LOGIN_VENDOR.'jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(RECURSOS_LOGIN_VENDOR.'animsition/js/animsition.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(RECURSOS_LOGIN_VENDOR.'bootstrap/js/popper.js')?>"></script>
	<script src="<?php echo base_url(RECURSOS_LOGIN_VENDOR.'bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(RECURSOS_LOGIN_VENDOR.'select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(RECURSOS_LOGIN_VENDOR.'daterangepicker/moment.min.js')?>"></script>
	<script src="<?php echo base_url(RECURSOS_LOGIN_VENDOR.'daterangepicker/daterangepicker.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(RECURSOS_LOGIN_VENDOR.'countdowntime/countdowntime.js')?>"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>