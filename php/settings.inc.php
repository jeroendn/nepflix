<?php
session_start();

if (!isset($_SESSION['userId'])) {
	header("Location: ../login");
}



if (isset($_POST['settings-submit'])) {

	require 'dbconnection.inc.php';
	require 'dbsettings.inc.php';


  //get current password
	$sql = "SELECT user_password FROM users WHERE user_id =:userid";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':userid', $_SESSION['userId']);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);


	$newusername = $_POST['username'];
	$newmail = $_POST['mail'];
  // check if current password is same as databases
  $currentpassword = $_POST['password1'];
	$newpassword = $_POST['password2'];
	$newpasswordrepeat = $_POST['password3'];

	if (empty($newusername) || empty($newmail) || empty($currentpassword)){
		header("Location: ../settings/index.php?error=emptyfields");
		exit();
	}
	else if (!filter_var($newmail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*&/", $newusername)) {
		header("Location: ../settings/index.php?error=invalidemailusername");
		exit();
	}
	else if (!filter_var($newmail, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../settings/index.php?error=invalidemail");
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $newusername)) {
		header("Location: ../settings/index.php?error=invalidusernamechars");
		exit();
	}
	else if ($newpassword !== $newpasswordrepeat && (!empty($newpassword) || !empty($newpasswordrepeat))) {
		header("Location: ../settings/index.php?error=passwordsnomatch");
		exit();
	}
	else if (!password_verify($currentpassword, $row['user_password'])) {
		header("Location: ../settings/index.php?error=wrongcurrentpassword");
		exit();
	}
	else {
		try{
			$sql = "SELECT COUNT(user_username) FROM users WHERE user_username=:username AND user_id!=:userid";
			$stmt = $conn->prepare($sql);
      $stmt->bindParam(':userid', $_SESSION['userId']);
			$stmt->bindParam(':username', $newusername, PDO::PARAM_STR);
			$stmt->execute();
		}
		catch (PDOException $e){
			header("Location: ../settings/index.php?error=sqlerror");
			exit();
		}

		$resultCheck = $stmt->fetchColumn();

		//als er al een regel bestaat met een gebruikersnaam dan terug naar index
		if ($resultCheck > 0) {
		header("Location: ../settings/index.php?error=usernametaken");
		exit();
		}

		//anders
		else {
			try {
				$sql = "UPDATE users SET user_username =:username, user_email =:email WHERE user_id =:user";
				$stmt = $conn->prepare($sql);
        $stmt->bindParam(':user', $_SESSION['userId']);
				$stmt->bindParam(':username', $newusername, PDO::PARAM_STR);
        $stmt->bindParam(':email', $newmail, PDO::PARAM_STR);
				$stmt->execute();

        if (!empty($newpassword) && !empty($newpasswordrepeat) && $newpassword == $newpasswordrepeat) {
          $sql = "UPDATE users SET user_password =:password WHERE user_id =:user";
          $stmt = $conn->prepare($sql);
          $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
          $stmt->bindParam(':user', $_SESSION['userId']);
          $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
          $stmt->execute();
        }
			}
			catch (PDOException $e) {
				header("Location: ../settings/index.php?error=sqlerror");
				exit();
			}
			header("Location: ../settings/index.php?changes=success");
			exit();
		}
	}
	$stmt = NULL;
	$conn = NULL;
}
//als er niet op de submit knop is gedrukt direct terugkeren
else {
	header("Location: ../settings/index.php");
	exit();
}
