<?php
    // http://localhost:8080/
    // dd(base_url(""));
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('recursos_login/login-v1/vendor/bootstrap/css/bootstrap.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('recursos_login/login-1/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('recursos_login/login-v1/vendor/animate/animate.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('recursos_login/login-v1/vendor/css-hamburgers/hamburgers.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('recursos_login/login-v1/vendor/select2/select2.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('recursos_login/login-v1/css/util.css')?>">






















    <!-- http://localhost:8080/recursos_login/css/main.css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('recursos_login/login-v1/css/main.css'); ?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url('images/img-01.png');?>" alt="IMG">
				</div>

				<?= form_open('ruta', ["class" => "login100-form validate-form"]) ?>
					<span class="login100-form-title">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<!-- <input class="input100" type="text" name="email" placeholder="Email" required> -->
						<?php
							$attributes = array(
											'class' => 'input100',
											'type' => 'email',
											'name' => '',
											'placeholder' => 'ejemplo@dominio.com',
											'required' => true,
										);
							echo form_input($attributes);
						?>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<!-- <input class="input100" type="password" name="pass" placeholder="Password"> -->
						<?php
							$attributes = array(
											'class' => 'input100',
											'type' => 'password',
											'name' => 'pass',
											'placeholder' => '************',
											'required' => true,
										);
							echo form_password($attributes);
						?>				


						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<?php
							echo form_submit('btn-enviar', "Iniciar sesion", ['class' => 'login100-form-btn']);
						?>
						<!-- <button class="login100-form-btn">
							Login
						</button> -->
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?php echo base_url('recursos_login/login-v1/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('recursos_login/login-v1/vendor/bootstrap/js/popper.js')?>"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('recursos_login/login-v1/vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('recursos_login/login-v1/vendor/tilt/tilt.jquery.min.js')?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('recursos_login/login-v1/js/main.js')?>"></script>

</body>
</html>