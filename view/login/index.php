<?php
session_start();
?>

<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="WhatsFood">
	<meta name="author" content="weslley">
	<meta property="og:image" content="https://pbs.twimg.com/profile_images/564976605479460865/6ZgfAF6b.png">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<link rel="icon" href="../assets/img/whatsfood.png">

	<title>WhatsFood</title>

	<link rel="canonical" href="https://weslleymendes.com.br/whatsFood">

	<!-- Bootstrap core CSS -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="../form-validation.css" rel="stylesheet">



	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand text-white" href="#">WhatsFood</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav ml-auto">

					<li class="nav-item">
						<a class="nav-link " href="../../"><i class="fa fa-book"></i> Cardápio</a>
					</li>

					<li class="nav-item">
						<a class="nav-link " href="#">
							<i class="fa fa-user"></i> Login
						</a>

					</li>
				</ul>
			</div>
		</div>
	</nav>


	<div class="limiter">
		<div class="container-login100" style="background-image: url('https://pixelz.cc/wp-content/uploads/2018/08/hamburger-spicy-uhd-4k-wallpaper.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="../../controller/loginController.php">
					<span class="login100-form-logo">
						<img src="./images/fastfood48dp.svg" alt="">

					</span>

					<span class="login100-form-title  p-t-27">
					WhatsFood
					</span>
					<?php
					
				
					if (!empty($_SESSION['msg'])  ) {
					echo "
					<div class='alert alert-danger alert-dismissible fade show' role='alert'>
						<strong>".$_SESSION['msg']."</strong>
						 Tente novamente ou acesse o link esqueci minha senha.
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
					</div>
					";
			    	unset($_SESSION['msg']);
					}
					
					?>
					

					<div class="wrap-input100 validate-input" data-validate="Digite seu E-mail">
						<input class="input100" type="text" name="Email" placeholder="E-mail">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Digite sua Senha">
						<input class="input100" type="Senha" name="pass" placeholder="Senha">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
						<label class="label-checkbox100" for="ckb1">
							Salvar entrada
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Entrar
						</button>
					</div>

					<div class="text-center p-b-20 p-t-40">
						<a class="txt1" href="#">
							Esqueceu sua senha?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>




	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>

</html>