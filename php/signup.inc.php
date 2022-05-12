<?php
if (isset($_POST['signup-submit'])) {
	
	require 'dbconnection.inc.php';
	require 'dbsettings.inc.php';

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordRepeat = $_POST['password-repeat'];

	if( empty($username) || empty($email) || empty($password) || empty($passwordRepeat) ){
		header("Location: ../login/index.php?error=emptyfields");
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*&/", $username)) {
		header("Location: ../login/index.php?error=invalidemailusername");
		exit();
	}	
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../login/index.php?error=invalidemail");
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		header("Location: ../login/index.php?error=invalidusernamechars");
		exit();
	}
	else if ($password !== $passwordRepeat) {
		header("Location: ../login/index.php?error=passwordsnomatch");
		exit();
	}
	else {
		try{
			//sql statement maken
			$sql = "SELECT COUNT(user_username) FROM users WHERE user_username=:username";
			//sql statement invoeren
			$stmt = $conn->prepare($sql);
			$stmt->bindParam(':username', $username, PDO::PARAM_STR);

			$stmt->execute();
		}
		catch (PDOException $e){
			header("Location: ../login/index.php?error=sqlerror");
			exit();				
		}

		$resultCheck = $stmt->fetchColumn();

		//als er al een regel bestaat met een gebruikersnaam dan terug naar index
		if ($resultCheck > 0) {
		header("Location: ../login/index.php?error=usernametaken");
		exit();					
		}


		//anders
		else {
			try {
				$sql = "INSERT INTO users (user_email, user_username, user_password) VALUES (:email, :username, :hashedpass)";
				$stmt = $conn->prepare($sql);
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
				$stmt->bindParam(':email', $email, PDO::PARAM_STR);
				$stmt->bindParam(':username', $username, PDO::PARAM_STR);
				$stmt->bindParam(':hashedpass', $hashedPassword, PDO::PARAM_STR);
				$stmt->execute();				
			}
			catch (PDOException $e) {
				header("Location: ../login/index.php?error=sqlerror");
				exit();
			}
			


			header("Location: ../login/index.php?signup=success");
			exit();
		}




	}
	$stmt = NULL;
	$conn = NULL;


}
//als er niet op de submit knop is gedrukt direct terugkeren
else {
	header("Location: ../login/index.php");
	exit();		
}