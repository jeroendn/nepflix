<?php
require_once __DIR__ . '../../php/session.php';
?>

<!DOCTYPE html>
<html lang="EN" dir="ltr">
<head>
	<title>NEPFLIX - Login</title>
	<meta name="description" content="Login"/>
	<?php require_once __DIR__ . '/includes/head.php'; ?>
</head>

<body style="background: url(../images/background/BackgroundLogin.jpg)">

		<div class="container d-flex justify-content-center">
			<img class="img-fluid" src="../images/logo-navbar.png">
		</div>

		<main>
			<!-- login -->
			<div class="card col-sm-6 container-fluid text-center text-md bg-dark" style="opacity: 0.95">
				<p class="card-title text-light font-weight-bold">Login to Netflix</p>
				<form class="text-center" action="../php/post/login.php" method="post">
					<!-- mail -->
					<label class="text-light m-1" for="mail-or-username">Mail address or username:</label><br>
					<input type="text" name="mail-or-username" id="mail-or-username" placeholder="Mail/Username"><br>
					<!-- password -->
					<label class="text-light m-1" for="password">Password:</label><br>
					<input type="password" name="password" id="password" placeholder="Password"><br>
					<!-- submit -->
					<input class="btn btn-primary bg-danger font-weight-bold m-1" type="submit" name="login-submit" value="Login">
				</form>
			</div>
			<!-- separator block -->
			<div class="card col-sm-1 container-fluid text-center text-md bg-danger">
				<p class="card-text text-light font-weight-bold">Or</p>
			</div>
			<!-- register -->
			<div class="card col-sm-6 container-fluid text-center text-md bg-dark" style="opacity: 0.95">
				<p class="card-title text-light font-weight-bold">Register for Netflix</p>
				<form class="text-center" action="../php/signup.inc.php" method="post">
					<!-- username -->
					<label class="text-light m-1" for="username">Choose a username:</label><br>
					<input type="text" name="username" id="username" placeholder="Username"><br>
					<!-- mail -->
					<label class="text-light m-1" for="mail">Fill in your mail adress:</label><br>
					<input type="text" name="mail" id="mail" placeholder="Mail"><br>
					<!-- password -->
					<label class="text-light m-1" for="password">Create a password:</label><br>
					<input type="password" name="password" id="password" placeholder="Password"><br>
					<!-- password repeat -->
					<label class="text-light m-1" for="password-repeat">Repeat your password:</label><br>
					<input type="password" name="password-repeat" id="password-repeat" placeholder="Repeat password"><br>
					<!-- submit -->
					<input class="btn btn-primary bg-danger font-weight-bold m-1" type="submit" name="signup-submit" value="Register">
				</form>
			</div>
		</main>

    <?php require_once __DIR__ . '/includes/footer.php'; ?>
</body>

