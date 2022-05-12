<?php
session_start();
	if (isset($_SESSION['userId'])) {
		header("Location: ../browse");
	}


?>
<!DOCTYPE html>
<!-- dit is de login pagina -->
<html>
	<head>
		<title>NEPFLIX - Login</title>
		<link rel="shortcut icon" href="../images/icons/NetflixIcon.png" type="image/x-icon" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body style="background: url(../images/background/BackgroundLogin.jpg)">

		<div class="container d-flex justify-content-center">
			<img class="img-fluid" src="../images/logo-navbar.png"></img>
		</div>

		<main>
			<!-- inloggen -->
			<div class="card col-sm-6 container-fluid text-center text-md bg-dark" style="opacity: 0.95">
				<p class="card-title text-light font-weight-bold">Log in to Netflix</p>
				<form class="text-center" action="../php/login.inc.php" method="post">
					<!-- email -->
					<label class="text-light m-1" for="mailusername">E-mail adress or username:</label><br>
					<input type="text" name="emailusername" id="mailusername" placeholder="Username/e-mail"><br>
					<!-- password -->
					<label class="text-light m-1" for="password">Password:</label><br>
					<input type="password" name="password" id="password" placeholder="Password"><br>
					<!-- submit -->
					<input class="btn btn-primary bg-danger font-weight-bold m-1" type="submit" name="login-submit" value="Log In">
				</form>
			</div>
			<!-- or block -->
			<div class="card col-sm-1 container-fluid text-center text-md bg-danger">
				<p class="card-text text-light font-weight-bold">Or</p>
			</div>
			<!-- registreren -->
			<div class="card col-sm-6 container-fluid text-center text-md bg-dark" style="opacity: 0.95">
				<p class="card-title text-light font-weight-bold">Register for Netflix</p>
				<form class="text-center" action="../php/signup.inc.php" method="post">
					<!-- username -->
					<label class="text-light m-1" for="username">Choose a username:</label><br>
					<input type="text" name="username" id="username" placeholder="Username"><br>
					<!-- email -->
					<label class="text-light m-1" for="email">Fill in your e-mail adress:</label><br>
					<input type="text" name="email" id="email" placeholder="E-mail"><br>
					<!-- password -->
					<label class="text-light m-1" for="password">Create a password:</label><br>
					<input type="password" name="password" id="password" placeholder="Repeat password"><br>
					<!-- password repeat -->
					<label class="text-light m-1" for="password-repeat">Repeat your password:</label><br>
					<input type="password" name="password-repeat" id="password-repeat" placeholder="Repeat password"><br>
					<!-- submit -->
					<input class="btn btn-primary bg-danger font-weight-bold m-1" type="submit" name="signup-submit" value="Register">
				</form>
			</div>
		</main>

		<footer id="footer" class="page-footer">
			<!-- header en footer js word een php bestand -->
			<?php include('../php/footerprint.php') ?>
		</footer>

		<!-- Bootstrap scripts -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>
