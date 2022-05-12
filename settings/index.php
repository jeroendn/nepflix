<?php
session_start();

if (!isset($_SESSION['userId'])) {
	header("Location: ../login");
}

require '../php/dbconnection.inc.php';
  ?>

<!DOCTYPE html>
<!-- dit is de settings pagina -->
<html>
	<head>
		<title>NEPFLIX- Settings</title>
		<link rel="shortcut icon" href="../images/icons/NetflixIcon.png" type="image/x-icon" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<meta http-equiv="X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>

	<body style="background-color: #111">

		<div class="container">
		</div>
		<!--Navbar -->
		<?php include('../php/navprint.php') ?>
		<!--Navbar einde -->

		<main>
			<?php
			$sql = "SELECT * FROM users WHERE user_id =:user_id";
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':user_id', $_SESSION['userId']);
			$stmt->execute();
			$rowAccount = $stmt->fetchAll(PDO::FETCH_ASSOC);

			echo'	<div class="card col-sm-6 container-fluid text-center text-md bg-dark" style="opacity: 0.95">
							<p class="card-title text-light font-weight-bold">Change your account details</p>
							<form class="text-center" action="../php/settings.inc.php" method="post">

								<!-- current username -->
								<label class="text-light m-1">current username</label><br>
								<input type="text" value="'.$rowAccount[0]['user_username'].'" disabled><br>

								<!-- new username -->
								<label class="text-light m-1" for="username">New username</label><br>
								<input type="text" name="username" id="username" value="'.$rowAccount[0]['user_username'].'" placeholder="Username"><br>

								<!-- current email -->
								<label class="text-light m-1">Current E-mail</label><br>
								<input type="text" value="'.$rowAccount[0]['user_email'].'" disabled><br>

								<!-- new email -->
								<label class="text-light m-1" for="mail">New E-mail</label><br>
								<input type="text" name="mail" id="mail" value="'.$rowAccount[0]['user_email'].'" placeholder="E-Mail"><br>

								<!-- current password -->
								<label class="text-light m-1" for="password1">Current password</label><br>
								<input type="password" name="password1" id="password1" placeholder="Password"><br>

								<!-- change password button -->
								<input id="btn-change-password" class="btn btn-primary bg-danger font-weight-bold m-1" type="button" name="btn-change-password" value="Change password"><br>

								<div class="changePassword">
									<!-- new password -->
									<label class="text-light m-1" for="password2">New password</label><br>
									<input type="password" name="password2" id="password2" placeholder="Password"><br>

									<!-- repeat new password -->
									<label class="text-light m-1" for="password3">Repeat new password</label><br>
									<input type="password" name="password3" id="password3" placeholder="Password"><br>
								</div>

								<!-- submit button -->
								<input class="btn btn-primary bg-danger font-weight-bold m-1" type="submit" name="settings-submit" value="Save changes">
							</form>
						</div>';
			 ?>
		</main>

		<footer id="footer" class="page-footer">
			<?php include('../php/footerprint.php') ?>
		</footer>

		<!-- Bootstrap scripts -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<script src="../js/jquery.min.js"></script>
		<script src="../js/browse.js"></script>
		<script src="../js/settings.js"></script>
	</body>
</html>
