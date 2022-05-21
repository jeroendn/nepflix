<?php
require_once __DIR__ . '../../php/session.php';

//if (!isset($_SESSION['userId'])) {
//	header("Location: ../login");
//}
?>

<!DOCTYPE html>
<html lang="EN" dir="ltr">
	<head>
		<title>NEPFLIX- Settings</title>
    <?php require_once __DIR__ . '/includes/head.php'; ?>
	</head>

	<body style="background-color: #111">
    <?php require_once __DIR__ . '/includes/header.php'; ?>

<!--		<main>-->
<!--			--><?php
//			$sql = "SELECT * FROM users WHERE user_id =:user_id";
//			$stmt = $conn->prepare($sql);
//			$stmt->bindParam(':user_id', $_SESSION['userId']);
//			$stmt->execute();
//			$rowAccount = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
//			echo'	<div class="card col-sm-6 container-fluid text-center text-md bg-dark" style="opacity: 0.95">
//							<p class="card-title text-light font-weight-bold">Change your account details</p>
//							<form class="text-center" action="../php/settings.inc.php" method="post">
//
//								<!-- current username -->
//								<label class="text-light m-1">current username</label><br>
//								<input type="text" value="'.$rowAccount[0]['user_username'].'" disabled><br>
//
//								<!-- new username -->
//								<label class="text-light m-1" for="username">New username</label><br>
//								<input type="text" name="username" id="username" value="'.$rowAccount[0]['user_username'].'" placeholder="Username"><br>
//
//								<!-- current email -->
//								<label class="text-light m-1">Current E-mail</label><br>
//								<input type="text" value="'.$rowAccount[0]['user_email'].'" disabled><br>
//
//								<!-- new email -->
//								<label class="text-light m-1" for="mail">New E-mail</label><br>
//								<input type="text" name="mail" id="mail" value="'.$rowAccount[0]['user_email'].'" placeholder="E-Mail"><br>
//
//								<!-- current password -->
//								<label class="text-light m-1" for="password1">Current password</label><br>
//								<input type="password" name="password1" id="password1" placeholder="Password"><br>
//
//								<!-- change password button -->
//								<input id="btn-change-password" class="btn btn-primary bg-danger font-weight-bold m-1" type="button" name="btn-change-password" value="Change password"><br>
//
//								<div class="changePassword">
//									<!-- new password -->
//									<label class="text-light m-1" for="password2">New password</label><br>
//									<input type="password" name="password2" id="password2" placeholder="Password"><br>
//
//									<!-- repeat new password -->
//									<label class="text-light m-1" for="password3">Repeat new password</label><br>
//									<input type="password" name="password3" id="password3" placeholder="Password"><br>
//								</div>
//
//								<!-- submit button -->
//								<input class="btn btn-primary bg-danger font-weight-bold m-1" type="submit" name="settings-submit" value="Save changes">
//							</form>
//						</div>';
//			 ?>
<!--		</main>-->

    <?php require_once __DIR__ . '/includes/footer.php'; ?>
	</body>
</html>
